<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($postId)
    {
        $comments = Comment::with('user')->where('post_id', $postId)->get();
        return response()->json([
            'data' => $comments
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $postId)
    {
        $comment = $request->all();
        $comment['post_id'] = $postId;
        $post = Comment::create($comment);
        return response()->json([
            'data' => $post
        ], 201);
    }

}
