<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    
    public function categories(){

        $getCategory = Category::all();
        return view('admin.categories', compact('getCategory'));
    }

    public function addCategory(){
        return view('admin.addCategory');
    }
    public function storeCategory(Request $request){

        $validate = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'required',
        ]);

        // upload image 
        $image = $request->file('image');
        $image_name =$image->getClientOriginalName();
        $image->move(public_path('upload/categories'), $image_name );

        // add new category 
        $category = new Category();
        $category->category_name = $request->name;
        $category->description = $request->description;

        $category->img = $image_name;

        // return $request->all();
        $category->save();
        return redirect()->route('categories')->with('success', 'Add category successfully');


    }
}
