
<!doctype html>
<html lang="en">
<head>
    <title>Cartilla</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="">
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
                <li><a class="dropdown-item" href="{{ route('docVista') }}">Panel Principal</a></li>
                <li><a class="dropdown-item " href="{{ route('docMascota', $mascota->id) }}">Perfil Mascota</a></li>
                <li><a class="dropdown-item" href="{{ route('vacunacion.form', $mascota->id) }}">Cartilla</a></li>
                <li><a class="dropdown-item" href="{{ route('docReceta',$mascota->id) }}">Receta médica</a></li>
                <li><a class="dropdown-item" href="{{ route('consultas.create', $mascota->id) }}">Control médico</a></li>
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

    @extends('layouts.app')

    @section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-center " >
            
                <div class="btn-group" role="tablist">
                    <a href="{{ route('cartilla.ver', $mascota->id) }}" class="btn btn-outline-primary active" role="tab">
                    Ver Cartillas
                    </a>
                    <a href="{{ route('vacunacion.form', $mascota->id) }}" class="btn btn-outline-primary " role="tab">
                    Crear Cartillas
                    </a>
                </div>
                
        </div>
        <div class="my-4">
                    <center>
                        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Dog Icon" width="120">
                    </center>
                    </div>
        <h2 class="text-center mb-4"><b>{{ $mascota->nombre }}</b></h2>
        <p class="text-center">Raza: {{ $mascota->raza }} | Edad: {{ $mascota->edad }} | Especie: {{ $mascota->especie }}</p>

        <!-- Tabla de Vacunaciones -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0" ><i class="bi bi-clipboard-plus"></i> Historial de Vacunaciones</h5>
            </div>
            <div class="card-body table-responsive">
                @if($mascota->vacunaciones->isEmpty())
                    <p>No hay registros de vacunación.</p>
                @else
                    <table class="table table-bordered text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Fecha Dosis</th>
                                <th>Vacuna</th>
                                <th>Próxima Dosis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mascota->vacunaciones as $vacuna)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($vacuna->fecha_dosis)->format('d/m/Y') }}</td>
                                <td>{{ $vacuna->nom_vacuna }}</td>
                                <td>{{ $vacuna->Proxima_dosis }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <!-- Tabla de Desparasitaciones -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="bi bi-clipboard-plus"></i> Historial de Desparasitaciones</h5>
            </div>
            <div class="card-body table-responsive">
                @if($mascota->desparasitaciones->isEmpty())
                    <p>No hay registros de desparasitaciones.</p>
                @else
                    <table class="table table-bordered text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Fecha Dosis</th>
                                <th>Producto</th>
                                <th>Externo/Interno</th>
                                <th>Próxima Dosis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mascota->desparasitaciones as $desparasitacion)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($desparasitacion->fecha_dosis)->format('d/m/Y') }}</td>
                                <td>{{ $desparasitacion->producto }}</td>
                                <td>{{ $desparasitacion->externo_interno }}</td>
                                <td>{{ $desparasitacion->proxima_dosis ? \Carbon\Carbon::parse($desparasitacion->proxima_dosis)->format('d/m/Y') : '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    @endsection

</body>
</html>
