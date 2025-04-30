@extends('layouts.main')

@section('container')
@extends('layouts.breadcrumb')
<section id="pricing" class="pricing">
  <div class="container">
   
    <div class="row">
      @foreach($posts as $post)
      <div class="col-lg-3 col-md-6 mt-4 ">
        <div class="box">
          <span class="advanced">Honours</span>
          <h3>Penghargaan</h3>
          <h4> <img src="{{ asset('storage/'.$post->image) }}" alt="" class="img-fluid rounded img-thumbnail" /></h4>
          <ul>
            <li ><h6>{{ $post->title }}</h6></li>
            <li>{!! $post->desc !!}</li>
          </ul>
          <div class="btn-wrap">
            @if($post->link)
            <a href="{{ $post->link}}" class="btn-buy">Berita</a>
            @else
            <a href="#" class="btn-buy">Unpost</a>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
    {{ $posts->links() }}
  </div>
</section><!-- End About Section -->

@endsection