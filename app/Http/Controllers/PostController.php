<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Hero;
use App\Models\Services;
use App\Models\Link;
use App\Models\Linkskm;
use App\Models\Folder;

class PostController extends Controller
{
    public function berita()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            if (empty($category->name)) {
                $title = 'dalam Kategori ini tidak ditemukan';
            } else {
                $title = 'Dalam Kategori ' . $category->name;
            }
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            if (empty($author->name)) {
                $title = 'Dari Penulis ini tidak ditemukan';
            } else {
                $title = 'Dari Penulis ' . $author->name;
            }
        }
        return view('berita', [
            "title" => "Semua Berita " . $title,

            // "berita" => Post::all(),
            "berita" => Post::where('status', '=', 'publish')->latest()->filter(request(['search', 'category', 'author']))->paginate(5)->withQueryString(),
            "beritabaru" => Post::where('status', '=', 'publish')->limit(5)->latest()->get(),
            "categories" => Category::all(),
            "heroes" => Hero::all(), "services" => Services::all(), "links" => Link::all(), "linkskm" => Linkskm::all(), "folders" => Folder::limit(6)->get()
        ]);
    }
    public function post(Post $post)
    {

        return view('post', [
            "title" => "Berita",

            "post" => $post,
            "beritabaru" => Post::where('status', '=', 'publish')->limit(5)->latest()->get(),
            "categories" => Category::all(),
            "heroes" => Hero::all(), "services" => Services::all(), "links" => Link::all(), "linkskm" => Linkskm::all(), "folders" => Folder::limit(6)->get()
        ]);
    }
}
