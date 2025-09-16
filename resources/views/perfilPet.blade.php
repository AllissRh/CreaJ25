<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vital Vet - Mascota</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #C6E1F1;
            color: white;
            padding-top: 56px;
        }
        .navbar { background-color: #000; }
        .navbar .logo { height: 50px; }
        .dropdown-menu-dark { background-color: #343a40; }
        @media (max-width: 576px) {
            .navbar .navbar-brand { margin-left: auto; margin-right: auto; }
        }
    </style>
</head>
<body>
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

    <!-- Estilos CSS -->
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

    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inicializar Google Translate
            function googleTranslateElementInit() {
                new window.google.translate.TranslateElement(
                    {
                        pageLanguage: 'es', // idioma base
                        includedLanguages: 'es,en,fr',
                        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                        autoDisplay: false,
                        multilanguagePage: true
                    },
                    "google_translate_element"
                );
            }

            // Cargar script de Google Translate
            const addScript = document.createElement("script");
            addScript.setAttribute(
                "src",
                "//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"
            );
            document.body.appendChild(addScript);
            
            // Hacer la función global
            window.googleTranslateElementInit = googleTranslateElementInit;
        });

        // Función para traducir a idiomas específicos
        function translatePage(language) {
            const selectField = document.querySelector("select.goog-te-combo");
            if (selectField) {
                selectField.value = language;
                selectField.dispatchEvent(new Event('change'));
            } else {
                // Si no está cargado aún, esperar un momento e intentar de nuevo
                setTimeout(() => translatePage(language), 500);
            }
            
            // Cerrar el dropdown
            const dropdown = bootstrap.Dropdown.getInstance(document.getElementById('translateDropdown'));
            if (dropdown) {
                dropdown.hide();
            }
        }

     

        // Función para restaurar idioma original
        function resetLanguage() {
            translatePage('es'); // Cambiar 'es' por tu idioma base
        }
    </script>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                
                <i class="bi bi-person fs-4 me-2"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                <li><center>Bienvenid@ {{ Auth::user()->name }}</center></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Cambiar tema</a></li>
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
    <!-- CONTENIDO -->
    <div class="container my-5">
        <div class="d-flex ficha-horizontal flex-wrap p-4 gap-4 bg-white rounded-4 shadow">
            <!-- Foto -->
            <div class="flex-shrink-0">
                <img src="{{ asset('storage/' . $mascota->imagen) }}" alt="Foto mascota" class="foto-mascota">
            </div>

            <!-- Datos generales -->
            <div class="flex-grow-1 text-dark">
                <h2 class="titulo-mascota">{{ $mascota->nombre }}</h2>
                <p class="subtitulo"><strong>ID Mascota:</strong> {{ $mascota->id }}</p>
                <p><strong>Nombre del titular:</strong> {{ $propietario->nombre }} {{ $propietario->apellido }}</p>

                <div class="info-title">DATOS GENERALES</div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nombre:</strong> {{ $mascota->nombre }}</p>
                        <p><strong>Apellido:</strong> {{ $mascota->apellido }}</p>
                        <p><strong>Edad:</strong> {{ $mascota->edad }} años</p>
                        <p><strong>Especie:</strong> {{ $mascota->especie }}</p>
                        <p><strong>Raza:</strong> {{ $mascota->raza }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Sexo:</strong> {{ $mascota->sexo }}</p>
                        <p><strong>Color:</strong> {{ $mascota->color }}</p>
                        <p><strong>Peso:</strong> {{ $mascota->peso }} kg</p>
                        <p><strong>Alergias:</strong> {{ $mascota->alergias ?? 'Ninguna' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Datos del propietario -->
        <div class="d-flex ficha-horizontal flex-wrap p-4 gap-4 bg-white rounded-4 shadow mt-4">
            <div class="flex-grow-1 text-dark">
                <div class="info-title-1">PROPIETARIO</div>
                <p><strong>Nombre del titular:</strong> {{ $propietario->nombre }} {{ $propietario->apellido }}</p>
                <p><strong>DUI:</strong> {{ $propietario->dui }}</p>
                <p><strong>Teléfono:</strong> {{ $propietario->telefono }}</p>
                <p><strong>Dirección:</strong><br>{{ $propietario->direccion }}</p>
            </div>
        </div>
    </div>

    <style>
        .ficha-horizontal {
            width: 1200px;
            margin: auto;
        }
        .foto-mascota {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 0.5rem;
        }
        .titulo-mascota {
            font-size: 1.8rem;
            font-weight: bold;
            color: #000;
        }
        .subtitulo {
            font-size: 1rem;
            color: #6c757d;
        }
        .info-title {
            font-weight: bold;
            margin-top: 1rem;
            color: #1f71f5;
        }
        .info-title-1 {
            font-weight: bold;
            margin-top: 1rem;
            color: #1f71f5;
            font-size: 2rem;
        }
        @media (max-width: 768px) {
            .ficha-horizontal {
                flex-direction: column !important;
            }
            .foto-mascota {
                max-width: 100%;
                height: auto;
                border-radius: 0;
            }
        }
    </style>

    <!-- FOOTER -->
    <footer style="background-color: #4A4A8A;" class="text-white py-5">
        <div class="container">
            <div class="row text-center text-md-start">
                <div class="col-md-3 mb-4 mb-md-0">
                    <img src="{{ asset('LOGO-VITALVET-BLANCO.png') }}" alt="Logo VitalVet" class="img-fluid mb-2" style="height: 60px;">
                </div>
                <div class="col-md-3">
                    <h5 class="fw-bold">SERVICIOS</h5>
                    <ul class="list-unstyled">
                        <li>Cartilla Veterinaria</li>
                        <li>Cuidados</li>
                        <li>Citas</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="fw-bold">CONTACTO</h5>
                    <ul class="list-unstyled">
                        <li>VitalVet@gmail.com</li>
                        <li>+503 9999-9999</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="fw-bold">REDES SOCIALES</h5>
                    <a href="#" class="text-white me-3 fs-4"><i class="fab fa-facebook-square"></i></a>
                    <a href="#" class="text-white fs-4"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <div style="background-color: #4A4A8A;" class="text-center text-white py-2 small">
        ©2025 VitalVet | Platform Developed by VitalVet
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
