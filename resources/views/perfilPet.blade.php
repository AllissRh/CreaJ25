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
          background-color: #C6E1F1;
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

        @media (max-width: 576px) {
          .navbar .navbar-brand {
            margin-left: auto;
            margin-right: auto;
          }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark fixed-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">
          <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="menuDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-list fs-4"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="menuDropdown">
              <li><a class="dropdown-item active" href="#">Perfil</a></li>
              <li><a class="dropdown-item" href="#">Inicio</a></li>
              <li><a class="dropdown-item" href="#">Citas</a></li>
              <li><a class="dropdown-item" href="#">Cartilla</a></li>
              <li><a class="dropdown-item" href="#">Receta medica</a></li>
              <li><a class="dropdown-item" href="#">Control medico</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
            </ul>
          </div>

          <!-- Logo centrado -->
          <a class="navbar-brand mx-auto" href="#">
            <img src="LOGO-VITALVET-BLANCO.png" alt="Vital Vet" class="logo">
          </a>

          <!-- Menú de usuario -->
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person fs-4 me-2"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="userDropdown">
              <li><a class="dropdown-item" href="#">Cambiar tema</a></li>
              <li><a class="dropdown-item" href="#">Traducir idioma</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Configuración</a></li>
            </ul>
          </div>
        </div>
      </nav>

    <!-- Contenido de la página -->
    <div class="container my-5">
        <div class="d-flex ficha-horizontal flex-wrap p-4 gap-4 bg-white rounded-4 shadow">
          <!-- Foto -->
          <div class="flex-shrink-0">
            <img src="<?php echo $mascota['foto_mascota']; ?>" alt="Foto mascota" class="foto-mascota">
          </div>
          <h1>hollllllllll</h1>
          <!-- Datos generales -->
          <div class="flex-grow-1 text-dark">
            <h2 class="titulo-mascota"><?php echo $mascota['nombre']; ?></h2>
            <p class="subtitulo"><strong>ID Mascota:</strong> <?php echo $mascota['id']; ?></p>
            <p><strong>Nombre del titular:</strong> <?php echo $propietario['nombre']; ?> <?php echo $propietario['apellido']; ?></p>
      
            <div class="info-title">DATOS GENERALES</div>
            <div class="row">
              <div class="col-md-6">
                <p><strong>Nombre:</strong> <?php echo $mascota['nombre']; ?></p>
                <p><strong>Apellido:</strong> <?php echo $mascota['apellido']; ?></p>
                <p><strong>Edad:</strong> <?php echo $mascota['edad']; ?> años</p>
                <p><strong>Especie:</strong> <?php echo $mascota['especie']; ?></p>
                <p><strong>Raza:</strong> <?php echo $mascota['raza']; ?></p>
              </div>
              <div class="col-md-6">
                <p><strong>Sexo:</strong> <?php echo $mascota['sexo']; ?></p>
                <p><strong>Color:</strong> <?php echo $mascota['color']; ?></p>
                <p><strong>Peso:</strong> <?php echo $mascota['peso']; ?> kg</p>
                <p><strong>Alergias:</strong> <?php echo $mascota['alergias']; ?></p>
              </div>
            </div>
          </div>
        </div>
      
        <!-- Datos del propietario debajo -->
        <div class="d-flex ficha-horizontal flex-wrap p-4 gap-4 bg-white rounded-4 shadow mt-4">
          <div class="flex-grow-1 text-dark">
            <div class="info-title-1">PROPIETARIO</div>
            <p><strong>Nombre del titular:</strong> <?php echo $propietario['nombre']; ?> <?php echo $propietario['apellido']; ?></p>
            <p><strong>DUI:</strong> <?php echo $propietario['dui']; ?></p>
            <p><strong>Teléfono:</strong> <?php echo $propietario['telefono']; ?></p>
            <p><strong>Dirección:</strong><br>
              <?php echo $propietario['direccion']; ?>
            </p>
          </div>
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

    <!-- FOOTER -->
    <footer style="background-color: #4A4A8A;" class="text-white py-5">
        <div class="container">
          <div class="row text-center text-md-start">
            <div class="col-md-3 mb-4 mb-md-0">
              <img src="LOGO-VITALVET-BLANCO.png" alt="Logo VitalVet" class="img-fluid mb-2" style="height: 60px;">
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

</body>
</html>