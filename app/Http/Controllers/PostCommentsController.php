<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');    
    }

    public function store(Post $post)
    {
        $data = request()->validate([
            'message' => 'required|max:1000'
        ]);

        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'message' => $data['message']
        ]);

        

        return redirect('/posts/' . $post->id);
    }
}
