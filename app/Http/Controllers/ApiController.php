<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Auth;
class ApiController extends Controller
{
    public function allpost()
    {
        $post = Post::limit(30)->get();
        return response()->json($post, 200);
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email, 'password'=> $request->password])){
            $user=Auth::user();
            $response['name'] = $user->name;
            $response['token'] = $user->createToken($request->tokenName)->accessToken;
            $response['status']='Success';
            return response()->json($response, 200);

        }else{
            $response['status']='Failed';
            return response()->json($response, 200);
        }
    }

    public function createPost(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::user()->id;
        $post->save();

        $response['post'] = $post;
        $response['status'] = "Success";

        return response()->json($response, 200);

    }

}
