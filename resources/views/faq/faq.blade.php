@extends('layouts.main')

@section('container')
@extends('layouts.breadcrumb')
 <!-- ======= Frequently Asked Questions Section ======= -->
 <section id="faq" class="faq testimonials blog">
  <div class="container">
    <div class="row table-responsive">
      <div class="col-lg-8 entries">
        <div class="section-title">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>

        <div class="accordion accordion-flush" id="accordionFlushExample">
          @foreach ($items as $item)
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{ $item->slug }}" aria-expanded="false" aria-controls="flush-collapseOne">
                {{ $item->question }}
              </button>
            </h2>
            <div id="flush-collapseOne{{ $item->slug }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">{!! $item->answer !!}</div>
            </div>
          </div>
          @endforeach
        </div>
      	<div class="blog-pagination">
          {{ $items->links() }}
        </div>
      </div>
      <div class="col-lg-4">
          <div class="sidebar">
            <h3 class="sidebar-title">Cari</h3>
            <div class="sidebar-item search-form">
              <form action="/faq">
                <input type="text" name="search" placeholder="Cari" value="">
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div>
            <!-- End sidebar search formn-->

            <h3 class="sidebar-title">Kategori</h3>
            <div class="sidebar-item categories text-capitalize">
              <ul>
                <li>
                  <a href="/faq">semua</a>
                </li>
                @foreach ($categories as $category)
                <li>
                  <a href="/faq?view={{ $category->slug }}" class="active">{{ $category->name }} </a>
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
</section><!-- End Frequently Asked Questions Section -->

@endsection