<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Str;
use Auth;

class PostController extends Controller
{
    public function __constructor(){
        $this->middleware('auth');
    }

    // Post create Page
    public function create()
    {
        $category = Category::all();
        return view('Admin.Post.create', compact('category'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'subcategory_id' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',

        ]);

        $categoryId=DB::table('subcategories')->where('id', $request->subcategory_id)->first()->category_id;

        $data = array();
        $data['category_id'] = $categoryId;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['title'] = $request->title;
        $data['slug'] = Str::of($request->title)->slug('-');
        $data['post_date'] = $request->post_date;
        $data['tags'] = $request->tags;
        $data['description'] = $request->description;
        $data['user_id'] =Auth::id();
        $data['status'] = $request->status;
        $data['image'] = $request->image;

        return response()->json($data);

    }
}
