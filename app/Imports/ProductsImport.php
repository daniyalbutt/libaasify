<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DOMDocument;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Str;
use DB;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $categoryId;
    private $websiteId;
    private $product_website;

    public function __construct($categoryId, $websiteId){
        $this->categoryId = $categoryId;
        $this->websiteId = $websiteId;
        if($websiteId == 1){
            $this->product_website = 'Outfitters';
        }else if($websiteId == 2){
            $this->product_website = 'Junaid Jamshed';
        }
    }

    public function model(array $row)
    {
        if($this->websiteId == 1){
            $get_product = DB::table('products')->where('name', $row['name'])->where('category_id', $this->categoryId)->where('product_link', $row['name_href'])->first();
            if($get_product == null){
                $get_colors = trim(preg_replace('/\s\s+/', '-', $row['colors']));
                $get_size = trim(preg_replace('/\s\s+/', ' ', $row['size']));
                $size = explode(' ', $get_size);
                $attribute_value_product_size = [];
                foreach($size as $key => $value){
                    $data = DB::table('attribute_values')->where('name', strtoupper($value))->first();
                    if($data == null){
                        $insert_data = DB::table('attribute_values')->insert(
                            ['name' => strtoupper($value), 'attribute_id' => 4]
                        );
                        array_push($attribute_value_product_size, $insert_data);
                    }else{
                        array_push($attribute_value_product_size, $data->id);
                    }
                }
                $color = explode('-', $get_colors);
                $color = array_values(array_unique($color));
                $attribute_value_product_color = [];
                foreach($color as $key => $value){
                    $data = DB::table('attribute_values')->where('name', strtoupper($value))->first();
                    if($data == null){
                        $insert_data = DB::table('attribute_values')->insertGetId(
                            ['name' => strtoupper($value), 'attribute_id' => 3]
                        );
                        $attribute_value_product_color[$key]['attribute_value_id'] = $insert_data;
                    }else{
                        $attribute_value_product_color[$key]['attribute_value_id'] = $data->id;
                    }
                }
                

                $product = new Product();
                $product->name = $row['name'];
                $product->sku = $row['sku'];

                $price = str_replace("PKR", "", $row['price']);
                $cut_price = str_replace("PKR", "", $row['cut_price']);
                $product->price = (float) trim(str_replace(",", "", $price));
                $product->cut_price = (float) trim(str_replace(",", "", $cut_price));
                $product->off_percentage = $row['off_percentage'];
                $product->category_id = $this->categoryId;
                $get_image = $row['images'];
                $doc = new DOMDocument();
                libxml_use_internal_errors(true);
                $doc->loadHTML($get_image);
                libxml_use_internal_errors(false);
                $get_images = $doc->getElementsByTagName('img');
                $images_array = [];
                $set_slug = time().'-'.Str::slug($row['name']);
                foreach ($get_images as $key => $get_image) {
                    if($key == 0){
                        $product->default_color = $get_image->getAttribute('alt');
                        $product->image = $this->downloadAndStoreFile($get_image->getAttribute('src'), $set_slug);
                    }
                    if($get_image->getAttribute('alt') != $row['name']){
                        $images_array[trim($get_image->getAttribute('alt'))][$key] = $this->downloadAndStoreFile($get_image->getAttribute('src'), $set_slug);
                    }
                }
                
                $product->short_desc = $row['description'];
                $product->product_link = $row['name_href'];

                $first_index = 0;
                foreach($images_array as $key => $value){
                    if($first_index == 0){
                        $product->images = $images_array[$key];
                    }
                    $first_index++;
                }
                $first_index = 0;
                $images_index = 1;
                foreach(array_slice($images_array, 1) as $key => $value){
                    $value = array_values($value);
                    $attribute_value_product_color[$images_index]['image'] = $value[0];
                    $attribute_value_product_color[$images_index]['images'] = json_encode(array_slice($value, 1));
                    $images_index++;
                }

                $product->product_website = $this->product_website;
                $product->save();
                foreach($attribute_value_product_size as $key => $value){
                    $insert_data = DB::table('attribute_value_product')->insert(
                        ['attribute_value_id' => $value, 'product_id' => $product->id]
                    );
                }

                foreach($attribute_value_product_color as $key => $value){
                    if($key != 0){
                        if(array_key_exists('image', $value)){
                            if (array_key_exists("attribute_value_id", $value)){
                                $insert_data = DB::table('attribute_value_product')->insert(
                                    [
                                        'attribute_value_id' => $value['attribute_value_id'],
                                        'product_id' => $product->id,
                                        'image' => $value['image'],
                                        'images' => $value['images']
                                    ]
                                );
                            }
                        }
                    }
                }
                return $product;
            }
        }else if($this->websiteId == 2){
            $get_product = DB::table('products')->where('name', $row['name'])->where('category_id', $this->categoryId)->where('product_link', $row['name_href'])->first();
            if($get_product == null){
                $get_colors = trim($row['colors']);
                $get_size = json_decode($row['size']);
                $attribute_value_product_size = [];

                foreach($get_size as $key => $value){
                    $data = DB::table('attribute_values')->where('name', strtoupper($value->size))->first();
                    if($data == null){
                        $insert_data = DB::table('attribute_values')->insert(
                            ['name' => strtoupper($value->size), 'attribute_id' => 4]
                        );
                        array_push($attribute_value_product_size, $insert_data);
                    }else{
                        array_push($attribute_value_product_size, $data->id);
                    }
                }

                $product = new Product();
                $product->name = $row['name'];
                $product->sku = $row['sku'];
                $price = str_replace("PKR", "", $row['price']);
                $price = explode(".", $price);
                $price = preg_replace("/[^0-9]/", "", $price);
                $product->price = (float) preg_replace('/[^A-Za-z0-9\-]/', '', trim(str_replace(",", "", $price[0])));
                $cut_price = str_replace("PKR", "", $row['cut_price']);
                $cut_price = explode(".", $cut_price);
                $cut_price = preg_replace("/[^0-9]/", "", $cut_price);
                $product->cut_price = (float) preg_replace('/[^A-Za-z0-9\-]/', '', trim(str_replace(",", "", $cut_price[0])));
                $product->category_id = $this->categoryId;
                $product->default_color = $get_colors;
                
                $get_image = $row['images'];
                $doc = new DOMDocument();
                libxml_use_internal_errors(true);
                $doc->loadHTML($get_image);
                libxml_use_internal_errors(false);
                $get_images = $doc->getElementsByTagName('img');
                $images_array = [];
                $set_slug = time().'-'.Str::slug($row['name']);
                foreach ($get_images as $key => $get_image) {
                    $sep_image = explode('?', $get_image->getAttribute('src'));
                    if($key == 0){
                        $product->image = $this->downloadAndStoreFile($sep_image[0], $set_slug);
                    }else{
                        array_push($images_array, $this->downloadAndStoreFile($sep_image[0], $set_slug));
                    }
                }

                $product->short_desc = $row['description'];
                $product->product_link = $row['name_href'];
                $product->images = $images_array;
                $product->product_website = $this->product_website;
                $product->save();

                foreach($attribute_value_product_size as $key => $value){
                    $insert_data = DB::table('attribute_value_product')->insert(
                        ['attribute_value_id' => $value, 'product_id' => $product->id]
                    );
                }
            }else{
                $product = Product::find($get_product->id);
                $price = str_replace("PKR", "", $row['price']);
                $price = explode(".", $price);
                $price = preg_replace("/[^0-9]/", "", $price);
                $product->price = (float) preg_replace('/[^A-Za-z0-9\-]/', '', trim(str_replace(",", "", $price[0])));
                $cut_price = str_replace("PKR", "", $row['cut_price']);
                $cut_price = explode(".", $cut_price);
                $cut_price = preg_replace("/[^0-9]/", "", $cut_price);
                $product->cut_price = (float) preg_replace('/[^A-Za-z0-9\-]/', '', trim(str_replace(",", "", $cut_price[0])));
                $product->save();
            }
            return $product;

        }
    }

    function downloadAndStoreFile($fileUrl, $set_slug, $directory = 'downloads'){
        try{
            $response = Http::get($fileUrl);
            if ($response->successful()) {
                $fileName = time(). basename(parse_url($fileUrl, PHP_URL_PATH));
                $filePath = $directory . '/' . $set_slug . '/' . $fileName;
                Storage::disk('public')->put($filePath, $response->body());
                return Storage::url($filePath);
            }
            return "Failed to download file.";
        }catch(Exception $e){
            return 'curl-error';
        }
    }

}
