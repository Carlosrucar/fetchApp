<!doctype html>
<html lang="es" class="h-100" data-bs-theme="auto">

<head>
    <!-- https://getbootstrap.com/docs/5.3/examples/sticky-footer/ -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <meta name="theme-color" content="#712cf9">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url-base" content="{{ url('') }}">

    <title>Fetch</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <linl href="{{ url('assets/css/style.css') }}" rel="stylesheet">

    <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    line-height: 1.6;
    color: #333;
    background-color: #f8f9fa;
}

/* Navbar Styling */
.navbar {
    background-color: #ffffff !important;
    box-shadow: 0 2px 4px rgba(0,0,0,0.04) !important;
    padding: 1rem 0;
}

.navbar-brand {
    font-weight: 600;
    color: #2563eb !important;
}

.nav-link {
    color: #4b5563 !important;
    font-weight: 500;
    transition: color 0.2s ease;
}

.nav-link:hover {
    color: #2563eb !important;
}

/* Main Content */
.centered-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

h1 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
}

.lead {
    color: #6b7280;
    font-size: 1.125rem;
    margin-bottom: 2rem;
}

/* Alert Styling */
.alert {
    border: none;
    border-radius: 8px;
    padding: 1rem 1.5rem;
    margin-bottom: 1.5rem;
    display: none;
    opacity: 1;
    transition: all 0.3s ease;
}

.alert-success {
    background-color: #ecfdf5;
    color: #065f46;
    border-left: 4px solid #34d399;
}

.alert-danger {
    background-color: #fef2f2;
    color: #991b1b;
    border-left: 4px solid #f87171;
}

/* Content Section */
#content {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    gap: 1.5rem;
    background-color: #ffffff;
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

#content > div {
    width: 100%;
    max-width: 1000px;
}

#content .row {
    width: 100%;
    justify-content: center;
    gap: 1.5rem;
}

/* Button Styling */
.buttons-container {
    display: flex;
    justify-content: center;
    gap: 0.75rem;
    margin-top: 1.5rem;
}

.btn {
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-weight: 500;
    transition: all 0.2s ease;
}

.btn-primary {
    background-color: #2563eb;
    border-color: #2563eb;
}

.btn-primary:hover {
    background-color: #1d4ed8;
    border-color: #1d4ed8;
}

/* Pagination */
#pagination {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 2rem;
    width: 100%;
}

.pagination .page-link {
    border-radius: 6px;
    color: #4b5563;
    padding: 0.5rem 1rem;
    border: 1px solid #e5e7eb;
    background-color: #ffffff;
    transition: all 0.2s ease;
}

.pagination .page-link:hover {
    background-color: #f3f4f6;
    color: #2563eb;
}

.pagination .active .page-link {
    background-color: #2563eb;
    border-color: #2563eb;
    color: #ffffff;
}

#content .row {
    width: 100%;
    justify-content: flex-start;
    gap: 1rem;
    align-items: center;
    padding: 0.5rem;
}

/* Column Widths */
#content .col-md-1 {
    flex: 0 0 auto;
    width: auto;
    min-width: 80px;
    padding: 0 0.5rem;
}

/* Button Container */
.btn {
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-weight: 500;
    transition: all 0.2s ease;
    margin-right: 0.5rem;
    min-width: 70px;
}

/* Specific Button Colors */
.btn-primary {
    background-color: #2563eb;
    border-color: #2563eb;
}

.btn-warning {
    background-color: #f59e0b;
    border-color: #f59e0b;
    color: white;
}

.btn-danger {
    background-color: #dc2626;
    border-color: #dc2626;
}

/* Column Text Alignment */
#content span {
    display: inline-block;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* Footer */
.footer {
    background-color: #ffffff !important;
    border-top: 1px solid #e5e7eb;
    padding: 1.5rem 0;
}

.footer .text-body-secondary {
    color: #6b7280 !important;
}

/* Responsive Design */
@media (max-width: 768px) {
    .centered-container {
        padding: 1rem;
    }

    h1 {
        font-size: 2rem;
    }

    #content {
        padding: 1rem;
    }

    .buttons-container {
        flex-direction: column;
        align-items: stretch;
    }

    .btn {
        width: 100%;
        margin-bottom: 0.5rem;
    }
}
</style>
</head>

<body class="d-flex flex-column h-100">

    <!-- modal -->
    @include('modal')

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto" id="userContent">
                    {{--
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" data-href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#registerModal" data-url="/register"
                            data-href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" data-href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a id="logoutButton" class="dropdown-item" data-url="/logout"
                                data-href="{{ route('logout') }}">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>
                    @endguest
                    --}}
                </ul>
            </div>
        </div>
    </nav>

    <!-- page content -->
    <main class="flex-shrink-0">
        <div class="container-fluid centered-container" style="max-width: 1200px; margin: 0 auto;">
            <h1 class="mt-5">Games</h1>
            <p class="lead">
                Tercera versión de la misma aplicación de games: fetch (ajax).
            </p>
            <div class="alert alert-success" role="alert" id="gamesSuccess">Successfully done.</div>
            <div class="alert alert-danger" role="alert" id="gamesError">Error doing.</div>
            <!-- dynamic content -->
            <div id="content"></div>
            <nav>
                <!--dynamic pagination content -->
                <ul class="pagination" id="pagination"></ul>
            </nav>
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
            <span class="text-body-secondary">Place sticky footer content here.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="{{ url('src/js/script.js?random=' . rand(1, 1000)) }}" type="module"></script>
</body>

</html>