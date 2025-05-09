@extends('errors::layoutapp')

@section('title', __('405 - Tidak Diizinkan'))
@section('content')
    <div class="error-code text-danger">405</div>
    <i class="bi bi-sign-do-not-enter-fill display-4 text-danger mb-3"></i>
    <h3 class="mt-2">Akses Tidak Diizinkan</h3>
    <p class="error-message text-muted">
        Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.
    </p>
    <a href="{{ url('/') }}" class="btn btn-danger mt-4">Kembali ke Beranda</a>
@endsection

