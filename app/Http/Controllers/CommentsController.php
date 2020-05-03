<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Post;
class CommentsController extends Controller
{
    // Constructor
    
       public function __construct()
    {
        $this->middleware('auth');
    }

    
    function store(Request $request, $slug) {
        $request->validate([
            'comment' => 'required|min:5|max:500'
        ]);
        
        // Post        
        $post = Post::where('slug', $slug)->firstOrFail();
        
        //print_r($post); die();
        
        // User
        $userId = Auth::id();
        
        $comment = new Comment();
        $comment->body = $request->comment;
        $comment->post()->associate($post);
        $comment->user_id = $userId;
               
        $comment->save();
       return redirect()->route('posts.show', $slug)->with("success", "تمت اضافت تعليقك");
        
        
    }
}
