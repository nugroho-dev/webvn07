<?php

namespace App\Http\Controllers;

use App\Models\Maklumat;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardMaklumatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profile.maklumat.index', ['title' => 'Maklumat', 'maklumats' => Maklumat::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.profile.maklumat.create', ['title' => 'Maklumat']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(['title' => 'required|max:255', 'slug' => 'required|unique:maklumats', 'image' => 'image|file|max:1024']);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('maklumats-images');
        }
        Maklumat::create($validatedData);
        return redirect('/home/profil/maklumat')->with('success', 'Artikel Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maklumat  $maklumat
     * @return \Illuminate\Http\Response
     */
    public function show(Maklumat $maklumat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maklumat  $maklumat
     * @return \Illuminate\Http\Response
     */
    public function edit(Maklumat $maklumat)
    {
        return view('dashboard.profile.maklumat.edit', ['post' => $maklumat, 'title' => 'Edit Maklumat']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maklumat  $maklumat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maklumat $maklumat)
    {
        $rules = (['title' => 'required|max:255', 'image' => 'image|file|max:1024']);
        if ($request->slug != $maklumat->slug) {
            $rules['slug'] = 'required|unique:maklumats';
        }
        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('maklumats-images');
        }
        Maklumat::where('id', $maklumat->id)->update($validatedData);
        return redirect('/home/profil/maklumat')->with('success', 'Artikel Baru Berhasil di Tambahkan !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maklumat  $maklumat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maklumat $maklumat)
    {
        if ($maklumat->image) {
            Storage::delete($maklumat->image);
        }
        Maklumat::destroy($maklumat->id);
        return redirect('/home/profil/maklumat')->with('success', 'Artikel Berhasil di Hapus !');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Maklumat::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
