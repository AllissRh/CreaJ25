<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil Mascota</title>
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
 <br><br>

    <div class="container my-4">
        
        @extends('layouts.app')

        @section('content')
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div  class="content-box w-100" style="max-width: 500px;">
            
                <center><h2>Editar Mascota: {{ $mascota->nombre ?? '' }}</h2></center>
                <b><p>Propietario: {{ $mascota->user->name ?? 'No definido' }}</p></b>

                <p>ID Mascota: {{ $mascota->id }}</p>


                <form action="{{ route('mascotas.update', $mascota->id) }}" method="POST" enctype="multipart/form-data">

                    
                    @csrf
                    @method('PUT')

                <div class="mb-3">
                    <label for="imagen" class="form-label">Cambiar Imagen</label>
                    <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*" onchange="previewImagen(event)">
                </div>
                <div class="mt-3 text-center">
                    <img id="preview" src="{{ $mascota->imagen ? asset('storage/' . $mascota->imagen) : '#' }}" alt="Vista previa" class="rounded-circle shadow" width="200" height="200" 
                        style="{{ $mascota->imagen ? '' : 'display:none;' }}">
                </div>

                <script>
                function previewImagen(event) {
                    const input = event.target;
                    const preview = document.getElementById('preview');
                    if(input.files && input.files[0]){
                        const reader = new FileReader();
                        reader.onload = function(e){
                            preview.src = e.target.result;
                            preview.style.display = 'block';
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                </script>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $mascota->nombre) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" value="{{ old('apellido', $mascota->apellido ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" name="edad" id="edad" class="form-control" value="{{ old('edad', $mascota->edad) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="especie" class="form-label">Especie</label>
                        <input type="text" name="especie" id="especie" class="form-control" value="{{ old('especie', $mascota->especie) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="raza" class="form-label">Raza</label>
                        <input type="text" name="raza" id="raza" class="form-control" value="{{ old('raza', $mascota->raza) }}">
                    </div>

                    <div class="mb-3">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select name="sexo" id="sexo" class="form-select" required>
                            <option value="">Seleccionar</option>
                            <option value="Macho" {{ old('sexo', $mascota->sexo) == 'Macho' ? 'selected' : '' }}>Macho</option>
                            <option value="Hembra" {{ old('sexo', $mascota->sexo) == 'Hembra' ? 'selected' : '' }}>Hembra</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" name="color" id="color" class="form-control" value="{{ old('color', $mascota->color) }}">
                    </div>

                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso (kg)</label>
                        <input type="number" step="0.1" name="peso" id="peso" class="form-control" value="{{ old('peso', $mascota->peso) }}">
                    </div>

                    <div class="mb-3">
                        <label for="alergias" class="form-label">Alergias</label>
                        <textarea name="alergias" id="alergias" class="form-control" rows="2">{{ old('alergias', $mascota->alergias) }}</textarea>
                    </div>

                   
                    <center>
                        <button type="submit" class="btn btn-success">Actualizar datos</button> 
                        <a href="{{ route('admin.usuarios.mostrar', $mascota->user->id) }}" class="btn btn-secondary">Cancelar</a> <br>
                    </center>
                    
                </form>
            </div>
        </div>
        @endsection
    </div>

</body>
</html>
