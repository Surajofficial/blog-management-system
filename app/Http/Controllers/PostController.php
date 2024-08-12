<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->paginate(10);
        return view("allpost", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create_post");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => ['required'],
            'content' => ['required'],
            'image' => ['required'],
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $validate['image'] = 'user_post' . str_replace(' ', '-', str_replace(':', '-', Carbon::now()->toDayDateTimeString())) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('post'), $validate['image']);
        }
        $validate['user_id'] = auth()->user()->id;
        Post::create($validate);
        return redirect()->route('posts.index')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post = Post::find($post->id);
        return view('edit_post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id != auth()->user()->id) {
            return redirect()->route('posts.index')->with('error', 'Unauthorise access');
        }
        $validate = $request->validate([
            'title' => ['required'],
            'content' => ['required'],
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $validate['image'] = 'user_post' . str_replace(' ', '-', str_replace(':', '-', Carbon::now()->toDayDateTimeString())) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('post'), $validate['image']);
        }
        $post->update($validate);
        return redirect()->route('posts.index')->with('success', 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // return 'test';
        if ($post->user_id != auth()->user()->id) {
            return redirect()->route('posts.index')->with('error', 'Unauthorise access');
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
