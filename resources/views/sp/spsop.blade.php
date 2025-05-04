@extends('layouts.main')

@section('container')
@extends('layouts.breadcrumb')
   <!-- ======= Testimonials Section ======= -->
   <section id="testimonials" class="testimonials blog">
    <div class="container-fluid" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 entries ">
          <div class="table-responsive">
          <table class="table table-striped table-hover ">
            <thead>
              <tr class="text-center align-middle">
                <th scope="col">Layanan</th>
                <th scope="col">Waktu Penyelesaian</th>
                <th scope="col">Biaya</th>
                <th scope="col">Persyaratan</th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)
              <tr class="font-monospace fw-lighter align-middle">
                <th  scope="row" >{{ $item->title }}</th>
                <td class="text-wrap">{!! $item->waktu !!}</td>
                <td >{!! $item->biaya !!}</td>
                <td><div class="text-center">
                  <a href="/spsop/{{ $item->slug }}" class="btn btn-danger"><i class="bi bi-eye"></i> Lihat</a> 
                  </div></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          </div>
          <div class="blog-pagination">
            {{ $items->links() }}
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 ">
          <div class="sidebar">
            <h3 class="sidebar-title">Cari</h3>
            <div class="sidebar-item search-form">
              <form action="/spsop">
                @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input type="text" name="search" placeholder="Cari{{ $placeholder }}" value="{{ request('search') }}">
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div>
            <!-- End sidebar search formn-->

            <h3 class="sidebar-title">Kategori</h3>
            <div class="sidebar-item categories text-capitalize">
              <ul>
                <li>
                  <a href="/spsop">semua standar pelayanan</a>
                </li>
                @foreach($posts as $post)
                <li>
                  <a href="/spsop?category={{ $post->slug }}">{{ $post->name }}</a>
                </li>
                @endforeach
              </ul>
            </div>
            <!-- End sidebar categories-->

            
          </div>
          <!-- End sidebar -->
         
        </div>
        <!-- End blog sidebar -->
        
      </div>

    </div>
  </section><!-- End Testimonials Section -->
@endsection