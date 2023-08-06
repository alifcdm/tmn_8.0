@extends('auth.auth')
@section('content')
    <!-- Content -->
    <div class="container-xxl">
        <div class="row justify-content-center my-5">
            <div class="col-lg-4">
                <div class="authentication-wrapper authentication-basic container-p-y">
                    <div class="authentication-inner">
                        <!-- Login -->
                        <div class="card">
                            <div class="card-body">
                                <h1>{{ session('success') }}</h1>
                                <h4 class="mb-2 text-center">
                                    <img src="{{ asset('assets/img/avatars/logo.png') }}" width="250" alt="">
                                </h4>
                                <p class="mb-4">Please sign-in to your account and start the adventure</p>
                                <form id="formAuthentication" class="mb-3" action="{{ route('login.post') }}"
                                    method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nip" class="form-label">NIP</label>
                                        <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                            id="nip" name="nip" placeholder="Enter your nip" maxlength="5"
                                            autofocus required />
                                        @error('nip')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="password">Password</label>
                                            {{-- <a href="auth-forgot-password-basic.html">
                                                <small>Forgot Password?</small>
                                            </a> --}}
                                        </div>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria - describedby="password" required />
                                            {{-- <span class="input-group-text cursor-pointer">
                                                <i id="iconVisible" class="bx bx-hide">
                                                </i>
                                            </span> --}}
                                        </div>
                                    </div>
                                    {{-- <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-me" />
                                            <label class="form-check-label" for="remember-me"> Remember Me </label>
                                        </div>
                                    </div> --}}
                                    <div class="mb-3">
                                        <button class="btn btn-primary d-grid w-100" type="submit"> Sign in </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Content --}}
@endsection
