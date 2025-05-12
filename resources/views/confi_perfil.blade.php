<!doctype html>
<html lang="en">
<head>
    <title>Configuración</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #ffffff;
            color: #000;
            padding-top: 56px;
        }

        .navbar {
            background-color: #000;
        }

        .navbar .logo {
            height: 50px;
        }

        .perfil-container {
            max-width: 700px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            background-color: white;
        }

        .perfil-img {
            width: 100px;
            border-radius: 50%;
        }

        .perfil-label {
            font-weight: 600;
        }

        .perfil-input {
            border: none;
            border-bottom: 1px solid #ccc;
            outline: none;
            width: 100%;
            background-color: transparent;
            padding: 4px 0;
        }

        .perfil-input:focus {
            border-color: #007bff;
        }

        .edit-btn {
            white-space: nowrap;
        }

        .perfil-row {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .perfil-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .edit-btn {
                align-self: flex-end;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="bi bi-list fs-4"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item " href="{{ route('home') }}">Perfil</a></li>
                <li><a class="dropdown-item" href="#">aaaInicio</a></li>
                <li><a class="dropdown-item" href="#">Citas</a></li>
                <li><a class="dropdown-item" href="#">Cartilla</a></li>
                <li><a class="dropdown-item" href="#">Receta médica</a></li>
                <li><a class="dropdown-item" href="#">Control médico</a></li>
            </ul>
        </div>

        <a class="navbar-brand mx-auto" href="#">
            <img src="{{ asset('assets/logo-blanco.png') }}" alt="Vital Vet" class="logo">
        </a>

        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                <i class="bi bi-person fs-4 me-2"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                <li><center>Bienvenid@ {{ Auth::user()->name }}</center></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Cambiar tema</a></li>
                <li><a class="dropdown-item" href="#">Traducir idioma</a></li>
                <li><a class="dropdown-item active"  href="#">Configuración</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contenido principal -->
<!-- Contenido principal -->
<div class="container perfil-container">
    <div class="text-center mb-4">
        <div class="">
            <div class="text-center mb-4">
                @if(Auth::user()->photo)
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                         alt="Foto de perfil"
                         class="rounded-circle shadow"
                         style="width: 140px; height: 140px; object-fit: cover; border: 4px solid #aed4ea;">
                @else
                    <i class="bi bi-person-circle text-secondary" style="font-size: 7rem;"></i>
                @endif
            </div>
        </div>
        <form action="{{ route('profile.updatePhoto') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <input type="file" name="photo" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Cambiar foto</button>
        </form>
    </div>

    <!-- Formulario de edición de perfil -->
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="perfil-form">
            <div class="row align-items-center mb-3">
                <div class="col-md-3">
                    <label class="perfil-label">Nombre Completo:</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="perfil-input form-control" name="name" value="{{ Auth::user()->name }}">
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="col-md-3">
                    <label class="perfil-label">Correo Electrónico:</label>
                </div>
                <div class="col-md-9">
                    <input type="email" class="perfil-input form-control" name="email" value="{{ Auth::user()->email }}">
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="col-md-3">
                    <label class="perfil-label">Teléfono:</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="perfil-input form-control" name="phone" value="{{ Auth::user()->phone }}">
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="col-md-3">
                    <label class="perfil-label">Dirección:</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="perfil-input form-control" name="address" value="{{ Auth::user()->address }}">
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="col-md-3">
                    <label class="perfil-label">DUI:</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="perfil-input form-control" value="{{ Auth::user()->dui }}" disabled>
                </div>
            </div>
        </div>
        <div class="text-end mt-4">
            <center><button type="submit" class="btn btn-outline-info">Guardar Cambios</button></center>
        </div>
    </form>

    
</div>
<footer>
    <center>
        <div class="text-center p-3" style="background-color: rgba(234, 64, 250, 0.2)">
            © 2025 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">VitalVet</a>
        </div>
    </center>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
