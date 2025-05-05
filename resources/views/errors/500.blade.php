@extends('errors::layoutapp')

@section('title', __('500 - Kesalahan Server'))
@section('content')
    <div class="error-code text-danger">500</div>
    <i class="bi-bug-fill display-4 text-danger mb-3"></i>
    <h3 class="mt-2">Kesalahan Server</h3>
    <p class="error-message text-muted">
        Terjadi kesalahan pada server. Kami sedang memperbaikinya.
    </p>
    <a href="{{ url('/') }}" class="btn btn-danger mt-4">Kembali ke Beranda</a>
@endsection


