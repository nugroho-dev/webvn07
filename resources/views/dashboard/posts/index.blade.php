@extends('dashboard.layouts.tabler.main')

@section('container')

 <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">Overview</div>
          <h2 class="page-title">Daftar Berita</h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
          <div class="btn-list">
            
            <a href="/home/posts/create" class="btn btn-primary btn-5 d-none d-sm-inline-block">
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
              Buat Berita
            </a>
            <a
              href="/home/posts/create"
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
                        <form action="/home/posts" method="GET">
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
                          <th>Berita</th>
                          <th>Status</th>
                          <th>Kategori</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($posts as $key=>$post)
                        <tr>
                          <td><span class="text-secondary">{{ $posts->firstItem() + $key }}.</span></td>
                          <td>
                            <a href="#" data-slug="{{ $post->slug }}" class="text-reset btn-show" >{{ $post->title }}</a>
                            <div class="text-muted">
                                {{ $post->created_at->locale('id')->isoFormat('MMM Do, YYYY') }}
                                Oleh. {{ $post->author->name }}
                            </div>
                          </td>
                          <td class="text-capitalize text-nowrap">
                            @if($post->status=='publish')
                            <span class="badge bg-success me-1 text-capitalize"></span>{{ $post->status }}
                            @elseif($post->status=='unpublish')
                            <span class="badge bg-danger me-1 text-capitalize "></span>{{ $post->status }}
                            @else
                            <span class="badge bg-warning me-1 text-capitalize "></span>{{ $post->status }}
                            @endif
                            </td>
                          </td>
                          <td>{{$post->category->name}}</td>
                          <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                @if($post->status=='publish')
                                <a class="dropdown-item text-danger" href="#"> Batalkan Publikasi  </a>
                                @elseif($post->status=='unpublish')
                                <a class="dropdown-item text-warning" href="#"> Draft </a>
                                @else
                                <a class="dropdown-item text-success" href="#"> Publikasi </a>
                                @endif
                                <a class="dropdown-item" href="/home/posts/{{ $post->slug }}/edit"> Ubah </a>
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
                    {{ $posts->links() }}
                  </div>
                </div>
              </div>
        </div>
    </div>
  </div>
  
  <div class="modal modal-blur fade" id="showModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Berita</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <div class="row">
                <div class="col-12">
                <h3 class="text-capitalize" style="text-align: justify;"><span id="title"></span></h3>
                
                <div class="text-muted">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                     <span id="author"></span>
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-4"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 12l3 2" /><path d="M12 7v5" /></svg> <span id="created_at"></span>
                </div>
                <img id="imageViewer" alt="" class="img-fluid rounded mx-auto d-block mt-3" />
                <div class="mt-3 mb-3 lh-base" style="text-align: justify;"><span id="body"></span></div>
                
                <div class="text-muted">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-folder"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2" /></svg> <span id="category"></span>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn " data-bs-dismiss="modal">Tutup</button>
          
        </div>
      </div>
    </div>
  </div>
  <div class="modal modal-blur fade" id="newNews" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
       
        <div class="modal-header">
          <h5 class="modal-title">Buat Berita</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="/home/posts" enctype="multipart/form-data">
            @csrf
          <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="titlenew" name="title" required autofocus value="{{ old('title') }}">
          </div>
          <label class="form-label">Slug</label>
          <div class="mb-3">
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugnew" name="slug" required value="{{ old('slug') }}" readonly>
            @error ('slug')
            <div class="invalid-feedback">
             {{ $message }}   
            </div> 
            @enderror
          </div>
          <div class="row">
            <div class="col-lg-8">
              <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="imagenew" name="image">
                  @error ('image')
                    <div class="invalid-feedback">
                      {{ $message }}   
                    </div> 
                  @enderror
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id">
                  @foreach ($categories as $category)
                  @if (old('category_id')==$category->id)
                  <option value="{{ $category->id }}" class="text-capitalize" selected>{{ $category->name }}</option>
                  @else
                  <option value="{{ $category->id }}" class="text-capitalize">{{ $category->name }}</option>
                  @endif
                  @endforeach
              </select>
                
              </div>
            </div>
            <div class="col-lg-12">
              <div class="mb-3">
                <img class="img-preview img-fluid mb-3 col-5 rounded mx-auto d-block">
              </div>
            </div>
          </div>
       
          <div class="row">
            <div class="col-lg-12">
              <div>
                <label class="form-label">Artikel</label>
                <textarea  id="hugerte-mytextarea" name="body" class="form-control @error('body') is-invalid @enderror" placeholder="Tulis Disini......." rows="3"></textarea>
                @error ('body')
                  <div class="invalid-feedback">
                    {{ $message }}   
                  </div> 
                @enderror
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary btn-3" data-bs-dismiss="modal"> Cancel </a>
          <button class="btn btn-primary btn-5 ms-auto" type="submit">
            <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
              <path d="M12 5l0 14"></path>
              <path d="M5 12l14 0"></path>
            </svg>
            Simpan
          </button>
        </form>
        </div>
      
      </div>
    </div>
  </div>
  <div class="modal modal-blur fade" id="editNews" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
       
        <div class="modal-header">
          <h5 class="modal-title">Ubah Berita</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="/home/posts" enctype="multipart/form-data">
            @csrf
          <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="titleedit" name="title" required autofocus value="{{ old('title') }}">
          </div>
          <label class="form-label">Slug</label>
          <div class="mb-3">
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugedit" name="slug" required value="{{ old('slug') }}" readonly>
            @error ('slug')
            <div class="invalid-feedback">
             {{ $message }}   
            </div> 
            @enderror
          </div>
          <div class="row">
            <div class="col-lg-8">
              <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="imageedit" name="image">
                  @error ('image')
                    <div class="invalid-feedback">
                      {{ $message }}   
                    </div> 
                  @enderror
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id">
                  @foreach ($categories as $category)
                  @if (old('category_id')==$category->id)
                  <option value="{{ $category->id }}" class="text-capitalize" selected>{{ $category->name }}</option>
                  @else
                  <option value="{{ $category->id }}" class="text-capitalize">{{ $category->name }}</option>
                  @endif
                  @endforeach
              </select>
                
              </div>
            </div>
            <div class="col-lg-12">
              <div class="mb-3">
                <img class="img-preview img-fluid mb-3 col-5 rounded mx-auto d-block">
              </div>
            </div>
          </div>
       
          <div class="row">
            <div class="col-lg-12">
              <div>
                <label class="form-label">Artikel</label>
                <textarea  id="hugerte-mytextarea" name="body" id="bodyedit" class="form-control @error('body') is-invalid @enderror" placeholder="Tulis Disini......." rows="3"></textarea>
                @error ('body')
                  <div class="invalid-feedback">
                    {{ $message }}   
                  </div> 
                @enderror
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary btn-3" data-bs-dismiss="modal"> Cancel </a>
          <button class="btn btn-primary btn-5 ms-auto" type="submit">
            <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
              <path d="M12 5l0 14"></path>
              <path d="M5 12l14 0"></path>
            </svg>
            Simpan
          </button>
        </form>
        </div>
      
      </div>
    </div>
  </div>
    <div class="modal modal-blur fade" id="deleteNews" tabindex="-1" role="dialog" aria-hidden="true">
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
            <div class="text-secondary">Hapus Artikel "<span id="titledelete"></span>" ?</div>
          </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
                <div class="col">
                  <a href="#" class="btn btn-3 w-100" data-bs-dismiss="modal"> Batal </a>
                </div>
                <div class="col">
                  <form method="post" id="delNews" action="">
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
  $(document).on('click', '.btn-show', function () {
      var slug = $(this).data('slug');
      $.ajax({
          url: '/home/posts/' + slug ,
          method: 'GET',
          success: function (data) {
              
              $('#title').text(data.title);
              $('#btnEditFromShowModal').data('slug', data.slug);
              $('#slug').text(data.slug);
              $('#imageViewer').attr('src', data.image);
              $('#image').text(data.image);
              $('#excerpt').text(data.excerpt);
              $('#body').html(data.body);
              $('#category').text(data.category);
              $('#author').text(data.author);
              $('#created_at').text(data.created_at);
              $('#showModal').modal('show');
          }
      });
  });
 
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
  
    
    const title = document.querySelector('#titlenew');
    const slug = document.querySelector('#slugnew');
    
    title.addEventListener('change', function(){
        fetch('/home/posts/checkSlug?title='+ title.value)
        .then(response=>response.json())
        .then(data=>slug.value=data.slug)
    });

  // Menampilkan gambar preview
   const image = document.querySelector('#imagenew');
   image.addEventListener('change', function () {
    const imgPreview= document.querySelector('.img-preview');
    imgPreview.style.display ='block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload=function(oFREvent){
        imgPreview.src=oFREvent.target.result;
    }
   
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