@extends('dashboard.layouts.main')
 @section('container')

  @include('dashboard.layouts.sidebar')
<main class="content">
  @include('dashboard.layouts.header')
  <div class="d-lg-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="col-auto d-flex justify-content-between ps-0 mb-4 mb-lg-0">
        <div class="me-lg-3">
                <a href="/home/profil/organisasi" class="btn btn-secondary d-inline-flex align-items-center me-2 "
                     aria-haspopup="true" aria-expanded="false">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clipRule="evenodd" /></svg>
                     Kembali
                </a>
        </div>
        
            <a href="/posts/" class="btn btn-gray-800 d-inline-flex align-items-center me-2"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat Berita" target="_blank">
                <svg class="icon icon-xs text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" /><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" /></svg>
            </a> 
            <a href="/home/profil/organisasi/{{ $post->slug }}/edit" class="btn btn-gray-800 d-inline-flex align-items-center me-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                <svg class="icon icon-xs text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fillRule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clipRule="evenodd" /></svg>
            </a>
         
            
            <form method="post" action="/home/profil/organisasi/{{ $post->slug }}" class="d-inline">
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
            <div class="card-body s">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-8 mb-4">
                            <div class="card shadow-lg rounded border-0 text-center p-0">
                                <div class="profile-cover rounded-top" data-background="https://picsum.photos/1024/550/?blur"></div>
                                <div class="card-body pb-5">
                                    <img src="{{ asset('storage/'. $post->image) }}" class="avatar-xl rounded mx-auto mt-n7 mb-4" alt="{{ $post->name }}">
                                    <h4 class="h3">{{ $post->name }}</h4>
                                    <h5 class="fw-normal">{{ $post->position}}</h5>
                                    <h5 class="fw-normal">{{ $post->nip}}</h5>
                                    <p class="text-gray mb-4">{{ $post->rank->name }}</p>
                                    @if($post->fb== NULL)
                                    <a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2 disabled" href="#">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    @else
                                    <a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2" href="{{ $post->fb}}">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    @endif
                                    @if($post->tw== NULL)
                                    <a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2 disabled" href="#">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                    @else
                                    <a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2" href="{{ $post->tw}}">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                    @endif
                                    @if($post->ig== NULL)
                                    <a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2 disabled" href="#">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                    @else
                                    <a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2" href="{{ $post->ig}}">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                    @endif
                                    @if($post->in== NULL)
                                    <a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2 disabled" href="#">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                    @else
                                    <a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2" href="{{ $post->in}}">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                    @endif
                                    
                                </div>
                             </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>   
</main>
@endsection