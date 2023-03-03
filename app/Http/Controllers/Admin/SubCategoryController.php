<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\subcategory;
use DB;
use Str;

class SubCategoryController extends Controller
{
    // create methode
    public function create()
    {
        $categoreis = Category::all();  //DB::tatble('categories')->get();
        return view("Admin.subcategory.create", compact('categoreis')); 
    }

    // store methode
    public function store(Request  $request){
        $validate = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcatagories|max:255',
        ]);
        $subcategory = new subcategory;
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcatagory_slug = Str::of($request->subcategory_name)->slug();
        $subcategory->save();

        $notification = array('messege'=> 'Sub-Category Insert', 'alert-type' => 'Success');
        return redirect()->back()->with($notification);

    }
}
