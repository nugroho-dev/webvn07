<?php

namespace App\Http\Controllers;

use App\Models\Linkskm;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardLinkSkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.perizinan.linkskm.index', ['title' => 'Link Menu SKM', 'links' => Linkskm::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.perizinan.linkskm.create', ['title' => 'Link Menu Laporan SKM']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(['title' => 'required|max:255', 'slug' => 'required|unique:performances',  'link' => 'max:255']);

        Linkskm::create($validatedData);
        return redirect('/dashboard/perizinan/linkskm')->with('success', 'Data Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\linkskm  $linkskm
     * @return \Illuminate\Http\Response
     */
    public function show(Linkskm $linkskm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\linkskm  $linkskm
     * @return \Illuminate\Http\Response
     */
    public function edit(Linkskm $linkskm)
    {
        return view('dashboard.perizinan.linkskm.edit', ['title' => 'Edit Link Menu Laporan SKM', 'post' => $linkskm]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Linkskm  $linkskm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Linkskm $linkskm)
    {
        $rules = ['title' => 'required|max:255', 'link' => 'max:255'];
        if ($request->slug != $linkskm->slug) {
            $rules['slug'] = 'required|unique:linkskms';
        }
        $validatedData = $request->validate($rules);

        Linkskm::where('id', $linkskm->id)->update($validatedData);
        return redirect('/dashboard/perizinan/linkskm')->with('success', 'Data Berhasil di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Linkskm  $linkskm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Linkskm $linkskm)
    {
        Linkskm::destroy($linkskm->id);
        return redirect('/dashboard/perizinan/linkskm')->with('success', 'Data Berhasil di Hapus !');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Linkskm::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
