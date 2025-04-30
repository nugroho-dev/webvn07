<?php

namespace App\Http\Controllers;

use App\Models\Alur;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardAlurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.perizinan.alur.index', ['title' => 'Alur Perizinan', 'alurs' => Alur::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.perizinan.alur.create', ['title' => 'Alur']);
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
            $validatedData['image'] = $request->file('image')->store('alur-images');
        }
        Alur::create($validatedData);
        return redirect('/dashboard/perizinan/alur')->with('success', 'Data Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alur  $alur
     * @return \Illuminate\Http\Response
     */
    public function show(Alur $alur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alur  $alur
     * @return \Illuminate\Http\Response
     */
    public function edit(Alur $alur)
    {
        return view('dashboard.perizinan.alur.edit', ['post' => $alur, 'title' => 'Edit Alur']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alur  $alur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alur $alur)
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
        Alur::where('id', $alur->id)->update($validatedData);
        return redirect('/dashboard/perizinan/alur')->with('success', 'Data Baru Berhasil di Tambahkan !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alur  $alur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alur $alur)
    {
        if ($alur->image) {
            Storage::delete($alur->image);
        }
        Alur::destroy($alur->id);
        return redirect('/dashboard/perizinan/alur')->with('success', 'Data Berhasil di Hapus !');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Alur::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
