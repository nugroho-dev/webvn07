@extends('dashboard.layouts.main')
 @section('container')

  @include('dashboard.layouts.sidebar')
<main class="content">
  @include('dashboard.layouts.header')
  <div class="d-lg-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="col-auto d-flex justify-content-between ps-0 mb-4 mb-lg-0">
        <div class="me-lg-3">
                <a href="/dashboard/profil/kelembagaan" class="btn btn-secondary d-inline-flex align-items-center me-2 "
                     aria-haspopup="true" aria-expanded="false">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clipRule="evenodd" /></svg>
                     Kembali
                </a>
        </div>
        
            <a href="/posts/{{ $post->slug }}" class="btn btn-gray-800 d-inline-flex align-items-center me-2"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat Berita" target="_blank">
                <svg class="icon icon-xs text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" /><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" /></svg>
            </a> 
            <a href="/dashboard/profil/kelembagaan/{{ $post->slug }}/edit" class="btn btn-gray-800 d-inline-flex align-items-center me-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                <svg class="icon icon-xs text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fillRule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clipRule="evenodd" /></svg>
            </a>
            <form method="post" action="/dashboard/profil/kelembagaan/{{ $post->slug }}"> 
                @method('put')
                 @csrf
                 <input type="hidden" name="title" value="{{ $post->title}}">
                 <input type="hidden" name="category_id" value="{{ $post->category_id }}">
                 <input type="hidden" name="body" value="{{ $post->body }}">
                 <input type="hidden" name="slug" value="{{ $post->slug }}">
                 <input type="hidden" name="published_at" value="{{ $post->published_at }}">
                 <input type="hidden" name="status" value="unpublish">
            <button class="btn btn-gray-800 d-inline-flex align-items-center me-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Unpublish">
                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd"></path></svg>
            </button>
            </form>
            <form method="post" action="/dashboard/profil/kelembagaan/{{ $post->slug }}">
                @method('put')
                @csrf
                <input type="hidden" name="title" value="{{ $post->title}}">
                 <input type="hidden" name="category_id" value="{{ $post->category_id }}">
                 <input type="hidden" name="body" value="{{ $post->body }}">
                 <input type="hidden" name="slug" value="{{ $post->slug }}">
                 <input type="hidden" name="published_at" value="{{ $now }}">
                 <input type="hidden" name="slug" value="{{ $post->slug }}">
                <input type="hidden" name="status" value="publish">
            <button class="btn btn-gray-800 d-inline-flex align-items-center me-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Publish" type="submit">
                <svg class="icon icon-xs text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fillRule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clipRule="evenodd" /></svg>
            </button>
        </form>
            <form method="post" action="/dashboard/profil/kelembagaan/{{ $post->slug }}" class="d-inline">
                @method('delete')
                @csrf
            <button class="btn btn-gray-800 text-white d-inline-flex align-items-center me-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus" onclick="return confirm('Anda Yakin ??')">
                <svg class="icon icon-xs text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
            </form>
    
    </div>
  </div>
  
  <div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body ">
                <div class="container">
                    <h3 class="mb-3"><a href="/posts/{{ $post->slug }}" target="_blank">{{ $post->title }}</a></h3>
                    
                    @if($post->image)
                    <div class="row">
                        <div class="col-sm-8 mx-auto d-block">
                            <img src="{{ asset('storage/'.$post->image) }}" alt="" class="img-fluid  mb-3 rounded" />
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-sm-8 mx-auto d-block">
                    <img src="https://picsum.photos/1024/550/?blur" alt="" class="img-fluid  mb-3 rounded" />
                </div>
            </div>
                    @endif
            <div class="d-block d-sm-flex">
                <h4 class="h6 fw-normal text-gray d-flex align-items-center mb-3 mb-sm-0 text-capitalize">
                    {{$post->created_at->locale('id')->isoFormat('LLLL')}} 
                </h4>
                <div class="ms-sm-2">
                    @if($post->status=='publish')
                    <span class="badge super-badge bg-success text-capitalize">{{ $post->status }}</span>
                    @elseif($post->status=='unpublish')
                    <span class="badge super-badge bg-danger text-capitalize">{{ $post->status }}</span>
                    @else
                    <span class="badge super-badge bg-warning text-capitalize">{{ $post->status }}</span>
                    @endif
                    
                </div>
                
            </div>
                    <article class="my-3 fs-5">
                       
                    {!!$post->body!!}
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>   
</main>
@endsection