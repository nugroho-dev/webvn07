@extends('layouts.main')

@section('container')
@extends('layouts.breadcrumb')
   <!-- ======= Testimonials Section ======= -->
   <section id="testimonials" class="testimonials blog">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-12 entries">
          <div class="row ">
            @foreach ($folderspage as $folder)
            <div class="col-lg-2 ">
              <div class="testimonial-item text-center entry" style="height:150px;">
                <a href="/downloads/file?folder={{ $folder->slug }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $folder->name }}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                    <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
                  </svg>
                <h3 class="text-capitalize text-truncate">{{ $folder->name }}</h3>
                <h4 class="text-capitalize"></h4>
              </a>
              </div>
            </div>
            @endforeach
          </div>
          <div class="blog-pagination">
            {{ $folderspage->links() }}
          </div>
        </div>
        
        <!-- End blog sidebar -->
        
      </div>

    </div>
  </section><!-- End Testimonials Section -->
@endsection