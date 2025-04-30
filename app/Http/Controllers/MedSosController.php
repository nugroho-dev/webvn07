<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Services;
use App\Models\Link;
use App\Models\Linkskm;
use App\Models\Kelembagaan;
use App\Models\Folder;
use Illuminate\Http\Request;

class MedSosController extends Controller
{
    public function index()
    {
        return view('profil.medsos', ["title" => "Media Sosial DPMPTSP", "active" => "kelembagaan", 'posts' => Kelembagaan::all(), "heroes" => Hero::all(), "services" => Services::all(), "links" => Link::all(), "linkskm" => Linkskm::all(), "folders" => Folder::limit(6)->get()]);
    }
}
