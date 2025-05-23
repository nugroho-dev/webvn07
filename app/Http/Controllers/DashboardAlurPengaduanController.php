<?php

namespace App\Http\Controllers;

use App\Models\Alurpengaduan;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardAlurPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.pengaduan.alur.index', ['title' => 'Alur Pengaduan', 'alurs' => Alurpengaduan::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pengaduan.alur.create', ['title' => 'Alur Pengaduan']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(['title' => 'required|max:255', 'slug' => 'required|unique:alurs', 'image' => 'required|image|file|max:1024']);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('alur-pengaduan-images');
        }
        Alurpengaduan::create($validatedData);
        return redirect('/home/pengaduan/alur')->with('success', 'Data Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alurpengaduan  $alurpengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Alurpengaduan $alurpengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alurpengaduan  $alurpengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Alurpengaduan $alur)
    {
        return view('dashboard.pengaduan.alur.edit', ['post' => $alur, 'title' => 'Edit Alur']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alurpengaduan  $alurpengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alurpengaduan $alur)
    {
        $rules = (['title' => 'required|max:255', 'image' => 'image|file|max:1024']);
        if ($request->slug != $alur->slug) {
            $rules['slug'] = 'required|unique:alurs';
        }
        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('alur-images');
        }
        Alurpengaduan::where('id', $alur->id)->update($validatedData);
        return redirect('/home/pengaduan/alur')->with('success', 'Data Baru Berhasil di Tambahkan !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alurpengaduan  $alurpengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alurpengaduan $alur)
    {
        if ($alur->image) {
            Storage::delete($alur->image);
        }
        Alurpengaduan::destroy($alur->id);
        return redirect('/home/pengaduan/alur')->with('success', 'Data Berhasil di Hapus !');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Alurpengaduan::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
