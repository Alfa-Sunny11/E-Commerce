<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function addProduct(Request $req){
        $product_id = $req->input('product_id');
        $product_qty = $req->input('product_qty');

        if(Auth::check()){
            $prod_check = Product::where('id',$product_id)->first();

            if($prod_check){
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
                    return response()->json(['status' => $prod_check->name." Already Added to cart"]);
                }
                else{
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();

                    return response()->json(['status' => $prod_check->name." Added to cart"]);
                }
            }
        }
        else{
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    function viewCart(){
        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart', compact('cartItems'));
    }

    function updateCart(Request $req){
        $prod_id = $req->input('prod_id');
        $product_qty = $req->input('prod_qty');

        if(Auth::check()){
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $cart = cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();

                return response()->json(['status' => "Quantity Updated"]);
            }
        }
    }

    // function deleteProduct(Request $req){
    //     if(Auth::check()){
    //         $product_id = $req->input('product_id');
    //         if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
    //             $cartItem = Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->first();
    //             $cartItem->delete();

    //             return response()->json(['status' => "Product Removed Successfully"]);
    //         }
    //         else{
                
    //         }
    //     }
    //     else{
    //         return response()->json(['status' => "Try Again"]);
    //     }
    // }
    function deleteCart($id){
        $cart = Cart::find($id);
        $cart->delete();


        return redirect('cart')->with('status', 'Product Removed Successfully');
    }
}
