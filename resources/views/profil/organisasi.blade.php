@extends('layouts.main')

@section('container')
@extends('layouts.breadcrumb')
<section id="team" class="team">
  <div class="container">
    <div class="row">
      <div class="section-title">
        <h2>Team</h2>
        <p>Our HARDWORKING Team</p>
BAGAN SUSUNAN ORGANISASI DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU KOTA MAGELANG 
      </div>
      <div class="col-lg-12 ">
        <div class=" d-flex align-items-start shadow mb-3">
          <div class="pic text-center"><img src="https://app.magelangkota.go.id/dbserver/wl/?id=UFmxgaURMuIzktMnHTLe8AZ7ZqkyS8tv&fmode=open" class="  my-4 img-fluid col-lg-10" alt=""></div>
        </div>
      </div>
      @foreach($posts as $post)
      <div class="col-lg-6 ">
        <div class="member d-flex align-items-start shadow mb-3">
          <div class="pic"><img src="{{ asset('storage/'.$post->image) }}" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>{{ $post->name }}</h4>
            <small class="small"> {{ $post->rank->name}}</small>
            <span>{{ $post->position  }}</span>
            <p>{{ $post->nip }}</p>
            <div class="social">
              @if($post->fb)
              <a href="{{ $post->fb}}"><i class="ri-facebook-fill"></i></a>
              @else
              <a href="#"><i class="ri-facebook-fill disabled"></i></a>
              @endif
              @if($post->tw)
              <a href="{{ $post->tw}}"><i class="ri-twitter-fill"></i></a>
              @else
              <a href="#"><i class="ri-twitter-fill disabled"></i></a>
              @endif
              @if($post->ig)
              <a href="{{ $post->ig}}"><i class="ri-instagram-fill"></i></a>
              @else
              <a href="#"><i class="ri-instagram-fill"></i></a>
              @endif
              @if($post->in)
              <a href="{{ $post->in}}"> <i class="ri-linkedin-box-fill"></i> </a>
              @else
              <a href="#"> <i class="ri-linkedin-box-fill"></i> </a>
              @endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section><!-- End About Section -->

@endsection