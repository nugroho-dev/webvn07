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
              <form class="g-3" action="/perizinan/statistik" method="post">
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
        <!-- End blog entry -->
      </div>
      <div class="col-lg-12 entries ">
        <article class="entry entry-single text-capitalize">
          <div class="row d-flex justify-content-end">
            <div class="col-md-3 ">
              <form class="g-3" action="/statistik/perizinan/terbit" method="post">
                @csrf
                <div class="input-group ">
                 
                  <input type="text" name="tahun" id="datepicker" class="form-control"  placeholder="Tahun" autocomplete="off">
                  <button type="submit" class="btn btn-primary">Lihat</button>
                </div>
              </form>
            </div>
          </div>
          <div id="Chart1"></div>
        </article>
        <!-- End blog entry -->
      </div>
      <div class="col-lg-12 entries ">
        <article class="entry entry-single text-capitalize">
          <div class="row d-flex justify-content-end">
            <div class="col-md-3 ">
              <form class="g-3" action="/perizinan/statistik" method="post">
                @csrf
                <div class="input-group ">
                 
                  <input type="text" name="tahun" id="datepicker2" class="form-control"  placeholder="Tahun" autocomplete="off">
                  <button type="submit" class="btn btn-primary">Lihat</button>
                </div>
              </form>
            </div>
          </div>
          <div id="Chart2"></div>
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
    text: 'Grafik Jumlah Penerbitan Izin Periode {{ $date1 }} sampai {{ $date2 }}'
  },
  subtitle: {
    text: 'Sumber : Real Time Data sicantik.go.id'
  },
  xAxis: {
    categories: [
      @foreach($dataterbits as $dataterbit)
                '{{ $dataterbit['jenis_izin'] }}',
      @endforeach],
    title: {
      text: 'Jenis izin'
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Surat Izin',
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
    name: 'Jumlah Izin',
    data: [
      @foreach($dataterbits as $dataterbit)
        {{ $dataterbit['jumlah_izin'] }},
     @endforeach]
  }]
});
</script>

<script>
  Highcharts.chart('Chart1', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Grafik Jumlah Penerbitan Izin Tahun {{ $tahun }} '
  },
  subtitle: {
    text: 'Sumber : Real Time Data sicantik.go.id'
  },
  xAxis: {
    categories: [
      @foreach($dataterbitbulans as $dataterbitbulan)
        '{{ $dataterbitbulan['bulan'] }}',
      @endforeach
    ],
    title: {
      text: 'Bulan'
    },
    crosshair: true
  },
  yAxis: {
    title: {
      useHTML: true,
      text: 'Jumlah Izin Terbit'
    }
  },
  tooltip: {
    valueSuffix: '',
    shared: false,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0,
      dataLabels: {
        enabled: true
      }
    }
  },
  series: [{
    name: 'Jumlah Izin Terbit',
    data: [
      @foreach($dataterbitbulans as $dataterbitbulan)
                    {{ $dataterbitbulan['jumlah'] }},
      @endforeach
    ]

  }]
});  
</script>
<script>
  Highcharts.chart('Chart2', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Grafik Jumlah Akumulasi Penerbitan Izin Tahun {{ $tahun }} '
  },
  subtitle: {
    text: 'Sumber : Real Time Data sicantik.go.id'
  },
  xAxis: {
    categories: [
      @foreach($dataterbitbulans as $dataterbitbulan)
        '{{ $dataterbitbulan['bulan'] }}',
      @endforeach
    ],
    title: {
      text: 'Bulan'
    },
    crosshair: true
  },
  yAxis: {
    title: {
      useHTML: true,
      text: 'Jumlah Izin Terbit'
    }
  },
  tooltip: {
    valueSuffix: '',
    shared: false,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0,
      dataLabels: {
        enabled: true
      }
    }
  },
  series: [{
    name: 'Jumlah Izin Terbit',
    data: [
      @php
        $total = 0;
      @endphp
      @foreach($dataterbitbulans as $dataterbitbulan)
                    {{ $total+=$dataterbitbulan['jumlah'] }},
      @endforeach
    ]

  }]
});  
</script>
@endsection