<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestão de Catálogo')</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome para Ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root { --primary-color: #2563eb; }
        body { 
            background-color: #f3f4f6; 
            font-family: 'Inter', sans-serif;
            color: #1f2937;
        }
        .navbar { 
            background-color: #ffffff !important; 
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 0.8rem 0;
        }
        .navbar-brand { font-weight: 600; color: var(--primary-color) !important; }
        .nav-link { color: #4b5563 !important; font-weight: 500; }
        .nav-link:hover { color: var(--primary-color) !important; }
        
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        .btn-primary { background-color: var(--primary-color); border: none; padding: 0.5rem 1.2rem; border-radius: 8px; }
        .btn-primary:hover { background-color: #1d4ed8; }
        
        .alert { border-radius: 10px; border: none; }
        .main-content { margin-top: 2rem; margin-bottom: 4rem; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('equipamentos.index') }}">
                <i class="fa-solid fa-boxes-stacked me-2"></i>Catálogo
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('equipamentos.index') }}">
                            <i class="fa-solid fa-laptop me-1"></i> Equipamentos
                        </a>
                    </li>
                    @endauth
                </ul>
                
                <ul class="navbar-nav align-items-center">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px; font-size: 0.8rem;">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fa-solid fa-right-from-bracket me-2"></i> Sair
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary btn-sm ms-lg-2" href="{{ route('register') }}">Criar Conta</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container main-content">
        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center shadow-sm mb-4" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger d-flex align-items-center shadow-sm mb-4" role="alert">
                <i class="fa-solid fa-triangle-exclamation me-2"></i>
                <div>{{ session('error') }}</div>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="text-center text-muted py-4">
        <small>&copy; {{ date('Y') }} Gestão de Catálogo - Todos os direitos reservados.</small>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>