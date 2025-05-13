@extends('dashboard.layouts.main')
 @section('container')

  @include('dashboard.layouts.sidebar')
<main class="content">
  @include('dashboard.layouts.header')
  <div class="d-lg-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="col-auto d-flex justify-content-between ps-0 mb-4 mb-lg-0">
        <div class="me-lg-3">
            
                <a href="/home/detail/spsop?category={{ $slugcat }}" class="btn btn-secondary d-inline-flex align-items-center me-2 "
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
                        <form method="post" action="/home/detail/spsop/{{ $post->slug }}" enctype="multipart/form-data">
                          @method('put')
                          @csrf
                            <input type="hidden" class="form-control" id="categorysp_id" name="categorysp_id" value="{{ $categorysp_id }}">
                            <input type="hidden" class="form-control" id="slugcat" name="slugcat" value="{{ $slugcat }}">
                        <!-- Form -->
                        <div class="row mb-4">
                        <div class="class="col-lg-12 col-sm-12"">
                            <label for="title">Judul :</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title',$post->title) }}">
                            @error ('title')
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
                        <div class="col-lg-12 col-sm-12 ">
                            <div class="accordion mt-3 " id="accordionPricing">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="heading1">
                                    <button class="accordion-button text-capitalize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                      Dasar hukum
                                    </button>
                                  </h2>
                                  <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#accordionPricing">
                                    <div class="accordion-body">
                                      <textarea id="hukum" name="hukum" class="form-control @error('hukum') is-invalid @enderror" placeholder="Tulis Disini......." required > {{ old('hukum',$post->hukum) }}</textarea>
                                      @error ('hukum')
                                      <div class="invalid-feedback">
                                       {{ $message }}   
                                      </div> 
                                      @enderror
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="heading2">
                                    <button class="accordion-button collapsed text-capitalize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                      Persyaratan
                                    </button>
                                  </h2>
                                  <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionPricing">
                                    <div class="accordion-body">
                                      <textarea id="persyaratan" name="persyaratan" class="form-control @error('persyaratan') is-invalid @enderror" placeholder="Tulis Disini......." required > {{ old('persyaratan',$post->persyaratan) }}</textarea>
                                      @error ('persyaratan')
                                      <div class="invalid-feedback">
                                       {{ $message }}   
                                      </div> 
                                      @enderror
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="heading3">
                                    <button class="accordion-button collapsed text-capitalize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                      Sistem, mekanisme, dan prosedur
                                    </button>
                                  </h2>
                                  <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionPricing">
                                    <div class="accordion-body">
                                      <textarea id="mekanisme" name="mekanisme" class="form-control @error('mekanisme') is-invalid @enderror" placeholder="Tulis Disini......." required > {{ old('mekanisme',$post->mekanisme) }}</textarea>
                                      @error ('mekanisme')
                                      <div class="invalid-feedback">
                                       {{ $message }}   
                                      </div> 
                                      @enderror
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading4">
                                      <button class="accordion-button collapsed text-capitalize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                        Jangka waktu pelayanan
                                      </button>
                                    </h2>
                                    <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionPricing">
                                      <div class="accordion-body">
                                        <textarea id="waktu" name="waktu" class="form-control @error('waktu') is-invalid @enderror" placeholder="Tulis Disini......." required > {{ old('waktu',$post->waktu) }}</textarea>
                                        @error ('waktu')
                                        <div class="invalid-feedback">
                                         {{ $message }}   
                                        </div> 
                                        @enderror
                                      </div>
                                    </div>
                                </div>
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading5">
                                      <button class="accordion-button collapsed text-capitalize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                        Biaya/tarif
                                      </button>
                                    </h2>
                                    <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordionPricing">
                                      <div class="accordion-body">
                                        <textarea id="biaya" name="biaya" class="form-control @error('biaya') is-invalid @enderror" placeholder="Tulis Disini......." required > {{ old('biaya',$post->biaya) }}</textarea>
                                        @error ('biaya')
                                        <div class="invalid-feedback">
                                         {{ $message }}   
                                        </div> 
                                        @enderror
                                      </div>
                                    </div>
                                  </div>
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading6">
                                      <button class="accordion-button collapsed text-capitalize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                        Produk pelayanan
                                      </button>
                                    </h2>
                                    <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordionPricing">
                                      <div class="accordion-body">
                                        <textarea id="produk" name="produk" class="form-control @error('produk') is-invalid @enderror" placeholder="Tulis Disini......." required > {{ old('produk',$post->produk) }}</textarea>
                                        @error ('produk')
                                        <div class="invalid-feedback">
                                         {{ $message }}   
                                        </div> 
                                        @enderror
                                      </div>
                                    </div>
                                  </div>
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading7">
                                      <button class="accordion-button collapsed text-capitalize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                        Sarana dan prasarana, dan/atau fasilitas
                                      </button>
                                    </h2>
                                    <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#accordionPricing">
                                      <div class="accordion-body">
                                        <textarea id="sarana" name="sarana" class="form-control @error('sarana') is-invalid @enderror" placeholder="Tulis Disini......." required > {{ old('sarana',$post->sarana) }}</textarea>
                                        @error ('sarana')
                                        <div class="invalid-feedback">
                                         {{ $message }}   
                                        </div> 
                                        @enderror
                                      </div>
                                    </div>
                                  </div>
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading8">
                                      <button class="accordion-button collapsed text-capitalize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                        Kompetensi pelaksana
                                      </button>
                                    </h2>
                                    <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#accordionPricing">
                                      <div class="accordion-body">
                                        <textarea id="kompetensi" name="kompetensi" class="form-control @error('kompetensi') is-invalid @enderror" placeholder="Tulis Disini......." required > {{ old('kompetensi',$post->kompetensi) }}</textarea>
                                        @error ('kompetensi')
                                        <div class="invalid-feedback">
                                         {{ $message }}   
                                        </div> 
                                        @enderror
                                      </div>
                                    </div>
                                  </div>
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading9">
                                      <button class="accordion-button collapsed text-capitalize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                        Pengawasan internal
                                      </button>
                                    </h2>
                                    <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9" data-bs-parent="#accordionPricing">
                                      <div class="accordion-body">
                                        <textarea id="pengawasan" name="pengawasan" class="form-control @error('pengawasan') is-invalid @enderror" placeholder="Tulis Disini......." required > {{ old('pengawasan',$post->pengawasan) }}</textarea>
                                      @error ('pengawasan')
                                      <div class="invalid-feedback">
                                       {{ $message }}   
                                      </div> 
                                      @enderror
                                      </div>
                                    </div>
                                  </div>
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading10">
                                      <button class="accordion-button collapsed text-capitalize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                        Penanganan pengaduan, saran, dan masukan
                                      </button>
                                    </h2>
                                    <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10" data-bs-parent="#accordionPricing">
                                      <div class="accordion-body">
                                        <textarea id="pengaduan" name="pengaduan" class="form-control @error('pengaduan') is-invalid @enderror" placeholder="Tulis Disini......." required > {{ old('pengaduan',$post->pengaduan) }}</textarea>
                                        @error ('pengaduan')
                                        <div class="invalid-feedback">
                                         {{ $message }}   
                                        </div> 
                                        @enderror
                                      </div>
                                    </div>
                                  </div>
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading11">
                                      <button class="accordion-button collapsed text-capitalize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                                        Jumlah pelaksana
                                      </button>
                                    </h2>
                                    <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11" data-bs-parent="#accordionPricing">
                                      <div class="accordion-body">
                                        <textarea id="pelaksana" name="pelaksana" class="form-control @error('pelaksana') is-invalid @enderror" placeholder="Tulis Disini......." required > {{ old('pelaksana',$post->pelaksana) }}</textarea>
                                        @error ('pelaksana')
                                        <div class="invalid-feedback">
                                         {{ $message }}   
                                        </div> 
                                        @enderror
                                      </div>
                                    </div>
                                  </div>
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading12">
                                      <button class="accordion-button collapsed text-capitalize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                        Jaminan pelayanan
                                      </button>
                                    </h2>
                                    <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#accordionPricing">
                                      <div class="accordion-body">
                                        <textarea id="jaminan" name="jaminan" class="form-control @error('jaminan') is-invalid @enderror" placeholder="Tulis Disini......." required > {{ old('jaminan',$post->jaminan) }}</textarea>
                                        @error ('jaminan')
                                        <div class="invalid-feedback">
                                         {{ $message }}   
                                        </div> 
                                        @enderror
                                      </div>
                                    </div>
                                  </div>
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading13">
                                      <button class="accordion-button collapsed text-capitalize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                        Jaminan keamanan dan keselamatan pelayanan
                                      </button>
                                    </h2>
                                    <div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13" data-bs-parent="#accordionPricing">
                                      <div class="accordion-body">
                                        <textarea id="keamanan" name="keamanan" class="form-control @error('keamanan') is-invalid @enderror" placeholder="Tulis Disini......." required > {{ old('keamanan',$post->keamanan) }}</textarea>
                                        @error ('keamanan')
                                        <div class="invalid-feedback">
                                         {{ $message }}   
                                        </div> 
                                        @enderror
                                      </div>
                                    </div>
                                  </div>
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading14">
                                      <button class="accordion-button collapsed text-capitalize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
                                        Evaluasi kinerja pelaksana
                                      </button>
                                    </h2>
                                    <div id="collapse14" class="accordion-collapse collapse" aria-labelledby="heading14" data-bs-parent="#accordionPricing">
                                      <div class="accordion-body">
                                        <textarea id="kinerja" name="kinerja" class="form-control @error('kinerja') is-invalid @enderror" placeholder="Tulis Disini......." required > {{ old('kinerja',$post->kinerja) }}</textarea>
                                        @error ('kinerja')
                                        <div class="invalid-feedback">
                                         {{ $message }}   
                                        </div> 
                                        @enderror
                                      </div>
                                    </div>
                                  </div>
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading15">
                                      <button class="accordion-button collapsed text-capitalize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
                                        Formulir
                                      </button>
                                    </h2>
                                    <div id="collapse15" class="accordion-collapse collapse" aria-labelledby="heading15" data-bs-parent="#accordionPricing">
                                      <div class="accordion-body">
                                        <textarea id="formulir" name="formulir" class="form-control @error('formulir') is-invalid @enderror" placeholder="Tulis Disini......." required > {{ old('formulir',$post->formulir) }}</textarea>
                                        @error ('formulir')
                                        <div class="invalid-feedback">
                                         {{ $message }}   
                                        </div> 
                                        @enderror
                                      </div>
                                    </div>
                                  </div>
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading16">
                                      <button class="accordion-button collapsed text-capitalize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse16" aria-expanded="false" aria-controls="collapse16">
                                       Standar Operasional Prosedur
                                      </button>
                                    </h2>
                                    <div id="collapse16" class="accordion-collapse collapse" aria-labelledby="heading16" data-bs-parent="#accordionPricing">
                                      <div class="accordion-body">
                                        <textarea id="sop" name="sop" class="form-control @error('sop') is-invalid @enderror" placeholder="Tulis Disini......." required > {{ old('sop',$post->sop) }}</textarea>
                                        @error ('sop')
                                        <div class="invalid-feedback">
                                         {{ $message }}   
                                        </div> 
                                        @enderror
                                      </div>
                                    </div>
                                  </div>
                            </div>
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
        fetch('/home/spsop/checkSlug?title='+ title.value)
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