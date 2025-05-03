@extends('errors::layoutapp')

@section('title', __('404 - Halaman Tidak Ditemukan'))
@section('content')
    <div class="error-code text-warning">404</div>
    <i class="bi bi-exclamation-triangle-fill display-4 text-warning mb-3"></i>
    <h3 class="mt-2">Halaman Tidak Ditemukan</h3>
    <p class="error-message text-muted">
        Maaf, halaman yang Anda cari tidak tersedia atau telah dipindahkan.
    </p>
@endsection

