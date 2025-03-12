<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{Category,Product};
use Illuminate\Http\Request;
use Session;
use Validator;
use Stripe;

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
		// $data = Product::where('id', '!=', $product->id)->where('category_id', $product->category_id)->limit(8)->orderBy('id', 'desc')->get();
		$data = Product::where('category_id', $product->category_id)->limit(8)->orderBy('id', 'desc')->get();
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

 
}
