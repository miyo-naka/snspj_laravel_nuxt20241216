<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * Get posts list.
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return response()->json([
            'data' => $posts
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     * create new post.
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json([
            'data' => $post
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($postId)
    {
        $post = Post::find($postId);
        if(!$post){
            return response()->json(['message' => 'Post not found'], 404);
        }
        $post ->delete();
        return response()->json(['message' => 'Post deleted successfully']);
    }
}
