<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store()
    {
        $data = \request()->validate([
            'message' => 'required|max:1000'
        ]);

        auth()->user()->comments()->create($data);

        return \redirect('/posts/' . auth()->post()->id);

    }
}
