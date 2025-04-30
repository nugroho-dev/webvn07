@extends('dashboard.layouts.main')
 @section('container')

  @include('dashboard.layouts.sidebar')
<main class="content">
  @include('dashboard.layouts.header')
  <div class="d-lg-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="col-auto d-flex justify-content-between ps-0 mb-4 mb-lg-0">
        <div class="me-lg-3">
                <a href="/dashboard/profil/kelembagaan/create" class="btn btn-secondary d-inline-flex align-items-center me-2"
                     aria-haspopup="true" aria-expanded="false">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Artikel
                </a>
            
        </div>
    </div>
  </div>
<div class="task-wrapper border bg-white shadow border-0 rounded">
    @foreach($posts as $key=>$post)
    <div class="card hover-state border-bottom rounded-0 py-3">
        <div class="card-body d-sm-flex align-items-center flex-wrap flex-lg-nowrap py-0">
            <div class="col-10 col-lg-10 px-0 mb-4 mb-md-0">
                <div class="mb-2">
                    <h3 class="h5">{{ $post->title }}</h3>
                    <div class="d-block d-sm-flex">
                        <div>
                            <h4 class="h6 fw-normal text-gray d-flex align-items-center mb-3 mb-sm-0">
                                <svg class="icon icon-xxs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $post->created_at->locale('id')->isoFormat('MMM Do, YYYY') }}
                            </h4>
                        </div>
                        <div class="ms-sm-3">
                            @if($post->status=='publish')
                            <span class="badge super-badge bg-success text-capitalize ">{{ $post->status }}</span>
                            @elseif($post->status=='unpublish')
                            <span class="badge super-badge bg-danger text-capitalize ">{{ $post->status }}</span>
                            @else
                            <span class="badge super-badge bg-warning text-capitalize ">{{ $post->status }}</span>
                            @endif
                            
                        </div>
                        
                    </div>
                </div>
                <div>
                    <a href="/dashboard/profil/kelembagaan/{{ $post->slug }}" class="fw-bold text-dark"><span class="fw-normal text-gray">
                            {!!$post->excerpt!!}</span></a>
                </div>
            </div>
            <div class="col-2 col-sm-2 col-lg-2 col-xl-2 d-none d-lg-block d-xl-inline-flex align-items-center ms-lg-auto text-right justify-content-end px-md-0">
                <div class="dropdown">
                    <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                        <a class="dropdown-item d-flex align-items-center" href="/dashboard/profil/kelembagaan/{{ $post->slug }}/edit">
                            <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                            </svg>
                            Edit 
                        </a>
                        <form method="post" action="/dashboard/profil/kelembagaan/{{ $post->slug }}">
                            @method('delete')
                            @csrf
                        <button class="dropdown-item d-flex align-items-center" onclick="return confirm('Anda Yakin ??')">
                            <svg class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            Delete
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
</div>

</main>
@endsection