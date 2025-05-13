<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.beranda.link.index', ['title' => 'Links', 'links' => Link::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.beranda.link.create', ['title' => 'Create Link']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(['title' => 'required|max:255', 'slug' => 'required|unique:links', 'link' => 'required', 'image' => 'image|file|max:5000']);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('link-images');
        }
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['status'] = 'draft';
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 1000);
        Link::create($validatedData);
        return redirect('/home/beranda/link')->with('success', 'Link Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        return view('dashboard.beranda.link.edit', ['title' => 'Edit Post', 'link' => $link]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $rules = ['title' => 'required|max:255', 'link' => 'required', 'image' => 'image|file|max:5000'];

        if ($request->slug != $link->slug) {
            $rules['slug'] = 'required|unique:heroes';
        }

        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('link-images');
        }
        //$validatedData['published_at'] = $request->published_at;
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Link::where('id', $link->id)->update($validatedData);
        return redirect('/home/beranda/link')->with('success', 'Link Berhasil di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        if ($link->image) {
            Storage::delete($link->image);
        }
        Link::destroy($link->id);
        return redirect('/home/beranda/link')->with('success', 'link Berhasil di Hapus !');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Link::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
