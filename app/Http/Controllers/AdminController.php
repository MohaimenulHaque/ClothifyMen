<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }


    // -----------------------------
    // Category Function Controller
    // -----------------------------
    public function categories()
    {
        $getCategory = Category::all();
        return view('admin.categories', compact('getCategory'));
    }

    public function addCategory()
    {
        return view('admin.addCategory');
    }
    public function storeCategory(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'required',
        ]);

        // upload image 
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $image->move(public_path('upload/categories'), $image_name);

        // add new category 
        $category = new Category();
        $category->category_name = $request->name;
        $category->description = $request->description;

        $category->img = $image_name;

        // return $request->all();
        $category->save();
        return redirect()->route('categories')->with('success', 'Add category successfully');


    }


    public function editCategory($id)
    {
        $decryptId = Crypt::decrypt($id);
        $getEditCategory = Category::findOrFail($decryptId);
        return view('admin.editCategory', compact('getEditCategory'));
    }


    public function updateCategory($id, Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);


        // update category 
        $category = Category::findOrFail($id);

        // check if new image uploaded
        if ($request->hasFile('image')) {

            // delete old image
            if ($category->img && file_exists(public_path('upload/categories/' . $category->img))) {
                unlink(public_path('upload/categories/' . $category->img));
            }

            // upload new image
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload/categories'), $image_name);

            $category->img = $image_name;
        }

        // update other fields
        $category->category_name = $request->name;
        $category->description = $request->description;

        $category->save();
        return redirect()->route('categories')->with('success', 'Update category successfully');
    }

    public function deleteCategory($id){
        $decryptId = Crypt::decrypt($id);
        $deleteCategory = Category::findOrFail($decryptId);
        unlink(public_path('upload/categories/' . $deleteCategory->img));
        $deleteCategory-> delete();
        return redirect()->route('categories')->with('success', 'Delete category successfully');
    }


}
