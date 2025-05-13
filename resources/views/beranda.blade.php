
  @extends('layouts.main')
  @section('container')
  
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">
        @foreach($heroes as $hero)
        <style nonce="{{ $cspNonce }}">
          .gambarcarousel{{ $hero->entry }} {
            background-image: url({{ asset('storage/'.$hero->image) }})
          }
        </style>
        <!-- Slide 1 -->
        <div class="carousel-item @if($hero->entry==1) active @endif gambarcarousel{{ $hero->entry }}"  >
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">{{ $hero->title }}</h2>
              <p class="animate__animated animate__fadeInUp">{{ $hero->body }}</p>
              <a href="#services" class="btn-get-started animate__animated animate__fadeInUp scrollto">Informasi Kami</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">
    <section id="services" class="services">
      <div class="container">
        <div class="section-title mb-0">
          <h2>Pemberitahuan</h2>
          <p class="mb-0">Pengumuman</p>
        </div>
        <div class="row">
          @foreach ($notices as $notice)
          <div class="col-md-6 col-sm-12 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-megaphone"></i>
              <h4><a href="#">[{{ $notice->created_at->locale('id')->isoFormat('MMM YYYY')}}] {{ $notice->title }}</a></h4>
              <p>{{ $notice->excerpt }}</p>   
              <div class="text-end">
              <a href="/posts/{{ $notice->slug }}" class="btn btn-danger">Lihat</a> 
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="text-center">
          <a href="/berita?category=pengumuman" class="btn btn-danger"><i class="bi bi-list-ul"></i> Lihat Semua</a> 
          </div>
      </div>
    </section>
    <section id="clients" class="about">
      <div class="container">
	      <div class="section-title mb-0">
          <h2>Jenis Layanan</h2>
          <p class="mb-0">Persyaratan</p>
        </div>
        
          <div class="row justify-content-end">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
              <form action="/spsop" class="input-group ">
                @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}"  class="form-control">
                @endif
                <input type="text" name="search" placeholder="Cari{{ $placeholder }}" value="{{ request('search') }}" class="form-control">
                <input type="hidden" name="syarat" value="syarat" class="form-control">                       
                <button type="submit" class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>
              </form>
            </div>
          </div>
         
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Layanan</th>
              <th scope="col">Waktu Penyelesaian</th>
              <th scope="col">Biaya</th>
              <th scope="col">Persyaratan</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach($items as $item)
            <tr>
              <th scope="row">{{ $item->title }}</th>
              <td>{!! $item->waktu !!}</td>
              <td>{!! $item->biaya !!}</td>
              <td>
                <div class="text-center">
                <a href="/spsop/{{ $item->slug }}" class="btn btn-danger"><i class="bi bi-eye"></i> Lihat</a> 
                </div>
              </td>
              
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
        <div class="blog-pagination">
          @php
          $paginationHtml = $items->appends(['syarat' => request('syarat')])->withPath(url()->current())->links()->toHtml();
          $paginationHtml = preg_replace(
        '/href="([^"]+?)"/',
        'href="$1#clients"',
        $paginationHtml
        );
      @endphp

        {!! $paginationHtml !!}
        </div>
      </div>
    </section>
    <section id="about" class="about">
      <div class="container">
	<div class="section-title mb-0">
              <h2>Terbaru</h2>
              <p class="mb-0">Berita</p>
          </div>
        <div class="row content">
          <style nonce="{{ $cspNonce }}">
            .bayang{background-color: rgba(0, 0, 0, 0.7)}
          </style>
          @foreach ($beritabaru as $baru)
          <div class="col-md-3 col-sm-12 mb-3">
            <div class="card">
              <div class="position-absolute px-3 py-2 text-white rounded-end bayang"   >{{ $baru->category->name }}</div>
        <img src="{{ asset('storage/'.$baru->image) }}" class="card-img-top img-fluid" alt="{{ $baru->title }}">
        <div class="card-body">
          <h5 class="card-title">{{ $baru->title }}</h5>
          <p>
            <small>
              <a href="/berita?author={{ $baru->author->name }}" class="text-decoration-none">Oleh : {{ $baru->author->name }}</a>, 
              <a href="/posts/{{ $baru->slug }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $baru->created_at->locale('id')->isoFormat('LLLL')}}"><time datetime="2020-01-01">{{ $baru->created_at->locale('id')->diffForHumans() }}</time></a>
            </small>
          </p>
          <p class="card-text">{!! $baru->excerpt !!}</p>
          <a href="/posts/{{ $baru->slug }}" class="btn btn-danger">Baca</a> 
        </div>
        </div>
        </div>   @endforeach
        </div>
	 
            <div class="blog-pagination">
              @php
          $paginationHtml = $beritabaru->appends(['berita' => request('berita')])->withPath(url()->current())->links()->toHtml();
          $paginationHtml = preg_replace(
        '/href="([^"]+?)"/',
        'href="$1#about"',
        $paginationHtml
        );
      @endphp
      {!! $paginationHtml !!}
            </div>
      </div>
    </section><!-- End About Section -->

   
   
       <!-- Modal -->

    <script src="https://cdn2.woxo.tech/a.js#62a6dfd053f59c0028aee5a3" async data-usrc></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   

  @endsection