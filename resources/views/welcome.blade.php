<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>VitalVet</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            
            body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fff;
            color: #4A4A8A;
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

            .buttons button {
            background-color: #D2E8F6;
            border: none;
            border-radius: 10px;
            padding: 0.5rem 1rem;
            cursor: pointer;
            font-weight: bold;
            color: #4A4A8A;
            }
            .hero {
            text-align: center;
            padding: 2rem;
            font-size: 1.5rem;
            font-weight: bold;
            }
            .gallery {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            grid-template-rows: repeat(3, 150px);
            gap: 1rem;
            padding: 1rem 2rem;
            }
            .gallery img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 20px;
            }
            .item1 { grid-column: 1 / 2; grid-row: 1 / 3; }
            .item2 { grid-column: 2 / 4; grid-row: 1 / 2; }
            .item3 { grid-column: 2 / 4; grid-row: 2 / 4; }
            .item4 { grid-column: 4 / 6; grid-row: 1 / 4; }
            .item5 { grid-column: 1 / 2; grid-row: 3 / 4; }
            .item6 { grid-column: 6 / 7; grid-row: 1 / 2; }
            .item7 { grid-column: 6 / 7; grid-row: 2 / 4; }

            .section-title {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            padding: 2rem 0 1rem 0;
            position: relative;
            }
            .section-title-icons {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            font-size: 1.5rem;
            color: #4A4A8A;
            margin-bottom: 0.5rem;
            }
            .info-box {
            background-color: #F4F8FB;
            padding: 1rem;
            border-radius: 10px;
            }
            .info-box h4 {
            margin: 0;
            color: #333;
            }
            .info-box p {
            font-size: 0.9rem;
            color: #555;
            }
            .info-image img {
            width: 100%;
            border-radius: 20px;
            }
            
            .section3-DMV{
                margin-top: 50px;
            }

            .section {
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            width: 100%;
            min-height: 400px;
            }

            .section:nth-child(even) {
            background-color: #f4f8fb;
            }

            .text-box, .image-box {
            flex: 1 1 50%;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            }

            .image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            }

            h2 {
            color: #4A4A8A;
            font-weight: bold;
            font-size: 1.7rem;
            margin-bottom: 1rem;
            }

            p {
            font-size: 1rem;
            line-height: 1.6;
            }

            @media (max-width: 768px) {
            .section {
                flex-direction: column;
            }

            .text-box, .image-box {
                width: 100%;
                padding: 1.5rem;
            }

            .image-box {
                height: 300px;
            }
            }

        </style>
    </head>
    <body class="antialiased">
       
                <!-- Navbar -->
        <nav class="navbar navbar-dark fixed-top">
            <div class="container-fluid d-flex justify-content-between align-items-center">

            

            <!-- Logo centrado -->
            <a class="navbar-brand mx-auto" href="#">
                <img src="{{ asset('assets/logo-blanco.png') }}" alt="Vital Vet" class="logo">
            </a>

            <!-- Menú de usuario -->
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person fs-4 me-2"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="{{ route('login') }}">Inicio Sesión</a></li>
                <li><a class="dropdown-item" href="{{ route('register') }}">Registrarse</a></li>
                
                </ul>
            </div>
            </div>
        </nav>

        <!-- Contenido principal -->
        <center><div class="container mt-4">
            <h1>Bienvenido a Vital Vet</h1>
        </div></center>
        </header>

        <div class="hero">
            <p>Servicios Médicos Veterinarios<br>Especializados Para Tus Mascotas.</p>
        </div>

        <section class="gallery">
            <img src="{{ asset('assets/img1_placeholder.jpg') }}" alt="Gato recostado" class="item1">
            <img src="{{ asset('assets/img2_placeholder.jpg') }}"  alt="Gato escondido" class="item2">
            <img src="{{ asset('assets/img3_placeholder.jpg') }}"  alt="Golden" class="item3">
            <img src="{{ asset('assets/img4_placeholder.jpg') }}"  alt="Shiba" class="item4">
            <img src="{{ asset('assets/img5_placeholder.jpg') }}"  alt="Gato acostado" class="item5">
            <img src="{{ asset('assets/img6_placeholder.jpg') }}"  alt="Bulldog" class="item6">
            <img src="{{ asset('assets/img7_placeholder.jpg') }}"  alt="Gato con pañuelo" class="item7">
        </section>

        <div class="section-title">
            Conoce tu VitalVet
        </div>

        <section class="info-section container">
            <div class="row">
            <div class="col-md-6 d-flex flex-column gap-3">
                <div class="info-box">
                <h4><i class="fas fa-heartbeat me-2"></i>Servicio Integral</h4>
                <p>En nuestra clínica veterinaria ofrecemos un servicio integral que cubre todas las necesidades
                    de tu mascota. Desde consultas generales, vacunación y desparasitación y cuidados especiales.
                    Nuestro equipo profesional está comprometido con brindar atención personalizada, diagnósticos
                    precisos y tratamientos efectivos. Contamos con tecnología avanzada y un enfoque preventivo que
                    asegura el bienestar continuo de tu compañero. Nos esforzamos por mantener una relación cercana
                    contigo y tu mascota, garantizando confianza, calidad y cariño en cada visita.</p>
                </div>
                <div class="info-box">
                <h4><i class="fas fa-calendar-check me-2"></i>Tus Citas</h4>
                <p>Gestionar las citas de tu mascota nunca ha sido tan fácil. En nuestra clínica veterinaria te
                    ofrecemos un sistema de agendamiento accesible y eficiente, permitiéndote programar consultas,
                    seguimientos y vacunaciones desde tu celular o computadora. Recibirás una visita importante
                    para tu mascota. Además, se puede reprogramar o cancelar con facilidad. Nuestro objetivo es
                    brindarte comodidad y garantizar que tu mascota reciba atención puntual, evitando esperas innecesarias
                    y mejorando su bienestar de forma continua.</p>
                </div>
                <div class="info-box">
                <h4><i class="fas fa-shield-alt me-2"></i>Confiabilidad</h4>
                <p>La confianza es fundamental cuando se trata de la salud de tu mascota. En nuestra clínica veterinaria
                    te ofrecemos un servicio basado en la transparencia, la experiencia y el compromiso profesional. Nuestro
                    equipo está conformado por veterinarios calificados que trabajan con ética y responsabilidad en cada diagnóstico
                    y tratamiento. Utilizamos equipos modernos y protocolos actualizados para garantizar seguridad y precisión. Nos
                    esforzamos por construir una relación duradera contigo y tu mascota, brindándote tranquilidad en cada visita.</p>
                </div>
                <div class="info-box">
                <h4><i class="fas fa-bolt me-2"></i>Atención inmediata</h4>
                <p>Sabemos que hay momentos en los que cada segundo cuenta. Por eso, en nuestra clínica veterinaria contamos con un
                    servicio de atención inmediata para emergencias. Nuestro equipo está preparado para actuar con rapidez y eficacia,
                    ofreciendo soluciones médicas urgentes con el mayor cuidado y profesionalismo. Disponemos de instalaciones adecuadas
                    y personal capacitado para responder ante cualquier situación crítica, asegurando la estabilidad y recuperación de
                    tu mascota. Tu tranquilidad y su bienestar son nuestra prioridad en todo momento.</p>
                </div>
            </div>
            <div class="col-md-6 info-image">
                <img src="{{ asset('assets/img8_placeholder.jpeg') }}" alt="Perro">
            </div>
            </div>
        </section>

        <div class="section3-DMV">
        <!-- Sección Descripción -->
        <section class="section dot-deco">
            <div class="image-box">
            <img src="{{ asset('assets/img9_placeholder.jpeg') }}" alt="Perro curioso">
            </div>
            <div class="text-box">
            <h2>Descripción</h2>
            <p>VitalVet es una plataforma web diseñada para optimizar y facilitar la atención veterinaria, conectando de forma eficiente a profesionales de la salud animal con los dueños de mascotas. Desarrollada especialmente para clínicas veterinarias, VitalVet permite gestionar el historial médico, citas, recetas y controles médicos de cada mascota desde un solo lugar.</p>

            </div>
        </section>

        <!-- Sección Misión -->
        <section class="section">
            <div class="text-box">
            <h2>Misión</h2>
            <p>En VitalVet, nuestra misión es transformar y facilitar la atención veterinaria mediante una plataforma digital accesible, intuitiva y eficiente. Buscamos mejorar la salud y calidad de vida de las mascotas, proporcionando a veterinarios y propietarios las herramientas necesarias para gestionar de manera organizada los cuidados, citas y tratamientos médicos, fortaleciendo así el vínculo entre las familias y sus animales.</p>
        </p>
            </div>
            <div class="image-box">
            <img src="{{ asset('assets/img10_placeholder.webp') }}" alt="Gato mirando">
            </div>
        </section>

        <!-- Sección Visión -->
        <section class="section dot-deco">
            <div class="image-box">
            <img src="{{ asset('assets/img11_placeholder.jpeg') }}" alt="Perro disfrazado">
            </div>
            <div class="text-box">
            <h2>Visión</h2>
            <p>Convertirnos en una plataforma esencial en el cuidado y la gestión de la salud animal, reconocida por facilitar la conexión entre veterinarios y dueños de mascotas a través de soluciones tecnológicas prácticas, seguras y accesibles. En VitalVet, aspiramos a mejorar continuamente la experiencia de atención veterinaria, promoviendo el bienestar de las mascotas y fortaleciendo su relación con las familias.</p>
    
            </div>
        </section>
        </div>

        <!-- Promo Section -->
        <section class="bg-white text-center py-5 position-relative">
            <h1 class="fw-bold mb-4 display-3" style="color: #4A4A8A;">Para ver más</h1>
            <a href="#" class="btn btn-xl fw-bold text-white px-5 py-3 fs-4" style="background-color: #D2E8F6; border-radius: 30px;">Acede aquí!</a>
        
            <!-- Dots decorativos -->
            <div class="position-absolute top-0 end-0 p-3 d-none d-md-grid" style="gap: 10px; grid-template-columns: repeat(3, 1fr);">
            <span class="rounded-circle" style="width:10px;height:10px;background:#e1b7e3;"></span>
            <span class="rounded-circle" style="width:10px;height:10px;background:#e1b7e3;"></span>
            <span class="rounded-circle" style="width:10px;height:10px;background:#e1b7e3;"></span>
            <span class="rounded-circle" style="width:10px;height:10px;background:#e1b7e3;"></span>
            <span class="rounded-circle" style="width:10px;height:10px;background:#e1b7e3;"></span>
            <span class="rounded-circle" style="width:10px;height:10px;background:#e1b7e3;"></span>
            <span class="rounded-circle" style="width:10px;height:10px;background:#e1b7e3;"></span>
            <span class="rounded-circle" style="width:10px;height:10px;background:#e1b7e3;"></span>
            <span class="rounded-circle" style="width:10px;height:10px;background:#e1b7e3;"></span>
            </div>
        </section>
        
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
        
        <!-- Font Awesome (si no lo tienes ya incluido) -->
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            </body>
</html>
