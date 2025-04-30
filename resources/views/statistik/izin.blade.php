@extends('layouts.main')

@section('container')
@extends('layouts.breadcrumb')



<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">
    <div class="row d-flex justify-content-center">
      <div class="col-lg-12 entries ">
        <article class="entry entry-single text-capitalize">
          <div class="row d-flex justify-content-end">
            <div class="col-md-4 ">
              <form class="g-3" action="/statistik/perizinan/izin" method="post">
                @csrf
                <div class="input-group ">
                  
                  <input type="text" name="from" class="form-control" id="from" placeholder="Tanggal" autocomplete="off">
                  <span class="input-group-text">to</span>
                  
                  <input type="text" name="to" class="form-control" id="to" placeholder="Tanggal" autocomplete="off">
                  <button type="submit" class="btn btn-primary">Lihat</button>
                </div>
              </form>
            </div>
          </div>
          <div id="Chart"></div>
        </article>
        <!-- End blog entry -->
      </div>
    
      
    </div>
   
  </div>
</section><!-- End About Section -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
  Highcharts.chart('Chart', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'Grafik Jumlah Penerbitan Izin Berusaha Periode {{ $date1 }} sampai {{ $date2 }}'
  },
  subtitle: {
    text: 'Sumber : SiRekap DPMPTSP Kota Magelang'
  },
  xAxis: {
    categories: [
      @foreach($dataterbits as $dataterbit)
                '{{ $dataterbit['jenis_perizinan'] }}',
      @endforeach],
    title: {
      text: 'Jenis Perizinan'
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Jumlah Izin Tebit',
      align: 'high'
    },
    labels: {
      overflow: 'justify'
    }
  },
  tooltip: {
    valueSuffix: ''
  },
  plotOptions: {
    bar: {
      dataLabels: {
        enabled: true
      }
    }
  },
  
  credits: {
    enabled: false
  },
  series: [{
    name: 'Jumlah Izin Terbit',
    data: [
      @foreach($dataterbits as $dataterbit)
        {{ $dataterbit['jumlah'] }},
     @endforeach]
  }]
});
</script>

 

@endsection