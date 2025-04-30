@extends('layouts.main')

@section('container')
@extends('layouts.breadcrumb')
<style>
  ul.timeline-3 {
  list-style-type: none;
  position: relative;
}
ul.timeline-3:before {
  content: " ";
  background: #d4d9df;
  display: inline-block;
  position: absolute;
  left: 29px;
  width: 2px;
  height: 100%;
  z-index: 400;
}
ul.timeline-3 > li {
  margin: 20px 0;
  padding-left: 20px;
}
ul.timeline-3 > li:before {
  content: " ";
  background: white;
  display: inline-block;
  position: absolute;
  border-radius: 50%;
  border: 3px solid #22c0e8;
  left: 20px;
  width: 20px;
  height: 20px;
  z-index: 400;
}
</style>
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
     
                <h4 style="margin-left: 1.2rem;">Perjalanan Permohonan</h4>
                @if(empty($datas))
                <h1 style="margin-left: 1.2rem;" class="mb-5 pb-5"> <p> <b> Data Tidak Ditemukan !!!</b> </p></h1>
                @endif
                <ul class="timeline-3">
                
                @foreach($datas as $data)
                <li class="text-capitalize">
                    <a href="#!">{{ $data['nama_proses'] }} - @if(empty($data['end_date'])){{ date_format(date_create($data['start_date']), "M d, Y") }}@else{{ date_format(date_create($data['end_date']), "M d, Y") }}@endif</a>
                    <a href="#!" class="float-end"><small>@if(empty($data['end_date'])){{ date_format(date_create($data['start_date'])," H:i:s") }} Wib @else{{ date_format(date_create($data['end_date'])," H:i:s") }} Wib @endif</small></a>
                    <p class="mt-2">
                        @if(($data['jenis_proses_id']==13))
                        <h5>Permohonan Selesai </h5>
                        Semua Proses Permohonan Izin Telah Selesai diLalui
                        @elseif(($data['jenis_proses_id']==18))
                        <h5>Pendaftaran Permohonan Izin Berhasil </h5>
                        Permohonan <b>{{ $data['jenis_izin'] }}</b> a.n <b>{{ $data['nama'] }}</b> Dengan Nomor Permohonan <b>{{ $data['no_permohonan'] }}</b> Berhasil Didaftarkan 
                        @else
                            @if(empty($data['end_date']))
                            <h5>Dalam Proses</h5> 
                            Permohonan <b>{{ $data['jenis_izin'] }}</b> Pada Proses <b>{{ $data['nama_proses'] }}</b> Diproses Tanggal <b>{{ date_format(date_create($data['start_date']), "M d, Y - H:i:s") }} Wib</b>
                            @else 
                            <h5>Proses Selesai</h5>
                            Permohonan <b>{{ $data['jenis_izin'] }}</b> Pada Proses <b>{{ $data['nama_proses'] }}</b> Telah Selesai diProses, Proses Dimulai Pada Tanggal <b>{{ date_format(date_create($data['start_date']), "M d, Y - H:i:s") }} Wib</b> dan Selesai Diproses Tanggal <b>{{ date_format(date_create($data['end_date']), "M d, Y - H:i:s") }} Wib</b>

                            @endif
                        @endif
                    </p>
                </li>
                @endforeach
                
                </ul>
          
        </div>
    </div>
</div>
@endsection