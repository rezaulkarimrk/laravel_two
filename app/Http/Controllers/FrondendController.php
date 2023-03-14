<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Category, Post, SubCategory };
use Illuminate\Support\Facades\Cache;

class FrondendController extends Controller
{
    public function index(){

        // $posts = "This is my  first post";
        // Cache::put('posts', $posts, now()->addDay() );
        // Cache::add('post_day', "MyDay for you", now()->addDay() );
        // Cache::forget('post_day');
        // Cache::forever('key', 'Foreever Cache file');
        // Cache::flush();
        // dd(Cache::get('key'));



        // $posts = Post::all();

        $posts  = Cache::remember('post', 150, function(){
            return Post::all();
        });
        return view('welcome', compact('posts'));
    }
}
