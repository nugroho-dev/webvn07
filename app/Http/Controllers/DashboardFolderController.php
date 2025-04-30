<?php

namespace App\Http\Controllers;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Folder;
use App\Models\Categoriesfile;
use Illuminate\Http\Request;

class DashboardFolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.download.folder.index', ['title' => 'Kategori Folder Download', 'categoriesps' => Folder::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.download.folder.create', ['title' => 'Buat Kategori Folder']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(['name' => 'required|max:255', 'slug' => 'required|unique:folders']);
        //if ($request->file('image')) {
        //$validatedData['image'] = $request->file('image')->store('post-images');
        //}
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['status'] = 'draft';
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 1000);
        Folder::create($validatedData);
        return redirect('/dashboard/download')->with('success', 'Kategori Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $download)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function edit(Folder $download)
    {
        return view('dashboard.download.folder.edit', ['title' => 'Edit Kategori Folder', 'post' => $download]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Folder $download)
    {
        $rules = ['name' => 'required|max:255'];

        if ($request->slug != $download->slug) {
            $rules['slug'] = 'required|unique:folders';
        }

        $validatedData = $request->validate($rules);

        //$validatedData['published_at'] = $request->published_at;
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Folder::where('id', $download->id)->update($validatedData);
        return redirect('/dashboard/download')->with('success', 'Data Berhasil di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folder $download)
    {
        if ($download) {
            $idcat = Categoriesfile::firstWhere('id_folder', $download->id);

            if (empty($idcat->id_folder)) {
                Folder::destroy($download->id);
                return redirect('/dashboard/download')->with('success', 'Data Berhasil di Hapus !');
            } elseif ($idcat->id_folder == $download->id) {
                return redirect('/dashboard/download')->with('error', 'Data Tidak Bisa di Hapus !');
            }
        }
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Folder::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
