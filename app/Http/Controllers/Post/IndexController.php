<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(6);

        $randomPosts = Post::query()->get()->random(4);
        $likedPosts = Post::query()
            ->withCount('likedUsers')
            ->orderBy('liked_users_count', 'DESC')
            ->get()
            ->take(4);
        return view('post.index', compact('posts', 'randomPosts', 'likedPosts'));
    }
}
