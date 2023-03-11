<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Str;
use Auth;
use Image;
use App\Models\Post;
use File;
use App\Events\PostProcessed;

class PostController extends Controller
{
    public function __constructor(){
        $this->middleware('auth');
    }

    // post methode
    public function index()
    {
        $posts = Post::all();
        // $posts = DB::table('posts')
        //         ->leftjoin('categories', 'posts.category_id', 'categories.id')
        //         ->leftjoin('subcategories', 'posts.subcategory_id', 'subcategory_id')
        //         ->leftjoin('users', 'posts.user_id', 'users.id')
        //         ->select('posts.*', 'categories.category_name', 'subcategories.subcategory_name', 'users.name')
        //         ->get();
        return view('admin.post.index', compact('posts'));
    }

    // Post create Page
    public function create()
    {
        $category = Category::all();
        return view('Admin.Post.create', compact('category'));
    }

    // post Insert 
    public function store(Request $request)
    {
        $validate = $request->validate([
            'subcategory_id' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',

        ]);

        $categoryId=DB::table('subcategories')->where('id', $request->subcategory_id)->first()->category_id;
        $slug = Str::of($request->title)->slug('-');

        $data = array();
        $data['category_id'] = $categoryId;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['title'] = $request->title;
        $data['slug'] =  $slug;
        $data['post_date'] = $request->post_date;
        $data['tags'] = $request->tags;
        $data['description'] = $request->description;
        $data['user_id'] =Auth::id();
        $data['status'] = $request->status;
        $photo = $request->image;

        // event Calling
        $eData = ['title' => $request->title, 'date'=> date('d F Y', strtotime($request->post_date))];
        event(new PostProcessed($eData));
        if($photo){
            $photoName = $slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(400, 400)->save('public/media'.$photoName);
            $data['image'] = 'public/media'.$photoName;
            DB::table('posts')->insert($data);
            $notifiactiaon = array('messege' => 'Post Created', 'alert-type' => 'success');
            return redirect()->back()->with($notifiactiaon);
        }
        DB::table('posts')->insert($data);
        $notifiactiaon = array('messege' => 'Post Created', 'alert-type' => 'success');
        return redirect()->back()->with($notifiactiaon);
    }


    // post Delete
    public function destroy($id)
    {
        // $post = Post::find($id);
        // if(File::exists($post->image)){
        //     File::delete($post->image);
        // }
        // $post->delete();
        $post = DB::table('posts')->where('id', $id)->first();
        if(File::exists($post->image)){
            File::delete($post->image);
        }
        $post = DB::table('posts')->where('id', $id)->delete();
        $notifiactiaon =  array('messege' => 'Post Deleted', 'alert-type' => 'success');
        return redirect()->back()->with($notifiactiaon);
    }

    public function edit($id){
        $category = Category::all();
        $post =  Post::find($id);
        return view('Admin.Post.edit', compact('category', 'post'));
    }

    // Upadate methode
    public function update(Request $request, $id){
    
        $validate = $request->validate([
            'subcategory_id' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',

        ]);


        $categoryId=DB::table('subcategories')->where('id', $request->subcategory_id)->first()->category_id;
        $slug = Str::of($request->title)->slug('-');

        $data = array();
        $data['category_id'] = $categoryId;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['title'] = $request->title;
        $data['slug'] =  $slug;
        $data['post_date'] = $request->post_date;
        $data['tags'] = $request->tags;
        $data['description'] = $request->description;
        $data['user_id'] =Auth::id();
        $data['status'] = $request->status;
        $photo = $request->image;
        if($photo){
            $photoName = $slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(400, 400)->save('public/media'.$photoName);
            $data['image'] = 'public/media'.$photoName;
            //delete old image
            if(File::exists($post->old_image)){
                File::delete($post->old_image);
            }
            DB::table('posts')->where('id', $id)->update($data);
            $notifiactiaon = array('messege' => 'Post Created', 'alert-type' => 'success');
            return redirect()->route('post.index')->with($notifiactiaon);
        }
        else{
            $data['image'] = $request->old_image;
            DB::table('posts')->where('id', $id)->update($data);
            $notifiactiaon = array('messege' => 'Post Update', 'alert-type' => 'success');
            return redirect()->route('post.index')->with($notifiactiaon);
        }
        
    }
}
