<!doctype html>
<html lang="en">
    <head>
        <title>Principal</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

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
                    <button class="btn btn-dark dropdown-toggle" type="button" id="menuDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-list fs-4"></i>
                    </button>
                    
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="menuDropdown">
                        <li><a class="dropdown-item active" href="{{ route('perfil') }}">Perfil</a></li>
                        <li><a class="dropdown-item" href="{{ route('home') }}">Inicio</a></li>
                        
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
           
        <br><br>
            <!-- Contenido principal -->
<div class="container my-4">
    <div class="content-box">
        <div class="text-center mb-4">
            @if(Auth::user()->photo)
                <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                     alt="Foto de perfil"
                     class="rounded-circle shadow"
                     style="width: 140px; height: 140px; object-fit: cover; border: 4px solid #aed4ea;">
            @else
                <i class="bi bi-person-circle text-secondary" style="font-size: 7rem;"></i>
            @endif
        </div>

        <p><strong>Nombre Completo: </strong>{{ Auth::user()->name }}</p>
        <p><strong>Correo Electrónico: </strong>{{ Auth::user()->email }}</p>
        <p><strong>Teléfono:</strong> {{ Auth::user()->phone }}</p>
        <p><strong>Dirección:</strong> {{ Auth::user()->address }}</p>
        <p><strong>DUI:</strong> {{ Auth::user()->dui }}</p>

        <hr>

        <section>
            
            <div class="text-end pt-4">
                <button class="btn shadow" style="background-color: #aed4ea; color: #000;" data-bs-toggle="modal" data-bs-target="#registroMascotaModal">
                  + Agregar Mascota
                </button>
              </div>    
              <div id="contenedorMascotas" class="mt-4"></div>

              <!-- Modal de Registro de Mascota -->
<div class="modal fade" id="registroMascotaModal" tabindex="-1" aria-labelledby="registroMascotaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content text-dark">
        <div class="modal-header">
          <h5 class="modal-title" id="registroMascotaModalLabel">Registro de mascota</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
  
        <form action="{{ route('mascotas.store') }}" method="POST" enctype="multipart/form-data" id="formMascota">
          @csrf
          <div class="modal-body">
            <!-- Imagen -->
            <div class="mb-3">
              <label for="imagenMascota" class="form-label">Imagen de la mascota</label>
              <input class="form-control" type="file" id="imagenMascota" name="imagen" accept="image/*">
              <div class="mt-3 text-center">
                <img id="previewImagen" src="#" alt="Vista previa" style="max-width: 200px; display: none;" class="img-fluid rounded shadow">
              </div>
            </div>
  
            <h6 class="mb-3 mt-4">Complete los siguientes datos:</h6>
  
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
              </div>
              <div class="col-md-6 mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido">
              </div>
            </div>
  
            <div class="mb-3">
              <label for="edad" class="form-label">Edad</label>
              <input type="number" class="form-control" id="edad" name="edad">
            </div>
  
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="especie" class="form-label">Especie</label>
                <input type="text" class="form-control" id="especie" name="especie">
              </div>
              <div class="col-md-6 mb-3">
                <label for="raza" class="form-label">Raza</label>
                <input type="text" class="form-control" id="raza" name="raza">
              </div>
            </div>
  
            <div class="mb-3">
              <label for="sexo" class="form-label">Sexo</label>
              <select class="form-select" id="sexo" name="sexo">
                <option selected disabled>Seleccionar</option>
                <option value="Macho">Macho</option>
                <option value="Hembra">Hembra</option>
              </select>
            </div>
  
            <div class="mb-3">
              <label for="color" class="form-label">Color</label>
              <input type="text" class="form-control" id="color" name="color">
            </div>
  
            <div class="mb-3">
              <label for="peso" class="form-label">Peso (kg)</label>
              <input type="number" step="0.1" class="form-control" id="peso" name="peso">
            </div>
  
            <div class="mb-3">
              <label for="alergias" class="form-label">Alergias</label>
              <textarea class="form-control" id="alergias" name="alergias" rows="2"></textarea>
            </div>
          </div>
  
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" id="guardarMascotaBtn" class="btn btn-success">Guardar mascota</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
          
          
             <!-- Bootstrap JS -->
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
          
        </section>

        <div class="mt-4">
            @if($mascotas->isEmpty())
                <div class="text-center">
                    <img src="{{ asset('assets/dog.png') }}" style="width: 250px;" alt="Mascota durmiendo">
                    <p class="text-muted">Todavía no has agregado a tu mascota</p>
                </div>
            @else
                @foreach($mascotas as $mascota)
                    <div class="card mb-3 shadow-sm rounded">
                        <div class="row g-0">
                            <div class="col-md-3 d-flex align-items-center justify-content-center p-2" style="background-color: #e3f2fd;">
                                @if($mascota->imagen)
                                    <img src="{{ asset('storage/' . $mascota->imagen) }}" alt="Mascota" class="img-fluid rounded-circle shadow" style="width: 100px; height: 100px; object-fit: cover;">
                                @else
                                    <img src="https://via.placeholder.com/100x100?text=Mascota" alt="Mascota" class="img-fluid rounded-circle shadow">
                                @endif
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title mb-1"><strong>Nombre:</strong> <span class="text-muted">{{ $mascota->nombre }}</span></h5>
                                    <p class="card-text mb-1"><strong>ID:</strong> <span class="text-muted">{{ $mascota->id }}</span></p>
                                    <p class="card-text"><strong>Especie:</strong> <span class="text-muted">{{ $mascota->especie }}</span></p>
                                    <div class="text-end">
                                      
                                      
                                      <a href="{{ route('perfilPet', ['id' => $mascota->id]) }}" class="btn btn-outline-primary  btn-sm me-2">Ver más</a>
                      

                                      <a href="#" class="btn btn-outline-secondary btn-sm">Editar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        
    </div>
</div>
<div id="plantillaMascota" style="display: none;">
    <div class="card mt-3">
      <div class="card-body">
        <h5 class="card-title mascota-nombre">Nombre</h5>
        <p class="card-text mascota-especie">Especie</p>
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
    <script>
        document.getElementById("formMascota").addEventListener("submit", function (e) {
        // Mostrar la tarjeta ANTES de enviar el form
        const nombre = document.getElementById("nombre").value || "Sin nombre";
        const especie = document.getElementById("especie").value || "Sin especie";
        const id = "ID_AUTOGENERADO"; // Aquí es donde debes poner el ID real

        const plantilla = document.getElementById("plantillaMascota");
        const nuevaTarjeta = plantilla.cloneNode(true);
        nuevaTarjeta.style.display = "block";

        nuevaTarjeta.querySelector(".mascota-nombre").textContent = nombre;
        nuevaTarjeta.querySelector(".mascota-especie").textContent = especie;

        // Aquí es donde debes asignar el href correctamente
        nuevaTarjeta.querySelector(".ver-mascota").href = "/mascota/" + id; // Esto asigna la URL dinámica

        document.getElementById("contenedorMascotas").appendChild(nuevaTarjeta);
        // El formulario se sigue enviando a Laravel normalmente
    });

        // Vista previa de imagen
        document.getElementById("imagenMascota").addEventListener("change", function (event) {
          const input = event.target;
          const reader = new FileReader();
          reader.onload = function () {
            const preview = document.getElementById("previewImagen");
            preview.src = reader.result;
            preview.style.display = "block";
          };
          if (input.files[0]) reader.readAsDataURL(input.files[0]);
        });
      </script>
      

    </body>
</html>


