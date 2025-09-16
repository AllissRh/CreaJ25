<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Receta Veterinaria - VitalVet</title>

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
      max-width: 800px;
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
                <li><a class="dropdown-item" href="{{ route('vacunacion.form', $mascota->id) }}"></a></li>
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

<div class="d-flex justify-content-center my-4" style="margin-left: 35px;">
  <div class="btn-group" role="tablist">
    
    <a href="#" class="btn btn-outline-primary active" role="tab">
      Crear Receta
    </a>

    <a href="{{ route('docReceta', $mascota->id) }}" class="btn btn-outline-primary" role="tab">
      Ver Receta
    </a>

  </div>
</div>

<div class="container ">

  <form id="recetaForm" action="{{ route('guardarReceta') }}" method="POST" class="card p-4 shadow-lg">
    @csrf

    <h2 class="text-center mb-4">Receta Médica</h2>

    <div class="mb-3 text-center">
      <input type="hidden" name="paciente_id" value="{{ $mascota->id }}">
      <strong>Dr. <span>{{ Auth::user()->name }}</span></strong><br>
      <!-- 
        <input type="text" class="form-control d-inline w-auto my-2" name="especialidad" placeholder="Especialidad veterinaria" />
      -->
        <div>JVPMV#567</div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label for="paciente" class="form-label">Paciente</label>
        <input type="text" class="form-control" id="paciente" name="paciente" placeholder="{{ $mascota->nombre }}" readonly/>
      </div>
      <div class="col-md-6">
        <label class="form-label">Fecha</label>
        <input type="text" class="form-control" id="fecha-actual" name="fecha" readonly />
      </div>
    </div>

    <h5 class="mt-4">Medicamentos</h5>
    <table class="table table-bordered mt-2">
      <thead class="table-light">
        <tr>
          <th>Cantidad</th>
          <th>Producto</th>
          <th>Dosis</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody id="medicamentos-body">
        <tr>
          <td><input type="text" name="cantidad[]" class="form-control" placeholder="Ejemplo: 5 tab. / caj. /Amp."/></td>
          <td><input type="text" name="producto[]" class="form-control" /></td>
          <td><input type="text" name="dosis[]" class="form-control" /></td>
          <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminarFila(this)">✖</button></td>
        </tr>
      </tbody>
    </table>
    <button type="button" class="btn btn-success btn-sm mb-3" onclick="agregarFila()">+ Agregar Medicamento</button>

    <h5 class="mt-4">Cuidados</h5>
    <ul class="list-group mb-3" id="cuidados-lista">
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <input type="text" name="cuidados[]" class="form-control w-75" placeholder="Indicación de cuidado" />
        <button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuidado(this)">✖</button>
      </li>
    </ul>
    <button type="button" class="btn btn-success btn-sm mb-4" onclick="agregarCuidado()">+ Agregar Cuidado</button>

    <div class="text-center">
      <button type="submit" class="btn btn-primary">Guardar Receta</button>
    </div>
  </form>
</div><br><br>
  <script>
    // Fecha actual
    window.addEventListener('DOMContentLoaded', () => {
      const fechaInput = document.getElementById('fecha-actual');
      const hoy = new Date();
      const fechaFormateada = hoy.toLocaleDateString('es-ES', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
      });
      fechaInput.value = fechaFormateada;
    });

    function agregarFila() {
      const tbody = document.getElementById('medicamentos-body');
      const fila = document.createElement('tr');
      fila.innerHTML = `
        <td><input type="text" name="cantidad[]" class="form-control" /></td>
        <td><input type="text" name="producto[]" class="form-control" /></td>
        <td><input type="text" name="dosis[]" class="form-control" /></td>
        <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminarFila(this)">✖</button></td>
      `;
      tbody.appendChild(fila);
    }

    function eliminarFila(boton) {
      boton.closest('tr').remove();
    }

    function agregarCuidado() {
      const lista = document.getElementById('cuidados-lista');
      const item = document.createElement('li');
      item.className = "list-group-item d-flex justify-content-between align-items-center";
      item.innerHTML = `
        <input type="text" name="cuidados[]" class="form-control w-75" placeholder="Indicación de cuidado" />
        <button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuidado(this)">✖</button>
      `;
      lista.appendChild(item);
    }

    function eliminarCuidado(boton) {
      boton.closest('li').remove();
    }

    
  </script>
  <!-- Contenido -->
  <div class="tab-content">
    <div class="tab-pane fade" id="verReceta" role="tabpanel">
      <!-- Aquí el contenido de la receta -->
    </div>
  </div>
  
  <!-- Bootstrap JS Bundle (Popper + Bootstrap JS) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>