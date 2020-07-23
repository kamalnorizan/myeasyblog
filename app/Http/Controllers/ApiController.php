<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function allpost()
    {
        $post = Post::limit(30)->get();
        return response()->json($post, 200);
    }
}
