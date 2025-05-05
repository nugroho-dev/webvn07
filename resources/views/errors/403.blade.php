@extends('errors::minimal')

@section('title', __('403 - Akses Ditolak'))
@section('content')
    <div class="error-code text-danger">403</div>
    <i class="bi-lock-fill display-4 text-danger mb-3"></i>
    <h3 class="mt-2">Akses Ditolak</h3>
    <p class="error-message text-muted">
        Anda tidak memiliki izin untuk mengakses halaman ini.
    </p>
    <a href="{{ url('/') }}" class="btn btn-danger mt-4">Kembali ke Beranda</a>
@endsection
