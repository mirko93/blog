<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\ImageUpload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|min:2|max:255',
            'description' => 'max:1000',
            'url' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $imagePath = request('url')->store('uploads', 'public');

        auth()->user()->posts()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'url' => $imagePath,
        ]);

        return redirect('/author/' . auth()->user()->id);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
