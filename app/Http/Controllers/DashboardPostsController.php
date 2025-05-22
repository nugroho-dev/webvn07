<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class DashboardPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', ['title' => 'Posts', 'categories' => Category::all(), 'posts' => Post::orderBy('created_at', 'DESC')->filter(request(['search', 'category', 'author']))->paginate(20), ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', ['title' => 'Create Post', 'categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate(['title' => 'required|max:255', 'slug' => 'required|unique:posts', 'category_id' => 'required', 'body' => 'required', 'image' => 'image|file|max:1024']);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('public/post-images');
        }
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['status'] = 'draft';
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 1000);
        Post::create($validatedData);
        return redirect('/home/posts/')->with('success', 'Artikel Baru Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response()->json([
        'title' => $post->title,
        'slug' => $post->slug,
         'category_id' => $post->category_id,
        'image' => asset('storage/' . $post->image),
        'created_at' =>  Carbon::parse($post->created_at)->locale('id')->isoFormat('MMM Do, YYYY'),
        'body'=> $post->body,
        'excerpt'=> $post->excerpt,
        'published_time'=>  $post->published_at,
        'published_at'=>  Carbon::parse($post->published_at)->locale('id')->isoFormat('MMM Do, YYYY'),
        'status'=> $post->status,
        'author'=> $post->author->name,
        'category' => $post->category->name,
        'notif_publish' => 'Publikasikan',
        'notif_draft' => 'Kembali ke Draft',
        'notif_unpublish' => 'Batalkan Publikasi',
        'status_publish' => 'publish',
        'status_draft' => 'draft',
        'status_unpublish' => 'unpublish',
        'now' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ]);
        
        //return view('dashboard.posts.show', ['post' => $post, 'title' => 'Posting', 'now' => Carbon::now()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', ['title' => 'Edit Post', 'categories' => Category::all(), 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $rules = ['title' => 'required|max:255',  'category_id' => 'required', 'body' => 'required', 'image' => 'image|file|max:1024', 'status' => 'required'];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }
        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('public/post-images');
        }
        $validatedData['published_at'] = $request->published_at;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Post::where('id', $post->id)->update($validatedData);
        return redirect('/home/posts/')->with('success', 'Artikel Berhasil di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/home/posts')->with('success', 'Artikel Berhasil di Hapus !');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
