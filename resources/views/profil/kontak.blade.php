@extends('layouts.main')

@section('container')
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>{{ $title }}</h2>
      <ol>
        <li><a href="\">Beranda</a></li>
        <li>{{ $title }}</li>
      </ol>
    </div>

  </div>
</section>
 <!-- ======= Contact Section ======= -->
 <section id="contact" class="contact">
    <div class="container">

      <div>
        <iframe style="border:0; width: 100%; height: 270px;" src="https://maps.google.com/maps?q=dpmptsp%20kota%20magelang&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" allowfullscreen></iframe>
      </div>
      
      <div class="row mt-5">

        <div class="col-lg-12">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Alamat :</h4>
              <p>Jl. Veteran No. 7, Magelang, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah 56121 (DPMPTSP Kota Magelang),</p>
           
              <p class="text-justify">Gedung Kyai Sepanjang, Jl. Kartini No.4, Magelang, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah 56121 (MPP Kota Magelang)</p>
            </div>
  
            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>dpmptspmglkota@gmail.com</p>
            </div>
  
            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>0293 314663 (DPMPTSP Kota Magelang)</p>
              <p>0293 3199999 (MPP Kota Magelang)</p>
              <p>085799996000 (WhatsApp Pelayanan Perizinan)</p>
             
            </div>
  
          </div>
  
        </div>

       
      </div>

    </div>
  </section><!-- End Contact Section -->
  @endsection