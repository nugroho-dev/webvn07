<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Services;
use App\Models\Link;
use App\Models\Linkskm;
use App\Models\Kelembagaan;
use Illuminate\Http\Request;
use App\Models\Folder;

class KelembagaanController extends Controller
{
    public function index()
    {
        return view('profil.kelembagaan', ["title" => "Profil Kelembagaan", "active" => "kelembagaan", 'posts' => Kelembagaan::all(), "heroes" => Hero::all(), "services" => Services::all(), "links" => Link::all(), "linkskm" => Linkskm::all(), "folders" => Folder::limit(6)->get()]);
    }
}
