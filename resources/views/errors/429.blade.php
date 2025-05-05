@extends('errors::layoutapp')

@section('title', __('429 - Terlalu Banyak Permintaan'))

@section('content')
    <div class="error-code text-warning">429</div>
    <i class="bi bi-hourglass-split display-4 text-warning mb-3"></i>
    <h3 class="mt-2">Terlalu Banyak Permintaan</h3>
    <p class="error-message text-muted">
        Anda telah mengirim terlalu banyak permintaan dalam waktu singkat. <br> Silakan tunggu beberapa saat sebelum mencoba lagi.
    </p>
@endsection