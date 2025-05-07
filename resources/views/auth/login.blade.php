
@extends('layouts.login.main')
@section('container')
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
            <h2 class="h2 text-center mb-4">DPMPTSP Kota Magelang</h2>
        </div>
        <div class="card card-md">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">Login to your account</h2>
            <form action="{{ route('login') }}" method="POST" autocomplete="off" novalidate>
                @csrf
              <div class="mb-3">
                <label class="form-label">Email address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="your@email.com" name="email" value="{{ old('email') }}" autocomplete="off" required autofocus/>
                @error('email')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                @enderror
              </div>
              <div class="mb-2">
                <label class="form-label">
                  Password
                  <span class="form-label-description">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">I forgot password</a>
                    @endif
                  </span>
                </label>
                <div class="input-group input-group-flat">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Your password" name="password" required autocomplete="off" />
                  <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"
                     ><!-- Download SVG icon from http://tabler.io/icons/icon/eye -->
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="icon icon-1"
                      >
                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg></a>
                  </span>
                </div>
                
              </div>
              @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              <div class="mb-2">
                <label class="form-check">
                  <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                  <span class="form-check-label">Remember me on this device</span>
                </label>
              </div>
              <div class="mb-2">
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.key') }}"></div>
                    @error('captcha')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
              </div>
            </form>
          </div>
          
          
        </div>
        
      </div>
    </div>
    <!-- Include Google reCAPTCHA script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer nonce="{{ $cspNonce }}"></script>
@endsection 