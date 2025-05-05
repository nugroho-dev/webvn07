@extends('errors::minimal')

@section('title', __('401 - Tidak Diizinkan'))
@section('content')
    <div class="error-code text-danger">401</div>
    <i class="bi-person-x-fill display-4 text-danger mb-3"></i>
    <h3 class="mt-2">Tidak Diizinkan</h3>
    <p class="error-message text-muted">
        Anda harus login untuk mengakses halaman ini.
    </p>
    <a href="{{ url('/') }}" class="btn btn-danger mt-4">Kembali ke Beranda</a>
@endsection
