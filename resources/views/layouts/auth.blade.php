<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>@yield('title') | ObatHerbal</title>

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
                                <h4 class="card-title">@yield('title')</h4>
                                @yield('content')
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
