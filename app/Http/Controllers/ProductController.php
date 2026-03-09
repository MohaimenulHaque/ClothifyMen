<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    public function products()
    {
        $fatchProduct = Product::all();
        return view('admin.products', compact('fatchProduct'));
    }

    public function addProduct()
    {
        $fetchCategory = Category::all();
        return view('admin.addProduct', compact('fetchCategory'));
    }

    public function storeProduct(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpg,png,jpeg,webp',
            'description' => 'required',
        ]);

        $product = new Product();

        // Uploade Image
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $image->move(public_path('upload/products'), $image_name);

        $product->category_id = $request->category;
        $product->product_name = $request->name;
        $product->price = $request->price;
        $product->regular_price = $request->regular_price;
        $product->img = $image_name;
        $product->quantity = $request->quantity;
        $product->description = $request->description;

        // dd($request->all());

        $product->save();
        flash()->success('Product Add Successfully!');
        return redirect()->route('admin.products');

    }


    public function editProduct($id)
    {
        $decryptId = Crypt::decrypt($id);
        $getEditProduct = Product::findOrFail($decryptId);

        $categories = Category::all();
        return view('admin.editProduct', compact('getEditProduct', 'categories'));
    }

    public function updateProduct(Request $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $product = Product::findOrFail($id);

        // check if new image uploaded
        if ($request->hasFile('image')) {

            if ($product->img && file_exists(public_path('upload/products/' . $product->img))) {
                unlink(public_path('upload/products/' . $product->img));
            }

            $image = $request->file('img');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload/products/'), $image_name);

            $product->img = $image_name;

        }

        //update data
        $product->category_id = $request->category;
        $product->product_name = $request->name;
        $product->price = $request->price;
        $product->regular_price = $request->regular_price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;

        $product->save();
        flash()->success('Update product successfully!');
        return redirect()->route('admin.products');


    }

    public function deleteProduct($id)
    {

        $decryptId = Crypt::decrypt($id);
        $deleteProduct = Product::findOrFail($decryptId);
        unlink(public_path('upload/products/'.$deleteProduct->img));
        $deleteProduct->delete();
        flash()->success('Delete product successfully');
        return redirect()->route('admin.products');

    }
}
