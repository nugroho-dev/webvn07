@extends('dashboard.layouts.tabler.main')

@section('container')

 <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">Overview</div>
          <h2 class="page-title">Daftar Kategori <i class="ri-spam-3-line"></i></h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
          <div class="btn-list">
            
            <a href="/home/spsop/create" class="btn btn-primary btn-5 d-none d-sm-inline-block">
              <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="icon icon-2"
              >
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
              </svg>
              Buat Kategori
            </a>
            <a
              href="/home/spsop/create"
              class="btn btn-primary btn-6 d-sm-none btn-icon"
              
              aria-label="Create new report"
            >
              <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="icon icon-2"
              >
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
              </svg>
            </a>
          </div>
          <!-- BEGIN MODAL -->
          <!-- END MODAL -->
        
        </div>
        <div class="row justify-content-md-center">
          <div class="col-md-auto">
             @if(session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible" role="alert">
          <div class="alert-icon">
            <!-- Download SVG icon from http://tabler.io/icons/icon/check -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon icon-2">
              <path d="M5 12l5 5l10 -10"></path>
            </svg>
          </div>
          <div>
            <h4 class="alert-heading">Berhasil!</h4>
            <div class="alert-description">{{ session('success') }}</div>
          </div>
          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
        @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Berita</h3>
                  </div>
                  <div class="card-body border-bottom py-3">
                    <div class="d-flex">
                      
                      <div class="ms-auto text-secondary">
                        <form action="/home/spsop" method="GET">
                        Cari:
                        <div class="ms-2 d-inline-block">
                          <div class="input-group mb-3">
                            
                            <input type="text" name="search" class="form-control" placeholder="Cari Berita" aria-label="Cari Berita" aria-describedby="button-addon2"  value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                           
                          </div>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-selectable card-table table-vcenter datatable">
                      <thead>
                        <tr>
                          
                          <th class="w-1">
                            No.
                            <!-- Download SVG icon from http://tabler.io/icons/icon/chevron-up -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-sm icon-thick icon-2">
                              <path d="M6 15l6 -6l6 6"></path>
                            </svg>
                          </th>
                          <th>Kategori</th>
                          <th>Jumlah</th>
                         
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($categoriesps as $key=>$post)
                        <tr>
                          <td><span class="text-secondary">{{ $categoriesps->firstItem() + $key }}.</span></td>
                          <td>
                            <a href="/home/detail/spsop?category={{ $post->slug }}" class="text-reset btn-show" >{{ $post->name }}</a>
                           
                          </td>
                          <td class="text-capitalize text-nowrap">
                           
                            </td>
                          </td>
                        
                          <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="/home/detail/spsop?category={{ $post->slug }}"> Lihat </a>
                                <a class="dropdown-item" href="/home/spsop/{{ $post->slug }}/edit"> Ubah </a>
                                <a class="dropdown-item btn-delete-news" href="#" data-slug="{{ $post->slug }}"> Hapus </a>
                              </div>
                            </span>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer d-flex align-items-center">
                    {{ $categoriesps->links() }}
                  </div>
                </div>
              </div>
        </div>
    </div>
  </div>
  
  
    <div class="modal modal-blur fade" id="deleteCatSp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-danger"></div>
          <div class="modal-body text-center py-4">
            <!-- Download SVG icon from http://tabler.io/icons/icon/alert-triangle -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon mb-2 text-danger icon-lg">
              <path d="M12 9v4"></path>
              <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path>
              <path d="M12 16h.01"></path>
            </svg>
            <h3>Anda Yakin?</h3>
            <div class="text-secondary">Hapus Kategori "<span id="titledelete"></span>" ?</div>
          </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
                <div class="col">
                  <a href="#" class="btn btn-3 w-100" data-bs-dismiss="modal"> Batal </a>
                </div>
                <div class="col">
                  <form method="post" id="delCatSp" action="">
                      @method('delete')
                      @csrf
                          
                  <button type="submit" class="btn btn-danger btn-4 w-100" data-bs-dismiss="modal"> Hapus </button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  
  <!-- CSS fix z-index popup TinyMCE -->
 
  <script src="https://cdn.tiny.cloud/1/70wjix7leqv220saf1b70muo6v2cwahyz0mud05w1cgvqtsr/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script nonce="{{ $cspNonce }}" >
  
  $(document).on('click', '.btn-delete-news', function () {
      var slug = $(this).data('slug');
      $.ajax({
            url: '/home/posts/' + slug ,
            method: 'GET',
            success: function (data) {
              console.log(data);
              $('#titledelete').text(data.title);
              $('#delNews').attr('action', '/home/posts/' + slug);
              $('#deleteNews').modal('show');
          }
      });
  });
  
</script>
  <script nonce="{{ $cspNonce }}">
// Menghapus alert setelah 4 detik
document.addEventListener("DOMContentLoaded", function () {
    const alertBox = document.getElementById("success-alert");
    if (alertBox) {
        setTimeout(() => {
            alertBox.remove(); // atau gunakan .style.display = "none";
        }, 4000); // hilang setelah 4 detik
    }
});
</script>


@endsection