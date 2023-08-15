<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->can('viewAny', Post::class)) {
            return "Danh sách bài viết";
        }
        if ($user->cant('viewAny', Post::class)) {
            abort(403);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Thêm bài viết ";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
//        $user = Auth::user();
//
//        if ($user->can('view', $post)) {
//            return "Danh sách bài viết";
//        }
//        if ($user->cant('view', $post)) {
//            abort(403);
//        }
        $this->authorize('view', $post);
        return "Bài viết".$post->id;

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
