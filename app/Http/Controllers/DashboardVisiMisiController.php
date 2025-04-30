<?php

namespace App\Http\Controllers;

use App\Models\Visimisi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class DashboardVisiMisiController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profile.visimisi.index', ['title' => 'Visi Misi', 'posts' => Visimisi::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.profile.visimisi.create', ['title' => 'Buat Visi Misi']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(['title' => 'required|max:255', 'slug' => 'required|unique:posts', 'body' => 'required']);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['status'] = 'draft';
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 1000);
        Visimisi::create($validatedData);
        return redirect('/dashboard/profil/visimisi/' . $request->slug)->with('success', 'Artikel Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visimisi  $visimisi
     * @return \Illuminate\Http\Response
     */
    public function show(Visimisi $visimisi)
    {
        return view('dashboard.profile.visimisi.show', ['post' => $visimisi, 'title' => 'Posting', 'now' => Carbon::now()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visimisi  $visimisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Visimisi $visimisi)
    {
        return view('dashboard.profile.visimisi.edit', ['title' => 'Edit Post Visi Misi', 'post' => $visimisi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visimisi  $visimisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visimisi $visimisi)
    {
        $rules = ['title' => 'required|max:255', 'body' => 'required', 'status' => 'required'];

        if ($request->slug != $visimisi->slug) {
            $rules['slug'] = 'required|unique:posts';
        }
        $validatedData = $request->validate($rules);

        $validatedData['published_at'] = $request->published_at;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Visimisi::where('id', $visimisi->id)->update($validatedData);
        return redirect('/dashboard/profil/visimisi/' . $request->slug)->with('success', 'Artikel Berhasil di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visimisi  $visimisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visimisi $visimisi)
    {

        Visimisi::destroy($visimisi->id);
        return redirect('/dashboard/profil/visimisi')->with('success', 'Artikel Berhasil di Hapus !');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Visimisi::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
