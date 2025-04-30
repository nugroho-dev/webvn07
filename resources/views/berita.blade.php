@extends('layouts.main')

@section('container')
@extends('layouts.breadcrumb')

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
            @if($berita->count()==0)
            <p class="text-center fs-3 entry">Berita Tidak Ada</p>
            @endif
            @foreach ($berita as $item)
            <article class="entry">
             
              <div class="entry-img">
                @if($item->image)
                <div style="max-height: 1080px; overflow:hidden; max-width: 1024px;" >
                  <img src="{{ asset('storage/'.$item->image) }}" alt="" class="img-fluid" />
                </div>
                @else
                <img src="https://picsum.photos/1024/768/?blur" alt="" class="img-fluid">
                @endif
              </div>

              <h2 class="entry-title text-capitalize">
                <a href="/posts/{{ $item->slug }}">{{ $item->title }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center text-capitalize"><i class="bi bi-person"></i> <a href="/berita?author={{ $item->author->name }}">Oleh : {{ $item->author->name }}</a></li>
                  
                  <li class="d-flex align-items-center text-capitalize">
                    
                    <i class="bi bi-clock"></i>
                     <a href="/posts/{{ $item->slug }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$item->created_at->locale('id')->isoFormat('LLLL')}}"><time datetime="2020-01-01">{{ $item->created_at->locale('id')->diffForHumans() }}</time></a>
                  </li>
                  <li class="d-flex align-items-center text-capitalize"><i class="bi bi-folder"></i> <a href="/berita?category={{ $item->category->slug }}">{{ $item->category->name }}</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  {!! $item->excerpt !!}
                </p>
                <div class="read-more">
                  <a href="/posts/{{ $item->slug }}">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry --> 
            @endforeach
            
            
            <div class="blog-pagination">
              {{ $berita->links() }}
            </div>
          

          </div><!-- End blog entries list -->

         
            @include('partials.sidebar')
          

        </div>

      </div>
    </section><!-- End Blog Section -->

  
  @endsection
