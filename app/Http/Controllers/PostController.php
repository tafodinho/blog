<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Post;
use App\User;
use App\Like;

class PostController extends Controller
{
    public function getDashBoard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $likes = Like::get();
        $count = 0;
        return view('dashboard', [
            'posts' => $posts,
            'likes' => $likes,
            'count' => $count
          ]);
    }

    public function createPost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);

        $post = new Post();
        $post->body = $request['body'];
        $message = 'there was an error';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post succesfully created';
        }

        return redirect()->route('dashboard')->with(['message' => $message]);
    }

    public function deletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if (Auth::user() != $post->user ) {
            return redirect()->back();
        }
        $post->delete();

        return redirect()->route('dashboard')->with(['message' => 'succesfully deleted']);
    }

    public function editPost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        $post = Post::find($request['postId']);
        if (Auth::user() != $post->user ) {
            return redirect()->back();
        }
        $post->body = $request['body'];
        $post->update();

        return response()->json(['new_body' => $post->body], 200);
    }

    public function likePost(Request $request)
    {
        $post_id = $request['postId'];
        // return response()->JSON(['message' => $post_id]);
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        $like = Like::where('post_id', $post_id);
        $likes = count($like);

        if (!$post) {
            echo $post_id;
        }
        $user = Auth::user();

        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_liked = $like->like;
            $update = true;
            if ($already_liked == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }

        return response()->JSON([
            'like' => $likes
          ]);
    }
}
