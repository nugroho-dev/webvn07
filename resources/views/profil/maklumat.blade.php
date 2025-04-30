@extends('layouts.main')

@section('container')
@extends('layouts.breadcrumb')
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

    <div class="row d-flex justify-content-center">
      @foreach($posts as $post)
      <div class="col-lg-12 entries ">
        <article class="entry entry-single text-center">
            <img src="{{ asset('storage/'.$post->image) }}" alt="" class="img-fluid rounded img-thumbnail" />
          <h2 class="entry-title mt-2">
            <a href="#" >{{ $post->title }}</a>
          </h2>

          
        </article>
        <!-- End blog entry -->

        
     
      </div>
      @endforeach
    </div>
   
  </div>
</section><!-- End About Section -->

@endsection