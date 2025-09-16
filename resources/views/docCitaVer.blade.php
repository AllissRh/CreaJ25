
<!doctype html>
<html lang="en">
<head>
    <title>Cita-VitalVet</title>
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
<br>
    



 <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --light-gray: #f8f9fa;
            --medium-gray: #6c757d;
            --dark-gray: #495057;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .appointments-container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.1),
                0 8px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.08);
            animation: fadeInUp 0.6s ease-out;
        }

        .table-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
            color: white;
            padding: 2rem;
            text-align: center;
            border-bottom: 3px solid rgba(255, 255, 255, 0.1);
        }

        .table-header h2 {
            margin: 0;
            font-weight: 700;
            font-size: 1.8rem;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .table-header .subtitle {
            font-size: 1rem;
            opacity: 0.9;
            font-weight: 400;
            margin-top: 0.5rem;
        }

        .table-body {
            padding: 0;
            background: white;
        }

        .appointments-table {
            margin: 0;
            border: none;
            background: transparent;
        }

        .appointments-table thead {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-bottom: 2px solid #dee2e6;
        }

        .appointments-table thead th {
            padding: 1.25rem 1rem;
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--dark-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            border-right: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
            background: transparent;
        }

        .appointments-table thead th:last-child {
            border-right: none;
        }

        .appointments-table thead th::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 10%;
            right: 10%;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--secondary-color), transparent);
        }

        .appointments-table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .appointments-table tbody tr:hover {
            background: linear-gradient(135deg, rgba(52, 152, 219, 0.02) 0%, rgba(52, 152, 219, 0.05) 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.1);
        }

        .appointments-table tbody td {
            padding: 1.25rem 1rem;
            vertical-align: middle;
            border: none;
            border-right: 1px solid rgba(0, 0, 0, 0.03);
            font-weight: 500;
            color: var(--dark-gray);
        }

        .appointments-table tbody td:last-child {
            border-right: none;
        }

        /* Estilos especiales para columnas específicas */
        .mascota-cell {
            font-weight: 600;
            color: var(--primary-color);
        }

        .mascota-cell::before {
            content: '🐾';
            margin-right: 0.5rem;
            font-size: 1.1em;
        }

        .fecha-cell {
            font-family: 'Courier New', monospace;
            font-weight: 600;
            color: var(--secondary-color);
            white-space: nowrap;
        }

        .fecha-cell::before {
            content: '📅';
            margin-right: 0.5rem;
        }

        .hora-cell {
            font-family: 'Courier New', monospace;
            font-weight: 700;
            color: var(--warning-color);
            text-align: center;
            white-space: nowrap;
        }

      
        .motivo-cell {
            max-width: 250px;
            word-wrap: break-word;
            line-height: 1.5;
            color: var(--medium-gray);
        }

        .motivo-cell::before {
            content: '📝';
            margin-right: 0.5rem;
        }

        /* Estados con badges elegantes */
        .estado-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .estado-badge:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .estado-pendiente {
            background: linear-gradient(135deg, #f39c12, #e67e22);
            color: white;
        }

        .estado-confirmada {
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            color: white;
        }

        .estado-cancelada {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
        }

        .estado-completada {
            background: linear-gradient(135deg, #8e44ad, #9b59b6);
            color: white;
        }

        /* Estado vacío */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--medium-gray);
        }

        .empty-state .icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }

        .empty-state h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark-gray);
        }

        .empty-state p {
            font-size: 1rem;
            opacity: 0.8;
        }

        /* Animaciones */
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

        .appointments-table tbody tr {
            animation: fadeInRow 0.4s ease-out;
            animation-fill-mode: both;
        }

        .appointments-table tbody tr:nth-child(1) { animation-delay: 0.1s; }
        .appointments-table tbody tr:nth-child(2) { animation-delay: 0.15s; }
        .appointments-table tbody tr:nth-child(3) { animation-delay: 0.2s; }
        .appointments-table tbody tr:nth-child(4) { animation-delay: 0.25s; }
        .appointments-table tbody tr:nth-child(5) { animation-delay: 0.3s; }
        .appointments-table tbody tr:nth-child(n+6) { animation-delay: 0.35s; }

        @keyframes fadeInRow {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive */
        @media (max-width: 992px) {
            .appointments-container {
                margin: 0 1rem;
                border-radius: 15px;
            }

            .table-header {
                padding: 1.5rem;
            }

            .table-header h2 {
                font-size: 1.5rem;
            }

            .appointments-table thead th,
            .appointments-table tbody td {
                padding: 1rem 0.75rem;
                font-size: 0.9rem;
            }

            .motivo-cell {
                max-width: 200px;
            }
        }

        @media (max-width: 768px) {
            .appointments-table {
                font-size: 0.85rem;
            }

            .appointments-table thead th,
            .appointments-table tbody td {
                padding: 0.75rem 0.5rem;
            }

            .estado-badge {
                padding: 0.4rem 0.8rem;
                font-size: 0.8rem;
            }

            .motivo-cell {
                max-width: 150px;
            }

            .table-header h2 {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        /* Scroll horizontal para móviles */
        .table-responsive {
            border-radius: 0;
            border: none;
        }

        .table-responsive::-webkit-scrollbar {
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--secondary-color), #5dade2);
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #2980b9, var(--secondary-color));
        }
    </style>

<div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="mb-0 fw-bold"><i class="bi bi-calendar-check me-2"></i>Gestión de Citas Veterinarias</h4>
                    </div>
                    
                    <div class="card-body p-4">
                        <!-- Formulario de filtros -->
                        <div class="bg-light border rounded-3 p-3 mb-4">
                            <form method="GET" action="{{ route('vcitas.todas', $usuario->id) }}">
                                <div class="row g-3 align-items-end">
                                    <div class="col-md-3">
                                        <label for="nombre" class="form-label text-secondary fw-semibold small">
                                            <i class="bi bi-search me-1"></i>Mascota
                                        </label>
                                        <input type="text" name="nombre" id="nombre" 
                                               class="form-control form-control-sm border shadow-sm" 
                                               placeholder="Nombre de la mascota" 
                                               value="{{ request('nombre') }}">
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <label for="estado" class="form-label text-secondary fw-semibold small">
                                            <i class="bi bi-filter me-1"></i>Estado
                                        </label>
                                        <select name="estado" id="estado" class="form-select form-select-sm border shadow-sm">
                                            <option value="">Todos</option>
                                            <option value="pendiente" {{ request('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                            <option value="confirmada" {{ request('estado') == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                                            <option value="cancelada" {{ request('estado') == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label for="fecha" class="form-label text-secondary fw-semibold small">
                                            <i class="bi bi-calendar3 me-1"></i>Fecha
                                        </label>
                                        <input type="date" name="fecha" id="fecha" 
                                               class="form-control form-control-sm border shadow-sm" 
                                               value="{{ request('fecha') }}">
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-primary btn-sm px-3">
                                                <i class="bi bi-search me-1"></i>Filtrar
                                            </button>
                                            <a href="{{ route('vcitas.todas', $usuario->id) }}" 
                                               class="btn btn-outline-secondary btn-sm px-3">
                                                <i class="bi bi-arrow-clockwise me-1"></i>Limpiar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Tabla de resultados -->
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col" class="fw-bold">
                                            Mascota
                                        </th>
                                        <th scope="col" class="fw-bold">
                                            <i class="bi bi-calendar3 me-2"></i>Fecha
                                        </th>
                                        <th scope="col" class="fw-bold">
                                            <i class="bi bi-clock me-2"></i>Hora
                                        </th>
                                        <th scope="col" class="fw-bold">
                                            <i class="bi bi-clipboard-heart me-2"></i>Motivo
                                        </th>
                                        <th scope="col" class="fw-bold text-center">
                                            <i class="bi bi-info-circle me-2"></i>Estado
                                        </th>
                                        <th scope="col" class="fw-bold text-center">
                                            <i class="bi bi-gear me-2"></i>Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @forelse($todasCitas as $cita)
                                        <tr class="border-bottom">
                                            <td class="fw-semibold text-primary">{{ $cita->mascota->nombre }}</td>
                                            <td class="text-muted">{{ $cita->fecha }}</td>
                                            <td class="text-muted">{{ $cita->hora }}</td>
                                            <td>{{ $cita->motivo }}</td>
                                            <td class="text-center">
                                                <span class="badge fs-6 px-3 py-2 rounded-pill
                                                    @if($cita->estado == 'pendiente') bg-warning text-dark
                                                    @elseif($cita->estado == 'confirmada') bg-success
                                                    @else bg-secondary @endif">
                                                    @if($cita->estado == 'pendiente')
                                                        <i class="bi bi-clock-history me-1"></i>
                                                    @elseif($cita->estado == 'confirmada')
                                                        <i class="bi bi-check-circle me-1"></i>
                                                    @else
                                                        <i class="bi bi-x-circle me-1"></i>
                                                    @endif
                                                    {{ ucfirst($cita->estado) }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <!-- Botón Editar -->
                                                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editCitaModal{{ $cita->id }}">
                                                    <i class="bi bi-pencil-square me-1"></i>Editar
                                                </button>
                                            </td>
                                            <!-- Modal Editar Cita -->
                                            <div class="modal fade" id="editCitaModal{{ $cita->id }}" tabindex="-1" aria-labelledby="editCitaModalLabel{{ $cita->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{ route('vcitas.update', $cita->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editCitaModalLabel{{ $cita->id }}">Editar Cita de " {{ $cita->mascota->nombre }} " </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label>Fecha</label>
                                                                    <input type="date" name="fecha" class="form-control" value="{{ $cita->fecha }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    @php
    $horas = [
        "08:00","08:30","09:00","09:30","10:00","10:30",
        "11:00","11:30","13:00","13:30","14:00","14:30",
        "15:00","15:30","16:00","16:30","17:00","17:30","18:00"
    ];
    $horaCita = \Carbon\Carbon::parse($cita->hora)->format('H:i'); // convierte "9:00:00" a "09:00"
@endphp

<div class="mb-3">
    <label class="form-label">Horarios</label>
    <select class="form-select" name="hora" required>
        @foreach($horas as $hora)
            <option value="{{ $hora }}" {{ $horaCita == $hora ? 'selected' : '' }}>
                {{ $hora }}
            </option>
        @endforeach
    </select>
</div>

                                                                </div>
                                                                <div class="mb-3">
                                                                    <label>Motivo</label>
                                                                    <input type="text" name="motivo" class="form-control" value="{{ $cita->motivo }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label>Estado</label>
                                                                    <select name="estado" class="form-select" required>
                                                                        <option value="pendiente" @if($cita->estado=='pendiente') selected @endif>Pendiente</option>
                                                                        <option value="confirmada" @if($cita->estado=='confirmada') selected @endif>Confirmada</option>
                                                                        <option value="cancelada" @if($cita->estado=='cancelada') selected @endif>Cancelada</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-5">
                                                <div class="text-muted">
                                                    <i class="bi bi-calendar-x display-4 d-block mb-3 text-secondary"></i>
                                                    <h5 class="fw-bold">No hay citas registradas</h5>
                                                    <p class="mb-0">No se encontraron citas que coincidan con los filtros aplicados</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>