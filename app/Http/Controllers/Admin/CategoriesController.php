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

        // colection
        // $avarage = collect([1, 1, 2, 4])->avg();
        // return $avarage;

        // $collections = collect([1, 2, 3, 4, 5, 6, 7, ]);
        // $chunks = $collections->chunk(4);
        // return $chunks;

        // $collections = collect([
        //     [1, 2, 3],
        //     [4, 5, 6],
        //     [7, 8, 9],
        // ]);
        // $collapsed = $collections->collapse();
        // return $collapsed;
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

        $category = new Category;
        $category->category_name=$request->category_name;
        $category->category_slug= Str::of($request->category_name)->slug('-');
        $category->save();

        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'category_slug' => Str::of($request->category_name)->slug('-'),
        // ]);
        $notification=array('messege'=> 'Category Inserted', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }   

    // edit methode
    public function edit( $id){
        // $data = DB::table('categories')->where('id', $id)->first();
        // $data = Category::find($id);
        $data = Category::where('id', $id)->first();
        return view('Admin.Category.edit', compact('data'));
    }

    // update methode
    public function update(Request $request, $id){
        $category = Category::find($id);
        // $category->update([
        //     'category_name' => $request->category_name,
        //     'category_slug' => Str::of($request->category_name)->slug('-'),
        // ]);

        $category->category_name = $request->category_name;
        $category->category_slug = Str::of($request->category_name)->slug('-');
        $category->save();

        $notification=array('messege'=> 'Category Updated!', 'alert-type' => 'success');
        return redirect()->route('category.index')->with($notification);
    }
    //delete methode
    public function destroy( $id){
        // DB::table('categories')->where('id', $id)->delete();

        // $category = Category::find($id);
        // $category->delete();
        Category::destroy($id);

        $notification=array('messege'=> 'Category Deleted', 'alert-type' => 'warning');
        return redirect()->back()->with($notification);
    }
}
