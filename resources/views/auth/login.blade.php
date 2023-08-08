<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="{{ asset('assets/extensions/@fortawesome/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/static/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/static/images/logo/favicon.png') }}" type="image/png">

</head>

<script src="{{ asset('assets/static/js/initTheme.js') }}"></script>

<body>
    <div id="app">
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h3>Login</h3>
                            <p class="text-subtitle text-muted">Silakan masuk ke akun Anda.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <section class="section">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Masuk</h5>
                                        </div>
                                        <div class="card-body">
                                            <!-- Display the error alert for email field -->
                                            @error('email')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            <form action="{{ route('auth.login') }}" method="post">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" name="email" id="email"
                                                        class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" name="password" id="password"
                                                        class="form-control" required>
                                                </div>
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input" id="remember">
                                                    <label class="form-check-label" for="remember">Ingat
                                                        saya</label>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Masuk</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </section>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    {% if isDev %}
    <script src="{{ asset('assets/js/app.js') }}" type="module"></script>
    {% else %}
    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>
    {% endif %}


</body>

</html>
