@extends('dashboard.layouts.tabler.main')

@section('container')
  <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">Overview</div>
          <h2 class="page-title">Buat Berita</h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
          <div class="btn-list">
            
            <a href="/home/posts/" class="btn btn-primary btn-5 d-none d-sm-inline-block">
              <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left-dashed"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12h6m3 0h1.5m3 0h.5" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
              Kembali
            </a>
            <a
              href="#"
              class="btn btn-primary btn-6 d-sm-none btn-icon"
              data-bs-toggle="modal"
              data-bs-target="#modal-report"
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
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Buat Berita</h3>
                  </div>
                  <div class="card-body border-bottom py-3">
                   
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
              <div class="mb-3">
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
          <div class="row g-2 align-items-center">
             <div class="col-auto ms-auto d-print-none">
                <button class="btn btn-primary btn-5 ms-auto position-relative" type="submit">
                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg>
                    Simpan
                </button>
            </div>
          </div>
          
          </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <script src="/tabler/libs/hugerte/hugerte.min.js?1744816591" defer=""></script>
  <script nonce="{{ $cspNonce }}" >
    const title = document.querySelector('#titlenew');
    const slug = document.querySelector('#slugnew');
    
    title.addEventListener('change', function(){
        fetch('/home/posts/checkSlug?title='+ title.value)
        .then(response=>response.json())
        .then(data=>slug.value=data.slug)
    });

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
      document.addEventListener("DOMContentLoaded", function () {
        let options = {
          selector: "#hugerte-mytextarea",
          height: 500,
          menubar: true,
          statusbar: true,
          license_key: "gpl",
          plugins: ["advlist", "autolink", "lists", "link", "image", "charmap", "preview","anchor", "searchreplace", "visualblocks", "code", "fullscreen","insertdatetime", "media", "table", "help", "wordcount"],
          toolbar:"undo redo | formatselect | blocks| fontfamily | fontsize | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media preview | removeformat",
          content_style:"body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }",
          automatic_uploads: true,
          images_upload_url: "/upload-image",
          images_upload_credentials: true,
          
          images_upload_handler: (blobInfo) => {
            return new Promise((resolve, reject) => {
                const xhr = new XMLHttpRequest();
                xhr.withCredentials = true;
                xhr.open("POST", "/upload-image");
                
                const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content");
                if (token) {
                    xhr.setRequestHeader("X-CSRF-TOKEN", token);
                }
                xhr.onload = function () {
                    if (xhr.status !== 200) {
                        reject("HTTP Error: " + xhr.status);
                        return;
                    }
                    
                    let json;
                    
                    try {
                        json = JSON.parse(xhr.responseText);
                    } catch (e) {
                        reject("Invalid JSON: " + xhr.responseText);
                        return;
                    }
                    if (!json || typeof json.location !== "string") {
                        reject("Invalid response: " + xhr.responseText);
                        return;
                    }
                    resolve(json.location);
                };
                xhr.onerror = function () {
                    reject("Upload failed");
                };
                
                const formData = new FormData();
                formData.append("file", blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            });
        }
    }
    if (localStorage.getItem("tablerTheme") === "dark") {
        options.skin = "oxide-dark";
        options.content_css = "dark";
    }
    hugeRTE.init(options);
});
    </script>
@endsection