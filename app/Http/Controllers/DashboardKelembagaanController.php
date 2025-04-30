<?php

namespace App\Http\Controllers;

use App\Models\Kelembagaan;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardKelembagaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profile.kelembagaan.index', ['title' => 'Kelembagaan', 'posts' => Kelembagaan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.profile.kelembagaan.create', ['title' => 'Buat Profil Lembaga']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(['title' => 'required|max:255', 'slug' => 'required|unique:posts', 'body' => 'required', 'image' => 'image|file|max:1024']);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('klembagaan-images');
        }
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['status'] = 'draft';
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 1000);
        Kelembagaan::create($validatedData);
        return redirect('/dashboard/profil/kelembagaan/' . $request->slug)->with('success', 'Artikel Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelembagaan  $kelembagaan
     * @return \Illuminate\Http\Response
     */
    public function show(Kelembagaan $kelembagaan)
    {
        return view('dashboard.profile.kelembagaan.show', ['post' => $kelembagaan, 'title' => 'Posting', 'now' => Carbon::now()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelembagaan  $kelembagaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelembagaan $kelembagaan)
    {
        return view('dashboard.profile.kelembagaan.edit', ['title' => 'Edit Post Kelembagaan', 'post' => $kelembagaan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelembagaan  $kelembagaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelembagaan $kelembagaan)
    {
        $rules = ['title' => 'required|max:255', 'body' => 'required', 'image' => 'image|file|max:1024', 'status' => 'required'];

        if ($request->slug != $kelembagaan->slug) {
            $rules['slug'] = 'required|unique:posts';
        }
        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('kelembagaan-images');
        }
        $validatedData['published_at'] = $request->published_at;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Kelembagaan::where('id', $kelembagaan->id)->update($validatedData);
        return redirect('/dashboard/profil/kelembagaan/' . $request->slug)->with('success', 'Artikel Berhasil di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelembagaan  $kelembagaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelembagaan $kelembagaan)
    {
        if ($kelembagaan->image) {
            Storage::delete($kelembagaan->image);
        }
        Kelembagaan::destroy($kelembagaan->id);
        return redirect('/dashboard/profil/kelembagaan')->with('success', 'Artikel Berhasil di Hapus !');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Kelembagaan::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
