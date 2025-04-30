<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Rank;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardOrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profile.organisasi.index', ['title' => 'Organization', 'organizations' => Organization::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.profile.organisasi.create', ['title' => ' Create Organization', 'ranks' => Rank::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(['name' => 'required|max:255', 'slug' => 'required|unique:organizations', 'rank_id' => 'required', 'nip' => 'required|integer', 'image' => 'image|file|max:1024', 'position' => 'required', 'fb' => 'nullable|url', 'tw' => 'nullable|url', 'ig' => 'nullable|url', 'in' => 'nullable|url']);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('organization-images');
        }
        Organization::create($validatedData);
        return redirect('/dashboard/profil/organisasi/' . $request->slug)->with('success', 'Data Pegawai Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization  $Organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organisasi)
    {
        return view('dashboard.profile.organisasi.show', ['post' => $organisasi, 'title' => 'Organization']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organization  $Organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organisasi)
    {
        return view('dashboard.profile.organisasi.edit', ['post' => $organisasi, 'title' => 'Edit Organization', 'ranks' => Rank::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization  $Organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organisasi)
    {
        $rules = (['name' => 'required|max:255', 'rank_id' => 'required', 'nip' => 'required|integer', 'image' => 'image|file|max:1024', 'position' => 'required', 'fb' => 'nullable|url', 'tw' => 'nullable|url', 'ig' => 'nullable|url', 'in' => 'nullable|url']);
        if ($request->slug != $organisasi->slug) {
            $rules['slug'] = 'required|unique:organizations';
        }
        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('organization-images');
        }
        Organization::where('id', $organisasi->id)->update($validatedData);
        return redirect('/dashboard/profil/organisasi/' . $request->slug)->with('success', 'Data Pegawai Berhasil di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization  $Organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organisasi)
    {
        if ($organisasi->image) {
            Storage::delete($organisasi->image);
        }
        Organization::destroy($organisasi->id);
        return redirect('/dashboard/profil/organisasi')->with('success', 'Artikel Berhasil di Hapus !');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Organization::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
