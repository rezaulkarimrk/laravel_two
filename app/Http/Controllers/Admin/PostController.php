<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __constructor(){
        $this->middleware('auth');
    }

    // Post create Page
    public function create()
    {
        return view('Admin.Post.create');
    }
}
