@extends('layouts.main')

@section('container')
@extends('layouts.breadcrumb')
<section id="about" class="about">
  <div class="container">
    @foreach($posts as $post)
    <h3 class="text-center"><b>{{ $post->title }}</b></h3>
<img src="{{ $post->image }}" alt="{{ $post->title }}">
    @if($post->image)
    <img src="{{ $post->image }}" alt="{{ $post->title }}">
    @else
    <hr>
    @endif
    {!! $post->body !!}
    @endforeach
  </div>
</section><!-- End About Section -->

@endsection