<?php

namespace App\Http\Controllers;

use App\Models\Spsops;
use App\Models\Categoriesps;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardSpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        return view('dashboard.spsop.spcategories.index', ['title' => 'Jenis Standar Pelayanan', 'categoriesps' => Categoriesps::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.spsop.spcategories.create', ['title' => 'Buat Jenis Standar Pelayanan']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(['name' => 'required|max:255', 'slug' => 'required|unique:heroes']);
        //if ($request->file('image')) {
        //$validatedData['image'] = $request->file('image')->store('post-images');
        //}
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['status'] = 'draft';
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 1000);
        Categoriesps::create($validatedData);
        return redirect('/home/spsop')->with('success', 'Jenis Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoriesps $spsop)
    {
        return view('dashboard.spsop.spcategories.edit', ['title' => 'Edit Jenis Standar Pelayanan', 'post' => $spsop]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoriesps $spsop)
    {
        $rules = ['name' => 'required|max:255'];

        if ($request->slug != $spsop->slug) {
            $rules['slug'] = 'required|unique:categoriesps';
        }

        $validatedData = $request->validate($rules);

        //$validatedData['published_at'] = $request->published_at;
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Categoriesps::where('id', $spsop->id)->update($validatedData);
        return redirect('/home/spsop')->with('success', 'Data Berhasil di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoriesps $spsop)
    {
        if ($spsop) {
            $sop = Spsops::firstWhere('categorysp_id', $spsop->id);

            if (empty($sop->categorysp_id)) {
                Categoriesps::destroy($spsop->id);
                return redirect('/home/spsop')->with('success', 'Data Berhasil di Hapus !');
            } elseif ($sop->categorysp_id  == $spsop->id) {
                return redirect('/home/spsop')->with('error', 'Data Tidak Bisa di Hapus !');
            }
        }
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Categoriesps::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
