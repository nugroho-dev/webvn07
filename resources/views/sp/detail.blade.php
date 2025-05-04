@extends('layouts.main')

@section('container')
@extends('layouts.breadcrumb')
<style nonce="{{ $cspNonce }}">
  .table th {
      width: 25%;
      background-color: #f8f9fa;
      vertical-align: top;
      font-size: 0.875rem;
      padding: 0.5rem;
    }
    .table td {
      vertical-align: top;
      font-size: 0.875rem;
      padding: 0.5rem;
    }
    .table tr:last-child td, .table tr:last-child th {
      border-bottom: none;
    }
    img.profile-img {
      width: 100px;
      border-radius: 0.5rem;
    }
    /* Hanya tampilkan tabel saat print */
    @media print {
      body * {
        visibility: hidden;
      }
      #print-area, #print-area * {
        visibility: visible;
      }
      #print-area {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
      }
    }
</style>
<script nonce="{{ $cspNonce }}">
  document.addEventListener('DOMContentLoaded', function () {
    const btn = document.getElementById('btnPrint');
    if (btn) {
      btn.addEventListener('click', function () {
        window.print();
      });
    }
  });
</script>
<section id="features" class="features blog">
  <div class="container">

    <div class="section-title entry mb-4 mt-0">
      
      <div class="row justify-content-between ">
      <div class="col-lg-8 col-sm-12">
    
      </div>
      <div class="entry-content col-lg-4 col-sm-12">
      <div class="read-more text-capitalize fs-5 ">
        <a href="/spsop" ><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
        <button id="btnPrint" class="btn btn-sm btn-outline-secondary">🖨 Cetak</button>
        </div>
      </div>
    </div>
    </div>
    
    <div id="print-area" class="row" >
      <div class="table-responsive col-lg-12 col-md-12 col-sm-12 mb-3">
        <table class="table table-sm">
          <tbody>
            <tr>
              <th>Jenis Layanan</th>
              <td>
                @if( $izin->title )
                {!!  $izin->title !!}
                @else
                <p class="text-capitalize">informasi belum tersedia</p>
                @endif
              </td>
            </tr>
            <tr>
              <th>Dasar hukum</th>
              <td>
                @if($izin->hukum)
                {!! $izin->hukum !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </td>
            </tr>
            <tr>
              <th>Persyaratan</th>
              <td>
                @if($izin->persyaratan)
                {!! $izin->persyaratan !!}
                @else
                <p class="text-capitalize">informasi belum tersedia</p>
                @endif
              </td>
            </tr>
            <tr>
              <th>Sistem, mekanisme, dan prosedur</th>
              <td>
                @if($izin->mekanisme)
                {!! $izin->mekanisme !!}
                @else
                <p class="text-capitalize">informasi belum tersedia</p>
                @endif
              
              </td>
            </tr>
            <tr>
              <th>Jangka waktu pelayanan</th>
              <td>
                @if($izin->waktu)
                {!! $izin->waktu !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </td>
            </tr>
            <tr>
              <th>Biaya/tarif</th>
              <td>
                @if($izin->biaya)
                {!! $izin->biaya !!}
                @else
                <h3 class="text-capitalize">informasi belum tersedia</h3>
                @endif
              </td>
            </tr>
            <tr>
              <th>Produk pelayanan</th>
              <td>
                @if($izin->produk)
                {!! $izin->produk !!}
                @else
                <p class="text-capitalize">informasi belum tersedia</p>
                @endif
              </td>
            </tr>
            <tr>
              <th>Sarana dan prasarana, dan/atau fasilitas</th>
              <td>
                @if($izin->sarana)
                {!! $izin->sarana !!}
                @else
                <p class="text-capitalize">informasi belum tersedia</p>
                @endif
              </td>
            </tr>
            <tr>
              <th>Kompetensi pelaksana</th>
              <td>
                @if($izin->kompetensi)
                {!! $izin->kompetensi !!}
                @else
                <p class="text-capitalize">informasi belum tersedia</p>
                @endif
              </td>
            </tr>
            <tr>
              <th>Pengawasan internal</th>
              <td>
                @if($izin->pengawasan)
                {!! $izin->pengawasan !!}
                @else
                <p class="text-capitalize">informasi belum tersedia</p>
                @endif
              </td>
            </tr>
            <tr>
              <th>Penanganan pengaduan, saran, dan masukan</th>
              <td>
                @if($izin->pengaduan)
                {!! $izin->pengaduan !!}
                @else
                <p class="text-capitalize">informasi belum tersedia</p>
                @endif
              </td>
            </tr>
            <tr>
              <th>Jumlah pelaksana</th>
              <td>
                @if($izin->pelaksana)
                {!! $izin->pelaksana !!}
                @else
                <p class="text-capitalize">informasi belum tersedia</p>
                @endif
              </td>
            </tr>
            <tr>
              <th>Jaminan pelayanan</th>
              <td>
                @if($izin->jaminan)
                {!! $izin->jaminan !!}
                @else
                <p class="text-capitalize">informasi belum tersedia</p>
                @endif
              </td>
            </tr>
            <tr>
              <th>Jaminan keamanan dan keselamatan pelayanan</th>
              <td>
                @if($izin->keamanan)
                {!! $izin->keamanan !!}
                @else
                <p class="text-capitalize">informasi belum tersedia</p>
                @endif
              </td>
            </tr>
            <tr>
              <th>Evaluasi kinerja pelaksana</th>
              <td>  
                @if($izin->kinerja)
                {!! $izin->kinerja !!}
                @else
                <p class="text-capitalize">informasi belum tersedia</p>
                @endif
              </td>
            </tr>
            <tr>
              <th>Formulir</th>
              <td>
                @if($izin->formulir)
                {!! $izin->formulir !!}
                @else
                <p class="text-capitalize">informasi belum tersedia</p>
                @endif
              </td>
            </tr>
            <tr>
              <th>Standar Operasional Prosedur</th>
              <td>
                @if($izin->sop)
                {!! $izin->sop !!}
                @else
                <p class="text-capitalize">informasi belum tersedia</p>
                @endif
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
      
    </div>

  </div>
</section><!-- End Features Section -->
@endsection