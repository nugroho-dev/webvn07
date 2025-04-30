<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Services;
use App\Models\Link;
use App\Models\Linkskm;
use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\Post;
use App\Models\Spsops;
use App\Models\Categoriesps;

class BerandaController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Categoriesps::firstWhere('slug', request('category'));
            $title = ' pada ' . $category->name;
        }

        return view('beranda', ["title" => "Beranda", 
        "active" => "beranda", 
        "beritabaru" => Post::where('status', '=', 'publish')->latest()->paginate(8,['*'], 'berita'),
        "notices" => Post::where('status', '=', 'publish')->where('category_id', '=', '5')->latest()->paginate(4, ['*'], 'notice'),
        "placeholder" => $title, 
        "heroes" => Hero::all(), 
        "services" => Services::all(), 
        "links" => Link::all(), 
        "linkskm" => Linkskm::all(), 
        "folders" => Folder::limit(6)->get(),
        "items" => Spsops::latest()->filter(request(['search', 'category']))->paginate(25, ['*'], 'syarat')->withQueryString()]);
    }
}
