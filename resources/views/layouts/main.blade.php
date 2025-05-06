
<!DOCTYPE html>
<html lang="en">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FQGV18Q2BT" integrity="sha384-d5dWGqFb7saRq/jdcyeBwDvm6K0lpDkGhohGsnu+XfRKO1m5Ed6vejM0hMJ7sTSM" crossorigin="anonymous" nonce="{{ $cspNonce }}"></script>
<script  nonce="{{ $cspNonce }}">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-FQGV18Q2BT');
</script>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DPMPTSP | {{ $title }}</title>
  <head>
    @php
    $nonce = request()->attributes->get('csp_nonce');
  @endphp
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.ico" rel="icon">
  <link href="/assets/img/favicon.png" rel="apple-touch-icon">

  <!-- Google Fonts 
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

   Vendor CSS Files -->
   <link href="/assets/css/app.css" rel="stylesheet">
  <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet"/>
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"/>
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"/>
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"/>
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet"/>
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"/>
  <!-- Sweet Alert -->
  <link type="text/css" href="/../../vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet"/>

  <!-- =======================================================
  * Template Name: Sailor - v4.7.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

<!-- Google tag (gtag.js) 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-248554352-1"  nonce="{{ $cspNonce }}"></script>
<script  nonce="{{ $cspNonce }}">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-248554352-1');
</script>
-->
</head>

<body>
  @include('partials.navbar')
  <main id="main">
  @yield('container')
</main><!-- End #main -->
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>DPMPTSP Kota Magelang</h3>
              <p>
                Jl Veteran No 7 Kota Magelang <br>
                Magelang Tengah 56117, Indonesia<br><br>
                <strong>Phone:</strong> (0293) 314663 <br>
                <strong>Email:</strong> dpmptspmglkota@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="https://id-id.facebook.com/dpmptspmagelang/" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://twitter.com/dpmptspmglkota" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/dpmptsp_mglkota/" class="instagram"><i class="bx bxl-instagram"></i></a>
                <!--<a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>-->
                 <!--<a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>-->
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              @foreach($links as $link)
              <li><i class="bx bx-chevron-right"></i> <a href="{!! $link->link !!}" target="_blank">{{ $link->title }}</a></li>
              @endforeach
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Pelayanan Kami</h4>
            <ul>
              @foreach($services as $service)
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{ $service->title }}</a></li>
              @endforeach
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <!--<h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>-->

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>DPMPTSP Kota Magelang</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
    <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-black" id="exampleModalLabel">Tracking Permohonan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/tracking" method="post"enctype="multipart/form-data">
            @csrf
            <div class="row">
            
            <div class="form-group mt-2 mb-2">
              <input type="text" class="form-control" name="no" id="no" placeholder="Masukan Nomor Permohonan...!!" required>
            </div>
        
            <div class="text-center">
              <button type="submit" class="btn btn-danger btn-lg">Lacak</button>
            </div>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>

  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <iframe src="https://dpmptsp.magelangkota.go.id/skm/respondent/publikasi" width="100%" height="750"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"  integrity="sha384-vIQIPaHJRqkO8xhnLxSZ0rHF6LyiWXbLF3grsa9pv9yDFyOPGrE1teHOuRNMJoZs" crossorigin="anonymous" nonce="{{ $cspNonce }}">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha384-S58meLBGKxIiQmJ/pJ8ilvFUcGcqgla+mWH9EEKGm6i6rKxSTA2kpXJQJ8n7XK4w" crossorigin="anonymous" nonce="{{ $cspNonce }}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha384-EZJUCwX9EfOmrML5/1WejmhFx/azi54nnVfOndPu+VTQKOHabXXC9eS7VFdkLz0V" crossorigin="anonymous" nonce="{{ $cspNonce }}"></script>
  <script  nonce="{{ $cspNonce }}">
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

  $( function() {
    $( "#datepicker" ).datepicker({
          defaultDate: "+1w",
          changeMonth: false,
          changeYear: true,
          dateFormat: "yy",
          numberOfMonths: 1
        });
  } );

  $( function() {
    $( "#datepicker2" ).datepicker({
          defaultDate: "+1w",
          changeMonth: false,
          changeYear: true,
          dateFormat: "yy",
          numberOfMonths: 1
        });
  } );

  $( function() {
    $( "#datepickertb" ).datepicker({
          defaultDate: "+1w",
          changeMonth: false,
          changeYear: true,
          dateFormat: "yy-mm",
          numberOfMonths: 1
        });
  } );
  
  </script>
  
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <!-- <script src="/assets/vendor/php-email-form/validate.js"></script> -->
  <!-- Sweet Alerts 2 -->
  <script src="/../../vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>
  <script  nonce="{{ $cspNonce }}">
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
  </script>
<script type="text/javascript"  nonce="{{ $cspNonce }}">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'https://dpmptsp.magelangkota.go.id/reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
@if(session()->has('error'))
<script  nonce="{{ $cspNonce }}">
    Swal.fire({
            title: 'Error',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'Tutup',
            showConfirmButton: true,
            
    })
</script>
 @endif
<!-- Sweet Alerts 2 Fn JS -->
    @if(session()->has('success'))
    <script  nonce="{{ $cspNonce }}">
        Swal.fire({
                title: 'Berhasil',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Tutup',
                showConfirmButton: true,
                timer: 2500
        })
    </script>
     @endif
</body>

</html>