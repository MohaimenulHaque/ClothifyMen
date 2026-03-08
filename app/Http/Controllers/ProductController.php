<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(){
        return view('admin.products');
    }

    public function addProduct(){
        $fetchCategory = Category::all();
        return view('admin.addProduct', compact('fetchCategory'));
    }

    public function storeProduct(Request $request){

        $validate = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);

        $product = new Product();

        // Uploade Image
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $image->move(public_path('upload/products'),$image_name);

        $product->category_id = $request->category;
        $product->product_name = $request->name;
        $product->img = $image;
        $product->description = $request->description;

        // dd($request->all());

        $product->save();
        return redirect()->route('admin.products')->with('success','Product Add Auccessfully');

    }
}
