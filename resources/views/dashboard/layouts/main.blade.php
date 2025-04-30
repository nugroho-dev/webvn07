<!--

=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themes.getbootstrap.com/licenses/)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>DPMPTSP | {{ $title }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="Volt Premium Bootstrap Dashboard - Sign in page">
<meta name="author" content="Themesberg">
<meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
<meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
<link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://demo.themesberg.com/volt-pro">
<meta property="og:title" content="Volt Premium Bootstrap Dashboard - Sign in page">
<meta property="og:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
<meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
<meta property="twitter:title" content="Volt Premium Bootstrap Dashboard - Sign in page">
<meta property="twitter:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
<meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

<!-- Favicon -->
<!--<link rel="apple-touch-icon" sizes="120x120" href="/../../assets/img/favicon/apple-touch-icon.png">-->
<!--<link rel="icon" type="image/png" sizes="32x32" href="/../../assets/img/favicon/favicon-32x32.png">-->
<!--<link rel="icon" type="image/png" sizes="16x16" href="/../../assets/img/favicon/favicon-16x16.png">-->
<link rel="icon" type="image/png" href="/../../assets/img/favicon.png">
<!--<link rel="manifest" href="/../../assets/img/favicon/site.webmanifest">-->
<!--<link rel="mask-icon" href="/../../assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">-->
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<!-- Sweet Alert -->
<link type="text/css" href="/../../vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href="/../../vendor/notyf/notyf.min.css" rel="stylesheet">
<link type="text/css" href="/../../vendor/trix-main/dist/trix.css" rel="stylesheet">

<!-- Volt CSS -->
<link type="text/css" href="/../../css/volt.css" rel="stylesheet">
<link href="/../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"/>
<link href="/../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"/>
<link href="/../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"/>
<link href="/../../assets/vendor/remixicon/remixicon.css" rel="stylesheet"/>
<link href="/../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"/>


<!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body>
        <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
            @yield('container')
        <!-- Core -->
    <script src="/../../vendor/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="/../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Vendor JS -->
    <script src="/../../vendor/onscreen/dist/on-screen.umd.min.js"></script>
    
    <!-- Slider -->
    <script src="/../../vendor/nouislider/distribute/nouislider.min.js"></script>
    
    <!-- Smooth scroll -->
    <script src="/../../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    
    <!-- Charts -->
    <script src="/../../vendor/chartist/dist/chartist.min.js"></script>
    <script src="/../../vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    
    <!-- Datepicker -->
    <script src="/../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    
    <!-- Sweet Alerts 2 -->
    <script src="/../../vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
    
    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    
    <!-- Vanilla JS Datepicker -->
    <script src="/../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    
    <!-- Notyf -->
    <script src="/../../vendor/notyf/notyf.min.js"></script>
    
    <!-- Simplebar -->
    <script src="/../../vendor/simplebar/dist/simplebar.min.js"></script>
    
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
    <!-- Volt JS -->
    <script src="/../../assets/js/volt.js"></script>
    
    <script src="/../../vendor/trix-main/dist/trix.js"></script>
    <script src="/../../vendor/trix-main/dist/trix-core.js"></script>
    
    
    <!-- Sweet Alerts 2 Fn JS -->
    @if(session()->has('success'))
    <script>
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
     @if(session()->has('error'))
    <script>
        Swal.fire({
                title: 'Error',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'Tutup',
                showConfirmButton: true,
                
        })
    </script>
     @endif

     @if(session()->has('loginError'))
    <script>
        Swal.fire({
                title: 'Kesalahan',
                text: '{{ session('loginError') }}',
                icon: 'error',
                confirmButtonText: 'Tutup',
                showConfirmButton: true,
                timer: 6500
        })
    </script>
     @endif
     
    </body>
    
    </html>
    
    