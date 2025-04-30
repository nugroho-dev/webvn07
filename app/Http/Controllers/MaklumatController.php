<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Services;
use App\Models\Link;
use App\Models\Linkskm;
use App\Models\Maklumat;
use Illuminate\Http\Request;
use App\Models\Folder;

class MaklumatController extends Controller
{
    public function index()
    {
        return view('profil.maklumat', ["title" => "Maklumat Pelayanan", "active" => "kelembagaan", 'posts' => Maklumat::all(), "heroes" => Hero::all(), "services" => Services::all(), "links" => Link::all(), "linkskm" => Linkskm::all(), "folders" => Folder::limit(6)->get()]);
    }
}
