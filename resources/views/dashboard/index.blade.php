@extends('dashboard.layouts.main')
 @section('container')

  @include('dashboard.layouts.sidebar')
<main class="content">
  @include('dashboard.layouts.header')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          changeYear: true,
          dateFormat: "yy-mm-dd",
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        numberOfMonths: 1
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  
  </script>
  <div class="row">

    <div class="task-wrapper border bg-white shadow border-0 rounded col-lg-8 m-3  table-responsive">
      <form class="m-3 col-lg-6" action="/dashboard" method="post">
        @csrf
        <div class="input-group ">
          
          <input type="text" name="from" class="form-control" id="from" placeholder="Tanggal" autocomplete="off">
          <span class="input-group-text">to</span>
          
          <input type="text" name="to" class="form-control" id="to" placeholder="Tanggal" autocomplete="off">
          <button type="submit" class="btn btn-primary">Lihat</button>
        </div>
      </form>
      <table class="table  align-middle caption-top">
       <caption>Jumlah Pengunjung dan Halaman Yang Dilihat</caption>
        <thead>
          <tr>
            <th>#</th>
            <th>Date</th>
            <th>Visitors</th>
            <th>Page Title</th>
            <th>Page Views</th>
          </tr>
        </thead>
        <tbody>
                    <tr>
            <td</td>
            <td></td>
            <td></td>
            <td class="text-wrap"></td>
            <td></td>
          </tr>
       
        </tbody>
      </table> 
    </div>
    <div class="task-wrapper border bg-white shadow border-0 rounded col-lg-3 m-3">
      <table class="table align-middle caption-top">
        <caption> Total Jumlah Pengunjung</caption>
        <thead>
          <tr>
            <th>#</th>
            <th>Date</th>
            <th>Visitors</th>
            <th>Page Views</th>
          </tr>
        </thead>
        <tbody>
                      <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          
        </tbody>
      </table>
    </div>
    <div class="task-wrapper border bg-white shadow border-0 rounded col-lg-8 table-responsive m-3">
      <table class="table align-middle caption-top">
        <caption class="text-capitalize"> Halaman Yang paling banyak dikunjungi</caption>
        <thead>
          <tr>
            <th>#</th>
            <th>Url</th>
            <th>Page Title</th>
            <th>Page Views</th>
          </tr>
        </thead>
        <tbody>
                     <tr>
            <td></td>
            <td class="text-wrap"></td>
            <td class="text-wrap"></td>
            <td></td>
          </tr>
         
        </tbody>
      </table>
    </div>
    <div class="task-wrapper border bg-white shadow border-0 rounded col-lg-3 m-3">
      <table class="table align-middle caption-top">
        <caption class="text-capitalize">Top Referrers</caption>
        <thead>
          <tr>
            <th>#</th>
            <th >url</th>
            <th>Page Views</th>
          </tr>
        </thead>
        <tbody>
                      <tr>
            <td></td>
            <td class="text-wrap"></td>
            <td></td>
          </tr>
        
        </tbody>
      </table>
    </div>
    <div class="task-wrapper border bg-white shadow border-0 rounded col-lg-4 m-3">
      <table class="table align-middle caption-top">
        <caption class="text-capitalize">Tipe Pengguna</caption>
        <thead>
          <tr>
            <th>#</th>
            <th>Type</th>
            <th>Sessions</th>
          </tr>
        </thead>
        <tbody>
           <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        
        </tbody>
      </table>
    </div>
    <div class="task-wrapper border bg-white shadow border-0 rounded col-lg-4 m-3">
      <table class="table align-middle caption-top">
        <caption class="text-capitalize">Top Browsers</caption>
        <thead>
          <tr>
            <th>#</th>
            <th>Browser</th>
            <th>Sessions</th>
          </tr>
        </thead>
        <tbody>
                     <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</main>
@endsection