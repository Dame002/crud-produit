<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Application de gestion de clients">
    <meta name="author" content="Votre Société">

    <title>@yield('title', 'Gestion des factures') | Gestion des Factures</title>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{-- Bootstrap CSS avec fallback local --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Styles personnalisés --}}
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #2e59d9;
        }

        body {
            padding-top: 70px;
            background-color: #f8f9fc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .main-content {
            flex: 1;
        }

        .card {
            border: none;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        }

        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            font-weight: 600;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        footer {
            background-color: #f8f9fc;
            border-top: 1px solid #e3e6f0;
            padding: 1.5rem 0;
            margin-top: 2rem;
        }

        .alert {
            border-left: 4px solid;
        }

        .alert-success {
            border-left-color: #1cc88a;
        }

        .alert-danger {
            border-left-color: #e74a3b;
        }

        @media (prefers-color-scheme: dark) {
            body[data-bs-theme="dark"] {
                background-color: #1a1a2e;
                color: #f8f9fa;
            }

            .card, .card-header {
                background-color: #16213e;
                color: #f8f9fa;
            }

            footer {
                background-color: #16213e;
                border-top-color: #2c3a6e;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    {{-- Navigation principale --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('factures.index') }}">
                 <i class="fas fa-file-invoice me-2"></i>
                <span> Gestion des factures</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('factures.index') ? 'active' : '' }}" href="{{ route('factures.index') }}">
                            <i class="fas fa-home me-1"></i> Accueil
                        </a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('clients.index') ? 'active' : '' }}" href="{{ route('clients.index') }}">
                            <i class="fas fa-users me-2"></i> Clients
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('factures.create') ? 'active' : '' }}" href="{{ route('factures.create') }}">
                            <i class="fas fa-plus-circle me-1"></i> Ajouter une facture
                        </a>
                    </li>
                </ul>

                {{-- Thème clair/sombre --}}
                <div class="ms-3">
                    <button class="btn btn-sm btn-outline-light" id="themeToggle">
                        <i class="fas fa-moon"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    {{-- Contenu principal --}}
    <main class="main-content">
        <div class="container-fluid px-4 py-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    {{-- Pied de page --}}
    {{-- <footer class="mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">
                    &copy; {{ date('Y') }} ClientApp. Tous droits réservés.
                </div>
                <div>
                    <a href="#">Politique de confidentialité</a>
                    &middot;
                    <a href="#">Conditions d'utilisation</a>
                </div>
            </div>
        </div>
    </footer> --}}

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        // Gestion du thème clair/sombre
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggle = document.getElementById('themeToggle');
            const htmlElement = document.documentElement;

            // Vérifier la préférence utilisateur
            const userPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            const currentTheme = localStorage.getItem('theme') || (userPrefersDark ? 'dark' : 'light');

            // Appliquer le thème
            if (currentTheme === 'dark') {
                htmlElement.setAttribute('data-bs-theme', 'dark');
                themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
            } else {
                htmlElement.setAttribute('data-bs-theme', 'light');
                themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
            }

            // Basculer entre les thèmes
            themeToggle.addEventListener('click', function() {
                if (htmlElement.getAttribute('data-bs-theme') === 'dark') {
                    htmlElement.setAttribute('data-bs-theme', 'light');
                    localStorage.setItem('theme', 'light');
                    themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
                } else {
                    htmlElement.setAttribute('data-bs-theme', 'dark');
                    localStorage.setItem('theme', 'dark');
                    themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
