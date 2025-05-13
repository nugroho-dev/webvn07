<?php

namespace App\Http\Controllers;

use App\Models\Performance;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profile.prestasi.index', ['title' => 'Prestasi', 'performances' => Performance::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.profile.prestasi.create', ['title' => 'Prestasi']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(['title' => 'required|max:255', 'slug' => 'required|unique:performances', 'desc' => 'required', 'image' => 'image|file|max:1024', 'link' => 'max:255']);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('performances-images');
        }
        Performance::create($validatedData);
        return redirect('/home/profil/prestasi')->with('success', 'Artikel Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Performance  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function show(Performance $prestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Performance  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Performance $prestasi)
    {
        return view('dashboard.profile.prestasi.edit', ['title' => 'Edit Prestasi', 'post' => $prestasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Performance  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Performance $prestasi)
    {
        $rules = ['title' => 'required|max:255', 'desc' => 'required', 'image' => 'image|file|max:1024', 'link' => 'max:255'];
        if ($request->slug != $prestasi->slug) {
            $rules['slug'] = 'required|unique:performances';
        }
        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('performances-images');
        }
        Performance::where('id', $prestasi->id)->update($validatedData);
        return redirect('/home/profil/prestasi')->with('success', 'Artikel Berhasil di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Performance  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Performance $prestasi)
    {
        if ($prestasi->image) {
            Storage::delete($prestasi->image);
        }
        Performance::destroy($prestasi->id);
        return redirect('/home/profil/prestasi')->with('success', 'Artikel Berhasil di Hapus !');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Performance::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
