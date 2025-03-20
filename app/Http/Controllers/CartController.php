<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{Category,Product,AttributeValueProduct,Order,OrderProduct};
use Illuminate\Http\Request;
use Session;
use Validator;
use Stripe;
use DB;

class CartController extends Controller
{
    public function shop()
    {
        $products = Product::paginate(10);
        $category = Category::all();
        return view('shop.shop', compact('products','category'));
    }

	public function shopBySlug($slug){
		$get_category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $get_category->id)->paginate(10);
        $category = Category::all();
        return view('shop.shop', compact('products','category', 'get_category'));
    }

    public function detail($category, $slug)
    {
        $product = Product::where('slug', $slug)->first();
		$data = Product::where('id', '!=', $product->id)->where('category_id', $product->category_id)->limit(8)->orderBy('id', 'desc')->get();
        return view('shop.product_detail',compact('product', 'data'));
    }

    public function checkout()
    {
        return view('shop.checkout');
    }

	public function addWishlist(Request $request)
	{
		$user = auth()->user();
        $user->wishlist()->toggle($request->product_id);
		return redirect()->back()->with('success','Product Added to Wishlist Successfully');
	}

    public function payment(Request $request){
		$this->validate($request, [
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required',
			'country' => 'required',
			'address' => 'required',
			'town' => 'required',
			'zip' => 'required',
			'phone' => 'required',
		]);

		$data = new Order();
		$data->name = $request->first_name . ' ' . $request->last_name;
		$data->email = $request->email;
		$data->phone = $request->phone;
		$data->zip = $request->zip;
		$data->country = $request->country;
		$data->address = $request->address;
		$data->notes = $request->message;
		$latest = DB::table('orders')->orderBy('id', 'desc')->first();
		if($latest != null){
			$data->invoice = 'JEFF' . (str_pad((int)$latest->invoice + 1, 4, '0', STR_PAD_LEFT));
		}else{
			$data->invoice = 'JEFF' . (str_pad((int)1 + 1, 4, '0', STR_PAD_LEFT));
		}
		$data->payment_method = $request->payment;
		$cart = session()->get('cart');
		$get_amount = 0;
		foreach($cart as $key => $value){
			$get_amount = $get_amount + $value['price'];
		}
		$data->amount = $get_amount;
		$data->save();

		$get_amount = 0;
		foreach($cart as $key => $value){
			$order_product = new OrderProduct();
			$order_product->name = $value['name'];
			$order_product->quantity = $value['quantity'];
			$order_product->price = $value['price'];
			$order_product->size = $value['size'];
			$order_product->color = $value['color'];
			$order_product->order_id = $data->id;
			$order_product->save();
		}
		session()->forget('cart');
		Session::flash('message', 'Your Order has been placed Successfully');
		return redirect()->route('home');
	}

	public function addToCart(Request $request){
		$product_id = $request->product_id;
		$product = Product::findOrFail($product_id);
		$cart = session()->get('cart', []);
		if(isset($cart[$product_id])) {
            $cart[$product_id]['quantity']++;
        } else {
            $cart[$product_id] = [
                "name" => $product->name,
                "quantity" => $request->qty,
                "price" => $product->price,
                "image" => $product->image,
				'size' => $request->size,
				'color' => $product->default_color
            ];

			if($request->color_variation != null){
				$data = AttributeValueProduct::where('id', $request->color_variation)->first();
				$cart[$product_id]['color_variation'] = [
					'name' => $data->get_attribute->name,
					'image' => $data->image,
					'addon' => $data->addon
				];
			}
        }

        session()->put('cart', $cart);
		return redirect()->route('product.cart');
	}

	public function cartView(){
		return view('shop.cart');
	}

	public function removeCart(Request $request){
		if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
	}

	public function updateCart(Request $request){
		$cart = session()->get('cart');
		$qty = $request->qty;
		foreach($qty as $key => $value){
			$cart[$key]["quantity"] = $value;
			session()->put('cart', $cart);
		}
		return redirect()->route('product.checkout');
	}

 
}
