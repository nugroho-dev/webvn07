<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Services;
use App\Models\Link;
use App\Models\Linkskm;
use App\Models\Performance;
use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\Categoriesfaq;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        return view('faq.faq', ["title" => "F.A.Q", "heroes" => Hero::all(), "services" => Services::all(), "links" => Link::all(), "linkskm" => Linkskm::all(), "folders" => Folder::limit(6)->get(), "items" => Faq::latest()->filter(request(['search', 'view']))->paginate(25)->withQueryString(),"categories" => Categoriesfaq::all(),]);
    }
}
