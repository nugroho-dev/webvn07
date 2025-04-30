@extends('layouts.main')

@section('container')
@extends('layouts.breadcrumb')
<section id="about" class="about">
    <div class="container">
      @foreach($posts as $post)
      <h2><b>{{ $post->title }}</b></h2>
      {!! $post->body !!}
      @endforeach
    </div>
  </section><!-- End About Section -->

@endsection