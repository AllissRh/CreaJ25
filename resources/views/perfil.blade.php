<!doctype html>
<html lang="en">
    <head>
        <title>Principal</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        
        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    </head>

    <body>
        @php
          $perfil = isset($usuario) ? $usuario : Auth::user();
          $mascotas = $mascotas ?? $perfil->mascotas;
        @endphp

        <style>
            body {
              background-color: #b2daec;
              color: white;
              padding-top: 56px;
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
            .content-box {
                background-color: #ffffff;
                color: #000;
                border-radius: 1rem; /* Bordes redondeados */
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Sombra bonita */
                padding: 2rem;
                max-width: 700px;
                margin: auto;
            }
            @media (max-width: 576px) {
              .navbar .navbar-brand {
                margin-left: auto;
                margin-right: auto;
              }
            }
          </style>
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


              <br><br>
        <!-- Contenido principal -->
        <div class="container my-4">
            <div class="content-box">
                <div class="text-center mb-4">
                    @if($perfil->photo)
                        <img src="{{ asset('storage/' . $perfil->photo) }}"
                             alt="Foto de perfil"
                             class="rounded-circle shadow"
                             style="width: 140px; height: 140px; object-fit: cover; border: 4px solid #aed4ea;">
                    @else
                        <i class="bi bi-person-circle text-secondary" style="font-size: 7rem;"></i>
                    @endif
                </div>

                <p><strong>Nombre Completo: </strong>{{ $perfil->name }}</p>
                <p><strong>Correo Electrónico: </strong>{{ $perfil->email }}</p>
                <p><strong>Teléfono:</strong> {{ $perfil->phone }}</p>
                <p><strong>Dirección:</strong> {{ $perfil->address }}</p>
                <p><strong>DUI:</strong> {{ $perfil->dui }}</p>

                <hr>

                <section>
                    <div class="text-end pt-4">
                        <button class="btn shadow" style="background-color: #aed4ea; color: #000;" data-bs-toggle="modal" data-bs-target="#registroMascotaModal">
                          + Agregar Mascota
                        </button>
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
 
                <div class="mt-4">
                    <div class="mt-4">
    @if($mascotas->isEmpty())
        <div class="text-center">
            <img src="{{ asset('assets/dog.png') }}" style="width: 250px;" alt="Mascota durmiendo">
            <p class="text-muted">Todavía no has agregado a tu mascota</p>
        </div>
    @else
        @foreach($mascotas as $mascota)
            <div class="card mb-3 shadow-sm rounded">
                <div class="row g-0">
                    <div class="col-md-3 d-flex align-items-center justify-content-center" 
                         style="max-height: 160px; overflow: hidden;">

                        {{-- Imagen de la mascota --}}
                        <img 
                          src="{{ $mascota->imagen ? asset('storage/' . $mascota->imagen) : asset('assets/default.png') }}" 
                          alt="Imagen mascota" 
                          class="shadow" 
                          width="200" 
                          height="auto"
                        >
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h5 class="card-title">{{ $mascota->nombre }} {{ $mascota->apellido }}</h5>
                            <p class="card-text"><strong>Edad:</strong> {{ $mascota->edad }} años</p>
                            <p class="card-text"><strong>Especie:</strong> {{ $mascota->especie }}</p>
                            <div class="text-end">
                                <a href="{{ route('mascotas.edit', $mascota->id) }}" class="btn btn-outline-primary btn-sm">Editar</a>
                                <a href="#" class="btn btn-outline-danger btn-sm">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

            </div>
        </div>
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Bootstrap JS (Popper.js and Bootstrap JS) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+4r8K5mQmI1t9p4y+ns3h/+JH9WUJ" crossorigin="anonymous"></script>


        <script>
            // Vista previa de la imagen seleccionada para la mascota
            const inputImagen = document.getElementById('imagenMascota');
            const previewImagen = document.getElementById('previewImagen');
            if(inputImagen) {
                inputImagen.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if(file) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            previewImagen.src = event.target.result;
                            previewImagen.style.display = 'block';
                        }
                        reader.readAsDataURL(file);
                    } else {
                        previewImagen.style.display = 'none';
                        previewImagen.src = '#';
                    }
                });
            }
        </script>
    </body>
</html>
