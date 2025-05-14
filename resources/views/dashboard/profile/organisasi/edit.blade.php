@extends('dashboard.layouts.main')
 @section('container')

  @include('dashboard.layouts.sidebar')
<main class="content">
  @include('dashboard.layouts.header')
  <div class="d-lg-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="col-auto d-flex justify-content-between ps-0 mb-4 mb-lg-0">
        <div class="me-lg-3">
            
                <a href="/home/profil/organisasi" class="btn btn-secondary d-inline-flex align-items-center me-2"
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
                <div class="row mb-4">
                    <div class="col-lg-12 col-sm-12">
                        <form method="post" action="/home/profil/organisasi/{{ $post->slug }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                        <!-- Form -->
                      
                        <div class="row mb-4">
                            <div class="col-lg-6 col-sm-6">
                                <label for="name">Nama :</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $post->name) }}">
                                @error ('name')
                                <div class="invalid-feedback">
                                 {{ $message }}   
                                </div> 
                                @enderror
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="nip">NIP :</label>
                                <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" required autofocus value="{{ old('nip', $post->nip) }}">
                                @error ('nip')
                                <div class="invalid-feedback">
                                 {{ $message }}   
                                </div> 
                                @enderror
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <label for="slug">Slug :</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $post->slug) }}" readonly>
                                @error ('slug')
                                <div class="invalid-feedback">
                                 {{ $message }}   
                                </div> 
                                @enderror
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="position">Jabatan :</label>
                                <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" required value="{{ old('position',$post->position) }}">
                                @error ('position')
                                <div class="invalid-feedback">
                                 {{ $message }}   
                                </div> 
                                @enderror
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="rank">Pangkat Golongan:</label>
                                <select class="form-select @error('rank_id') is-invalid @enderror" id="rank_id" name="rank_id">
                                    @foreach ($ranks as $rank)
                                    @if (old('rank_id',$post->rank_id)==$rank->id)
                                    <option value="{{ $rank->id }}" class="text-capitalize" selected>{{ $rank->name }}</option>
                                    @else
                                    <option value="{{ $rank->id }}" class="text-capitalize">{{ $rank->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4 col-lg-12 col-sm-12">
                              <label for="image" class="form-label">Gambar Tampilan</label>
                              <input type="hidden" name="oldImage" value="{{ $post->image }}">
                              @if($post->image)
                              <img src="{{ asset('storage/'.$post->image) }}" class="img-preview img-fluid mb-3 col-5 rounded mx-auto d-block">
                              @else
                              <img class="img-preview img-fluid mb-3 col-5 rounded mx-auto d-block">
                              @endif
                              <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="priviewImage()">
                            @error ('image')
                                <div class="invalid-feedback">
                                 {{ $message }}   
                                </div> 
                                @enderror
                            </div>
                           
                            <div class="col-lg-6 col-sm-6">
                                <label for="fb">Link Facebook:</label>
                                <input type="text" class="form-control @error('fb') is-invalid @enderror" id="fb" name="fb"  value="{{ old('fb',$post->fb) }}">
                                @error ('fb')
                                <div class="invalid-feedback">
                                 {{ $message }}   
                                </div> 
                                @enderror
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="tw">Link Twitter:</label>
                                <input type="text" class="form-control @error('tw') is-invalid @enderror" id="tw" name="tw"  value="{{ old('tw',$post->tw) }}">
                                @error ('tw')
                                <div class="invalid-feedback">
                                 {{ $message }}   
                                </div> 
                                @enderror
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="ig">Link Instagram:</label>
                                <input type="ig" class="form-control @error('ig') is-invalid @enderror" id="ig" name="ig"  value="{{ old('ig',$post->ig) }}">
                                @error ('ig')
                                <div class="invalid-feedback">
                                 {{ $message }}   
                                </div> 
                                @enderror
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="in">Link Linkedin:</label>
                                <input type="text" class="form-control @error('in') is-invalid @enderror" id="in" name="in"  value="{{ old('in', $post->in) }}">
                                @error ('in')
                                <div class="invalid-feedback">
                                 {{ $message }}   
                                </div> 
                                @enderror
                            </div>
                            <button class="btn btn-primary col-lg-3 text-center" type="submit">Simpan</button>
                        </div>
                        
                    </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
</main>
<script src="/../../vendor/ckeditor/ckeditor.js"></script>
    <script src="/../../vendor/ckeditor/config.js"></script>
<script nonce={{ $cspNonce }}>
    CKEDITOR.replace( 'body' );
    
</script>
<script nonce={{ $cspNonce }}>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/home/posts/checkSlug?title='+ title.value)
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
</script>
@endsection