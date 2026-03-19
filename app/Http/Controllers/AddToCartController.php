<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    // public function add(Request $request)
    // {

    //     $productId = $request->input('product_id');
    //     $product = Product::findOrFail($productId);

    //     if ($product) {
    //         $cart = session()->get('cart', []);

    //         if (isset($cart[$productId])) {
    //             $cart[$productId]['quantity']++;
    //         } else {
    //             $cart[$productId] = [
    //                 "id" => $productId,
    //                 "name" => $product->product_name,
    //                 "img" => $product->img,
    //                 "price" => $product->price,
    //                 "regular_price" => $product->regular_price,
    //                 "discount" => $product->discount,
    //                 "quantity" => 1
    //             ];
    //         }

    //         session()->put('cart', $cart);

    //         return response()->json([
    //             'status' => 'added to cart',
    //             'count' => count($cart),
    //         ]);

    //     }

    //     return response()->json(['status' => 'product not found']);



    // }



    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::findOrFail($productId);

        if ($product) {
            $cart = session()->get('cart', []);

            if (isset($cart[$productId])) {
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

            // bottom-part HTML JS এর মাধ্যমে generate করার জন্য data পাঠাও
            return response()->json([
                'status' => 'added',
                'count' => count($cart),
                'product_id' => $product->id,
                'quantity' => $cart[$productId]['quantity'],
                'price' => $product->price,
                'regular_price' => $product->regular_price,
                'discount' => $product->discount,
                'name' => $product->product_name,
            ]);
        }

        return response()->json(['status' => 'product not found']);
    }



    public function update(Request $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity;

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {

            if ($quantity <= 0) {
                unset($cart[$productId]); // remove item
            } else {
                $cart[$productId]['quantity'] = $quantity;
            }

            session()->put('cart', $cart);

            return response()->json([
                'status' => 'updated',
                'count' => count($cart)
            ]);
        }

        return response()->json(['status' => 'error']);
    }




}
