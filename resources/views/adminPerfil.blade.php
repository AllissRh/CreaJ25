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
                <li><a class="dropdown-item" href="{{ route('admin.index') }}">Panel Principal</a></li>
            </ul>
        </div>

        <a class="navbar-brand mx-auto" href="#">
            <img src="{{ asset('assets/logo-blanco.png') }}" alt="Vital Vet" class="logo">
        </a>
        <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none " 
       id="translateDropdown" 
       data-bs-toggle="dropdown" 
       aria-expanded="false">
        <i class="bi bi-translate me-2"></i>
        
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="translateDropdown " >
        <li>
            <h6 class="dropdown-header">
                <i class="fas fa-language me-2"></i>Seleccionar Idioma
            </h6>
        </li>
        <li><hr class="dropdown-divider"></li>
        
        <li>
            <div class="dropdown-item-text " style="border: none">
                <div id="google_translate_element" ></div>
            </div>
        </li>
    </ul>
</div>

    
    <style>

        .dropdown-item {
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #495057;
            transform: translateX(5px);
        }

        .flag-icon {
            width: 20px;
            height: 15px;
            background-size: cover;
            display: inline-block;
            border-radius: 2px;
        }

        .VIpgJd-ZVi9od-ORHb-OEVmcd {
            z-index: auto !important; /* hace que no aparezca labarra blanca */
        }
        .goog-te-gadget-simple {
            background-color: #ffffff1f;
            border-left: none;
            border-top: none;
            border-bottom: none;
            border-right:none;
            font-size: 10pt;
            display: inline-block;
            padding-top: 1px;
            padding-bottom: 2px;
            cursor: pointer;
        }

        .dropdown-item-text {
            display: block;
            padding: var(--bs-dropdown-item-padding-y) var(--bs-dropdown-item-padding-x);
            color: var(--bs-dropdown-link-color);
            margin-left: 25px;
            
        }



    </style>

    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            
            function googleTranslateElementInit() {
                new window.google.translate.TranslateElement(
                    {
                        pageLanguage: 'es', 
                        includedLanguages: 'es,en,fr',
                        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                        autoDisplay: false,
                        multilanguagePage: true
                    },
                    "google_translate_element"
                );
            }

        
            const addScript = document.createElement("script");
            addScript.setAttribute(
                "src",
                "//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"
            );
            document.body.appendChild(addScript);
            
        
            window.googleTranslateElementInit = googleTranslateElementInit;
        });

        
        function translatePage(language) {
            const selectField = document.querySelector("select.goog-te-combo");
            if (selectField) {
                selectField.value = language;
                selectField.dispatchEvent(new Event('change'));
            } else {

                setTimeout(() => translatePage(language), 500);
            }
            
            
            const dropdown = bootstrap.Dropdown.getInstance(document.getElementById('translateDropdown'));
            if (dropdown) {
                dropdown.hide();
            }
        }

     

        
        function resetLanguage() {
            translatePage('es'); 
        }
    </script>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                
                <i class="bi bi-person fs-4 me-2"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                <li><center>Bienvenid@ {{ Auth::user()->name }}</center></li> <hr>
                <li>
                   <a class="dropdown-item" href="{{ route('adminMiPerfil') }}">
                        Configuración
                    </a>
                </li>
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

<div class="container perfil-container">
    <div class="text-center mb-4">
        <div class="">
            @if($usuario->photo)
                <img src="{{ asset('storage/' . $usuario->photo) }}" alt="Foto de perfil" class="rounded-circle shadow" style="width: 140px; height: 140px; object-fit: cover; border: 4px solid #aed4ea;">
            @else
                <i class="bi bi-person-circle text-secondary" style="font-size: 7rem;"></i>
            @endif
        </div>
    <form action="{{ route('admin.usuarios.actualizarFoto', $usuario->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <input type="file" name="photo" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Cambiar foto</button>
        </form>
    </div>

    <form action="{{ route('admin.usuarios.actualizar', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        @php
            $roles = [1 => 'Cliente', 2 => 'Administrador', 3 => 'Doctor'];
        @endphp

        <div class="perfil-form">
            
            @if(Auth::user()->tipo_usuario == 2)
                <label for="tipo_usuario">Tipo de usuario:</label>
                <select name="tipo_usuario" id="tipo_usuario" class="form-control">
                    <option value="1" {{ $usuario->tipo_usuario == 1 ? 'selected' : '' }}>Cliente</option>
                    <option value="2" {{ $usuario->tipo_usuario == 2 ? 'selected' : '' }}>Administrador</option>
                    <option value="3" {{ $usuario->tipo_usuario == 3 ? 'selected' : '' }}>Veterinario</option>
                </select>
             @endif

        </div>

            <div class="row align-items-center mb-3">
                <div class="col-md-3">
                    <label class="perfil-label">Nombre Completo:</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="perfil-input form-control" name="name" value="{{ $usuario->name }}">
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="col-md-3">
                    <label class="perfil-label">Correo Electrónico:</label>
                </div>
                <div class="col-md-9">
                    <input type="email" class="perfil-input form-control" name="email" value="{{ $usuario->email }}">
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="col-md-3">
                    <label class="perfil-label">Teléfono:</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="perfil-input form-control" name="phone" value="{{ $usuario->phone }}">
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="col-md-3">
                    <label class="perfil-label">Dirección:</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="perfil-input form-control" name="address" value="{{ $usuario->address }}">
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="col-md-3">
                    <label class="perfil-label">DUI:</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="perfil-input form-control" value="{{ $usuario->dui }}" readonly>
                    <input type="hidden" name="dui" value="{{ $usuario->dui }}">
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
