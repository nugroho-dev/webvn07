@extends('dashboard.layouts.main')
 @section('container')

  @include('dashboard.layouts.sidebar')
<main class="content">
  @include('dashboard.layouts.header')
  <div class="d-lg-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="col-auto d-flex justify-content-between ps-0 mb-4 mb-lg-0">
        <div class="me-lg-3">
            
                <a href="/dashboard/folder/download?folder={{ $slugcat }}" class="btn btn-secondary d-inline-flex align-items-center me-2 "
                     aria-haspopup="true" aria-expanded="false">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clipRule="evenodd" /></svg>
                     Kembali
            </a>
            
        </div>

    </div>
  </div>
  
  <div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body"> 
                <div class="container">
                        <form method="post" action="/dashboard/folder/download/{{ $post->slug }}" enctype="multipart/form-data">
                          @method('put')
                          @csrf
                            <input type="hidden" class="form-control" id="id_folder" name="id_folder" value="{{ $post->id_folder }}">
                            <input type="hidden" class="form-control" id="slugcat" name="slugcat" value="{{ $slugcat }}">
                        <!-- Form -->
                        <div class="row mb-4">
                        <div class="class="col-lg-12 col-sm-12"">
                            <label for="title">Judul :</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="title" name="name" required autofocus value="{{ old('title',$post->name) }}">
                            @error ('name')
                            <div class="invalid-feedback">
                             {{ $message }}   
                            </div> 
                            @enderror
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <label for="slug">Slug :</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug',$post->slug) }}" readonly>
                            @error ('slug')
                            <div class="invalid-feedback">
                             {{ $message }}   
                            </div> 
                            @enderror
                        </div>
                        
                        <button class="btn btn-primary col-lg-3 text-center" type="submit">Simpan</button>
                    </div>
                        <!-- End of Form -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>   
</main>
<script src="/../../vendor/ckeditor/ckeditor.js"></script>
    <script src="/../../vendor/ckeditor/config.js"></script>
<script>
    CKEDITOR.replace( 'hukum' );
    CKEDITOR.replace( 'persyaratan' );
    CKEDITOR.replace( 'mekanisme' );
    CKEDITOR.replace( 'waktu' );
    CKEDITOR.replace( 'biaya' );
    CKEDITOR.replace( 'produk' );
    CKEDITOR.replace( 'sarana' );
    CKEDITOR.replace( 'kompetensi' );
    CKEDITOR.replace( 'pengawasan' );
    CKEDITOR.replace( 'pengaduan' );
    CKEDITOR.replace( 'pelaksana' );
    CKEDITOR.replace( 'jaminan' );
    CKEDITOR.replace( 'keamanan' );
    CKEDITOR.replace( 'kinerja' );
    CKEDITOR.replace( 'formulir' );
    CKEDITOR.replace( 'sop' );
    
</script>
<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/folder/download/checkSlug?title='+ title.value)
        .then(response=>response.json())
        .then(data=>slug.value=data.slug)
    });

   function priviewImage() {
    const image = document.querySelector('#image');
    const imgPreview= document.querySelector('.img-preview');
    imgPreview.style.display ='block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload=function(oFREvent){
        imgPreview.src=oFREvent.target.result;
    }
   }

</script>
@endsection