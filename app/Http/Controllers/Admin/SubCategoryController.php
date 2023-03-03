<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use DB;
use Str;

class SubCategoryController extends Controller
{
    //subcategory get
    public function index()
    {   
        // $data = DB::table('subcategories')->leftjoin('categories', 'subcategories.category_id', 'categories.id')->select('categories.category_name', 'subcategories.*' )->get(); 
        $data = Subcategory::all();
        return view('Admin.subcategory.index', compact('data'));
        // return response()->json( $data);
    }

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
            'subcategory_name' => 'required|unique:subcategories|max:255',
        ]);
        $subcategory = new Subcategory;
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        $notification=array('messege'=> 'Category Inserted', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy( $id){
        // DB::table('categories')->where('id', $id)->delete();

        // $category = Category::find($id);
        // $category->delete();
        Subcategory::destroy($id);

        $notification=array('messege'=> 'Sub-Category Deleted', 'alert-type' => 'warning');
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $categories= Category::all();
        $data=Subcategory::find($id);

        return view('Admin.Subcategory.edit', compact('categories', 'data'));
    }
    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);

        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();
        $notification=array('messege'=> 'Sub-Category Update', 'alert-type' => 'success');
        return redirect()->route('subcategory.index')->with($notification);
    }
}
