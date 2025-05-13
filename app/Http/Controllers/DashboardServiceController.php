<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.beranda.service.index', ['title' => 'Services', 'services' => Services::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.beranda.service.create', ['title' => 'Create Service']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(['title' => 'required|max:255', 'slug' => 'required|unique:services', 'description' => 'required', 'icon' => 'required']);
        //if ($request->file('image')) {
        //$validatedData['image'] = $request->file('image')->store('post-images');
        //}
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['status'] = 'draft';
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 1000);
        Services::create($validatedData);
        return redirect('/home/beranda/service')->with('success', 'Service Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $service)
    {
        return view('dashboard.beranda.service.edit', ['title' => 'Edit Post', 'service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $service)
    {
        $rules = ['title' => 'required|max:255', 'description' => 'required',  'icon' => 'required'];

        if ($request->slug != $service->slug) {
            $rules['slug'] = 'required|unique:services';
        }

        $validatedData = $request->validate($rules);

        //$validatedData['published_at'] = $request->published_at;
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Services::where('id', $service->id)->update($validatedData);
        return redirect('/home/beranda/service')->with('success', 'Layanan Berhasil di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $service)
    {
        Services::destroy($service->id);
        return redirect('/home/beranda/service')->with('success', 'Service Berhasil di Hapus !');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Services::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
