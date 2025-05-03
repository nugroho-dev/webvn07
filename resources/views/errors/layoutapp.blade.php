<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Kesalahan')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
    $nonce = request()->attributes->get('csp_nonce');
  @endphp
    <!-- Bootstrap 5 -->
    <link href="/assets/img/favicon.ico" rel="icon">
  <link href="/assets/img/favicon.png" rel="apple-touch-icon">
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
    <style nonce="{{ $cspNonce }}">
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .error-container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .error-box {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            text-align: center;
        }
        .error-code {
            font-size: 6rem;
            font-weight: 700;
        }
        .error-message {
            font-size: 1.25rem;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-box">
            @yield('content')
            <a href="{{ url('/') }}" class="btn btn-danger mt-4">Kembali ke Beranda</a>
        </div>
    </div>
</body>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"  nonce="{{ $cspNonce }}">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"  nonce="{{ $cspNonce }}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"  nonce="{{ $cspNonce }}"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/waypoints/noframework.waypoints.js"></script>
 <script src="/assets/js/main.js"></script>
</html>