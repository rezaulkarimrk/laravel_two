<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
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
}
