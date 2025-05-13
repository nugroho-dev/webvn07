<?php

namespace App\Http\Controllers;

use App\Models\Categoriesfaq;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardFaqController extends Controller
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
        if (request('view')) {
            $category = Categoriesfaq::firstWhere('slug', request('view'));
            $title =  $category->name;
            $slugtitle = $category->slug;
            $slugcat = $category->slug;
        }


        return view('dashboard.faq.faq.index', ["title" => "FAQ Pada Ketegori " . $title, "slugcat" => $slugcat, "slugtitle" => $slugtitle, "placeholder" => $title, "items" => Faq::latest()->filter(request(['search', 'view']))->paginate(25)->withQueryString()]);
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
        if (request('view')) {
            $category = Categoriesfaq::firstWhere('slug', request('view'));
            $title = ' pada ' . $category->name;
            $id_categoryfaq = $category->id;
            $slugcat = $category->slug;
        }
        return view('dashboard.faq.faq.create', ['title' => 'Buat FAQ', 'slugcat' => $slugcat, 'id_catfaq' => $id_categoryfaq]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(['question' => 'required|max:255', 'slug' => 'required|unique:faqs', 'categoryfaq_id' => 'required', 'answer' => 'required']);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->answer), 1000);
        Faq::create($validatedData);
        return redirect('/home/list/faq?view=' . $request->slugcat)->with('success', 'F.A.Q Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        $title = '';
        $slugtitle = '';
        if (request('view')) {
            $category = Categoriesfaq::firstWhere('slug', request('view'));
            $title = ' pada ' . $category->name;
            $id_categoryfaq = $category->id;
            $slugcat = $category->slug;
        }
        return view('dashboard.faq.faq.edit', ['title' => 'Edit F.A.Q', 'post' => $faq,'slugcat' => $slugcat, 'id_catfaq' => $id_categoryfaq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $rules = [
            'question' => 'required|max:255', 'categoryfaq_id' => 'required', 'answer' => 'required'
        ];
        if ($request->slug != $faq->slug) {
            $rules['slug'] = 'required|unique:faqs';
        }
        $validatedData = $request->validate($rules);
        $slug = '';
        if (request('slugcat')) {
            $category = Categoriesfaq::firstWhere('slug', request(['slugcat']));
            $slug = $category->slug;
        }
        //if ($request->file('image')) {
        //$validatedData['image'] = $request->file('image')->store('post-images');
        //}
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['status'] = 'draft';
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 1000);
        Faq::where('id', $faq->id)->update($validatedData);
        return redirect('/home/list/faq?view='. $slug)->with('success', 'Data  Berhasil di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $slugcat = request('slugcat');
        Faq::destroy($faq->id);
        return redirect('/home/list/faq?view=' . $slugcat)->with('success', 'Artikel Berhasil di Hapus !');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Faq::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
