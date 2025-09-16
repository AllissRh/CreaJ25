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

<!-- Contenido principal -->
<!-- Contenido principal -->
<br>
<a href="{{ route('docVista') }}">
    <i class="bi bi-arrow-left-circle fs-1 m-3 flecha"></i>
</a>

<div class="container perfil-container">
    <div class="text-center mb-4">
        <div class="">
            <center><h1>Perfil Propietario</h1></center>
            <div class="text-center mb-4">
                 @if($usuario->photo)
                <img src="{{ asset('storage/' . $usuario->photo) }}" alt="Foto de perfil" class="rounded-circle shadow" style="width: 140px; height: 140px; object-fit: cover; border: 4px solid #aed4ea;">
                @else
                <p class="text-muted">No hay foto de perfil.</p>
                @endif
            </div>
        </div>
    
</div>
 
<div class="card">
        <div class="card-body">
            <p class="card-title"><strong>Dueño de la mascota:</strong>{{ $usuario->name }}</p>
            <p class="card-text"><strong>ID:</strong> {{ $usuario->id }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $usuario->email }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $usuario->phone }}</p>
            <p class="card-text"><strong>Dirección:</strong> {{ $usuario->address }}</p>
            <p class="card-text"><strong>dui:</strong> {{ $usuario->dui }}</p>
        </div>
</div>


<style>
  .mascota-item:hover {
    background-color: #c3dcf4c9;
    cursor: pointer;
    padding: 15px;
    border-radius: 20px;
    transition: background-color 0.3s ease;
  }
</style>

    
                <section>
                    <div class="text-end pt-4">
                        <button class="btn shadow" style="background-color: #aed4ea; color: #000;" data-bs-toggle="modal" data-bs-target="#registroMascotaModal">
                          + Agregar Mascota
                        </button>
                        <a href="{{ route('factura.form', ['usuario' => $usuario->id]) }}" class="btn btn-warning">
    <i class="bi bi-file-earmark-text"></i> Generar Factura
</a>
                        
                    </div>    
                    <div id="contenedorMascotas" class="mt-4"></div>

                    <!-- Modal de Registro de Mascota -->
                    <div class="modal fade" id="registroMascotaModal" tabindex="-1" aria-labelledby="registroMascotaModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content text-dark">
                            <div class="modal-header">
                              <h5 class="modal-title" id="registroMascotaModalLabel">Registro de mascota</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
                      
                            <form action="{{ route('mascotas.store') }}" method="POST" enctype="multipart/form-data" id="formMascota">
                              @csrf
                              <div class="modal-body">
                                <!-- Imagen -->
                                <div class="mb-3">
                                  <label for="imagenMascota" class="form-label">Imagen de la mascota</label>
                                  <input class="form-control" type="file" id="imagenMascota" name="imagen" accept="image/*">
                                  <div class="mt-3 text-center">
                                    <img id="previewImagen" src="#" alt="Vista previa" style="max-width: 200px; display: none;" class="img-fluid rounded shadow">
                                  </div>
                                </div>
                      
                                <h6 class="mb-3 mt-4">Complete los siguientes datos:</h6>
                      
                                <div class="row">
                                    <input type="hidden" name="user_id" value="{{ $usuario->id }}">
                                  <div class="col-md-6 mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                  </div>
                                  <div class="col-md-6 mb-3">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido">
                                  </div>
                                </div>
                      
                                <div class="mb-3">
                                  <label for="edad" class="form-label">Edad</label>
                                  <input type="number" class="form-control" id="edad" name="edad">
                                </div>
                      
                                <div class="row">
                                  <div class="col-md-6 mb-3">
                                    <label for="especie" class="form-label">Especie</label>
                                    <input type="text" class="form-control" id="especie" name="especie">
                                  </div>
                                  <div class="col-md-6 mb-3">
                                    <label for="raza" class="form-label">Raza</label>
                                    <input type="text" class="form-control" id="raza" name="raza">
                                  </div>
                                </div>
                      
                                <div class="mb-3">
                                  <label for="sexo" class="form-label">Sexo</label>
                                  <select class="form-select" id="sexo" name="sexo">
                                    <option selected disabled>Seleccionar</option>
                                    <option value="Macho">Macho</option>
                                    <option value="Hembra">Hembra</option>
                                  </select>
                                </div>
                      
                                <div class="mb-3">
                                  <label for="color" class="form-label">Color</label>
                                  <input type="text" class="form-control" id="color" name="color">
                                </div>
                      
                                <div class="mb-3">
                                  <label for="peso" class="form-label">Peso (kg)</label>
                                  <input type="number" step="0.1" class="form-control" id="peso" name="peso">
                                </div>
                      
                                <div class="mb-3">
                                  <label for="alergias" class="form-label">Alergias</label>
                                  <textarea class="form-control" id="alergias" name="alergias" rows="2"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="estado_reproductivo" class="form-label">Estado reproductivo</label>
                                    <select class="form-select" id="est_reproductivo" name="est_reproductivo" required>
                                        <option selected disabled>Seleccionar</option>
                                        <option value="Entero">Entero</option>
                                        <option value="Castrado">Lactancia</option>
                                        <option value="Esterilizada">Castrado</option>
                                        <option value="Esterilizada">Gestación</option>

                                    </select>
                                    </div>

                              </div>
                      
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" id="guardarMascotaBtn" class="btn btn-success">Guardar mascota</button>
                              </div>
                            </form>
                          </div>
                        </div>
                    </div>
                </section>
            </div>
        </div><div class="container mt-5">
    <!-- Header con título y contador -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="fw-bold text-dark mb-0">
                    <i class="bi bi-heart-fill text-primary me-2"></i>
                    Mis Mascotas
                </h3>
                <span class="badge bg-primary fs-6 px-3 py-2 rounded-pill">
                    {{ count($usuario->mascotas) }} {{ count($usuario->mascotas) == 1 ? 'mascota' : 'mascotas' }}
                </span>
            </div>
            <hr class="mt-3">
        </div>
    </div>

    @if(count($usuario->mascotas) > 0)
        <!-- Lista de mascotas -->
        <div class="row">
            <div class="col-12">
                <ul class="list-group list-group-flush">
                    @foreach($usuario->mascotas as $index => $mascota)
                        <li class="list-group-item mascota-item border-0 mb-4 p-0">
                            <div class="card border-0 shadow-sm h-100" style="border-radius: 20px; overflow: hidden;">
                                <div class="row g-0">
                                    <!-- Imagen de la mascota -->
                                    <div class="col-md-3 col-4">
                                        <div class="position-relative h-100" style="min-height: 180px;">
                                            @if($mascota->imagen)
                                                <img src="{{ asset('storage/' . $mascota->imagen) }}" 
                                                     alt="Imagen de {{ $mascota->nombre }}" 
                                                     class="img-fluid w-100 h-100"
                                                     style="object-fit: cover; border-radius: 20px 0 0 20px;">
                                            @else
                                                <div class="d-flex align-items-center justify-content-center h-100 bg-light"
                                                     style="border-radius: 20px 0 0 20px;">
                                                    <i class="bi bi-paw text-muted" style="font-size: 3rem;"></i>
                                                </div>
                                            @endif
                                            
                                            <!-- Badge de especie -->
                                            <span class="position-absolute top-0 start-0 m-2 badge bg-dark bg-opacity-75 rounded-pill">
                                                {{ $mascota->especie }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Información de la mascota -->
                                    <div class="col-md-7 col-6">
                                        <div class="card-body py-3 px-4">
                                            <!-- Nombre y género -->
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <h5 class="card-title fw-bold mb-1 text-primary">
                                                    {{ $mascota->nombre }} {{ $mascota->apellido ?? '' }}
                                                </h5>
                                                @if($mascota->sexo)
                                                    @if($mascota->sexo == 'Macho')
                                                        <i class="bi bi-gender-male fs-4 text-info"></i>
                                                    @else
                                                        <i class="bi bi-gender-female fs-4 text-danger"></i>
                                                    @endif
                                                @endif
                                            </div>

                                            <!-- Información detallada -->
                                            <div class="row g-2">
                                                <div class="col-sm-6">
                                                    <small class="text-muted d-flex align-items-center mb-1">
                                                        <i class="bi bi-calendar3 me-2"></i>
                                                        <strong>Edad:</strong> <span class="ms-1">{{ $mascota->edad }} años</span>
                                                    </small>
                                                </div>

                                                @if($mascota->raza)
                                                <div class="col-sm-6">
                                                    <small class="text-muted d-flex align-items-center mb-1">
                                                        <i class="bi bi-award me-2"></i>
                                                        <strong>Raza:</strong> <span class="ms-1">{{ $mascota->raza }}</span>
                                                    </small>
                                                </div>
                                                @endif

                                                @if($mascota->peso)
                                                <div class="col-sm-6">
                                                    <small class="text-muted d-flex align-items-center mb-1">
                                                        <i class="bi bi-speedometer2 me-2"></i>
                                                        <strong>Peso:</strong> <span class="ms-1">{{ $mascota->peso }} kg</span>
                                                    </small>
                                                </div>
                                                @endif

                                                @if($mascota->color)
                                                <div class="col-sm-6">
                                                    <small class="text-muted d-flex align-items-center mb-1">
                                                        <i class="bi bi-palette me-2"></i>
                                                        <strong>Color:</strong> <span class="ms-1">{{ $mascota->color }}</span>
                                                    </small>
                                                </div>
                                                @endif
                                            </div>

                                            <!-- Alergias si existen -->
                                            @if($mascota->alergias)
                                            <div class="mt-3">
                                                <div class="alert alert-warning alert-sm py-2 px-3 mb-0" style="border-radius: 10px;">
                                                    <small>
                                                        <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                                        <strong>Alergias:</strong> {{ Str::limit($mascota->alergias, 60) }}
                                                    </small>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Botones de acción -->
                                    <div class="col-md-2 col-2">
                                        <div class="d-flex flex-column justify-content-center align-items-center h-100 p-3">
                                            <a href="{{ route('docMascota', $mascota->id) }}" 
                                               class="btn btn-primary btn-sm rounded-pill px-3 py-2 mb-2"
                                               style="white-space: nowrap;">
                                                <i class="bi bi-eye me-1"></i>
                                                <span class="d-none d-md-inline">Ver</span>
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @else
        <!-- Estado vacío -->
        <div class="row">
            <div class="col-12">
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="bi bi-paw text-muted" style="font-size: 5rem;"></i>
                    </div>
                    <h4 class="text-muted mb-3">No tienes mascotas registradas</h4>
                    <p class="text-muted mb-4 fs-5">¡Agrega tu primera mascota para comenzar!</p>
                    <button class="btn btn-primary btn-lg rounded-pill px-4 py-3" 
                            data-bs-toggle="modal" 
                            data-bs-target="#registroMascotaModal">
                        <i class="bi bi-plus-circle me-2"></i>Registrar Mascota
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>

 <style>
    /* Estilos adicionales para mejorar la apariencia */
    .mascota-item {
        transition: all 0.3s ease;
        animation: fadeInUp 0.6s ease forwards;
    }

    .mascota-item:hover .card {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
    }

    .card {
        transition: all 0.3s ease;
    }

    .btn {
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    .btn-primary:hover {
        box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
    }

    .btn-outline-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
    }

    /* Animación de entrada */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .card-body {
            padding: 1rem !important;
        }
        
        .col-2 {
            flex: 0 0 20%;
            max-width: 20%;
        }
        
        .col-6 {
            flex: 0 0 55%;
            max-width: 55%;
        }
        
        .col-4 {
            flex: 0 0 25%;
            max-width: 25%;
        }
    }

    @media (max-width: 576px) {
        .row.g-0 {
            flex-direction: column;
        }
        
        .col-4, .col-6, .col-2 {
            flex: 0 0 100%;
            max-width: 100%;
        }
        
        .position-relative {
            min-height: 200px !important;
        }
        
        .card-body {
            padding-top: 1rem !important;
        }
    }

    /* Mejoras en badges y alertas */
    .badge {
        font-size: 0.75rem;
        font-weight: 500;
    }

    .alert-sm {
        font-size: 0.875rem;
        border: none;
    }

    /* Iconos */
    .bi {
        vertical-align: middle;
    }

    /* Colores personalizados */
    .text-primary {
        color: #0d6efd !important;
    }

    .bg-primary {
        background-color: #0d6efd !important;
    }
</style>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
