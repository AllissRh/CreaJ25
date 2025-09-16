<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Panel de Administración</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet"/>

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  
</head>
<body>
    <style>
                * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
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

        body {
        font-family: 'Quicksand', sans-serif;
        background-color: #f4f6f8;
        color: #333;
        }

        .admin-container {
        max-width: 900px;
        margin: 30px auto;
        padding: 20px;
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        header h1 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 28px;
        color: #2c3e50;
        }

        .actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
        margin-bottom: 30px;
        }

        .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        background-color: #3498db;
        color: white;
        font-weight: bold;
        transition: background-color 0.3s ease;
        }

        .btn:hover {
        background-color: #2c80b4;
        }

        .btn.primary {
        background-color: #27ae60;
        }

        .btn.primary:hover {
        background-color: #1e8e4d;
        }

        .btn.small {
        font-size: 13px;
        padding: 6px 12px;
        }

        .btn.edit {
        background-color: #f39c12;
        }

        .btn.edit:hover {
        background-color: #d78a0a;
        }

        .btn.delete {
        background-color: #e74c3c;
        }

        .btn.delete:hover {
        background-color: #c0392b;
        }

        .usuarios-section h2 {
        font-size: 22px;
        margin-bottom: 20px;
        }

        .usuario-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        background-color: #fafafa;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        }

        .usuario-info {
        flex: 1;
        min-width: 220px;
        }

        .acciones {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        }

    </style>
  
<!-- Navbar -->
<nav class="navbar navbar-dark fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      
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
  <!-- Main Admin Container -->
  <div class="admin-container container mt-5 pt-5">
    <header>
        <center>Bienvenid@ {{ Auth::user()->name }}</center>
      <h1 class="text-center my-4">Panel del Administrador</h1>
    </header>

    <div class="actions text-center mb-4">
  <button class="btn btn-success me-2" id="btnShowCreateForm">➕ Crear Usuario</button>
  <!--
  <button class="btn btn-primary">📅 Ver Citas Doctores</button>
  -->
</div>

<!-- Formulario para crear usuario -->
<div id="createUserForm" class="container mt-3" style="display:none; max-width: 500px;">
  <h4>Crear Nuevo Usuario</h4>
  <form method="POST" action="{{ route('admin.usuarios.crear') }}">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Correo Electrónico</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="phone">Teléfono:</label>
        <input type="text" name="phone" id="phone" class="form-control" placeholder="Ingrese su teléfono" required>
      </div>
                    

    <div class="mb-3">
      <label class="form-label" for="address">Dirección:</label>
      <input type="text" name="address" id="address" class="form-control" placeholder="Ingrese su dirección" required>
    </div>
    

    <div class="mb-3">
      <label class="form-label" for="dui">DUI:</label>
      <input type="text" name="dui" id="dui" class="form-control" placeholder="Ingrese su número de DUI" required>
    </div>
    
<div class="mb-3">
  <label for="password" class="form-label">Contraseña</label>
  <input type="password" class="form-control" id="password" name="password" 
         pattern="(?=.*[@$!%*?&]).{6,}" 
         title="Debe tener mínimo 6 caracteres e incluir al menos un símbolo (@$!%*?&)" 
         required>
</div>



    <div class="mb-3">
      <label for="tipo_usuario" class="form-label">Tipo de Usuario</label>
      <select class="form-select" id="tipo_usuario" name="tipo_usuario" required>
        <option value="1">Cliente</option>
        <option value="2">Administrador</option>
        <option value="3">Doctor</option>
      </select>
    </div>

    <button type="submit" class="btn btn-success">Crear Usuario</button>
    <button type="button" class="btn btn-secondary" id="btnCancelCreateForm">Cancelar</button>
  </form>
</div>

    <section class="usuarios-section">
        
        <div class="container mt-4">
            <h4><i class="fas fa-users text-purple"></i> Lista de Usuarios</h4>

            @foreach($usuarios as $usuario)
                <div class="card shadow-sm mt-3 p-3">
                    <p><strong>ID:</strong> {{ str_pad($usuario->id, 3, '0', STR_PAD_LEFT) }}</p>
                    <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
                    <p><strong>Email:</strong> {{ $usuario->email }}</p>
                    <p><strong>Rol:</strong>
                        @switch($usuario->tipo_usuario)
                            @case(1) Cliente @break
                            @case(2) Administrador @break
                            @case(3) Doctor @break
                            @case(4) Recepcionista @break
                            @default Desconocido
                        @endswitch
                    </p>

    <div class="d-flex gap-2 mt-2">
                        <a href="{{ route('admin.usuarios.mostrar', ['id' => $usuario->id]) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye" data-id="1"></i> Ver
                        </a>
                        <a href="{{ route('admin.usuarios.editar', ['id' => $usuario->id]) }}" class="btn btn-sm btn-warning text-white">
                            <i class="fas fa-edit" data-id="2"></i> Editar
                        </a>
                    </div>
                </div>
            @endforeach
        </div> 
    </section>


    
  </div>

  <!-- JS -->

    <script>

      // Mostrar/Ocultar formulario crear usuario
      document.getElementById('btnShowCreateForm').addEventListener('click', function () {
        document.getElementById('createUserForm').style.display = 'block';
      });

      document.getElementById('btnCancelCreateForm').addEventListener('click', function () {
        document.getElementById('createUserForm').style.display = 'none';
      });

  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const sidebar = document.getElementById('sidebar');
      const sidebarToggle = document.getElementById('sidebarToggle');
      const sidebarOverlay = document.getElementById('sidebarOverlay');

      sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('active');
        sidebarOverlay.style.display = sidebar.classList.contains('active') ? 'block' : 'none';
      });

      sidebarOverlay.addEventListener('click', function() {
        sidebar.classList.remove('active');
        sidebarOverlay.style.display = 'none';
      });
    });
  </script>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
