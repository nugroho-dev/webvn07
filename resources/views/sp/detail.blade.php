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
    * {
      box-sizing: border-box;
    }
    .gallery-container {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      justify-content: center;
    }
  .gallery {
      border: 1px solid #ccc;
      border-radius: 8px;
      overflow: hidden;
      width: 100%;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .gallery:hover {
      transform: translateY(-4px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
      border-color: #888;
    }
  .gallery img {
    width: 100%;
    height: auto;
    display: block;
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
      <div class="row justify-content-between">
        <div class="col-lg-8 col-sm-12"></div>
        <div class="entry-content col-lg-12 col-sm-12">
          <div class="text-end text-capitalize fs-5">
            @if($izin->categoriesps->slug == 'pengaduan')
              
                <button class="btn btn-danger  dropdown-toggle dropdown mt-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-file-earmark-richtext-fill"></i> Buat Aduan
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="https://www.lapor.go.id/" target="_blank"><i class="bi bi-flag-fill"></i> SP4N Lapor</a></li>
                  <li><a class="dropdown-item" href="https://lapor.magelangkota.go.id/"><i class="bi bi-flag"></i> Monggo lapor</a></li>
                  <li><a class="dropdown-item" href="https://www.instagram.com/dpmptsp_mglkota/"><i class="bi bi-instagram"></i> DM Via Instagram</a></li>
                  <li><a class="dropdown-item" href="https://www.facebook.com/dpmptspmagelang/"><i class="bi bi-facebook"></i> DM Via Facebook</a></li>
                  <li><a class="dropdown-item" href="https://twitter.com/dpmptspmglkota"><i class="bi bi-twitter"></i> DM Via X</a></li>
                  <li><a class="dropdown-item" href="https://wa.me/6285799996000?text=Saya%20ingin%20mengadu%20tentang%20:%20"><i class="bi bi-whatsapp"></i> DM Via WhatsApp</a></li>
                  <li><a class="dropdown-item" href="mailto:dpmptspmglkota@gmail.com"><i class="bi bi-envelope"></i> Email</a></li>
                  <li><a class="dropdown-item" href="tel:0293314663"><i class="bi bi-telephone-outbound"></i> Telepon</a></li>
                </ul>
              
            @else
              <a   href="{{ $izin->categoriesps->slug == 'online-single-submission' ? 'https://oss.go.id/' : ($izin->categoriesps->slug == 'izin-sicantik' ? 'https://sicantik.go.id/sign-in' : ($izin->categoriesps->slug == 'persetujuan-gedung-bangunan' ? 'https://simbg.pu.go.id/' : '')) }}" target="_blank" class="btn btn-danger">
                <i class="bi bi-file-earmark-richtext-fill mt-2"></i> Ajukan Permohonan
              </a>
            @endif
            <a href="#" id="btnPrint" class="btn btn-danger mt-2"><i class="bi bi-printer-fill"></i> Cetak</a>
            <a href="/spsop" class="btn btn-danger m-2"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
          </div>
        </div>
      </div>
    </div>
    <div id="print-area" class="row">
      <div class="table-responsive col-lg-12 col-md-12 col-sm-12 mb-3">
        <table class="table table-sm">
          <tbody>
            <tr>
              <th>Jenis Layanan</th>
              <td>{!! $izin->title ?? '<p class="text-capitalize">informasi belum tersedia</p>' !!}</td>
            </tr>
            <tr>
              <th>Dasar hukum</th>
              <td>{!! $izin->hukum ?? '<h3 class="text-capitalize">informasi belum tersedia</h3>' !!}</td>
            </tr>
            <tr>
              <th>Persyaratan</th>
              <td>{!! $izin->persyaratan ?? '<p class="text-capitalize">informasi belum tersedia</p>' !!}</td>
            </tr>
            <tr>
              <th>Sistem, mekanisme, dan prosedur</th>
              <td>{!! $izin->mekanisme ? '<div class="gallery">' . $izin->mekanisme . '</div>' : '<p class="text-capitalize">informasi belum tersedia</p>' !!}</td>
            </tr>
            <tr>
              <th>Jangka waktu pelayanan</th>
              <td>{!! $izin->waktu ?? '<h3 class="text-capitalize">informasi belum tersedia</h3>' !!}</td>
            </tr>
            <tr>
              <th>Biaya/tarif</th>
              <td>{!! $izin->biaya ?? '<h3 class="text-capitalize">informasi belum tersedia</h3>' !!}</td>
            </tr>
            <tr>
              <th>Produk pelayanan</th>
              <td>{!! $izin->produk ?? '<p class="text-capitalize">informasi belum tersedia</p>' !!}</td>
            </tr>
            <tr>
              <th>Sarana dan prasarana, dan/atau fasilitas</th>
              <td>{!! $izin->sarana ?? '<p class="text-capitalize">informasi belum tersedia</p>' !!}</td>
            </tr>
            <tr>
              <th>Kompetensi pelaksana</th>
              <td>{!! $izin->kompetensi ?? '<p class="text-capitalize">informasi belum tersedia</p>' !!}</td>
            </tr>
            <tr>
              <th>Pengawasan internal</th>
              <td>{!! $izin->pengawasan ?? '<p class="text-capitalize">informasi belum tersedia</p>' !!}</td>
            </tr>
            <tr>
              <th>Penanganan pengaduan, saran, dan masukan</th>
              <td>{!! $izin->pengaduan ?? '<p class="text-capitalize">informasi belum tersedia</p>' !!}</td>
            </tr>
            <tr>
              <th>Jumlah pelaksana</th>
              <td>{!! $izin->pelaksana ?? '<p class="text-capitalize">informasi belum tersedia</p>' !!}</td>
            </tr>
            <tr>
              <th>Jaminan pelayanan</th>
              <td>{!! $izin->jaminan ?? '<p class="text-capitalize">informasi belum tersedia</p>' !!}</td>
            </tr>
            <tr>
              <th>Jaminan keamanan dan keselamatan pelayanan</th>
              <td>{!! $izin->keamanan ?? '<p class="text-capitalize">informasi belum tersedia</p>' !!}</td>
            </tr>
            <tr>
              <th>Evaluasi kinerja pelaksana</th>
              <td>{!! $izin->kinerja ?? '<p class="text-capitalize">informasi belum tersedia</p>' !!}</td>
            </tr>
            <tr>
              <th>Formulir</th>
              <td>{!! $izin->formulir ?? '<p class="text-capitalize">informasi belum tersedia</p>' !!}</td>
            </tr>
            <tr>
              <th>Standar Operasional Prosedur</th>
              <td>{!! $izin->sop ?? '<p class="text-capitalize">informasi belum tersedia</p>' !!}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</section>
@endsection