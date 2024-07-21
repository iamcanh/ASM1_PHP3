<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $categories = Category::query()->get();

        $posts = Post::query()->get();
       
        $poststrend = Post::query()
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.id', 'posts.title', 'posts.image', 'posts.description', 'categories.name as category_name')
            ->limit(3)
            ->get();
        $postsdescid = Post::query()
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.id', 'posts.title', 'posts.image', 'posts.description', 'categories.name as category_name')
            ->orderByDesc('posts.id')
            ->limit(2)
            ->get();

        $postsPopular = Post::query()
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.id', 'posts.title', 'posts.image', 'posts.description', 'categories.name as category_name')
            ->orderByDesc('posts.id')
            ->first();

        $posts = Post::query()
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.id', 'posts.title', 'posts.image', 'posts.description', 'categories.name as category_name')
            ->limit(1)
            ->first();

        return view('user.index', compact('categories' ,'poststrend', 'postsdescid', 'postsPopular', 'posts'));
    }
    public function category($id)
    {
        $categories = Category::query()->get();

        $posts = Post::query()
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('posts.category_id', $id)
            ->select('posts.id', 'posts.title', 'posts.image', 'posts.description', 'posts.created_at', 'categories.name as category_name')
            ->paginate(5);

        $categoryName = Category::query()->find($id)->name;

        return view('user.category', compact('categories', 'posts', 'categoryName'));
    }
    public function details($id)
    {

        $categories = Category::query()->get();

        $post = Post::query()
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('posts.id', $id)
            ->select('posts.id', 'posts.title', 'posts.image', 'posts.description', 'posts.created_at', 'categories.name as category_name')
            ->first();


        return view('user.details', compact('post', 'categories'));
    }
    public function filter(Request $request)
    {
        $query = Post::query()
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.id', 'posts.title', 'posts.image', 'posts.description', 'posts.created_at', 'categories.name as category_name');

        if ($request->has('search') && $request->search != '') {
            $query->where('posts.title', 'like', '%' . $request->search . '%')
                ->orWhere('posts.description', 'like', '%' . $request->search . '%');
        }

        $posts = $query->paginate(5);
        $categories = Category::query()->get();

        return view('user.search_results', compact('categories', 'posts'));
    }
}
