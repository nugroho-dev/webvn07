@extends('layouts.main')

@section('container')
@extends('layouts.breadcrumb')
<section id="contact" class="contact">
  <div class="container">

    <div class="mt-0 text-center">
      <img src="/assets/img/2650088.webp" class="img-fluid " alt="..." style=" height: 270px;"></img>
    </div>
    
    <div class="row mt-5">

      <div class="col-lg-4">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Alamat :</h4>
            <p class="text-justify">Gedung Kyai Sepanjang, Jl. Kartini No.4, Magelang, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah 56121 (MPP Kota Magelang)</p>
            <hr>
            <p>Jl. Veteran No. 7, Magelang, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah 56121 (DPMPTSP Kota Magelang)</p>
          </div>

          <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p>dpmptspmglkota@gmail.com</p>
          </div>
          <div class="email">
            <i class="bi bi-instagram"></i>
            <h4>Instagram:</h4>
            <p><a href="https://www.instagram.com/dpmptsp_mglkota/" target="_blank"> dpmptsp_mglkota</a></p>
          </div>
          <div class="email">
            <i class="bi bi-facebook"></i>
            <h4>Facebook:</h4>
            <p><a href="https://www.facebook.com/dpmptspmagelang/" target="_blank"> dpmptspmagelang</a></p>
          </div>
          <div class="email">
            <i class="bi bi-twitter"></i>
            <h4>Twitter:</h4>
            <p><a href="https://twitter.com/dpmptspmglkota" target="_blank"> @dpmptspmglkota</a></p>
          </div>
          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Call:</h4>
            <p>0293 314663 (DPMPTSP Kota Magelang)</p>
            <p>0293 3199999 (MPP Kota Magelang)</p>
          </div>
          <div class="phone">
            <i class="bi bi-whatsapp"></i>
            <h4>Whatsapps:</h4>
            <p>08599996000 (DPMPTSP Kota Magelang)</p>
          </div>
	  <div class="phone">
            <i class="bi bi-chat-left-text"></i>
            <h4>SMS:</h4>
            <p>08599996000 (DPMPTSP Kota Magelang)</p>
          </div>

        </div>

      </div>

      <div class="col-lg-8 mt-5 mt-lg-0">

        <form action="/pengaduan/form" method="post"  class="php-email-form" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <div class="col-md-6 form-group">
              <label class="form-label">Nama Anda:</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="Nama Anda">
              @error ('name')
              <div class="invalid-feedback">
              {{ $message }}   
              </div> 
              @enderror
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label class="form-label">Email Anda:</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" placeholder="Email Anda">
              @error ('email')
              <div class="invalid-feedback">
              {{ $message }}   
              </div> 
              @enderror
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label class="form-label">Nomor Telp/ HP:</label>
              <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ old('nohp') }}" id="email" placeholder="Nomor Telp/ HP">
              @error ('nohp')
              <div class="invalid-feedback">
              {{ $message }}   
              </div> 
              @enderror
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label class="form-label">Upload Kartu Identitas:</label>
              <input type="file" class="form-control @error('kid') is-invalid @enderror" name="kid" value="{{ old('kid') }}" id="email" placeholder="" >
              @error ('kid')
              <div class="invalid-feedback">
              {{ $message }}   
              </div> 
              @enderror
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="subject" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" id="subject" placeholder="Subject Pengaduan">
            @error ('subject')
              <div class="invalid-feedback">
              {{ $message }}   
              </div> 
              @enderror
          </div>
          <div class="form-group mt-3">
            <label class="form-label">Lampiran Pendukung:</label>
            <input type="file" class="form-control @error('lampiran') is-invalid @enderror" name="lampiran" value="{{ old('lampiran') }}" id="subject" placeholder="Subject">
            @error ('lampiran')
              <div class="invalid-feedback">
              {{ $message }}   
              </div> 
              @enderror
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control @error('aduan') is-invalid @enderror" name="aduan" rows="5" required placeholder="Aduan dan Perbaikan yang Dinginkan">{{ old('aduan') }}</textarea>
              @error ('aduan')
              <div class="invalid-feedback">
              {{ $message }}   
              </div> 
              @enderror
          </div>
          <div class="form-group mt-3 col-md-3">
            <div class="captcha">
                    <span>{!! captcha_img() !!}</span>
                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                        &#x21bb;
                    </button>
            </div>
          </div>
          <div class="form-group mt-3 col-md-2">
            <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" placeholder="Enter Captcha" name="captcha">
            @error ('captcha')
              <div class="invalid-feedback">
              {{ $message }}   
              </div> 
              @enderror
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Kirim Aduan</button></div>
        </form>

      </div>

    </div>

  </div>
</section><!-- End Contact Section -->

@endsection