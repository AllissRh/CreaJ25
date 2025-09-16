<!doctype html>
<html lang="en">
    <head>
        <title>Inicio Sesión</title>
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
        
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin: 0;
                padding: 0;
            }
            
            .login-container {
                min-height: 100vh;
                display: flex;
            }
            
            .left-section {
                flex: 1;
                background: linear-gradient(135deg, rgba(111, 66, 193, 0.8), rgba(79, 70, 229, 0.8));
                position: relative;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
                color: white;
                overflow: hidden;
            }
            
            .background-image {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                opacity: 0.3;
                z-index: 1;
            }
            
            .content-overlay {
                position: relative;
                z-index: 2;
                padding: 2rem;
                max-width: 500px;
            }
            
            .logo-container {
                margin-bottom: 2rem;
            }
            
            .logo-container img {
                width: 180px;
                height: auto;
                filter: brightness(1.1);
            }
            
            .welcome-title {
                font-size: 2.5rem;
                font-weight: 700;
                margin-bottom: 1.5rem;
                text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
                letter-spacing: 1px;
                text-align: left;
            }
            
            .welcome-subtitle {
                font-size: 1.2rem;
                line-height: 1.6;
                font-weight: 300;
                opacity: 0.95;
                text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
            }
            
            .right-section {
                flex: 1;
                display: flex;
                justify-content: center;
                align-items: center;
                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
                padding: 2rem;
                position: relative;
                overflow: hidden;
            }
            
            /* Formas fluidas decorativas */
            .wave-shape {
                position: absolute;
                left: 0;
                top: 0;
                width: 40%;
                height: 100%;
                background: linear-gradient(135deg, rgba(111, 66, 193, 0.1), rgba(79, 70, 229, 0.05));
                clip-path: polygon(0 0, 100% 0, 75% 25%, 85% 50%, 70% 75%, 80% 100%, 0 100%);
                z-index: 1;
            }
            
            .wave-shape-2 {
                position: absolute;
                left: 0;
                top: 0;
                width: 30%;
                height: 100%;
                background: linear-gradient(135deg, rgba(111, 66, 193, 0.08), rgba(79, 70, 229, 0.03));
                clip-path: polygon(0 0, 90% 0, 65% 30%, 75% 55%, 60% 80%, 70% 100%, 0 100%);
                z-index: 2;
            }
            
            .wave-shape-3 {
                position: absolute;
                left: 0;
                top: 0;
                width: 25%;
                height: 100%;
                background: linear-gradient(135deg, rgba(111, 66, 193, 0.05), rgba(79, 70, 229, 0.02));
                clip-path: polygon(0 0, 80% 0, 55% 35%, 65% 60%, 50% 85%, 60% 100%, 0 100%);
                z-index: 3;
            }
            
            .form-container {
                width: 100%;
                max-width: 450px;
                position: relative;
                z-index: 4;
            }
            
            .logo-form {
                display: block;
                margin: 0 auto 2rem auto;
                width: 120px;
                height: auto;
            }
            
            .form-title {
                text-align: center;
                margin-bottom: 1rem;
                font-size: 1.8rem;
                font-weight: 600;
                color: #2d3748;
                letter-spacing: 0.5px;
            }
            
            .form-subtitle {
                text-align: center;
                margin-bottom: 2.5rem;
                font-size: 0.95rem;
                color: #718096;
                line-height: 1.5;
                font-weight: 400;
            }
            
            .form-group {
                margin-bottom: 1.5rem;
            }
            
            .form-label {
                display: block;
                margin-bottom: 0.5rem;
                font-weight: 500;
                color: #4a5568;
                font-size: 0.95rem;
            }
            
            .form-control {
                width: 100%;
                padding: 0.875rem 1rem;
                border: 2px solid #e2e8f0;
                border-radius: 12px;
                font-size: 1rem;
                transition: all 0.3s ease;
                background: #f7fafc;
            }
            
            .form-control:focus {
                outline: none;
                border-color: #6f42c1;
                background: white;
                box-shadow: 0 0 0 3px rgba(111, 66, 193, 0.1);
            }
            
            .btn-login {
                width: 100%;
                padding: 1rem;
                background: linear-gradient(135deg, #6f42c1, #4f46e5);
                color: white;
                border: none;
                border-radius: 12px;
                font-size: 1.1rem;
                font-weight: 600;
                letter-spacing: 0.5px;
                transition: all 0.3s ease;
                margin-top: 1rem;
            }
            
            .btn-login:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(111, 66, 193, 0.3);
            }
            
            .btn-login:active {
                transform: translateY(0);
            }
            
            /* Responsive design */
            @media (max-width: 768px) {
                .login-container {
                    flex-direction: column;
                }
                
                .left-section {
                    min-height: 40vh;
                }
                
                .right-section {
                    min-height: 60vh;
                }
                
                .welcome-title {
                    font-size: 2rem;
                }
                
                .welcome-subtitle {
                    font-size: 1rem;
                }
                
                .form-container {
                    margin: 1rem;
                }
            }
        </style>
    </head>

    <body>
            <!-- Logo Traductor -->
<div class="dropdown">
    <a href="#" class="d-flex align-items-center text-dark text-decoration-none" 
       id="translateDropdown" 
       data-bs-toggle="dropdown" 
       aria-expanded="false">
        <i class="bi bi-translate fs-4"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="translateDropdown">
        <li>
            <h6 class="dropdown-header">
                <i class="fas fa-language me-2"></i>Seleccionar Idioma
            </h6>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <div class="dropdown-item-text">
                <div id="google_translate_element"></div>
            </div>
        </li>
    </ul>
</div>

<!-- Estilos opcionales -->
<style>
    .goog-te-gadget-simple {
        background-color: #ffffff1f;
        border: none;
        font-size: 10pt;
        padding: 2px 5px;
        cursor: pointer;
    }
         .VIpgJd-ZVi9od-ORHb-OEVmcd {
            z-index: auto !important; /* hace que no aparezca labarra blanca */
            
        }
</style>

<!-- Script Google Translate -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        function googleTranslateElementInit() {
            new google.translate.TranslateElement(
                {
                    pageLanguage: 'es',
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
        addScript.src = "//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit";
        document.body.appendChild(addScript);

        window.googleTranslateElementInit = googleTranslateElementInit;
    });
</script>


        <div class="login-container">
            <!-- Sección izquierda con imagen y texto -->
            <div class="left-section">
                <img src="{{asset("assets/perrini.avif")}}" alt="Background" class="background-image">
                
                <div class="content-overlay">
                    <div class="logo-container">
                        <img src="{{ asset('assets/LOGO-VITALVET.png') }}" alt="VitalVet Logo">
                    </div>
                    
                    <h1 class="welcome-title">BIENVENIDO A VITALVET</h1>
                    
                    <p class="welcome-subtitle">
                        Estás a punto de ingresar a nuestra clínica virtual. 
                        Llena tus datos personales para continuar.
                    </p>
                </div>
            </div>
            
            <!-- Sección derecha con formulario -->
            <div class="right-section">
                <!-- Formas de onda fluidas -->
                <div class="wave-shape"></div>
                <div class="wave-shape-2"></div>
                <div class="wave-shape-3"></div>
                
                <div class="form-container">
                    <!-- Logo de VitalVet -->
                    <img src="{{ asset('assets/LOGO-VITALVET.png') }}" alt="VitalVet Logo" class="logo-form">
                    
                    <h3 class="form-title">INICIAR SESIÓN</h3>
                    
                    <p class="form-subtitle">
                        Necesitaremos tus datos personales para que puedas acceder a tu cuenta, 
                        por favor digite en los siguientes campos:
                    </p>
                    
                    <!-- Formulario (funcionalidad intacta) -->
                    <form action="{{route('login') }}" method="post">
                        @csrf
                        
                        <div class="form-group">
                            <label class="form-label" for="form2Example18">Correo Electrónico:</label>
                            <input type="email" id="form2Example18" class="form-control" name="email" />
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="form2Example28">Contraseña:</label>
                            <input type="password" id="form2Example28" minlength="6" class="form-control" name="password" />
                        </div>
                        
                        <button type="submit" class="btn-login">
                            Ingresar
                        </button>
                    </form>
                </div>
            </div>
        </div>
          
          

        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>