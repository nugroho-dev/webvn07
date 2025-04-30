<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Services;
use App\Models\Link;
use App\Models\Visimisi;
use App\Models\Linkskm;
use Illuminate\Http\Request;
use App\Models\Folder;

class VisiMisiController extends Controller
{
    public function index()
    {
        return view('profil.visimisi', ["title" => "Visi Misi", "active" => "kelembagaan", 'posts' => Visimisi::all(), "heroes" => Hero::all(), "services" => Services::all(), "links" => Link::all(), "linkskm" => Linkskm::all(), "folders" => Folder::limit(6)->get()]);
    }
}
