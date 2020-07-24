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
        $response['post']=$post;
        $response['user']=Auth::user();
        return response()->json($response, 200);
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email, 'password'=> $request->password])){
            $user=Auth::user();
            $scopes=[];
            $scopes = explode("|",$request->scopes);
            $response['name'] = $user->name;
            $response['token'] = $user->createToken($request->tokenName, $scopes)->accessToken;
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

    public function logout()
    {
        Auth::user()->token()->revoke();
        $response['status'] = 'success';
        return response()->json($response, 200);
    }

    public function logoutall()
    {
        foreach (Auth::user()->tokens as $key => $token) {
            $token->revoke();
        }
        $response['status'] = 'success';
        return response()->json($response, 200);
    }



}
