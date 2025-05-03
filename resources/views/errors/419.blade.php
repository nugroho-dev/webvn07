@extends('errors::minimal')

@section('title', __('419 - Sesi Berakhir'))
@section('content')
    <div class="error-code text-warning">419</div>
    <i class="bi-clock-history display-4 text-warning mb-3"></i>
    <h3 class="mt-2">Sesi Berakhir</h3>
    <p class="error-message text-muted">
        Sesi Anda telah berakhir. Silakan refresh dan coba lagi.
    </p>
@endsection