@extends('layouts.main')

@section('container')
@extends('layouts.breadcrumb')
   <!-- ======= Testimonials Section ======= -->
   <section id="testimonials" class="testimonials blog">
    <div class="container" data-aos="fade-up">

      <div class="row table-responsive">
        <div class="col-lg-8 entries">
          <div class="section-title entry mb-4 mt-0">
            <h2>{{ $title }}</h2>
            <p>{{ $titlecategory }}</p>
          <table class="table table-sm align-middle table-hover mt-2 ">
            <thead class="text-capitalize">
              <tr class="font-monospace">
                <th scope="col" colspan="2">Nama</th>
                
                <th scope="col" class="text-center">unduh</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach($files as $file)
              <tr class="font-monospace">
                <td><i class="bi bi-file-earmark-text-fill"></i></td>
                <td><a href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="{{ $file->categoriesfile->name}}" disabled> {{ $file->name}}</a></td>
                <td class="text-center"><div class="entry-content">
                  <div class=" text-capitalize fs-5">
                    <a href="{{ $file->link}}" target="_blank"><i class="bi bi-arrow-down-circle-fill"></i></a>
                    </div>
                  </div</td>
              </tr>
              
              @endforeach
            </tbody>
          </table>
         
        </div>
        <div class="blog-pagination">
          {{ $files->links() }}
        </div>
        </div>
        <div class="col-lg-4">
          <div class="sidebar">
            <h3 class="sidebar-title">Cari</h3>
            <div class="sidebar-item search-form">
              <form action="/downloads/file">
               
                <input type="hidden" name="folder" value="{{ $namefolder }}">
                <input type="hidden" name="category" value="{{ $namecategory}}">
    
                <input type="text" name="search" placeholder="Cari" value="">
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div>
            <!-- End sidebar search formn-->

            <h3 class="sidebar-title">Kategori</h3>
            <div class="sidebar-item categories text-capitalize">
              <ul>
                <li>
                  <a href="/downloads/">Kembali</a>
                </li>
                <li>
                  <a href="/downloads/file?folder={{ $namefolder }}">semua</a>
                </li>
                @foreach ($categories as $categori)
                <li>
                  <a href="/downloads/file?folder={{ $categori->folder->slug }}&category={{ $categori->slug }}" class="active">{{ $categori->name }} </a>
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