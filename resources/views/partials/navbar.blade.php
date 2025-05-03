<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center shadow border-bottom">
    <div class="container d-flex align-items-center">

      <!--<h1 class="logo me-auto"><a href="index.html">DPMPTSP</a></h1>
     Uncomment below if you prefer to use an image logo -->
       <a href="index.html" class="logo me-auto"><img src="/assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/" class="{{ Request::is('/')?'active':'' }}">Beranda</a></li>
          <li ><a href="/berita"  class="{{ Request::is('berita*')?'active':'' }} {{ Request::is('posts*')?'active':'' }}">Berita</a></li>
          <li class="dropdown"><a href="#" class="{{ Request::is('profil*')?'active':'' }}"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/profil/kelembagaan" class="{{ Request::is('profil/kelembagaan*')?'active':'' }}">Kelembagaan</a></li>
              <li><a href="/profil/visimisi"  class="{{ Request::is('profil/visimisi*')?'active':'' }}">Visi dan Misi</a></li>
              <li><a href="/profil/organisasi"  class="{{ Request::is('profil/organisasi*')?'active':'' }}">Organisasi</a></li>
              <li><a href="/profil/prestasi"  class="{{ Request::is('profil/prestasi*')?'active':'' }}">Prestasi dan Penghargaan</a></li>
              <li><a href="/profil/maklumat" class="{{ Request::is('profil/maklumat*')?'active':'' }}">Maklumat Pelayanan</a></li>
              <li><a href="/profil/medsos" class="{{ Request::is('profil/medsos*')?'active':'' }}">Media Sosial</a></li>
              <li class="dropdown"><a href="#">Survey Kepuasan Masyarakat <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="https://dpmptsp.magelangkota.go.id/skm/" target="_blank">Isi Survey Kepuasan Masyarakat</a></li>
                  <li><a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Nilai Survey Kepuasan Masyarakat</a></li>
                  <li class="dropdown"><a href="#">Laporan Survey Kepuasan Masyarakat <i class="bi bi-chevron-right"></i></a>
                    <ul>
                      <li><a href="https://dpmptsp.magelangkota.go.id/downloads/file?folder=publikasi&category=laporan-survey-kepuasan-masyarakat-dpmptsp">Unduh Laporan</a></li>
                      <li><a href=" @foreach ($linkskm as $itemskm)  {{ $itemskm->link }} @endforeach">Publikasi Berita</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="/profil/kontak" class="{{ Request::is('profil/kontak*')?'active':'' }}">Kontak</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="{{ Request::is('perizinan*')?'active':'' }} {{ Request::is('spsop*')?'active':'' }}"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#" class="{{ Request::is('perizinan*')?'active':'' }} {{ Request::is('spsop*')?'active':'' }} {{ Request::is('tracking*')?'active':'' }}">Perizinan<i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="/perizinan/alur" class="{{ Request::is('perizinan/alur*')?'active':'' }}">Alur Perizinan</a></li>
                  <li class="dropdown" ><a href="#" class="{{ Request::is('spsop*')?'active':'' }}">Jenis Izin & Persyaratan<i class="bi bi-chevron-right"></i></a>
                    <ul>
                      <li ><a class="{{ Request::is('online-single-submission*')?'active':'' }}" href="/spsop?category=online-single-submission" >Online Single Submission (OSS)</a></li>
                      <li ><a class="{{ Request::is('izin-sicantik*')?'active':'' }}" href="/spsop?category=izin-sicantik" >Izin SiCANTIK</a></li>
                      <li ><a class="{{ Request::is('persetujuan-gedung-bangunan*')?'active':'' }}" href="/spsop?category=persetujuan-gedung-bangunan">Persetujuan Gedung Bangunan</a></li>
                    </ul>
                  </li>
                  
		  <li><a href="https://dpmptsp.magelangkota.go.id/posts/jadwal-pelayanan-dpmptsp-kota-magelang" >Jam Pelayanan</a></li>
                  <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="{{ Request::is('tracking*')?'active':'' }}">Tracking Permohonan</a></li>
                <li><a href="/perizinan/verifikasi" class="{{ Request::is('perizinan/verifikasi*')?'active':'' }}">Verifikasi Izin</a></li>
		<li class="dropdown"><a href="#">Layanan Aplikasi<i class="bi bi-chevron-right"></i></a>
                  <ul>
                     @foreach($links as $link)
                      <li><a href="{!! $link->link !!}" target="_blank">{{ $link->title }}</a></li>
                      @endforeach
                  </ul>
               
                </li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>Penanaman Modal</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li ><a href="http://investasi.magelangkota.go.id/" target="_blank">Profil Investasi</a></li>
                  <li ><a href="https://app.magelangkota.go.id/sigumilang" target="_blank">Laporan Usaha Mikro</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#" class="{{ Request::is('pengaduan*')?'active':'' }}"><span>Pengaduan</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="/pengaduan/alur" class="{{ Request::is('pengaduan/alur*')?'active':'' }}">Alur Pengaduan</a></li>
                  <li><a href="https://dpmptsp.magelangkota.go.id/spsop/pengaduan-2">Standar Pelayanan</a></li>
                  <li><a href="https://dpmptsp.magelangkota.go.id/spsop/pengaduan-2">Standar Operasional Prosedur</a></li>
                  <li><a href="/pengaduan/form" class="{{ Request::is('pengaduan/form*')?'active':'' }}">Form Pengaduan</a></li>
                  <li><a href="https://lapor.magelangkota.go.id/" target="_blank">Monggo Lapor</a></li>
                  <li><a href="https://www.lapor.go.id/" target="_blank">SP4N Lapor</a></li>
		  <li><a href="https://www.instagram.com/dpmptsp_mglkota/" target="_blank">Instagram</a></li>
                  <li><a href="https://www.facebook.com/dpmptspmagelang/" target="_blank">Facebook</a></li>
                  <li><a href="https://twitter.com/dpmptspmglkota" target="_blank">Twitter</a></li>
                  <li><a href="https://dpmptsp.magelangkota.go.id/downloads/file?folder=laporan-pengaduan" class="{{ Request::is('downloads/file?folder=laporan-pengaduan*')?'active':'' }}">Laporan Pengaduan</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="{{ Request::is('statistik*')?'active':'' }}"><span>Statistik</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#" class="{{ Request::is('statistik/perizinan*')?'active':'' }}"><span>Statistik Perizinan</span><i class="bi bi-chevron-right"></i></a>
                <ul>
                    <li><a href="/statistik/perizinan/terbit" class="{{ Request::is('statistik/perizinan/terbit*')?'active':'' }}">Izin Terbit Non Berusaha</a></li>
                    <!--<li><a href="/statistik/perizinan/rekap" class="{{ Request::is('statistik/perizinan/rekap*')?'active':'' }}">Rekap Izin Terbit Non Berusaha</a></li>-->
		    <li><a href="/statistik/perizinan/nib" class="{{ Request::is('statistik/perizinan/nib*')?'active':'' }}">Izin Terbit Berusaha</a></li>
		    <!--<li><a href="/statistik/perizinan/izin" class="{{ Request::is('statistik/perizinan/izin*')?'active':'' }}">Izin Terbit Berusaha</a></li>-->
                </ul>
              </li>
              <li><a href="/statistik/investasi/realisasi" class="{{ Request::is('statistik/investasi/realisasi*')?'active':'' }}">Realisasi Investasi</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Unduhan</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            @foreach ($folders as $folder)
            <li class="text-capitalize"><a href="/downloads/file?folder={{ $folder->slug }}" class="text-truncate">{{ $folder->name }}</a></li>
            @endforeach
            <li><a href="/downloads/">Lihat Semua</a></li>
          </ul>
          </li>
          <li class="dropdown"><a href="#"><span>PPID</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="https://dpmptsp.magelangkota.go.id/downloads/file?folder=ppid&category=informasi-publik">Informasi Publik Secara Berkala</a></li>
              <li><a href="https://dpmptsp.magelangkota.go.id/downloads/file?folder=ppid&category=informasi-serta-merta">Informasi Serta Merta</a></li>
              <li><a href="https://dpmptsp.magelangkota.go.id/downloads/file?folder=ppid&category=informasi-setiap-saat">Informasi Setiap Saat</a></li>
	            <li><a href="https://dpmptsp.magelangkota.go.id/downloads/file?folder=ppid&category=informasi-dikecualikan">Informasi Dikecualikan</a></li>
              <li><a href="#">Permintaan Informasi</a></li>
            </ul>
          </li>
          <li ><a href="/faq"  class="{{ Request::is('faq*')?'active':'' }}">F.A.Q</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
