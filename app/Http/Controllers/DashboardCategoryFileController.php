<?php

namespace App\Http\Controllers;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Categoriesfile;
use App\Models\Folder;
use App\Models\File;
use Illuminate\Http\Request;

class DashboardCategoryFileController extends Controller
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
        if (request('folder')) {
            $category = Folder::firstWhere('slug', request('folder'));
            $title =  $category->name;
            $slugtitle = $category->slug;
            $slugcat = $category->slug;
        }


        return view('dashboard.download.category.index', ["title" => "Folder Pada " . $title, "slugcat" => $slugcat, "slugtitle" => $slugtitle, "placeholder" => $title, "items" => Categoriesfile::latest()->filter(request(['search', 'folder']))->paginate(25)->withQueryString(), "posts" => Folder::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = '';
        $slugtitle = '';
        if (request('folder')) {
            $category = Folder::firstWhere('slug', request('folder'));
            $title = ' pada ' . $category->name;
            $id_folder = $category->id;
            $slugcat = $category->slug;
        }
        return view('dashboard.download.category.create', ['title' => 'Buat Jenis Standar Pelayanan', 'slugcat' => $slugcat, 'id_folder' => $id_folder]);
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
            'name' => 'required|max:255', 'slug' => 'required|unique:categoriesfiles'
        ]);
        $slug = '';
        if (request('slugcat')) {
            $category = Folder::firstWhere('slug', request(['slugcat']));
            $validatedData['id_folder'] = $category->id;
            $slug = $category->slug;
        }
        //if ($request->file('image')) {
        //$validatedData['image'] = $request->file('image')->store('post-images');
        //}
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['status'] = 'draft';
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 1000);
        Categoriesfile::create($validatedData);
        return redirect('/home/folder/download?folder=' . $slug)->with('success', 'data Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categoriesfiles  $categoriesfiles
     * @return \Illuminate\Http\Response
     */
    public function show(Categoriesfile $categoriesfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categoriesfiles  $categoriesfiles
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoriesfile $download)
    {
        $title = '';
        $categorysp_id = '';
        if (request('folder')) {
            $category = Folder::firstWhere('slug', request('folder'));
            $title =  $category->name;
            $id_folder = $category->id;
            $slugcat = $category->slug;
        }
        return view('dashboard.download.category.edit', ['title' => 'Edit Folder', 'post' => $download, "id_folder" => $id_folder, "slugcat" => $slugcat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categoriesfile  $categoriesfiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoriesfile $download)
    {
        $rules = [
            'name' => 'required|max:255', 'id_folder' => 'required'
        ];
        if ($request->slug != $download->slug) {
            $rules['slug'] = 'required|unique:categoriesfiles';
        }
        $validatedData = $request->validate($rules);
        $slug = '';
        if (request('slugcat')) {
            $category = Folder::firstWhere('slug', request(['slugcat']));
            $slug = $category->slug;
        }
        //if ($request->file('image')) {
        //$validatedData['image'] = $request->file('image')->store('post-images');
        //}
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['status'] = 'draft';
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 1000);
        Categoriesfile::where('id', $download->id)->update($validatedData);
        return redirect('/home/folder/download?folder=' . $slug)->with('success', 'Data  Berhasil di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categoriesfiles  $categoriesfiles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoriesfile $download)
    {
        if ($download) {
            $id_catfile = File::firstWhere('id_categoriesfile', $download->id);
            $slugcat = request('slugcat');
            if (empty($id_catfile->id_categoriesfile)) {
                Categoriesfile::destroy($download->id);
                return redirect('/home/folder/download?folder=' . $slugcat)->with('success', 'Data Berhasil di Hapus !');
            } elseif ($id_catfile->id_categoriesfile  == $download->id) {
                return redirect('/home/folder/download?folder=' . $slugcat)->with('error', 'Data Tidak Bisa di Hapus !');
            }
        }
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Categoriesfile::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
