<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;

class LikeController extends Controller
{
    public function like($postId)
    {
        $userId = 1;

        $existingLike = Like::where('user_id', $userId)
            ->where('post_id', $postId)
            ->first();

        if (!$existingLike) {
            Like::create([
                'user_id' => $userId,
                'post_id' => $postId
            ]);

            return response()->json(['message' => 'Liked'], 200);
        }
    }

    public function unlike($postId)
    {
        $userId = 1;
        $existingLike = Like::where('user_id', $userId)
            ->where('post_id', $postId)
            ->first();
        if ($existingLike) {
            $existingLike->delete();
            return response()->json(['message' => 'Unliked'], 200);
        }
    }

    public function countLikes($postId)
    {
        $post = Post::findOrFail($postId);
        $likeCount = $post->likes()->count();

        return response()->json(['like_count' => $likeCount], 200);
    }
}
