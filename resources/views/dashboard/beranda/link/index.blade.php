@extends('dashboard.layouts.main')
 @section('container')

  @include('dashboard.layouts.sidebar')
  <main class="content">
    @include('dashboard.layouts.header')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div>
        <div class="dropdown">
            <a href="/home/beranda/link/create" class="btn btn-secondary d-inline-flex align-items-center me-2 dropdown-toggle">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                New
            </a>
        </div>
    </div>
    
</div>
<div class="row">
    @foreach($links as $link)
    <div class="col-3">
        <div class="card border-0 shadow">
            <a href="">
            <img src="{{ asset('storage/'.$link->image) }}" class="card-img-top" alt="change cover">
            </a>
            <div class="card-body">
                <div class="d-sm-flex align-items-center flex-wrap flex-lg-nowrap py-0">
                    <h2 class="h5 m-0"> {{ $link->title }}</h2>
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
                                <a class="dropdown-item d-flex align-items-center" href="/home/beranda/link/{{ $link->slug }}/edit">
                                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                    </svg>
                                    Edit 
                                </a>
                                <form method="post" action="/home/beranda/link/{{ $link->slug }}">
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
              <p class="card-text mt-2 text-justify">{!! $link->link !!}</p>
            </div>
          </div>
    </div>
    @endforeach
</div>

</main>
@endsection