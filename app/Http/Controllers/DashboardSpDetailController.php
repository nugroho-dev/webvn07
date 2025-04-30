<?php

namespace App\Http\Controllers;

use App\Models\Spsops;
use Illuminate\Http\Request;
use App\Models\Categoriesps;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardSpDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '';
        $slugtitle = '';
        if (request('category')) {
            $category = Categoriesps::firstWhere('slug', request('category'));
            $title = ' pada ' . $category->name;
            $slugtitle = $category->slug;
            $slugcat = $category->slug;
        }

        return view('dashboard.spsop.spdetail.index', ["title" => "Standar Pelayanan" . $title, "slugcat" => $slugcat, "slugtitle" => $slugtitle, "placeholder" => $title, "items" => Spsops::latest()->filter(request(['search', 'category']))->paginate(25)->withQueryString(), "posts" => Categoriesps::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = '';
        $categorysp_id = '';
        if (request('category')) {
            $category = Categoriesps::firstWhere('slug', request('category'));
            $title = ' pada ' . $category->name;
            $categorysp_id = $category->id;
            $slug = $category->slug;
        }
        return view('dashboard.spsop.spdetail.create', ["title" => "Standar Pelayanan" . $title, "categorysp_id" => $categorysp_id, "slugcat" => $slug]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'title' => 'required|max:255', 'slug' => 'required|unique:spsops', 'categorysp_id' => 'required', 'hukum' => 'nullable|string', 'persyaratan' => 'nullable|string', 'mekanisme' => 'nullable|string', 'waktu' => 'nullable|string', 'biaya' => 'nullable|string', 'produk' => 'nullable|string', 'sarana' => 'nullable|string', 'kompetensi' => 'nullable|string', 'pengawasan' => 'nullable|string', 'pengaduan' => 'nullable|string', 'pelaksana' => 'nullable|string', 'jaminan' => 'nullable|string', 'keamanan' => 'nullable|string', 'kinerja' => 'nullable|string', 'formulir' => 'nullable|string', 'sop' => 'nullable|string',
        ]);
        $slug = '';
        if (request('slugcat')) {
            $category = Categoriesps::firstWhere('slug', request(['slugcat']));
            $slug = $category->slug;
        }
        //if ($request->file('image')) {
        //$validatedData['image'] = $request->file('image')->store('post-images');
        //}
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['status'] = 'draft';
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 1000);
        Spsops::create($validatedData);
        return redirect('/dashboard/detail/spsop?category=' . $slug)->with('success', 'data Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spsops  $spsops
     * @return \Illuminate\Http\Response
     */
    public function show(Spsops $spsop)
    {
        $title = '';
        $categorysp_id = '';
        if (request('category')) {
            $category = Categoriesps::firstWhere('slug', request('category'));
            $title = ' pada ' . $category->name;
            $categorysp_id = $category->id;
            $slug = $category->slug;
        }
        return view('dashboard.spsop.spdetail.show', ['title' => 'Standar Pelayanan', 'post' => $spsop, "categorysp_id" => $categorysp_id, "slugcat" => $slug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spsops  $spsops
     * @return \Illuminate\Http\Response
     */
    public function edit(Spsops $spsop)
    {
        $title = '';
        $categorysp_id = '';
        if (request('category')) {
            $category = Categoriesps::firstWhere('slug', request('category'));
            $title = ' pada ' . $category->name;
            $categorysp_id = $category->id;
            $slug = $category->slug;
        }
        return view('dashboard.spsop.spdetail.edit', ['title' => 'Edit Jenis Standar Pelayanan', 'post' => $spsop, "categorysp_id" => $categorysp_id, "slugcat" => $slug]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spsops  $spsops
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spsops $spsop)
    {
        $rules = [
            'title' => 'required|max:255', 'categorysp_id' => 'required', 'hukum' => 'nullable|string', 'persyaratan' => 'nullable|string', 'mekanisme' => 'nullable|string', 'waktu' => 'nullable|string', 'biaya' => 'nullable|string', 'produk' => 'nullable|string', 'sarana' => 'nullable|string', 'kompetensi' => 'nullable|string', 'pengawasan' => 'nullable|string', 'pengaduan' => 'nullable|string', 'pelaksana' => 'nullable|string', 'jaminan' => 'nullable|string', 'keamanan' => 'nullable|string', 'kinerja' => 'nullable|string', 'formulir' => 'nullable|string', 'sop' => 'nullable|string',
        ];
        if ($request->slug != $spsop->slug) {
            $rules['slug'] = 'required|unique:spsops';
        }
        $validatedData = $request->validate($rules);
        $slug = '';
        if (request('slugcat')) {
            $category = Categoriesps::firstWhere('slug', request(['slugcat']));
            $slug = $category->slug;
        }
        //if ($request->file('image')) {
        //$validatedData['image'] = $request->file('image')->store('post-images');
        //}
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['status'] = 'draft';
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 1000);
        Spsops::where('id', $spsop->id)->update($validatedData);
        return redirect('/dashboard/detail/spsop?category=' . $slug)->with('success', 'Data  Berhasil di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spsops  $spsops
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spsops $spsop)
    {
        $slugcat = '';
        if (request('slugcat')) {
            $category = Categoriesps::firstWhere('slug', request(['slugcat']));
            $slugcat = $category->slug;
        }
        Spsops::destroy($spsop->id);
        return redirect('/dashboard/detail/spsop?category=' . $slugcat)->with('success', 'Data Berhasil di Hapus !');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Spsops::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
