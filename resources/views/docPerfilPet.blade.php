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
        background-color: #94b8e4;
        color: white;
        padding-top: 56px;
      }

      .navbar {
        background-color: #000;
      }

      .navbar .logo {
        height: 40px;
        width: auto;
      }

      .logo {
        height: 50px;
        max-width: 100%;
        object-fit: contain;
      }

      /* Sidebar styles */
      .sidebar {
        position: fixed;
        top: 0;
        left: -250px;
        width: 250px;
        height: 100%;
        background-color: #343a40;
        transition: 0.3s;
        z-index: 1050;
        padding-top: 60px;
        color: white;
        overflow-y: auto;
      }

      .sidebar.active {
        left: 0;
      }

      .sidebar-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        z-index: 1040;
        display: none;
      }

      .sidebar .sidebar-header {
        padding: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      }

      .sidebar-content {
        padding: 15px 0;
      }

      .sidebar-item {
        padding: 10px 15px;
        display: block;
        color: white;
        text-decoration: none;
        transition: 0.3s;
      }

      .sidebar-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: white;
      }

      .sidebar-divider {
        height: 1px;
        background-color: rgba(255, 255, 255, 0.1);
        margin: 10px 15px;
      }

      .sidebar-icon {
        margin-right: 10px;
        width: 24px;
        text-align: center;
      }

      .img-user-sidebar {
        width: 40px;
        height: 40px;
      }

      #sidebar {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }

      @media (max-width: 576px) {
        .navbar .navbar-brand {
          margin-left: auto;
          margin-right: auto;
        }
      }

          .carousel-container {
      position: relative;
      max-width: 100%;
      overflow: hidden;
      padding: 0 50px;
      }

      .carousel-track {
        display: flex;
        transition: transform 0.5s ease;
      }

      .carousel-card {
        flex: 0 0 33.3333%;
        max-width: 33.3333%;
        padding: 1rem;
        box-sizing: border-box;
      }

      .carousel-card .card img {
        height: 150px;
        object-fit: cover;
      }

      .carousel-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        z-index: 10;
      }

      .carousel-arrow:hover {
        background-color: rgba(0, 0, 0, 0.8);
      }

      .arrow-left {
        left: 10px;
      }

      .arrow-right {
        right: 10px;
      }

      @media (max-width: 768px) {
        .carousel-card {
          flex: 0 0 100%;
          max-width: 100%;
        }
      }

    </style>
</head>
<body>
  <div class="container-fluid py-5">
  <h1 class="text-center mb-4">Panel del Doctor</h1>

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


    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Contenido de la página -->
    <div class="container my-5">
        <div class="d-flex ficha-horizontal flex-wrap p-4 gap-4 bg-white rounded-4 shadow">
          <!-- Foto -->
<div class="" alt="Foto mascota" class="foto-mascota">
    @if($mascota->imagen)
        <img src="{{ asset('storage/' . $mascota->imagen) }}" alt="Foto mascota" class="foto-mascota">
    @else
        <p>No hay imagen disponible</p>
    @endif
</div>

<!-- Datos generales -->
<div class="flex-grow-1 text-dark">
    <h2 class="titulo-mascota">{{ $mascota->nombre }}</h2>
    <div class="info-title">DATOS GENERALES</div>
    <p class="subtitulo"><strong>ID Mascota: {{ $mascota->id }}</strong></p>  
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
            <p><strong>Alergias:</strong> {{ $mascota->alergias }}</p>
            <p><strong>Estado Reproductivo:</strong> {{ $mascota->est_reproductivo }}</p>
 
    <input type="hidden" name="estado_reproductivo" value="{{ $mascota->estado_reproductivo }}">
        </div>
    </div>
</div>

<!-- Datos del propietario -->
<div class="d-flex ficha-horizontal flex-wrap p-4 gap-4 bg-white rounded-4 shadow mt-4">
  <div class="flex-grow-1 text-dark">
    <div class="info-title-1">PROPIETARIO</div>
    <p><strong>Nombre del titular:</strong> {{ $usuario->name }}</p>
    <p><strong>DUI:</strong> {{ $usuario->dui }}</p>
    <p><strong>Teléfono:</strong> {{ $usuario->phone }}</p>
    <p><strong>Dirección:</strong> {{ $usuario->address }}</p>
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

  <div class="carousel-container">
    <button class="carousel-arrow arrow-left" onclick="moveCarousel(-1)">❮</button>

    <div class="carousel-track" id="carouselTrack">

      <div class="carousel-card">
        <div class="card">
          <img src="{{ asset('assets/receta.jpeg') }}" class="card-img-top" alt="Receta Médica">
          <div class="card-body">
            <h5 class="card-title">Receta Médica</h5>
            <p class="card-text">Crea y revisa recetas para tratamientos específicos de cada mascota.</p>
            <a href="{{ route('docReceta',$mascota->id) }}" class="btn btn-primary">Ver más</a>
          </div>
        </div>
      </div>
      <div class="carousel-card">
        <div class="card">
          <img src="{{ asset('assets/cartilla.jpg') }}" class="card-img-top" alt="Cartilla">
          <div class="card-body">
            <h5 class="card-title">Cartilla Clínica</h5>
            <p class="card-text">Accede a las vacunas, desparasitaciones y tratamientos realizados.</p>
            <a href="{{ route('vacunacion.form', $mascota->id) }}" class="btn btn-primary">Ver más</a>

          </div>
        </div>
      </div>

      <div class="carousel-card">
        <div class="card">
          <img src="{{ asset('assets/cartilla.jpg') }}" class="card-img-top" alt="Cartilla">
          <div class="card-body">
            <h5 class="card-title">Agendar Cita Medica</h5>
            <p class="card-text">Accede para asiganarle una cita <br>a tu paciente.</p>
            <a href="{{ route('vcitas.create', $mascota->id) }}" class="btn btn-primary">
                Asignar 
            </a> 
          </div>
        </div>
      </div>
      <div class="carousel-card">
        <div class="card">
          <img src="{{ asset('assets/control.webp') }}" class="card-img-top" alt="Control Médico">
          <div class="card-body">
            <h5 class="card-title">Control Médico</h5>
            <p class="card-text">Revisa el historial clínico y evolución de cada paciente atendido.</p>
            <a href="{{ route('consultas.create', $mascota->id) }}" class="btn btn-primary">Ver más</a>
          </div>
        </div>
      </div>
    </div>
    
      
      <button class="carousel-arrow arrow-right" onclick="moveCarousel(1)">❯</button>
    </div>
</div>



    <script>
  // Sidebar functionality
  document.addEventListener('DOMContentLoaded', function() {
  const sidebar = document.getElementById('sidebar');
  const sidebarToggle = document.getElementById('sidebarToggle');
  const sidebarOverlay = document.getElementById('sidebarOverlay');

  // Toggle sidebar
  sidebarToggle.addEventListener('click', function() {
    sidebar.classList.toggle('active');
    if (sidebar.classList.contains('active')) {
      sidebarOverlay.style.display = 'block';
    } else {
      sidebarOverlay.style.display = 'none';
    }
  });

  // Close sidebar when clicking outside
  sidebarOverlay.addEventListener('click', function() {
    sidebar.classList.remove('active');
    sidebarOverlay.style.display = 'none';
  });

  // Preview image upload
  document.getElementById('imagenMascota').addEventListener('change', function(event) {
    const preview = document.getElementById('previewImagen');
    const file = event.target.files[0];
    if (file) {
      preview.src = URL.createObjectURL(file);
      preview.style.display = 'block';
    }
    });
  });

  const track = document.getElementById("carouselTrack");
  let currentIndex = 0;
  const totalCards = document.querySelectorAll(".carousel-card").length;
  const cardsVisible = 3;

  function moveCarousel(direction) {
    const maxIndex = totalCards - cardsVisible;
    currentIndex += direction;

    if (currentIndex < 0) currentIndex = 0;
    if (currentIndex > maxIndex) currentIndex = maxIndex;

    const cardWidth = document.querySelector(".carousel-card").offsetWidth;
    track.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
  }
  </script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <!-- Font Awesome (si no lo tienes ya incluido) -->
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

</body>
</html>