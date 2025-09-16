<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel  Doctor - VitalVet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
   <style>
        body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', sans-serif;
        position: relative;
        overflow-x: hidden;
        padding-top: 90px;
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

        .highlight {
        background-color: #e0ecff;
        border-radius: 4px;
        padding: 0 4px;
        }

            .img-grid {
            position: relative;
            height: 500px;
            z-index: 1;
            }

            .custom-img {
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            object-fit: cover;
            position: absolute;
            z-index: 2; /* Para que siempre estén encima de los puntos */
            }
        .img-grid img:nth-child(1) {
            position: absolute;
            top: 0;
            left: 0;
            width: 140px;
            height: 180px;
        }

        .img-grid img:nth-child(2) {
            position: absolute;
            top: 20px;
            left: 160px;
            width: 160px;
            height: 220px;
        }

        .img-grid img:nth-child(3) {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100px;
            height: 140px;
        }

        .img-grid img:nth-child(4) {
            position: absolute;
            bottom: 20px;
            left: 120px;
            width: 120px;
            height: 160px;
        }

        .img-grid img:nth-child(5) {
            position: absolute;
            top: 0;
            right: 0;
            width: 200px;
            height: 300px;
        }

        @media (max-width: 768px) {
            .img-grid {
            height: auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            }

            .img-grid img {
            position: static !important;
            width: 45% !important;
            height: auto !important;
            }
        }

        /* Estilos para Mascotas Sanas */
        .container-mascotas {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        
        .header-mascotas {
            margin-bottom: 30px;
        }
        
        .subtitle-mascotas {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }
        
        .title-mascotas {
            font-size: 80px;
            color: #6b6fae;
            margin-bottom: 20px;
            font-weight: bold;
            line-height: 1;
        }
        
        .pets-display {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 40px 0;
        }
        
        .pet {
            width: 250px;
            height: 300px;
            background-color: #fff;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .pet-left {
            background-color: #93D0F4;
            transform: rotate(-5deg);
            margin-right: 20px;
        }
        
        .pet-middle {
            background-color: #FDD835;
            z-index: 2;
            width: 280px;
            height: 330px;
        }
        
        .pet-right {
            background-color: #151B40;
            transform: rotate(5deg);
            margin-left: 20px;
        }
        
        .pet-container {
            width: 100%;
            height: 100%;
            padding: 15px;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        /* Animal shapes */
        .dog {
            width: 120px;
            height: 120px;
            background-color: #8B4513;
            border-radius: 60px;
            position: relative;
        }
        
        .dog-ears {
            position: absolute;
            top: -20px;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        
        .dog-ear {
            width: 40px;
            height: 45px;
            background-color: #8B4513;
            border-radius: 20px;
        }
        
        .dog-face {
            position: absolute;
            width: 80px;
            height: 50px;
            background-color: #D2B48C;
            border-radius: 40px;
            bottom: 20px;
            left: 20px;
        }
        
        .dog-nose {
            width: 25px;
            height: 15px;
            background-color: #000;
            border-radius: 10px;
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .cat {
            width: 100px;
            height: 100px;
            background-color: #FFA500;
            border-radius: 50px;
            position: relative;
        }
        
        .cat-ears {
            position: absolute;
            top: -15px;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        
        .cat-ear {
            width: 30px;
            height: 30px;
            background-color: #FFA500;
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
        }
        
        .cat-face {
            position: absolute;
            width: 70px;
            height: 40px;
            background-color: #FFDAB9;
            border-radius: 35px;
            bottom: 20px;
            left: 15px;
        }
        
        .cat-nose {
            width: 10px;
            height: 5px;
            background-color: #FF69B4;
            border-radius: 5px;
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .cat-whiskers {
            position: absolute;
            bottom: 18px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            display: flex;
            justify-content: space-between;
        }
        
        .whisker {
            width: 20px;
            height: 1px;
            background-color: #000;
        }
        
        .animal-name {
            font-size: 22px;
            font-weight: bold;
            margin-top: 25px;
            color: white;
        }
        
        .animal-description {
            font-size: 14px;
            margin-top: 10px;
            color: white;
            text-align: center;
            padding: 0 15px;
        }
        
        .main-content-mascotas {
            text-align: center;
            margin: 40px 0;
        }
        
        .main-title-mascotas {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }
        
        .main-description-mascotas {
            font-size: 18px;
            color: #666;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.5;
        }
        
        .cta-button-mascotas {
            background-color: #0F8CFF;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
        }

        @media (max-width: 992px) {
            .title-mascotas {
            font-size: 60px;
            }
            
            .pets-display {
            flex-direction: column;
            gap: 30px;
            }
            
            .pet {
            margin: 0 !important;
            transform: none !important;
            }
        }

        .search-container {
            z-index: 1000;
        }
        
        .search-results {
            max-height: 300px;
            overflow-y: auto;
            z-index: 1001;
            text-align: left; /* Asegura que el texto en los resultados esté alineado a la izquierda */
        }
        
        .result-item {
            padding: 10px 15px;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .result-item:last-child {
            border-bottom: none;
        }
        
        .result-item:hover {
            background-color: #f8f9fa;
        }
        
        .titular-info .nombre {
            font-weight: 600;
            color: #333;
            font-size: 18px;
        }

        /* Estilo que combina con los colores de VitalVet */
        #searchButton {
            background-color: #0F8CFF; 
            border-color: #0F8CFF;
        }

        .ver-perfil {
            background-color: #6b6fae; /* Color similar al de "Mascotas Sanas" */
            border-color: #6b6fae;
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
            translatePage('es'); // español
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

  <center><h1 class="main-title-mascotas"><strong>¡Hola Doctor </strong>{{ Auth::user()->name }}!</h1></center>
<!-- Sección de Mascotas Sanas -->
<div class="container-mascotas">
  <div class="header-mascotas">
    <h2 class="subtitle-mascotas">Más Seguro</h2>
    <h1 class="title-mascotas">Mascotas<br>Sanas.</h1>
  </div>
  
  <div class="pets-display">
    <div class="pet pet-left">
      <div class="pet-container">
        <div class="dog">
          <div class="dog-ears">
            <div class="dog-ear"></div>
            <div class="dog-ear"></div>
          </div>
          <div class="dog-face">
            <div class="dog-nose"></div>
          </div>
        </div>
        <div class="animal-name">Malcon</div>
        <div class="animal-description">Perro · 3 años · Vacunas al día</div>
      </div>
    </div>
    
    <div class="pet pet-middle">
      <div class="pet-container">
        <div class="cat">
          <div class="cat-ears">
            <div class="cat-ear"></div>
            <div class="cat-ear"></div>
          </div>
          <div class="cat-face">
            <div class="cat-nose"></div>
            <div class="cat-whiskers">
              <div class="whisker"></div>
              <div class="whisker"></div>
              <div class="whisker"></div>
            </div>
          </div>
        </div>
        <div class="animal-name">Luna</div>
        <div class="animal-description">Gato · 2 años · Recién desparasitada</div>
      </div>
    </div>
    
    <div class="pet pet-right">
      <div class="pet-container">
        <div class="dog" style="background-color: #6495ED;">
          <div class="dog-ears">
            <div class="dog-ear" style="background-color: #6495ED;"></div>
            <div class="dog-ear" style="background-color: #6495ED;"></div>
          </div>
          <div class="dog-face" style="background-color: #B6D0FF;">
            <div class="dog-nose"></div>
          </div>
        </div>
        <div class="animal-name">Toto</div>
        <div class="animal-description">Perro · 5 años · Control veterinario</div>
      </div>
    </div>
  </div>
  
   <div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-md-8 text-center">
      <!-- Título y texto explicativo -->
      <h4 class="mb-2">Buscador de Titulares</h4>
      <p class="text-muted mb-3">Con esta barra podrás buscar los nombres de tus pacientes y sus dueños para acceder rápidamente a sus perfiles</p>
      
      <!-- Contenedor de la barra de búsqueda -->
      <div class="search-container position-relative" id="searchContainer">
        <!-- Barra de búsqueda -->
        <div class="input-group mb-0">
          <input type="text" class="form-control" placeholder="Nombre del titular" id="searchInput" autocomplete="off">
          <button class="btn btn-danger" type="button" id="searchButton">
            <i class="bi bi-search"></i>
          </button>
        </div>
        
        <!-- Resultados de búsqueda (inicialmente ocultos) -->
        <div class="search-results border rounded shadow-sm bg-white position-absolute w-100 mt-1 d-none" id="searchResults">
        </div>
      </div>
    </div>
  </div>
  <div class="main-content-mascotas">
  <h2 class="main-title-mascotas"><i class="bi bi-calendar3 me-2"></i>Mira todas las citas de hoy</h2>
  <h5>Encuentra tus citas fácil y rápido</h5>
    <br>
    <a href="{{ route('vcitas.todas', ['usuarioId' => auth()->user()->id]) }}" class="btn btn-primary">
        Ver Citas
    </a>


  </div>
</div>

  <!--<div class="main-content-mascotas">
    <h2 class="main-title-mascotas">Mira las citas de hoy!</h2>
    <p class="main-description-mascotas">Encuentra las citas que se han agendado para el dia de hoy o los diferetes dias del mes, agendalas correctamente, recuerda que una mascota saludable es lo mejor que se puede desear.</p>
    <button class="cta-button-mascotas">Mirar Citas</button>
  </div>-->
</div>

<div class="container my-5">
    <div class="row align-items-center">
      <!-- Zona de imágenes -->
      <div class="col-md-6">
        <div class="img-grid">
            <div class="img-grid">
            <img src="{{ asset('assets/img1_placeholder.jpg') }}" class="custom-img" alt="img1">
            <img src="{{ asset('assets/img2_placeholder.jpg') }}" class="custom-img" alt="img2">
            <img src="{{ asset('assets/img7_placeholder.jpg') }}" class="custom-img" alt="img3">
            <img src="{{ asset('assets/img4_placeholder.jpg') }}" class="custom-img" alt="img4">
            <img src="{{ asset('assets/img5_placeholder.jpg') }}" class="custom-img" alt="img5">
            </div>

        </div>
      </div>
      <!-- Zona de texto -->
      <div class="col-md-6">
        <h2 class="fw-bold mb-3">
          Creciendo con <span class="highlight">confianza</span>
        </h2>
        <p>
          Ser un compañero para tu mascota significa embarcarse en un maravilloso viaje. Ayuda a tener un buen control a cada mascota.
        </p>
        <div class="mt-4">
          <h5 class="fw-bold">Creciendo con confianza</h5>
          <p>¡Observa a tus pacientes!</p>
          <a href="{{ route('consultas.index') }}" class="btn btn-success">Control médico</a>
        </div>
      </div>
    </div>
  </div>
  

<footer style="background-color: #4A4A8A;" class="text-white py-5">
    <div class="container">
      <div class="row text-center text-md-start">
        <div class="col-md-3 mb-4 mb-md-0">
          <img src="{{ asset('assets/logo-blanco.png') }}" alt="Logo VitalVet" class="img-fluid mb-2" style="height: 60px;">
        </div>
        <div class="col-md-3">
          <h5 class="fw-bold">SERVICIOS</h5>
          <ul class="list-unstyled">
            <li>Cartilla Veteriaria</li>
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

  <!-- Boton pa chat -->
  <a href="{{ route('doctor.chats') }}" 
    class="btn btn-primary rounded-circle"
    style="
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 60px;
        height: 60px;
        font-size: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1050;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);"
    title="Chats">
    <i class="bi bi-chat-dots-fill"></i>
  </a>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

  <script>
    document.getElementById("searchInput").addEventListener("input", function() {
      const query = this.value.trim();
      const searchResults = document.getElementById("searchResults");

      // Limpiar resultados anteriores
      searchResults.innerHTML = "";
      searchResults.classList.add("d-none");

      if (query.length === 0) {
        return; // No hacer nada si el campo está vacío
      }

      fetch(`/buscar-titulares?q=${encodeURIComponent(query)}`)
        .then((res) => {
          if (!res.ok) throw new Error("Error en la búsqueda");
          return res.json();
        })
        .then((data) => {
          if (data.length > 0) {
            data.forEach((titular) => {
              const item = document.createElement("div");
              item.classList.add("result-item");
              item.innerHTML = `
                <div class="titular-info">
                  <div class="nombre">${titular.name}</div>
                  <div class="text-muted">Email: ${titular.email}</div>
                </div>
                <a href="/docVerPerfil/${titular.id}" class="btn btn-sm btn-primary">Ver perfil</a>
              `;
              searchResults.appendChild(item);
            });
            searchResults.classList.remove("d-none");
          } else {
            searchResults.innerHTML = '<div class="result-item">No se encontraron resultados</div>';
            searchResults.classList.remove("d-none");
          }
        })
        .catch(() => {
          searchResults.innerHTML = '<div class="result-item text-danger">Error al buscar titulares</div>';
          searchResults.classList.remove("d-none");
        });
    });
  </script>


</body>
</html>