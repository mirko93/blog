<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');    
    }

    public function index($user)
    {
        $posts = Post::paginate(10);
        $user = User::findOrFail($user);

        return view('authors.index', compact('user', 'posts'));
    }

}
