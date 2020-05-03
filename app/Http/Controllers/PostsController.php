<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller {
    
    public function __construct()
    {
        $this->middleware('auth',[ "except" => ["index", "show"] ]);
      
    }

    public function index() {
        $posts = Post::orderBy('id', 'DESC')->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'bail|required|min:3',
            'body' => 'required'
        ]);
        $post = new Post();
        // get current user
        $user = Auth::user();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $now = date('YmdHis');
        $post->slug = str_replace(' ', '-', strtolower($post->title)).'-'.$now; //str_slug($post->title); 
        $post->user_id = $user->id;
        $post->save();
        return redirect('/posts')->with('success', 'تم إضافة تدوينتك بنجاح');
    }

    public function show($slug) {
        $post = Post::where('slug',$slug)->first();
        return view('posts.show', compact('post'));
    }

    public function edit($id) {
        $post = Post::find($id);
         $userId = Auth::id();
         if($post->user_id != $userId)
         {
             return redirect('/posts')->with('error', 'لا يمكنك التعديل على هذه التدوينة');
         }
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id) {
            $request->validate([
            'title' => 'bail|required|min:3',
            'body' => 'required'
        ]);
        $post =  Post::find($id);
        $userId = Auth::id();

         if($post->user_id != $userId)
         {
             return redirect('/posts')->with('error', 'لا يمكنك التعديل على هذه التدوينة');
         }
        $post->title = $request->input('title');
        $post->body = $request->input('body');
 
        $post->save();
        return redirect('/posts/'.$post->slug)->with('success', 'تم تعديل تدوينتك بنجاح');
        
    }

    public function destroy($id) {
        $post =  Post::find($id);
        
        $userId = Auth::id();
         if($post->user_id != $userId)
         {
             return redirect('/posts')->with('error', 'لا يمكنك التعديل على هذه التدوينة');
         }
        $post->delete();
        return redirect('/posts')->with('success', 'تم حذف تدوينتك بنجاح');
        
    }

}
