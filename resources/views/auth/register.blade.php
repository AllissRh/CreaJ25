
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!doctype html>
<html lang="en">
    <head>
        <title>Registro</title>
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
        <link rel="stylesheet" href="{{asset("assets/estilos.css")}}">
    </head>

    <body>
    
        <section class="vh-100 position-relative">
            <div class="container-fluid">
              <div class="row">
          
                <!-- Columna del formulario -->
                <div class="col-sm-6 d-flex flex-column justify-content-center align-items-center text-black">
                  
                  
                  <!-- Formulario -->
                  <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"  style="width: 23rem;">
                    @csrf <!-- token -->
                    
                    <h3 class="fw-normal mb-3 pb-2 text-center" style="letter-spacing: 1px;">Registro</h3>
                    <br>
                    <!--FOTO  -->
                    <div class="form-outline mb-4">
                        <label for="photo" class="form-label">Foto de perfil:</label>
                        <input type="file" name="photo" class="form-control">

                    </div>
                    
                    <br><br>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Nombre:</label>
                        <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Ingrese su nombre completo"/>
                    </div> 

                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Correo Electrónico:</label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Ingrese su correo electrónico" />
                    </div> 
                                         
                    <!-- Teléfono -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="phone">Teléfono:</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Ingrese su teléfono" required>
                    </div>
                    
                    <!-- Dirección -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="address">Dirección:</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Ingrese su dirección" required>
                    </div>
                    
                    <!-- DUI -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="dui">DUI:</label>
                        <input type="text" name="dui" id="dui" class="form-control" placeholder="Ingrese su número de DUI" required>
                    </div>
  
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example28">Contraseña:</label>
                      <input type="password" name="password" min="5" id="password" class="form-control form-control-lg" 
                      placeholder="Ingrese contraseña" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example28">Confirmar Contraseña:</label>
                        <input type="password" name="password_confirmation" min="5" name="password_confirmation" class="form-control form-control-lg" 
                        placeholder="Ingrese contraseña" />
                      </div>
  
                    <div class="pt-1 mb-4 d-flex justify-content-center">
                      <button type="submit" class="btn btn-lg text-white" style="background-color: #6f42c1;">
                        Crear cuenta
                      </button>
                    </div>
          
                    <p class="small mb-4 text-center">
                      <a class="text-muted" href="#!">¿Has olvidado tu contraseña?</a>
                    </p>
                    <p class="text-center">
                      ¿Ya tienes cuenta? <a href="{{ route('login') }}" class="link-info">Iniciar sesión aquí</a>
                    </p>
                  </form>
                </div>
          
                <!-- Columna de la imagen -->
                <div class="col-sm-6 px-0 d-none d-sm-block position-relative">
                  <!-- Logo encima de la imagen -->
                  <div class="position-absolute top-0 start-50 translate-middle-x mt-3 z-3">
                    <img src="{{ asset('assets/LOGO-VITALVET.png') }}" alt="Logo flotante" style="width: 200px; height: auto;">
                  </div>
                  <!-- overlay -->
                  <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50 z-1"></div>
                  <!-- Texto centrado -->
                    <!-- Texto centrado -->
                    <div class="position-absolute top-50 start-50 translate-middle text-white text-center z-2">
                        <h2 class="fw-bold">EXPERIENCIA</h2><br>
                        <h2 class="fw-bold">CLARIDAD</h2><br>
                        <h2 class="fw-bold">COMPROMISO</h2>
                    </div>
                  <!-- Imagen de fondo -->
                  <img src="{{asset("assets/perregis.webp")}}"
                       alt="Login image" class="w-100 vh-100%" style="object-fit: cover;height:100%; object-position: left;">
                </div>
              </div>
            </div>
          </section>
          
          

        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
