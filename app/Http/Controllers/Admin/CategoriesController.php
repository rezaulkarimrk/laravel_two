<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    // index methode
    public function index(){
        // Query Builder
        // $category = DB::table('categories')->get();

        // Model
        $category = Category::all();
        return view('Admin.Category.index', compact('category'));
    }
    //create Method
    public function create()
    {
        return view('admin.category.create');
    }
    // store category
    public function store(Request $request)
    {
        $validateed = $request->validate([
            'category_name'=> 'required| unique:categories| max:255'
        ]);

        // $category = new Category;
        // $category->category_name=$request->category_name;
        // $category->category_slug= Str::of($request->category_name)->slug('-');
        // $category->save();

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::of($request->category_name)->slug('-'),
        ]);

        return redirect()->back();
    }   
    public function edit( $id){
        // $data = DB::table('categories')->where('id', $id)->first();
        // $data = Category::find($id);
        $data = Category::where('id', $id)->first();
        return view('Admin.Category.edit', compact('data'));
    }
    public function update(Request $request, $id){
        $category = Category::find($id);
        // $category->update([
        //     'category_name' => $request->category_name,
        //     'category_slug' => Str::of($request->category_name)->slug('-'),
        // ]);

        $category->category_name = $request->category_name;
        $category->category_slug = Str::of($request->category_name)->slug('-');

        $category->save();

        return redirect()->route('category.index');
    }
}
