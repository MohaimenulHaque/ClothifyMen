<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\WebSettings;
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
        flash()->success('Delete category successfully');
        return redirect()->route('categories');


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
        flash()->success('Delete category successfully');
        return redirect()->route('categories');
    }

    public function deleteCategory($id)
    {
        $decryptId = Crypt::decrypt($id);
        $deleteCategory = Category::findOrFail($decryptId);
        unlink(public_path('upload/categories/' . $deleteCategory->img));
        $deleteCategory->delete();
        flash()->success('Delete category successfully');
        return redirect()->route('categories');
    }



    // ------------------------
    //  webSettings Controller
    // ------------------------

    public function webSettings()
    {
        return view('admin.webSettings');
    }
    public function storeWesSettins(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'contact' => 'nullable|numeric|digits:11',

            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'favicon' => 'nullable|image|mimes:png,jpg,jpeg,ico|max:1024',
        ]);

        $settings = new WebSettings();

        $logo = $request->file('logo');
        $logo_name = $logo->getClientOriginalName();
        $logo->move(public_path('upload/web_img/'),$logo_name);

        $favicon = $request->file('favicon');
        $favicon_name = $favicon->getClientOriginalName();
        $favicon->move(public_path('upload/web_img/'),$favicon_name);

        $settings->$logo;
        $settings->$favicon;

        $settings->website_name = $request->name;
        $settings->email = $request->email;
        $settings->contact = $request->contact;

        $settings->facebook_link = $request->facebook_link;
        $settings->instagram_link = $request->instagram_link;
        $settings->linkedin_link = $request->linkedin_link;

        $settings->save();
        flash()->success('Settings Update Successfully');
        return redirect()->route('admin.webSettings');


        // dd($request->all());

    }

}
