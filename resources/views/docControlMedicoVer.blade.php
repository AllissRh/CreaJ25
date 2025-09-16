<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Receta Veterinaria-VitalVet</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
      position: relative;
      overflow-x: hidden;
      padding-top: 90px; /* Deja espacio para el navbar fijo */
    }

    .navbar {
      background-color: #000;
    }

    .navbar .logo {
      height: 50px;
    }

    .dropdown-menu-dark {
      background-color: #343a40;
    }

    @media (max-width: 576px) {
      .navbar .navbar-brand {
        margin-left: auto;
        margin-right: auto;
      }
    }

    /* Estilos para la receta médica */
    .receta-container {
      background-color: white;
      
      border-radius: 10px;
      padding: 2rem;
      max-width: 1000px;
      width: 100%;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      margin: auto;
    }

    header {
      text-align: center;
      margin-bottom: 1rem;
    }

    header h1 {
      font-size: 1.5rem;
      font-weight: bold;
    }

    .info-veterinario {
      text-align: center;
      margin-bottom: 1rem;
    }

    .info-paciente {
      margin-bottom: 1rem;
      font-weight: bold;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 1rem;
    }

    th, td {
      text-align: left;
      padding: 0.5rem;
      border-bottom: 1px solid #ccc;
    }

    .cuidados {
      padding: 1rem;
      border-radius: 10px;
    }

    .cuidados h3 {
      margin-bottom: 0.5rem;
      font-size: 1.2rem;
    }

    .contacto {
      text-align: center;
      margin-top: 2rem;
      font-size: 0.9rem;
    }

    .editable {
      border-bottom: 1px dotted #888;
      padding: 0.2rem;
      min-width: 50px;
      display: inline-block;
    }

    .btn-agregar {
      display: block;
      margin: 1rem auto;
      padding: 0.5rem 1rem;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
    }

    .btn-agregar:hover {
      background-color: #0056b3;
    }

    .btn-eliminar {
      margin-left: 0.5rem;
      background-color: red;
      color: white;
      border: none;
      border-radius: 3px;
      padding: 0.2rem 0.5rem;
      cursor: pointer;
    }

    .btn-eliminar:hover {
      background-color: darkred;
    }

    @media (max-width: 600px) {
      .receta-container {
        padding: 1rem;
      }
    }
    /*parametros para la impresión de la receta*/
    @media print {
        body * {
        visibility: hidden;
    }
    .receta-container, .receta-container * {
        visibility: visible;
    }
    .receta-container {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }

    .no-print {
        display: none !important;
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
<div class="d-flex justify-content-center my-4" style="margin-left: 35px;">
  


<div class="container py-5">
        <!-- Header Principal -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-clipboard-list text-white fs-2"></i>
                    </div>
                    <h2 class="fw-bold text-dark mb-2">Listado de Consultas</h2>
                    <p class="text-muted">Gestiona y visualiza todas las consultas veterinarias</p>
                </div>
            </div>
        </div>

        <!-- Alert de éxito -->
        @if(session('success'))
        <div class="row mb-4">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle me-3 fs-5"></i>
                        <div>
                            <strong>¡Éxito!</strong> {{ session('success') }}
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif

        <!-- Sección de Filtros -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <h5 class="card-title mb-3">
                    <i class="bi bi-funnel-fill me-2 text-primary"></i> Filtros de búsqueda
                </h5>

                <form method="GET" action="{{ route('consultas.index') }}" class="row g-3 align-items-end">
                    <!-- Buscar por nombre -->
                    <div class="col-md-4">
                        <label for="nombre" class="form-label fw-bold">Paciente</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" 
                            placeholder="Ej: Firulais" value="{{ request('nombre') }}">
                    </div>

                    <!-- Buscar por fecha -->
                    <div class="col-md-3">
                        <label for="fecha" class="form-label fw-bold">Fecha</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" 
                            value="{{ request('fecha') }}">
                    </div>

                    <!-- Botón Filtrar -->
                    <div class="col-md-3 d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search me-1"></i> Filtrar
                        </button>
                    </div>

                    <!-- Botón Limpiar -->
                    <div class="col-md-2 d-grid">
                        <a href="{{ route('consultas.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-repeat me-1"></i> Limpiar
                        </a>
                    </div>
                </form>
            </div>
        </div>



        <!-- Tabla de Consultas -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-gradient" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <div class="d-flex align-items-center justify-content-between text-white">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-table me-2 fs-5"></i>
                                <h5 class="mb-0">Registros de Consultas</h5>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-white text-primary rounded-pill me-3">
                                    <i class="fas fa-chart-line me-1"></i>
                                    {{ count($consultas ?? []) }} registros
                                </span>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col" class="border-0 py-3 ps-4">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-paw me-2 text-warning"></i>
                                                <span class="fw-bold">Mascota</span>
                                            </div>
                                        </th>
                                        <th scope="col" class="border-0 py-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-calendar-alt me-2 text-info"></i>
                                                <span class="fw-bold">Fecha</span>
                                            </div>
                                        </th>
                                        <th scope="col" class="border-0 py-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-comment-medical me-2 text-success"></i>
                                                <span class="fw-bold">Motivo</span>
                                            </div>
                                        </th>
                                        <th scope="col" class="border-0 py-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-stethoscope me-2 text-danger"></i>
                                                <span class="fw-bold">Diagnóstico</span>
                                            </div>
                                        </th>
                                        <th scope="col" class="border-0 py-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-stethoscope me-2 text-danger"></i>
                                                <span class="fw-bold">Acción</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($consultas as $consulta)
                                    <tr class="align-middle">
                                        <td class="py-4 ps-4">
                                            <div class="d-flex align-items-center">
                                                <div class="position-relative">
                                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 45px; height: 45px;">
                                                        <i class="fas fa-dog text-white fs-5"></i>
                                                    </div>
                                                    <div class="position-absolute bottom-0 end-0 bg-success rounded-circle border-2 border-white" style="width: 15px; height: 15px;"></div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-bold text-dark">{{ $consulta->mascota->nombre ?? 'Sin nombre' }}</h6>
                                                    <small class="text-muted">Mascota registrada</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            <div class="d-flex flex-column">
                                                <span class="badge bg-light text-dark border fw-normal px-3 py-2">
                                                    <i class="fas fa-calendar me-2 text-primary"></i>
                                                    {{ \Carbon\Carbon::parse($consulta->fecha)->format('d/m/Y') }}
                                                </span>
                                                <small class="text-muted mt-1">
                                                    {{ \Carbon\Carbon::parse($consulta->fecha)->diffForHumans() }}
                                                </small>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            <div class="d-flex align-items-start">
                                                <i class="fas fa-quote-left text-muted me-2 mt-1" style="font-size: 12px;"></i>
                                                <div>
                                                    <span class="text-dark fw-medium">{{ $consulta->motivo }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            <div class="d-flex align-items-center">
                                                <div class="bg-success rounded-circle me-3 shadow-sm" style="width: 10px; height: 10px;"></div>
                                                <div class="flex-grow-1">
                                                    <span class="text-success fw-bold">{{ $consulta->diagnostico }}</span>
                                                    <div class="progress mt-1" style="height: 4px;">
                                                        <div class="progress-bar bg-success" style="width: 100%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            <div class="d-flex align-items-start">
                                                <i class="fas fa-quote-left text-muted me-2 mt-1" style="font-size: 12px;"></i>
                                                <div>
                                                    <button type="button" class="btn btn-outline-primary btn-sm" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#consultaModal{{ $consulta->id }}">
                                                        Ver Todo
                                                    </button>

                                                </div>
                                            </div>
                                        </td>
                                        <!-- Modal moderno de detalles de la consulta -->
                                        <div class="modal fade" id="consultaModal{{ $consulta->id }}" tabindex="-1" aria-labelledby="consultaModalLabel{{ $consulta->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                                <div class="modal-content border-0 shadow">
                                                    <!-- Header moderno -->
                                                    <div class="modal-header bg-primary text-white border-0 py-4">
                                                        <div class="d-flex align-items-center w-100">
                                                            <div class="bg-white bg-opacity-20 rounded-circle p-3 me-3">
                                                                <i class="fas fa-clipboard-list fs-4"></i>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h4 class="modal-title mb-1" id="consultaModalLabel{{ $consulta->id }}">
                                                                    Detalles de la Consulta Veterinaria
                                                                </h4>
                                                                <small class="opacity-75">
                                                                    <i class="fas fa-calendar me-1"></i>
                                                                    Registro completo de la consulta médica
                                                                </small>
                                                            </div>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                        </div>
                                                    </div>

                                                    <!-- Body del modal -->
                                                    <div class="modal-body p-0">
                                                        <!-- Información de la mascota -->
                                                        <div class="bg-light border-bottom p-4">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                                                        <i class="fas fa-paw text-white fs-4"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <h5 class="mb-1 text-dark">{{ $consulta->mascota->nombre ?? 'Sin nombre' }}</h5>
                                                                    <p class="text-muted mb-0">
                                                                        <i class="fas fa-calendar-check me-1"></i>
                                                                        Consulta realizada el {{ \Carbon\Carbon::parse($consulta->fecha)->format('d/m/Y') }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <span class="badge bg-success rounded-pill px-3 py-2">
                                                                        <i class="fas fa-check-circle me-1"></i>
                                                                        Completada
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Grid de información -->
                                                        <div class="p-4">
                                                            <div class="row g-4">
                                                                <!-- Motivo de consulta -->
                                                                <div class="col-12">
                                                                    <div class="card h-100 border-start border-primary border-4 shadow-sm">
                                                                        <div class="card-body">
                                                                            <div class="d-flex align-items-center mb-3">
                                                                                <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                                    <i class="fas fa-comment-medical text-primary"></i>
                                                                                </div>
                                                                                <h6 class="mb-0 text-primary fw-bold">Motivo de Consulta</h6>
                                                                            </div>
                                                                            <p class="text-dark mb-0">{{ $consulta->motivo }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Anamnésico -->
                                                                <div class="col-md-6">
                                                                    <div class="card h-100 border-start border-info border-4 shadow-sm">
                                                                        <div class="card-body">
                                                                            <div class="d-flex align-items-center mb-3">
                                                                                <div class="bg-info bg-opacity-10 rounded-circle p-2 me-3">
                                                                                    <i class="fas fa-notes-medical text-info"></i>
                                                                                </div>
                                                                                <h6 class="mb-0 text-info fw-bold">Anamnésico</h6>
                                                                            </div>
                                                                            <p class="text-dark mb-0">{{ $consulta->anamnesico }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Estado reproductivo -->
                                                                <div class="col-md-6">
                                                                    <div class="card h-100 border-start border-warning border-4 shadow-sm">
                                                                        <div class="card-body">
                                                                            <div class="d-flex align-items-center mb-3">
                                                                                <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3">
                                                                                    <i class="fas fa-venus-mars text-warning"></i>
                                                                                </div>
                                                                                <h6 class="mb-0 text-warning fw-bold">Estado Reproductivo</h6>
                                                                            </div>
                                                                            <p class="text-dark mb-0">{{ $consulta->estado_reproductivo }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Alimentación -->
                                                                <div class="col-md-6">
                                                                    <div class="card h-100 border-start border-success border-4 shadow-sm">
                                                                        <div class="card-body">
                                                                            <div class="d-flex align-items-center mb-3">
                                                                                <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3">
                                                                                    <i class="fas fa-utensils text-success"></i>
                                                                                </div>
                                                                                <h6 class="mb-0 text-success fw-bold">Alimentación</h6>
                                                                            </div>
                                                                            <p class="text-dark mb-0">{{ $consulta->alimentacion }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Diagnóstico -->
                                                                <div class="col-md-6">
                                                                    <div class="card h-100 border-start border-danger border-4 shadow-sm">
                                                                        <div class="card-body">
                                                                            <div class="d-flex align-items-center mb-3">
                                                                                <div class="bg-danger bg-opacity-10 rounded-circle p-2 me-3">
                                                                                    <i class="fas fa-stethoscope text-danger"></i>
                                                                                </div>
                                                                                <h6 class="mb-0 text-danger fw-bold">Diagnóstico</h6>
                                                                            </div>
                                                                            <p class="text-dark mb-0">{{ $consulta->diagnostico }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Timeline de la consulta -->
                                                            <div class="row mt-4">
                                                                <div class="col-12">
                                                                    <div class="card bg-light border-0">
                                                                        <div class="card-body">
                                                                            <h6 class="text-muted mb-3">
                                                                                <i class="fas fa-clock me-2"></i>
                                                                                Información adicional
                                                                            </h6>
                                                                            <div class="row text-center">
                                                                                <div class="col-md-4">
                                                                                    <div class="border-end border-2 h-100 d-flex flex-column justify-content-center">
                                                                                        <i class="fas fa-calendar text-primary fs-4 mb-2"></i>
                                                                                        <small class="text-muted">Fecha de consulta</small>
                                                                                        <strong class="text-dark">{{ \Carbon\Carbon::parse($consulta->fecha)->format('d/m/Y') }}</strong>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="border-end border-2 h-100 d-flex flex-column justify-content-center">
                                                                                        <i class="fas fa-user-md text-success fs-4 mb-2"></i>
                                                                                        <small class="text-muted">Estado de consulta</small>
                                                                                        <strong class="text-success">Completada</strong>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="h-100 d-flex flex-column justify-content-center">
                                                                                        <i class="fas fa-clock text-warning fs-4 mb-2"></i>
                                                                                        <small class="text-muted">Hace</small>
                                                                                        <strong class="text-dark">{{ \Carbon\Carbon::parse($consulta->fecha)->diffForHumans() }}</strong>
                                                                                    </div>
                                                                                </div> <br>
                                                                                <hr>
                                                                                <div>
                                                                                    <button class="btn btn-dark" id="actualizar"></button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

        

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Footer con estadísticas -->
                    <div class="card-footer bg-light border-0 py-3">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <small class="text-muted d-flex align-items-center">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Mostrando {{ count($consultas ?? []) }} consultas registradas
                                </small>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
</div>
    
  
  <!-- Bootstrap JS Bundle (Popper + Bootstrap JS) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>





