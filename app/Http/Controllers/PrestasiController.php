<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Services;
use App\Models\Link;
use App\Models\Linkskm;
use App\Models\Performance;
use Illuminate\Http\Request;
use App\Models\Folder;

class PrestasiController extends Controller
{
    public function index()
    {
        return view('profil.prestasi', ["title" => "Daftar Prestasi", "active" => "kelembagaan", 'posts' => Performance::paginate(12), "heroes" => Hero::all(), "services" => Services::all(), "links" => Link::all(), "linkskm" => Linkskm::all(), "folders" => Folder::limit(6)->get()]);
    }
}
