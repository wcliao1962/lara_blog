<?php

namespace App\Http\Controllers;

use App\Models\Post;

class AdminPostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();

        $data = [
            'posts' => $posts,
        ];

        return view('admin.posts.index', $data);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function edit($id)
    {
        $data = ['id' => $id];

        return view('admin.posts.edit', $data);
    }
}
