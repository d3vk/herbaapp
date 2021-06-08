<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Login | ObatHerbal</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <!-- Template -->
    <link rel="stylesheet" href="{{ asset('css/graindashboard.css') }}">
</head>

<body class="">

    <main class="main">

        <div class="content">

            <div class="container-fluid pb-5">

                <div class="row justify-content-md-center">
                    <div class="card-wrapper col-12 col-md-4 mt-5">
                        <div class="brand text-center mb-3">
                            <a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}"
                                    style="width: auto; height: 33px;"></a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Masuk</h4>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Alamat email</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password
                                        </label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="text-right">
                                            <a href="{{ route('password.request') }}" class="small">
                                                Lupa password?
                                            </a>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check position-relative mb-2">
                                            <input type="checkbox" class="form-check-input d-none" id="remember"
                                                name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="checkbox checkbox-xxs form-check-label ml-1" for="remember"
                                                data-icon="&#xe936">Ingat saya</label>
                                        </div>
                                    </div>

                                    <div class="form-group no-margin">
                                        <button type="submit" class="btn btn-primary">
                                            Masuk
                                        </button>
                                    </div>
                                    <div class="text-center mt-3 small">
                                        Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <footer class="footer mt-3">
                            <div class="container-fluid">
                                <div class="footer-content text-center small">
                                    <span class="text-muted">&copy; {{ date('Y') }} ObatHerbal. All Rights
                                        Reserved.</span>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>



            </div>

        </div>
    </main>

    <script src="{{ asset('js/graindashboard.js') }}"></script>
    <script src="{{ asset('js/graindashboard.vendor.js') }}"></script>
</body>

</html>
