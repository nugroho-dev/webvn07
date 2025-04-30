<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class ApiPostController extends Controller
{
    public function index()
    {
        //get posts
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            if (empty($category->name)) {
                $title = 'dalam Kategori ini tidak ditemukan';
            } else {
                $title = 'Dalam Kategori ' . $category->name;
            }
        }
        $posts = Post::where('status', '=', 'publish')->select('title','slug','image', 'excerpt','published_at')->latest()->filter(request(['category']))->paginate(5)->withQueryString();

        //return collection of posts as a resource
        return new PostResource(true, 'List Data Posts', $posts);
    }
}
