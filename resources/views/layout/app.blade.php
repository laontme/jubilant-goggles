<!doctype html>
<html lang="{{ config('app.locale', 'en') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
</head>
<body>
<div class="wrapper">
    <header>
        <div class="container py-3">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 gap-4">
                    <li>
                        <a href="{{ route('landing') }}" class="p-0 nav-link">Home</a>
                    </li>
                    @auth
                        <li>
                            <a href="{{ route('user.dashboard') }}" class="p-0 nav-link">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('todo.list.index') }}" class="p-0 nav-link">All my Todo Lists</a>
                        </li>
                        <li>
                            <a href="{{ route('todo.item.index') }}" class="p-0 nav-link">All my Todo Items</a>
                        </li>
                    @endauth
                </ul>

                @auth
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                           data-bs-toggle="dropdown">
                            <img
                                src="{{ "https://www.gravatar.com/avatar/" . md5(Str::of(Auth::user()->email)->lower()->trim()) }}"
                                alt="mdo" class="rounded-circle" width="32"
                                height="32">
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                            <li><a class="dropdown-item" href="{{ route('user.settings') }}">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a></li>
                        </ul>
                    </div>
                @else
                    <div>
                        <a href="{{ route('user.login.form') }}" class="btn btn-outline-primary">Login</a>
                        <a href="{{ route('user.register.form') }}" class="btn btn-primary">Register</a>
                    </div>
                @endauth
            </div>
        </div>
    </header>
    <main>
        <div class="container mb-5">
            @yield('main')
        </div>
    </main>
    <footer>
        <div class="container">

        </div>
    </footer>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
