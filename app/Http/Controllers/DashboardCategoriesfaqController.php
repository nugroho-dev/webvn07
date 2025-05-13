<?php

namespace App\Http\Controllers;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Categoriesfaq;
use App\Models\Faq;
use Illuminate\Http\Request;

class DashboardCategoriesfaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.faq.category.index', ['title' => 'Kategori F.A.Q', 'categoriesfaq' => Categoriesfaq::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.faq.category.create', ['title' => 'Buat Kategori F.A.Q']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(['name' => 'required|max:255', 'slug' => 'required|unique:categoriesfaqs']);
        //if ($request->file('image')) {
        //$validatedData['image'] = $request->file('image')->store('post-images');
        //}
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['status'] = 'draft';
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 1000);
        Categoriesfaq::create($validatedData);
        return redirect('/home/faq')->with('success', 'Kategori Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoriesfaq  $categoriesfaq
     * @return \Illuminate\Http\Response
     */
    public function show(Categoriesfaq $categoriesfaq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoriesfaq  $categoriesfaq
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoriesfaq $faq)
    {
        return view('dashboard.faq.category.edit', ['title' => 'Edit Kategori', 'post' => $faq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoriesfaq  $categoriesfaq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoriesfaq $faq)
    {
        $rules = ['name' => 'required|max:255'];

        if ($request->slug != $faq->slug) {
            $rules['slug'] = 'required|unique:categoriesfaqs';
        }

        $validatedData = $request->validate($rules);

        //$validatedData['published_at'] = $request->published_at;
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Categoriesfaq::where('id', $faq->id)->update($validatedData);
        return redirect('/home/faq')->with('success', 'Data Berhasil di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoriesfaq  $categoriesfaq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoriesfaq $faq)
    {
        if ($faq) {
            $idfaq = Faq::firstWhere('categoryfaq_id', $faq->id);

            if (empty($idfaq->categoryfaq_id)) {
                Categoriesfaq::destroy($faq->id);
                return redirect('/home/faq')->with('success', 'Data Berhasil di Hapus !');
            } elseif ($idfaq->categoryfaq_id == $faq->id) {
                return redirect('/home/faq')->with('error', 'Data Tidak Bisa di Hapus !');
            }
        }
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Categoriesfaq::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
