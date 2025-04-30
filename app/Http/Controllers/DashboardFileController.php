<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Categoriesfile;
use App\Models\File;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardFileController extends Controller
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
            $slugfolder = $category->slug;
        }
        $titlecategory = '';
        $namecategory = '';
        if (request('category')) {
            $category = Categoriesfile::firstWhere('slug', request('category'));
            $titlecategory =  $category->name;
            $slugcategory = $category->slug;
        }
        $titlefolder = '';
        if (request('search')) {
            $titlefolder = 'Pencarian dalam ' . $titlefolder;
        }
        return view('dashboard.download.file.index', ["title" => "Folder " . $title . " pada Kategori " .  $titlecategory, "slugcategory" => $slugcategory, "slugfolder" => $slugfolder, "slugtitle" => $slugtitle, "placeholder" => $title, "items" => File::latest()->filter(request(['folder', 'category', 'search']))->paginate(25)->withQueryString()]);
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
            $title =  $category->name;
            $slugtitle = $category->slug;
            $slugfolder = $category->slug;
        }
        $titlecategory = '';
        $namecategory = '';
        if (request('category')) {
            $category = Categoriesfile::firstWhere('slug', request('category'));
            $titlecategory =  $category->name;
            $slugcategory = $category->slug;
        }
        $titlefolder = '';
        if (request('search')) {
            $titlefolder = 'Pencarian dalam ' . $titlefolder;
        }
        return view('dashboard.download.file.create', ["title" => "Buat File " . $title . " pada Kategori " .  $titlecategory, "slugcat" => $slugcategory, "slugfolder" => $slugfolder]);
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
            'name' => 'required|max:255', 'slug' => 'required|unique:spsops', 'link' => 'nullable|string',
        ]);
        $slugcat = '';
        if (request('slugcat')) {
            $category = Categoriesfile::firstWhere('slug', request(['slugcat']));
            $validatedData['id_categoriesfile'] = $category->id;
            $slugcat = $category->slug;
        }
        $slugfolder = '';
        if (request('slugfolder')) {
            $category = Folder::firstWhere('slug', request(['slugfolder']));
            $validatedData['id_folder'] = $category->id;
            $slugfolder = $category->slug;
        }
        //if ($request->file('image')) {
        //$validatedData['image'] = $request->file('image')->store('post-images');
        //}
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['status'] = 'draft';
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 1000);
        File::create($validatedData);
        return redirect('dashboard/file/download?category=' . $slugcat . '&folder=' . $slugfolder)->with('success', 'data Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $download)
    {
        $title = '';
        $slugtitle = '';

        if (request('folder')) {
            $category = Folder::firstWhere('slug', request('folder'));
            $title =  $category->name;
            $slugtitle = $category->slug;
            $slugfolder = $category->slug;
        }
        $titlecategory = '';
        $namecategory = '';
        if (request('category')) {
            $category = Categoriesfile::firstWhere('slug', request('category'));
            $titlecategory =  $category->name;
            $slugcategory = $category->slug;
        }
        $titlefolder = '';
        if (request('search')) {
            $titlefolder = 'Pencarian dalam ' . $titlefolder;
        }
        return view('dashboard.download.file.edit', ["title" => "Edit File " . $title . " pada Kategori " .  $titlecategory, "slugcat" => $slugcategory, "slugfolder" => $slugfolder, "post" => $download]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $download)
    {
        $rules = [
            'name' => 'required|max:255', 'link' => 'nullable|string',
        ];
        if ($request->slug != $download->slug) {
            $rules['slug'] = 'required|unique:files';
        }
        $validatedData = $request->validate($rules);
        $slugcat = '';
        if (request('slugcat')) {
            $category = Categoriesfile::firstWhere('slug', request(['slugcat']));

            $slugcat = $category->slug;
        }
        $slugfolder = '';
        if (request('slugfolder')) {
            $category = Folder::firstWhere('slug', request(['slugfolder']));

            $slugfolder = $category->slug;
        }

        //if ($request->file('image')) {
        //$validatedData['image'] = $request->file('image')->store('post-images');
        //}
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['status'] = 'draft';
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 1000);
        File::where('id', $download->id)->update($validatedData);
        return redirect('dashboard/file/download?category=' . $slugcat . '&folder=' . $slugfolder)->with('success', 'Data  Berhasil di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $download)
    {
        $slugcat = '';
        if (request('slugcat')) {
            $category = Categoriesfile::firstWhere('slug', request(['slugcat']));

            $slugcat = $category->slug;
        }
        $slugfolder = '';
        if (request('slugfolder')) {
            $category = Folder::firstWhere('slug', request(['slugfolder']));

            $slugfolder = $category->slug;
        }
        File::destroy($download->id);
        return redirect('dashboard/file/download?category=' . $slugcat . '&folder=' . $slugfolder)->with('success', 'Data Berhasil di Hapus !');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(File::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
