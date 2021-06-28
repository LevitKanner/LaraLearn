<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $post = DB::table('posts')->orderBy('created_at', 'desc')->get();
        return view('welcome', ["posts" => $post]);
    }

    public function create(Request $req)
    {
        $validated = $req->validate([
            "title" => "required",
            "author_name" => "required",
            "content" => "required|min:20"
        ]);

        Post::create($validated);
        return redirect('/')->with('success', "'{$validated['title']}' created successfully");
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('details', ["post" => $post]);
    }
}
