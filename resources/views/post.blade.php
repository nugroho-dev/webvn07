@extends('layouts.main')

@section('container')
@extends('layouts.breadcrumb')
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-8 entries">
          <article class="entry entry-single">
            

            <h2 class="entry-title text-capitalize text-center">
              <a href="/posts/{{ $post->slug }}" >{{ $post->title }}</a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center text-capitalize">
                  <i class="bi bi-person"></i>
                  <a href="/berita?author={{ $post->author->username }}">Oleh: {{ $post->author->name }}</a>
                </li>
                <li class="d-flex align-items-center text-capitalize">
                  <i class="bi bi-clock"></i>
                  <a href="blog-single.html"
                    ><time datetime="2020-01-01">{{ $post->created_at->locale('id')->isoFormat('MMM Do, YYYY') }}</time></a
                  >
                </li>
                
              </ul>
            </div>

            <div class="entry-content" style="text-align: justify">
              
                <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid rounded mx-auto d-block" alt="...">
              
                <p style="text-justify: auto"> {{ $post->body }} </p>
              
            </div>

            <div class="entry-footer">
              <i class="bi bi-folder"></i>
              <ul class="cats text-capitalize">
                <li><a href="/berita?category={{ $post->category->slug }}">{{ $post->category->name }}</a></li>
              </ul>

              
            </div>
          </article>
          <!-- End blog entry -->

          <div class="blog-author d-flex align-items-center">
            <img
              src="/assets/img/blog/blog-author.jpg"
              class="rounded-circle float-left"
              alt=""
            />
            <div>
              <h4 class="text-capitalize">{{ $post->author->name }}</h4>
              <div class="social-links">
                <a href="https://twitters.com/#"
                  ><i class="bi bi-twitter"></i
                ></a>
                <a href="https://facebook.com/#"
                  ><i class="bi bi-facebook"></i
                ></a>
                <a href="https://instagram.com/#"
                  ><i class="biu bi-instagram"></i
                ></a>
              </div>
              <p>
                A very small degree of hope is sufficient to cause the birth of love <br> <small> -Stendhal (France 1783 - 1842)</small>
              </p>
            </div>
          </div>
          <!-- End blog author bio -->

          
        </div>
        <!-- End blog entries list -->

        @include('partials.sidebar')
      </div>
    </div>
  </section>
@endsection
