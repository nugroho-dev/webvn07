<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Services;
use App\Models\Link;
use App\Models\Categoriesps;
use App\Models\Spsops;
use App\Models\Linkskm;
use App\Models\Folder;
use Illuminate\Http\Request;

class SpSopController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Categoriesps::firstWhere('slug', request('category'));
            $title = ' pada ' . $category->name;
        }

        return view('sp.spsop', ["title" => "Standar Pelayanan" . $title, 
        "placeholder" => $title, 
        "items" => Spsops::latest()
            ->filter(request()->only(['search', 'category']))
            ->paginate(25)
            ->withQueryString(), 
        "posts" => Categoriesps::all(), 
        "heroes" => Hero::all(), 
        "services" => Services::all(), 
        "links" => Link::all(), "linkskm" => Linkskm::all(), 
        "folders" => Folder::limit(6)->get()]);
    }
    public function detail(Spsops $item)
    {

        return view('sp.detail', ["title" => "Standar Pelayanan", "izin" => $item, "heroes" => Hero::all(), "services" => Services::all(), "links" => Link::all(),"linkskm" => Linkskm::all(), "folders" => Folder::limit(6)->get()]);
    }
}
