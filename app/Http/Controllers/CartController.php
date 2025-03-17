<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{Category,Product,AttributeValueProduct};
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

    public function payment(Request $request)
    {
		
			try	{
				
				try {
					Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

					$customer = \Stripe\Customer::create(array(
						'email' => $request->email,
						'name' => $request->first_name,
						'phone' => $request->phone,
						'description' => "Client Created From Website",
						'source'  => $request->stripeToken,
					));
				} catch (Exception $e) {
					return redirect()->back()->with('stripe_error', $e->getMessage());
				}
				
				try {
					
					$charge = \Stripe\Charge::create(array(
						'customer' => $customer->id,
						'amount'   =>  120,
						'currency' => 'USD',
						'description' => "Payment From Website",
						'metadata' => array("name" => $request->first_name, "email" => $request->email),
					));
				} catch (Exception $e) {

					return redirect()->back()->with('stripe_error', $e->getMessage());
				}
			}
			catch (Exception $e) {
				return redirect()->back()->with('stripe_error', $e->getMessage());
			}
			
			$chargeJson = $charge->jsonSerialize();
	

		Session::flash('message', 'Your Order has been placed Successfully');	
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
