<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>VitalVet</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <<!-- Bootstrap CSS v5.2.1 -->
  <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
  crossorigin="anonymous"
/>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
     body {
              background-color: #ffffff;
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
    :root {
      --primary: #8A86C3;
      --secondary: #5d6dff;
    }
    p{
      text-align: justify
    }
    .main-text h2 {
      color: black;
      font-weight: bold;
    }

    .service-title img,
    .feature img {
      height: 40px;
    }

    .access-button {
      background-color: var(--secondary);
      color: white;
      border-radius: 25px;
      padding: 0.7rem 1.5rem;
      font-weight: bold;
    }

    .access-button:hover {
      background-color: #4b5cd4;
    }

    .footer {
      background-color: var(--primary);
      color: white;
    }

    .footer-bottom {
      border-top: 1px solid white;
      font-size: 0.8rem;
      padding-top: 1rem;
    }

    table th {
      background-color: var(--primary);
      color: white;
    }
  </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark fixed-top">
      <div class="container-fluid d-flex justify-content-between align-items-center">
      <div class="dropdown">
          <button class="btn btn-dark dropdown-toggle" type="button" id="menuDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-list fs-4"></i>
          </button>
          
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="menuDropdown">
              <li><a class="dropdown-item " href="{{ route('perfil') }}">Perfil</a></li>
              <li><a class="dropdown-item active" href="{{ route('home') }}">Inicio</a></li>

              
          </ul>
          
      </div>

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
          <li><center>Bienvenid@<a id="navbarDropdown" class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
              </a></center>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Cambiar tema</a></li>
          <li><a class="dropdown-item" href="#">Traducir idioma</a></li>
          <li><a class="dropdown-item" href="{{ route('confi_perfil') }}">Configuración</a></li>
          <li><hr class="dropdown-divider"></li>
          <!-- Acá reemplazás -->
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

  

  <!-- MAIN TEXT -->
  <section class="main-text text-center py-4">
    <h2 style="color: var(--primary) " >Servicios Médicos Veterinarios Especializados Para Tus Mascotas.</h2>
    <p>Conoce tu VitalVet</p>
  </section>

  <!-- IMAGEN -->
  <section class="text-center mb-4">
    <img src="{{ asset('assets/Perrito.jpg') }}" alt="Perro feliz" class="img-fluid rounded-4" style="max-width: 300px;">
  </section>

  <!-- SERVICIO -->
  <section class="container bg-light rounded p-3 mb-4">
    <div class="service-title d-flex align-items-center justify-content-center gap-2">
      <img src="{{ asset('assets/iconodoc.png') }}" alt="Servicio Integral">
      <strong style="color: #000">Servicio Integral</strong>
    </div>
    <p class="text-muted">En nuestra clínica veterinaria ofrecemos un servicio integral que cubre todas las necesidades de tu mascota. Desde consultas generales, vacunación y desparasitación y cuidados especiales. Nuestro equipo profesional está comprometido con brindar atención personalizada, diagnósticos precisos y tratamientos efectivos. Contamos con tecnología avanzada y un enfoque preventivo que asegura el bienestar 
      continuo de tu compañero. Nos esforzamos por mantener una relación cercana contigo y tu mascota, garantizando confianza, calidad y cariño en cada visita.</p>
  </section>

  <!-- FEATURES -->
  <section class="container text-center my-5">
    <div class="row">
      <div class="col-md-4 mb-4">
        <img src="{{ asset('assets/iconoconfi.png') }}" alt="Confianza">
        <h4 class="fw-bold mt-2" style="color: #000">Confiabilidad</h4>
        <p class="text-muted">La confianza es fundamental cuando se trata de la salud de tu mascota. En nuestra clínica veterinaria te ofrecemos un servicio basado en la transparencia, la experiencia y el compromiso profesional. Nuestro equipo está conformado por veterinarios calificados que trabajan con ética y responsabilidad en cada diagnóstico y tratamiento. Utilizamos equipos modernos y protocolos actualizados para garantizar seguridad y precisión. Nos esforzamos por construir una relación duradera contigo y tu mascota, brindándote tranquilidad en cada visita.</p>
      </div>
      <div class="col-md-4 mb-4">
        <img src="{{ asset('assets/iconocitas.png') }}" alt="Tus Citas">
        <h4 class="fw-bold mt-2" style="color: #000" >Tus Citas</h4>
        <p class="text-muted">Gestionar las citas de tu mascota nunca ha sido tan fácil. En nuestra clínica veterinaria te ofrecemos un sistema de agendamiento accesible y eficiente, permitiéndote programar consultas, seguimientos y vacunaciones desde tu celular o computadora. Recibirás una visita importante para tu mascota. Además, se puede reprogramar o cancelar con facilidad. Nuestro objetivo es brindarte comodidad y garantizar que tu mascota reciba atención puntual, evitando esperas innecesarias y mejorando su bienestar de forma continua.</p>
      </div>
      <div class="col-md-4 mb-4">
        <img src="{{ asset('assets/iconoaten.png') }}" alt="Atención inmediata">
        <h4 class="fw-bold mt-2" style="color: #000" >Atención inmediata</h4>
        <p class="text-muted">Sabemos que hay momentos en los que cada segundo cuenta. Por eso, en nuestra clínica veterinaria contamos con un servicio de atención inmediata para emergencias. Nuestro equipo está preparado para actuar con rapidez y eficacia, ofreciendo soluciones médicas urgentes con el mayor cuidado y profesionalismo. Disponemos de instalaciones adecuadas y personal capacitado para responder ante cualquier situación crítica, asegurando la estabilidad y recuperación de tu mascota. Tu tranquilidad y su bienestar son nuestra prioridad en todo momento.</p>
      </div>
    </div>
  </section>

  <!-- DESCRIPCIÓN Y MISIÓN -->
  <section class="container text-center mb-5">
    <img src="{{ asset('assets/perritoo.jpg') }}" alt="Perro" class="img-fluid rounded mb-3" style="max-width: 400px;">
    <h3 class="text-primary"  >Descripción</h3>
    <p style="color: #000" >VitalVet es una plataforma web diseñada para optimizar y facilitar la atención veterinaria, conectando de forma eficiente a profesionales de la salud animal con los dueños de mascotas. Desarrollada especialmente para clínicas veterinarias, VitalVet permite gestionar el historial médico, citas, recetas y controles médicos de cada mascota desde un solo lugar.</p>

    <img src="{{ asset('assets/Gatitoo.jpg') }}" alt="Gato" class="img-fluid rounded mt-4 mb-3" style="max-width: 400px;">
    <h3 class="text-primary">Misión</h3>
    <p style="color: #000" >En VitalVet, nuestra misión es transformar y facilitar la atención veterinaria mediante una plataforma digital accesible, intuitiva y eficiente. Buscamos mejorar la salud y calidad de vida de las mascotas, proporcionando a veterinarios y propietarios las herramientas necesarias para gestionar de manera organizada los cuidados, citas y tratamientos médicos, fortaleciendo así el vínculo entre las familias y sus animales.</p>
  </section>

  <!-- VISIÓN -->
  <section class="container text-center mb-5">
    <img src="{{ asset('assets/peludito.jpg') }}" alt="Perro disfrazado" class="img-fluid rounded mb-3" style="max-width: 400px;">
    <h3 class="text-primary">Visión</h3>
    <p class="text-muted"  >Convertirnos en una plataforma esencial en el cuidado y la gestión de la salud animal, reconocida por facilitar la conexión entre veterinarios y dueños de mascotas a través de soluciones tecnológicas prácticas, seguras y accesibles. En VitalVet, aspiramos a mejorar continuamente la experiencia de atención veterinaria, promoviendo el bienestar de las mascotas y fortaleciendo su relación con las familias.</p>
    <img src="{{ asset('assets/conejo.jpg') }}" alt="Conejo" class="img-fluid rounded mt-3" style="max-width: 400px;">
  </section>

  <!-- TABLA VACUNAS -->
  <section class="container mb-5">
    <h4 class="text-primary mb-3">Calendario de Vacunación</h4>
    <table class="table table-bordered table-striped text-center">
      <thead>
        <tr>
          <th colspan="2">PERROS</th>
          <th colspan="2">GATOS</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Puppy (Opcional)</td><td>Desde un mes</td>
          <td>Triple Felina (Obligatoria)</td><td>2m, 3m, 4m, anual</td>
        </tr>
        <tr>
          <td>Octuple (Obligatoria)</td><td>2m, 3m, 4m, anual</td>
          <td>Leucemia (Depende test)</td><td>4m, anual</td>
        </tr>
        <tr>
          <td>KC (Opcional)</td><td>4-5m, anual</td>
          <td>Antirrábica (Obligatoria)</td><td>3-4m, anual</td>
        </tr>
        <tr>
          <td>Antirrábica (Obligatoria)</td><td>5-6m, anual</td>
          <td></td><td></td>
        </tr>
      </tbody>
    </table>
  </section>

  <!-- ESLOGAN -->
  <div class="text-center mb-4 fw-bold text-secondary fs-5">Somos tu mejor opción para el cuidado de tu mascota</div>

  <!-- ACCESO -->
  <div class="text-center mb-5">
    <img src="{{ asset('assets/Husky.jpg') }}" alt="Husky" class="img-fluid rounded" style="max-width: 250px;">
    <p class="mt-3">Lleva el control médico de tu mascota con nosotros que somo tu mejor opción</p>
    
  </div>

  <!-- FOOTER -->
  
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


  <div class="footer-bottom text-center mt-3">
        ©2025 VitalVet | Plataforma desarrollada por VitalVet
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS (Opcional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
