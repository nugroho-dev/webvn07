@extends('layouts.main')

@section('container')
@extends('layouts.breadcrumb')
<section id="features" class="features blog">
  <div class="container">

    <div class="section-title entry mb-4 mt-0">
      
      <div class="row justify-content-between ">
      <div class="col-lg-8 col-sm-12">
      <h2>sp & sop</h2>
      <h5 class="h5 text-uppercase">{{ $izin->title }}</h5>
      </div>
      <div class="entry-content col-lg-4 col-sm-12">
      <div class="read-more text-capitalize fs-5 ">
        <a href="/spsop" ><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
        </div>
      </div>
    </div>
    </div>
    
    <div class="row " >
      <div class="col-lg-3 ">
        <div class=" overflow-auto"  style="height: 55%">
        <ul class="nav nav-tabs flex-column text-capitalize" >
          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Dasar hukum</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Persyaratan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Sistem, mekanisme, dan prosedur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Jangka waktu pelayanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Biaya/tarif</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-6">Produk pelayanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-7">Sarana dan prasarana, dan/atau fasilitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-8">Kompetensi pelaksana</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-9">Pengawasan internal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-10">Penanganan pengaduan, saran, dan masukan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-11">Jumlah pelaksana</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-12">Jaminan pelayanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-13">Jaminan keamanan dan keselamatan pelayanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-14">Evaluasi kinerja pelaksana</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-15">Formulir</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-16">Standar Operasional Prosedur</a>
          </li>
        </ul>
      </div>
      </div>
      <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="tab-content">
          <div class="tab-pane active show " id="tab-1">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                @if($izin->hukum)
                {!! $izin->hukum !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="/assets/img/features-{{ mt_rand(1, 7)}}.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-2">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                @if($izin->persyaratan)
                {!! $izin->persyaratan !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="/assets/img/features-{{ mt_rand(1, 7)}}.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-3">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                @if($izin->mekanisme)
                {!! $izin->mekanisme !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="/assets/img/features-{{ mt_rand(1, 7)}}.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-4">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                @if($izin->waktu)
                {!! $izin->waktu !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="/assets/img/features-{{ mt_rand(1, 7)}}.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-5">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                @if($izin->biaya)
                {!! $izin->biaya !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="/assets/img/features-{{ mt_rand(1, 7)}}.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-6">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                @if($izin->produk)
                {!! $izin->produk !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="/assets/img/features-{{ mt_rand(1, 7)}}.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-7">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                @if($izin->sarana)
                {!! $izin->sarana !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="/assets/img/features-{{ mt_rand(1, 7)}}.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-8">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                @if($izin->kompetensi)
                {!! $izin->kompetensi !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="/assets/img/features-{{ mt_rand(1, 7)}}.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-9">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                @if($izin->pengawasan)
                {!! $izin->pengawasan !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="/assets/img/features-{{ mt_rand(1, 7)}}.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-10">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                @if($izin->pengaduan)
                {!! $izin->pengaduan !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="/assets/img/features-{{ mt_rand(1, 7)}}.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-11">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                @if($izin->pelaksana)
                {!! $izin->pelaksana !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="/assets/img/features-{{ mt_rand(1, 7)}}.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-12">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                @if($izin->jaminan)
                {!! $izin->jaminan !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="/assets/img/features-{{ mt_rand(1, 7)}}.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-13">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                @if($izin->keamanan)
                {!! $izin->keamanan !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="/assets/img/features-{{ mt_rand(1, 7)}}.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-14">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                @if($izin->kinerja)
                {!! $izin->kinerja !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="/assets/img/features-{{ mt_rand(1, 7)}}.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-15">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                @if($izin->formulir)
                {!! $izin->formulir !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="/assets/img/features-{{ mt_rand(1, 7)}}.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-16">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                @if($izin->sop)
                {!! $izin->sop !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="/assets/img/features-{{ mt_rand(1, 7)}}.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</section><!-- End Features Section -->
@endsection