<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\Services;
use App\Models\Link;
use App\Models\Linkskm;
use Carbon\Carbon;
use App\Models\Folder;

class TrackerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->no) {
            $no = $request->no;
        } else {
            return redirect('/')->with('error', 'Anda Belum Mengisi Kolom Permohonan');
        }
        $response = Http::get('https://ws.sicantik.go.id/api/TemplateData/keluaran/37558.json', [
            'no' => $no
        ]);
        $cekpem = $response['data']['data'];

        return view('tracking.index', ["title" => "Lacak Permohonan", "active" => "kelembagaan", "heroes" => Hero::all(), "services" => Services::all(), "linkskm" => Linkskm::all(), "links" => Link::all(), 'datas' => $cekpem, "folders" => Folder::limit(6)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->no) {
            $no = $request->no;
        } else {
            return redirect('/')->with('error', 'Anda Belum Mengisi Kolom Permohonan');
        }
        $response = Http::get('https://ws.sicantik.go.id/api/TemplateData/keluaran/37558.json', [
            'no' => $no
        ]);
        $cekpem = $response['data']['data'];

        return view('tracking.index', ["title" => "Lacak Permohonan", "active" => "kelembagaan", "heroes" => Hero::all(), "services" => Services::all(), "links" => Link::all(), "linkskm" => Linkskm::all(), 'datas' => $cekpem, "folders" => Folder::limit(6)->get()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tracking)
    {

        if ($tracking) {
            $id = $tracking;
        } else {
            return redirect('/')->with('error', 'Anda Belum Mengisi Kolom Permohonan');
        }

        $response = Http::get('https://ws.sicantik.go.id/api/TemplateData/keluaran/37602.json', [
            'key_id' => $id
        ]);
        $cekpem = $response['data']['data'];
        return view('tracking.detail', ['post' => $tracking, "title" => "Lacak Permohonan", "active" => "kelembagaan", "heroes" => Hero::all(), "services" => Services::all(), "links" => Link::all(), "linkskm" => Linkskm::all(), 'datas' => $cekpem, "folders" => Folder::limit(6)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
