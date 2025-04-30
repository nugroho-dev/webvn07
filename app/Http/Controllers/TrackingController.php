<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\Services;
use App\Models\Link;
use App\Models\Linkskm;
use App\Models\Folder;

class TrackingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->no) {
            $no = $request->no;
        } else {
            return redirect('/beranda')->with('error', 'Anda Belum Mengisi Kolom Permohonan');
        }
        $response = Http::get('https://ws.sicantik.go.id/api/TemplateData/keluaran/37558.json', [
            'no' => $no
        ]);
        $cekpem = $response['data']['data'];

        return view('tracking.index', ["title" => "Lacak Permohonan", "active" => "kelembagaan", "heroes" => Hero::all(), "services" => Services::all(), "links" => Link::all(), "linkskm" => Linkskm::all(), 'datas' => $cekpem, "folders" => Folder::limit(6)->get()]);
    }
}
