
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

<!-- Navbar -->
<nav class="navbar navbar-dark fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="bi bi-list fs-4"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="{{ route('docVista') }}">Panel Principal</a></li>
                <li><a class="dropdown-item active" href="{{ route('vcitas.create', $mascota->id) }}">Crear Cita</a></li>
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
   <!-- Huellitas decorativas con Bootstrap Icons -->
<div class="position-fixed" style="top: 15%; left: 8%; z-index: -1; opacity: 0.45;">
    <i class="bi bi-star text-primary" style="font-size: 3rem;"></i>
</div>
<div class="position-fixed" style="top: 25%; right: 12%; z-index: -1; opacity: 0.45;">
    <i class="bi bi-star-fill" style="font-size: 2.5rem;"></i>
</div>
<div class="position-fixed" style="top: 45%; left: 15%; z-index: -1; opacity: 0.45;">
    <i class="bi bi-circle text-danger" style="font-size: 2rem;"></i>
</div>
<div class="position-fixed" style="top: 35%; right: 8%; z-index: -1; opacity: 0.45;">
    <i class="bi bi-dot text-warning" style="font-size: 3.5rem;"></i>
</div>
<div class="position-fixed" style="top: 60%; left: 5%; z-index: -1; opacity: 0.45;">
    <i class="bi bi-star " style="font-size: 2.8rem;"></i>
</div>
<div class="position-fixed" style="top: 70%; right: 18%; z-index: -1; opacity: 0.45;">
    <i class="bi bi-star text-secondary" style="font-size: 2.3rem;"></i>
</div>
<div class="position-fixed" style="top: 80%; left: 25%; z-index: -1; opacity: 0.45;">
    <i class="bi bi-circle text-danger" style="font-size: 2.6rem;"></i>
</div>
<div class="position-fixed" style="top: 15%; left: 45%; z-index: -1; opacity: 0.45;">
    <i class="bi bi-dot text-success" style="font-size: 2.2rem;"></i>
</div>
<div class="position-fixed" style="top: 85%; right: 5%; z-index: -1; opacity: 0.45;">
    <i class="bi bi-star text-danger" style="font-size: 2.9rem;"></i>
</div>
<div class="position-fixed" style="top: 55%; right: 35%; z-index: -1; opacity: 0.45;">
    <i class="bi bi-star-fill text-warning" style="font-size: 2.4rem;"></i>
</div>
    <div class="d-flex justify-content-center " >
                            
        <div class="btn-group" role="tablist">

            <a href="" class="btn btn-outline-dark active" role="tab">
            Crear Cita
            </a>

            <a href="{{ route('vcitas.porMascota', ['usuarioId' => auth()->user()->id, 'mascotaId' => $mascota->id]) }}" class="btn btn-outline-dark">
                Ver citas de {{ $mascota->nombre }} 
            </a>




        </div>
    </div> <br> <br>

  <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #2563eb;   /* azul */
            --secondary-color: #10b981; /* verde */
            --accent-color: #ef4444;    /* rojo */
            --light-gray: #f9fafb;
            --dark-gray: #374151;
            --border-color: #e5e7eb;
            --radius: 12px;
            --transition: 0.25s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100%;
            justify-content: center;
            align-items: flex-start;
            padding: 2rem;
            background: #f3f4f6;
        }

        /* Calendario */
        .calendar-container {
            max-width: 480px;
            background: white;
            border-radius: var(--radius);
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: var(--transition);
            border: 1px solid var(--border-color);
            margin-bottom: 1.5rem;
        }

        .calendar-header {
            background: var(--primary-color);
            color: white;
            padding: 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .month-year {
            font-size: 1.3rem;
            font-weight: 600;
            text-transform: capitalize;
        }

        .nav-btn {
            background: rgba(255,255,255,0.15);
            border: none;
            color: white;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            cursor: pointer;
            transition: var(--transition);
            font-size: 1.2rem;
        }

        .nav-btn:hover {
            background: rgba(255,255,255,0.3);
            transform: scale(1.1);
        }

        .weekdays, .days-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }

        .weekday {
            text-align: center;
            padding: 0.75rem 0;
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--dark-gray);
            background: var(--light-gray);
            border-bottom: 1px solid var(--border-color);
        }

        .days-grid > div {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
            position: relative;
            border: 1px solid var(--border-color);
            font-size: 0.95rem;
            color: var(--dark-gray);
        }

        .days-grid > div:hover {
            background: var(--primary-color);
            color: white;
            transform: scale(1.05);
            border-radius: var(--radius);
            box-shadow: 0 4px 10px rgba(37,99,235,0.3);
        }

        .days-grid > div.selected {
            background: var(--secondary-color);
            color: white;
            font-weight: 600;
            border-radius: var(--radius);
            box-shadow: 0 4px 12px rgba(16,185,129,0.3);
        }

        /* Formulario */
        #appointmentFormLaravel {
            margin-top: 1.5rem;
            max-width: 480px;
            background: white;
            border-radius: var(--radius);
            padding: 1.5rem;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
            border: 1px solid var(--border-color);
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 0.35rem;
            display: block;
            color: var(--dark-gray);
        }

        .form-select,
        .form-input,
        .form-textarea {
            width: 100%;
            padding: 0.6rem;
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .form-select:focus,
        .form-input:focus,
        .form-textarea:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.15);
        }

        .form-buttons {
            display: flex;
            gap: 0.75rem;
        }

        .btn-primary, .btn-secondary {
            flex: 1;
            padding: 0.65rem;
            font-size: 0.9rem;
            font-weight: 600;
            border: none;
            border-radius: var(--radius);
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: #1e40af;
        }

        .btn-secondary {
            background: #9ca3af;
            color: white;
        }

        .btn-secondary:hover {
            background: #6b7280;
        }

        /* Vista previa */
        #appointmentPreview {
            max-width: 480px;
            margin-top: 20px;
        }

        .preview-card {
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1rem;
            background: white;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            text-align: left;
        }

        .status-badge {
            padding: 0.3rem 0.6rem;
            border-radius: 6px;
            color: white;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .btn-cancel {
            background: #ef4444;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 10px;
        }
    </style>

<center>
    <!-- Contenedor del calendario -->
    <div class="calendar-container">
        <div class="calendar-header">
            <span class="month-year" id="monthYear"></span>
            <div>
                <button class="nav-btn" id="prevMonth">&lt;</button>
                <button class="nav-btn" id="nextMonth">&gt;</button>
            </div>
        </div>
        <div class="weekdays">
            <div class="weekday">Lunes</div>
            <div class="weekday">Martes</div>
            <div class="weekday">Miércoles</div>
            <div class="weekday">Jueves</div>
            <div class="weekday">Viernes</div>
            <div class="weekday">Sábado</div>
            <div class="weekday">Domingo</div>

        </div>
        <div class="days-grid"></div>
    </div>

    <!-- Formulario de cita -->
    
    <form id="appointmentFormLaravel" 
      method="POST" 
      action="{{ route('vcitas.store', ['usuarioId' => Auth::id()]) }}">
        @csrf
        <center><h4>Crear Cita</h4></center>
        <input type="hidden" name="fecha" id="fechaInput">
        <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">


        <div class="form-group">
            <label class="form-label">Horarios</label>
            <select class="form-select" name="hora" id="horaSelect">
                <option value="">Seleccionar hora</option>
                <option value="08:00">08:00</option>
                <option value="08:30">08:30</option>
                <option value="09:00">09:00</option>
                <option value="09:30">09:30</option>
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="16:30">16:30</option>
                <option value="17:00">17:00</option>
                <option value="17:30">17:30</option>
                <option value="18:00">18:00</option>
            </select>
        </div>

        <select class="form-select" name="mascota_id" id="mascotaIdSelect">
            <option value="{{ $mascota->id }}">{{ $mascota->nombre }}</option>
        </select>


        <div class="form-group">
            <label class="form-label">Motivo</label>
            <textarea class="form-input form-textarea" name="motivo" id="motivoInput"></textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Estado</label>
            <select class="form-select" name="estado" id="estadoSelect">
                <option value="confirmada">Confirmada</option>

            </select>
        </div>

        <div class="form-buttons">
            <button type="button" class="btn-primary" onclick="saveAppointment()">Guardar</button>
        </div>
    </form>

    <!-- Vista previa -->
    <div id="appointmentPreview" style="display:none;">
        <div class="preview-card" >
            <p><strong>Cita Medica:</strong></p>
            <p id="previewFecha"></p>
            <p id="previewHora"></p>
            <p>MASCOTA: <span id="previewMascota"></span></p>
            <p>MOTIVO: <span id="previewMotivo"></span></p>
            <p>APPOINTMENT STATUS: <span id="previewEstado" class="status-badge"></span></p>
            
        </div>
    </div>
</center>
<script>
    let selectedDate = null;
    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();

    // 🔹 Fechas con citas (desde Laravel)
    const citasMarcadas = @json($citas ?? []); 

    function toggleAppointmentForm() {
        const form = document.getElementById('appointmentFormLaravel');
        form.style.display = form.style.display === 'block' ? 'none' : 'block';
    }

    function selectDate(date) {
        selectedDate = date;
        document.getElementById('fechaInput').value = selectedDate;

        const days = document.querySelectorAll('.day');
        days.forEach(d => d.classList.remove('selected'));
        const clickedDay = document.querySelector(`.day[data-date='${date}']`);
        if (clickedDay && !clickedDay.classList.contains("disabled")) {
            clickedDay.classList.add('selected');
        }
    }

    function saveAppointment() {
        const hora = document.getElementById('horaSelect').value;
        const mascota_id = document.getElementById('mascotaIdSelect').options[0].text;
        const motivo = document.getElementById('motivoInput').value;
        const estado = document.getElementById('estadoSelect').value;

        if (!selectedDate) { alert('Por favor seleccione una fecha'); return; }
        if (!hora || !mascota_id || !motivo || !estado) { alert('Por favor complete todos los campos'); return; }

        // Mostrar vista previa
        document.getElementById('previewFecha').textContent = selectedDate;
        document.getElementById('previewHora').textContent = hora;
        document.getElementById('previewMascota').textContent = mascota_id;
        document.getElementById('previewMotivo').textContent = motivo;

        const estadoSpan = document.getElementById('previewEstado');
        estadoSpan.textContent = estado.toUpperCase();
        estadoSpan.style.background = estado === 'confirmada' ? '#10b981' : (estado === 'pendiente' ? '#facc15' : '#ef4444');

        document.getElementById('appointmentPreview').style.display = 'block';

        // Guardar en DB
        document.getElementById('fechaInput').value = selectedDate;
        document.getElementById('appointmentFormLaravel').submit();
        
    }

    function renderCalendar(month, year) {
        const daysGrid = document.querySelector('.days-grid');
        const monthYear = document.getElementById('monthYear');
        const firstDay = new Date(year, month, 1).getDay();
        const lastDay = new Date(year, month + 1, 0).getDate();

        monthYear.textContent = `${new Date(year, month).toLocaleString('es-ES', { month: 'long' })} ${year}`;
        daysGrid.innerHTML = '';

        const offset = (firstDay + 6) % 7;
        for (let i=0; i<offset; i++) {
            const emptyDiv = document.createElement('div');
            emptyDiv.classList.add('day', 'other-month');
            daysGrid.appendChild(emptyDiv);
        }

        const today = new Date();
        const todayStr = today.toISOString().split("T")[0];

        for (let d=1; d<=lastDay; d++) {
            const dayDiv = document.createElement('div');
            dayDiv.classList.add('day');
            const dateStr = `${year}-${String(month+1).padStart(2,'0')}-${String(d).padStart(2,'0')}`;
            dayDiv.setAttribute('data-date', dateStr);
            dayDiv.textContent = d;

            // 🔹 marcar con puntito si hay cita
            if (citasMarcadas.includes(dateStr)) {
                const dot = document.createElement('span');
                dot.style.width = "8px";
                dot.style.height = "8px";
                dot.style.background = "#10b981";
                dot.style.borderRadius = "50%";
                dot.style.position = "absolute";
                dot.style.bottom = "6px";
                dot.style.right = "6px";
                dayDiv.appendChild(dot);
            }

            // 🔹 Deshabilitar días pasados
            if (dateStr < todayStr) {
                dayDiv.classList.add("disabled");
                dayDiv.style.opacity = "0.4";
                dayDiv.style.pointerEvents = "none";
            } else {
                dayDiv.addEventListener('click', () => selectDate(dateStr));
            }

            daysGrid.appendChild(dayDiv);
        }
    }

    document.addEventListener("DOMContentLoaded", () => {
        renderCalendar(currentMonth, currentYear);

        document.getElementById('prevMonth').addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 0) { currentMonth = 11; currentYear--; }
            renderCalendar(currentMonth, currentYear);
        });

        document.getElementById('nextMonth').addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 11) { currentMonth = 0; currentYear++; }
            renderCalendar(currentMonth, currentYear);
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
