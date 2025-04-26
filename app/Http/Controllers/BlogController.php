<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Create Blog
    public function createBlog()
    {
        return view('backend.blog.create-blog');
    }

    // Manage Blog
    public function manageBlog()
    {
        return view('backend.blog.manage-blog');
    }
}
