<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    public function add(Request $request){

        $productId = $request->input('product_id');
        $product = Product::findOrFail($productId);

        if($product){
            $cart = session()->get('cart', []);

            if(isset($cart[$productId])) {
                $cart[$productId]['quantity']++;
            } else {
                $cart[$productId] = [
                    "id" => $productId,
                    "name" => $product->product_name,
                    "img" => $product->img,
                    "price" => $product->price,
                    "regular_price" => $product->regular_price,
                    "discount" => $product->discount,
                    "quantity" => 1
                ];
            }

            session()->put('cart', $cart);
            return response()->json([
                'status' => 'added to cart',
                'count'=>count($cart),
            ]);
            
        }

        return response()->json(['status' => 'product not found']);



    }

}
