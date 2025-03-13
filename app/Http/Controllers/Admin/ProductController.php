<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Schema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use DB;
use File;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\AttributeValueProduct;
use Intervention\Image\Laravel\Facades\Image;

class ProductController extends Controller
{
    public function removeColumns($columns, $columsToBeRemove)
    {
        foreach ($columsToBeRemove as $value) {
            if (($key = array_search($value, $columns)) !== false) {
                unset($columns[$key]);
            }
        }
        return $columns;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $data = new Product();

        if ($search != null) {
            $query = Product::query();

            $table = $data->getTable();

            $columns = ['name', 'slug', 'short_desc', 'description'];

            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . $search . '%');
            }
            $data = $query->orderBy('name')->paginate(12);

            if ($request->onChange == true) {
                return response()->json(['status' => true, 'data' => $data, 'lastPage' => $data->lastPage()]);
            }
        } else {
            $data = $data->paginate(12);
            if ($request->onChange == true) {
                return response()->json(['status' => true, 'data' => $data, 'lastPage' => $data->lastPage()]);
            }
        }
        return view('admin.product.index', compact('data'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;
        $attributes = Attribute::all();
        $attribute_value = AttributeValue::whereHas('attribute', function($q){
            $q->where('slug', 'color');
        })->get();
        dd($attribute_value);
        return view("admin.product.create", compact('data', 'attributes', 'attribute_value'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->validated();
        if ($request->hasFile('image')) {

            File::isDirectory(public_path('uploads/products')) or File::makeDirectory(public_path('uploads/products'), 0777, true, true);
            $fileName =  time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $fileName);
        }

        $data = array_merge($request->except(['image', '_token', 'gallery']), ['image' => 'uploads/products/' . $fileName]);

        if ($request->hasFile('gallery')) {
            $productImages = [];
            foreach ($request->file('gallery') as $key => $file) {

                $fileName = time() . '_' . strval($key + 1) . '.' . $file->extension();
                $file->move(public_path('uploads/products'), $fileName);

                array_push($productImages, 'uploads/products/' . $fileName);
            }
            $data = array_merge($data, ['images' => $productImages]);
        }
        $product = Product::create($data);

        if (!collect($request->variation)->map(function ($values) {
            return collect($values)->filter(fn($value) => !is_null($value))->isEmpty();
        })->contains(false)) {
        return response()->json(['status' => false, 'message' => 'All values are null or empty.']);
        } else {
            if (!$this->hasNullValues($request->variation)) {
                for ($i = 0; $i < count($request->variation['attrbuite_values']); $i++) {

                    $attributeValue = $request->variation['attrbuite_values'][$i];
                    if (!is_null($attributeValue)) {
                        $data = [
                            'addon' => $request->variation['addon'][$i] ?? null,
                        ];
                        if (isset($request->variation['image'][$i])) {
                            $directory = public_path('uploads/pro-attr');
                            if (!File::isDirectory($directory)) {
                                File::makeDirectory($directory, 0777, true, true);
                            }
                            $fileName = time() . uniqid() . '.' . $request->variation['image'][$i]->extension();
                            $request->variation['image'][$i]->move($directory, $fileName);
                            $data['image'] = 'uploads/pro-attr/' . $fileName;
                        }

                        // Attach data to product variation
                        $product->variation()->attach([
                            $attributeValue => $data,
                        ]);
                    }
                }
            }
        }

        return response()->json(['status' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (routePermissionGiven('edit product')) {

            $data = Product::find($id);
            $attributes = Attribute::all();
            $attribute_value = AttributeValue::whereHas('attribute', function($q){
                $q->where('slug', 'color');
            })->get();
            return view('admin.product.create', compact('data', 'attributes', 'attribute_value'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateImagesAttribute(Request $request, $id){
        $product = AttributeValueProduct::find($id);
        $imagesArray = json_decode($product->images);

        $old_variation = $request->old_variation['gallery'];
        $index = 0;
        foreach($old_variation as $key => $value){
            $fileName =  time() . '.' . $value[$index]->extension();
            $value[$index]->move(public_path('uploads/products'), $fileName);
            array_push($imagesArray, 'uploads/products/' . $fileName);
            $product->update(['images' => $imagesArray]);
            $index++;
        }
        return response()->json(['status' => true]);
    }

    public function update(ProductRequest $request, $id)
    {
        $request->validated();
        $product = Product::find($id);

        $data = $request->except(['image', '_token', 'gallery', '_method']);

        if ($request->hasFile('image')) {
            if (File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }
            if (File::exists(public_path('55x55-'.$product->image))) {
                File::delete(public_path('55x55-'.$product->image));
            }
            $destinationPathThumbnail = public_path('uploads/products');
            File::isDirectory(public_path('uploads/products')) or File::makeDirectory(public_path('uploads/products'), 0777, true, true);
            $get_time = time();
            $image = $request->file('image');
            $fileName =  $get_time . '.' . $image->extension();
            $image->move($destinationPathThumbnail, $fileName);

            $img = Image::read($image->path());
            $imageName = '55x55-'.$get_time.'.'.$image->extension();
            $img->resize(55, 55, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumbnail.'/'.$imageName);

            $data = array_merge($data, ['image' => 'uploads/products/' . $fileName]);
        }
        if ($request->hasFile('gallery')) {
            $productImages = [];
            foreach ($request->file('gallery') as $key => $file) {

                $fileName = time() . '_' . strval($key + 1) . '.' . $file->extension();
                $file->move(public_path('uploads/products'), $fileName);

                array_push($productImages, 'uploads/products/' . $fileName);
            }
            $data = array_merge($data, ['images' => $productImages]);
        }
        $product->update($data);

        if (!collect($request->variation)->map(function ($values) {
            return collect($values)->filter(fn($value) => !is_null($value))->isEmpty();
        })->contains(false)) {
        // return response()->json(['status' => false, 'message' => 'All values are null or empty.']);
        } else {
            if (!$this->hasNullValues($request->variation)) {
                for ($i = 0; $i < count($request->variation['attrbuite_values']); $i++) {

                    $attributeValue = $request->variation['attrbuite_values'][$i];
                    if (!is_null($attributeValue)) {
                        $data = [
                            'addon' => $request->variation['addon'][$i] ?? null,
                        ];
                        if (isset($request->variation['image'][$i])) {
                            $directory = public_path('uploads/pro-attr');
                            if (!File::isDirectory($directory)) {
                                File::makeDirectory($directory, 0777, true, true);
                            }
                            $fileName = time() . uniqid() . '.' . $request->variation['image'][$i]->extension();
                            $request->variation['image'][$i]->move($directory, $fileName);
                            $data['image'] = 'uploads/pro-attr/' . $fileName;
                        }

                        if (isset($request->variation['gallery'][$i])) {
                            $productImages = [];
                            foreach($request->variation['gallery'][$i] as $key => $value){
                                $fileName = time() . '_' . strval($key + 1) . '.' . $value->extension();
                                $value->move(public_path('uploads/pro-attr/'), $fileName);
                                array_push($productImages, 'uploads/pro-attr/' . $fileName);
                            }
                            $data = array_merge($data, ['images' => json_encode($productImages)]);
                        }

                        // Attach data to product variation
                        $product->variation()->attach([
                            $attributeValue => $data,
                        ]);
                    }
                }
            }
        }

        $variation = $request->old_variation;

        foreach ($variation as $key => $value) {
            foreach($value as $inner_key => $inner_value){
                DB::table('attribute_value_product')
                    ->where('id', $inner_key)
                    ->update([
                        $key => $inner_value,
                    ]);
            }
        }

        return response()->json(['status' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product)
        {
            DB::table('order_products')->where('product_id',$product->id)->delete();
        }
        //delete image
        if (File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }

        //delete images
        $productImages = $product->images;
        if(count($productImages) > 0)
        {
            foreach($productImages as $image)
            {
                if (File::exists(public_path($image))) {
                    File::delete(public_path($image));
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('success', 'Product Deleted');
    }

    public function deleteImages(Request $request)
    {
        if (File::exists(public_path($request->input('path')))) {
            File::delete(public_path($request->input('path')));
        }
        $product = Product::find($request->input('key'));
        $imagesArray = $product->images;
        if (($key = array_search($request->input('path'), $imagesArray)) !== false) {
            unset($imagesArray[$key]);
        }
        $product->update(['images' => $imagesArray]);
        return response()->json(['status' => true]);
    }

    public function deleteImagesAttribute(Request $request){
        if (File::exists(public_path($request->input('path')))) {
            File::delete(public_path($request->input('path')));
        }
        $product = AttributeValueProduct::find($request->key);
        $imagesArray = json_decode($product->images);
        if (($key = array_search($request->input('path'), $imagesArray)) !== false) {
            unset($imagesArray[$key]);
        }
        $product->update(['images' => $imagesArray]);
        return response()->json(['status' => true]);
    }

    public function attributes(Request $request){
        $attribute = Attribute::find($request->value)->attrValues;
        if ($attribute->isNotEmpty()) {
            return response()->json(['status' => true, 'data' => $attribute]);
        } else {
            return response()->json(['status' => false, 'data' => []]);
        }
    }

    public function hasNullValues(array $data): bool{
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                if ($this->hasNullValues($value)) {
                    return true;
                }
            } elseif ($value === null || $value === "null") {
                return true;
            }
        }
        return false;
    }
}
