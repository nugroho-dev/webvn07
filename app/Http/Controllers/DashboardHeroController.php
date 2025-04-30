<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class DashboardHeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.beranda.hero.index', ['title' => 'Heros', 'heroes' => Hero::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.beranda.hero.create', ['title' => 'Create Hero']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(['title' => 'required|max:255', 'slug' => 'required|unique:heroes', 'body' => 'required', 'entry' => 'required|unique:heroes',  'image' => 'image|file|max:5000']);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('hiro-images');
        }
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['status'] = 'draft';
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 1000);
        Hero::create($validatedData);
        return redirect('/dashboard/beranda/hero')->with('success', 'Hero Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function show(Hero $hero)
    {
        return view('dashboard.beranda.hero.show', ['title' => 'Show Hero Posts']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function edit(Hero $hero)
    {
        return view('dashboard.beranda.hero.edit', ['title' => 'Edit Post', 'hero' => $hero]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hero $hero)
    {
        $rules = ['title' => 'required|max:255', 'body' => 'required',  'image' => 'image|file|max:5000'];

        if ($request->slug != $hero->slug) {
            $rules['slug'] = 'required|unique:heroes';
        }
        if ($request->entry != $hero->entry) {
            $rules['entry'] = 'required|unique:heroes';
        }
        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('hero-images');
        }
        //$validatedData['published_at'] = $request->published_at;
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Hero::where('id', $hero->id)->update($validatedData);
        return redirect('/dashboard/beranda/hero')->with('success', 'Hero Berhasil di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hero $hero)
    {
        if ($hero->image) {
            Storage::delete($hero->image);
        }
        Hero::destroy($hero->id);
        return redirect('/dashboard/beranda/hero')->with('success', 'Hero Berhasil di Hapus !');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Hero::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
