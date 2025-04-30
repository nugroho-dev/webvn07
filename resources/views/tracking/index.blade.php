@extends('layouts.main')

@section('container')
@extends('layouts.breadcrumb')
 <!-- ======= Testimonials Section ======= -->
 <section id="testimonials" class="testimonials blog">
    <div class="container">

      <div class="row">
        @if(empty($datas))
        <div class="col-lg-12 entries">
          <div class="testimonial-item entry text-capitalize">
            <p class="text-capitalize">
            <div class="entry-content text-center">
              <h2 class="mt-2"><i class="bx bxs-quote-alt-left quote-icon-left "></i>data tidak ditemukan!!<i class="bx bxs-quote-alt-right quote-icon-right"></i></h2>
            </div>
          </p>
          </div>
        </div>
        @else
        @foreach($datas as $data)
        <div class="col-lg-6 entries">
          <div class="testimonial-item entry text-capitalize">
            <p class="text-capitalize">
            <h2 class="mb-0">{{ $data['no_permohonan'] }}</h2>
            <h3>Pemohonan : {{ $data['nama'] }}</h3>
          
            <div class="entry-content">
           
              <div class="small text-capitalize">Tanggal Pengajuan : {{date_format(date_create($data['tgl_pengajuan']),"M d, Y")}} </div>
              <h2 class="mt-2"><i class="bx bxs-quote-alt-left quote-icon-left "></i>{{ $data['jenis_izin'] }}<i class="bx bxs-quote-alt-right quote-icon-right"></i></h2>
              <br>
             
              <div class="read-more">
                <a href="/tracking/{{ $data['id'] }}">Lacak</a>
              </div>
            
            </div>
          </p>
          </div>
        </div>
        @endforeach
        @endif
      </div>

      </div>

    </div>
  </section><!-- End Testimonials Section -->
@endsection