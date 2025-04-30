<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Services;
use App\Models\Link;
use App\Models\Alur;
use App\Models\Linkskm;
use Illuminate\Http\Request;
use App\Models\Folder;

class AlurController extends Controller
{
    public function index()
    {
        return view('perizinan.alur', ["title" => "Alur Pelayanan", "active" => "kelembagaan", 'posts' => Alur::all(), "heroes" => Hero::all(), "services" => Services::all(), "links" => Link::all(), "linkskm" => Linkskm::all(), "folders" => Folder::limit(6)->get()]);
    }
}
