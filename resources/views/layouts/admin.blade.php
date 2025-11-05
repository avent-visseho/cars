<!-- ========================================== -->
<!-- FICHIER : resources/views/layouts/admin.blade.php -->
<!-- Layout pour l'administration -->
<!-- ========================================== -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - ImportCars</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
        }

        .navbar-admin {
            background: linear-gradient(135deg, #1e40af 0%, #0c2d5e 100%);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .sidebar {
            min-height: calc(100vh - 70px);
            background: white;
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.05);
            padding-top: 30px;
        }

        .sidebar .nav-link {
            color: #4a5568;
            padding: 15px 25px;
            margin: 8px 15px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar .nav-link:hover {
            background: linear-gradient(135deg, #1e40af 0%, #0c2d5e 100%);
            color: white;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(30, 64, 175, 0.3);
        }

        .sidebar .nav-link.active {
            background: linear-gradient(135deg, #1e40af 0%, #0c2d5e 100%);
            color: white;
            box-shadow: 0 5px 15px rgba(30, 64, 175, 0.3);
        }

        .sidebar .nav-link i {
            font-size: 1.3rem;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .alert {
            border-radius: 15px;
            border: none;
            padding: 18px 25px;
            font-weight: 500;
        }

        .btn-gradient {
            background: linear-gradient(135deg, #1e40af 0%, #0c2d5e 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(30, 64, 175, 0.3);
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(30, 64, 175, 0.4);
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar Admin -->
    <nav class="navbar navbar-admin navbar-dark">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold fs-4" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i>ImportCars Admin
            </a>
            <div class="d-flex gap-2">
                <a href="{{ route('home') }}" class="btn btn-light btn-sm"
                    style="border-radius: 10px; padding: 8px 20px; font-weight: 600;">
                    <i class="bi bi-eye me-2"></i>Voir le Site
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-light btn-sm"
                        style="border-radius: 10px; padding: 8px 20px; font-weight: 600;">
                        <i class="bi bi-box-arrow-right me-2"></i>Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-md-block sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                                href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2"></i>
                                <span>Tableau de Bord</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.cars.*') ? 'active' : '' }}"
                                href="{{ route('admin.cars.index') }}">
                                <i class="bi bi-car-front"></i>
                                <span>Gérer les Voitures</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Contenu Principal -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                <!-- Messages Flash -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Erreur !</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Contenu de la page -->
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
