<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chats Doctor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            overflow: hidden;
            padding-top: 70px; /* Espacio para el navbar fijo */
        }

        /* Navbar styles from VitalVet */
        .navbar {
            background-color: #000;
            z-index: 1050;
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

        /* Google Translate Styles */
        .VIpgJd-ZVi9od-ORHb-OEVmcd {
            z-index: auto !important;
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

        .dropdown-item {
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #495057;
            transform: translateX(5px);
        }

        .main-container {
            height: calc(100vh - 70px); /* Ajustar altura para el navbar */
            display: flex;
            background: white;
            box-shadow: 0 0 50px rgba(0,0,0,0.1);
        }

        /* Sidebar de chats */
        .chats-sidebar {
            width: 420px;
            background: #f8f9fa;
            border-right: 1px solid #e9ecef;
            display: flex;
            flex-direction: column;
            height: calc(100vh - 70px); /* Ajustar para el navbar */
        }

        .sidebar-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 24px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .sidebar-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .search-container {
            position: relative;
            margin-bottom: 8px;
        }

        .search-input {
            width: 100%;
            padding: 12px 16px 12px 45px;
            border: none;
            border-radius: 25px;
            background: rgba(255,255,255,0.15);
            color: white;
            font-size: 14px;
            backdrop-filter: blur(10px);
        }

        .search-input::placeholder {
            color: rgba(255,255,255,0.8);
        }

        .search-input:focus {
            outline: none;
            background: rgba(255,255,255,0.25);
            box-shadow: 0 0 0 2px rgba(255,255,255,0.3);
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255,255,255,0.8);
        }

        .chats-list {
            flex: 1;
            overflow-y: auto;
            padding: 8px 0;
        }

        .chat-item {
            padding: 16px 24px;
            cursor: pointer;
            transition: all 0.2s ease;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            gap: 16px;
            position: relative;
        }

        .chat-item:hover {
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.08) 0%, rgba(118, 75, 162, 0.08) 100%);
        }

        .chat-item.active {
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.15) 0%, rgba(118, 75, 162, 0.15) 100%);
            border-right: 3px solid #667eea;
        }

        .avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 18px;
            flex-shrink: 0;
            box-shadow: 0 3px 12px rgba(102, 126, 234, 0.3);
        }

        .chat-info {
            flex: 1;
            min-width: 0;
        }

        .chat-header-info {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 4px;
        }

        .chat-name {
            font-weight: 600;
            font-size: 16px;
            color: #2d3748;
            margin: 0;
        }

        .chat-time {
            font-size: 12px;
            color: #718096;
            flex-shrink: 0;
        }

        .last-message {
            color: #718096;
            font-size: 14px;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin: 0;
        }

        .chat-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 4px;
        }

        .unread-badge {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 12px;
            padding: 2px 8px;
            font-size: 12px;
            font-weight: 600;
            min-width: 20px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.4);
        }

        .message-status {
            color: #667eea;
            font-size: 14px;
        }

        /* Chat area principal */
        .chat-main {
            flex: 1;
            display: flex;
            flex-direction: column;
            height: calc(100vh - 70px); /* Ajustar para el navbar */
            background: #f7fafc;
        }

        .welcome-screen {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
            padding: 40px;
            text-align: center;
        }

        .welcome-icon {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        .welcome-icon i {
            font-size: 48px;
            color: white;
        }

        .welcome-title {
            font-size: 28px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 12px;
        }

        .welcome-subtitle {
            font-size: 16px;
            color: #718096;
            line-height: 1.6;
            max-width: 400px;
        }

        /* Scrollbar personalizado */
        .chats-list::-webkit-scrollbar {
            width: 6px;
        }

        .chats-list::-webkit-scrollbar-track {
            background: transparent;
        }

        .chats-list::-webkit-scrollbar-thumb {
            background: rgba(102, 126, 234, 0.3);
            border-radius: 3px;
        }

        .chats-list::-webkit-scrollbar-thumb:hover {
            background: rgba(102, 126, 234, 0.5);
        }

    

        .offline-indicator {
            width: 12px;
            height: 12px;
            background: #a0aec0;
            border-radius: 50%;
            position: absolute;
            bottom: 2px;
            right: 2px;
            border: 2px solid white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .chats-sidebar {
                width: 100%;
                position: relative;
            }
            
            .chat-main {
                display: none;
            }
        }

        /* Animaciones */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .chat-item {
            animation: slideIn 0.3s ease forwards;
        }

        .chat-item:nth-child(1) { animation-delay: 0.1s; }
        .chat-item:nth-child(2) { animation-delay: 0.2s; }
        .chat-item:nth-child(3) { animation-delay: 0.3s; }
        .chat-item:nth-child(4) { animation-delay: 0.4s; }
        .chat-item:nth-child(5) { animation-delay: 0.5s; }
    </style>
</head>
<body>
    <!-- Navbar from VitalVet -->
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

            <a class="navbar-brand mx-auto" href="{{ route('docVista') }}">
                <img src="{{ asset('assets/logo-blanco.png') }}" alt="Vital Vet" class="logo">
            </a>
            
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none" 
                   id="translateDropdown" 
                   data-bs-toggle="dropdown" 
                   aria-expanded="false">
                    <i class="bi bi-translate me-2"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="translateDropdown">
                    <li>
                        <h6 class="dropdown-header">
                            <i class="fas fa-language me-2"></i>Seleccionar Idioma
                        </h6>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <div class="dropdown-item-text" style="border: none">
                            <div id="google_translate_element"></div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-person fs-4 me-2"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                    <li><center>Bienvenid@ {{ Auth::user()->name }}</center></li>
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
    <div class="main-container">
        <!-- Sidebar de chats -->
        <div class="chats-sidebar">
            <div class="sidebar-header">
                <div class="sidebar-title">
                    <i class="bi bi-chat-heart-fill"></i>
                    Chat Médico - VitalVet
                </div>
                <div class="search-container">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" class="search-input" id="searchInput" placeholder="Buscar pacientes...">
                </div>
            </div>
            
            <div class="chats-list" id="chatsList">
                @forelse($chats as $index => $chat)
                <a href="{{ route('doctor.chat.show', $chat->id) }}" class="text-decoration-none">
                    <div class="chat-item" data-chat-name="{{ strtolower(optional($chat->user)->name ?? 'Desconocido') }}">
                        <div class="position-relative">
                            <div class="avatar">
    {{ strtoupper(substr(optional($chat->user)->name ?? 'U', 0, 1)) }}
</div>
                            <div class="online-indicator"></div>
                        </div>
                        
                        <div class="chat-info">
                            <div class="chat-header-info">
                                <h6 class="chat-name">{{ optional($chat->user)->name ?? 'Usuario desconocido' }}</h6>
                                <span class="chat-time">
                                    @if($chat->lastMessage)
                                        {{ $chat->lastMessage->created_at->format('H:i') }}
                                    @else
                                        --:--
                                    @endif
                                </span>
                            </div>
                            
                            <div class="chat-meta">
                                <p class="last-message">
                                    @if($chat->lastMessage)
                                        @if($chat->lastMessage->sender_id == auth()->id())
                                            <i class="bi bi-check-all message-status me-1"></i>
                                        @endif
                                        {{ Str::limit($chat->lastMessage->message, 45) }}
                                    @else
                                        <em>Conversación iniciada</em>
                                    @endif
                                </p>
                                
                                @php
                                    $unread = \App\Models\Message::where('chat_id', $chat->id)
                                              ->where('receiver_id', auth()->id())
                                              ->where('seen', false)->count();
                                @endphp
                                
                                @if($unread > 0)
                                    <div class="unread-badge">{{ $unread > 99 ? '99+' : $unread }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                <div class="text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-chat-dots" style="font-size: 48px; color: #cbd5e0;"></i>
                    </div>
                    <h5 class="text-muted">No hay conversaciones</h5>
                    <p class="text-muted small">Los pacientes aparecerán aquí cuando inicien una conversación</p>
                </div>
                @endforelse
            </div>
        </div>
        
        <!-- Área principal del chat -->
        <div class="chat-main">
            <div class="welcome-screen">
                <div class="welcome-icon">
                    <i class="bi bi-chat-heart"></i>
                </div>
                <h2 class="welcome-title">Bienvenido Doctor</h2>
                <p class="welcome-subtitle">
                    Selecciona una conversación de la lista para comenzar a chatear con tus pacientes. 
                    Mantén una comunicación fluida y profesional.
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Google Translate Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inicializar Google Translate
            function googleTranslateElementInit() {
                new window.google.translate.TranslateElement(
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

            const addScript = document.createElement("script");
            addScript.setAttribute(
                "src",
                "//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"
            );
            document.body.appendChild(addScript);
            
            window.googleTranslateElementInit = googleTranslateElementInit;
        });

        function translatePage(language) {
            const selectField = document.querySelector("select.goog-te-combo");
            if (selectField) {
                selectField.value = language;
                selectField.dispatchEvent(new Event('change'));
            } else {
                setTimeout(() => translatePage(language), 500);
            }
            
            const dropdown = bootstrap.Dropdown.getInstance(document.getElementById('translateDropdown'));
            if (dropdown) {
                dropdown.hide();
            }
        }

        function resetLanguage() {
            translatePage('es');
        }
    </script>

<script>
    // Funcionalidad de búsqueda
    document.getElementById('searchInput').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const chatItems = document.querySelectorAll('.chat-item');
        
        chatItems.forEach(item => {
            const chatName = item.getAttribute('data-chat-name');
            const parentLink = item.closest('a');
            
            if (chatName.includes(searchTerm)) {
                parentLink.style.display = 'block';
                item.style.animation = 'slideIn 0.3s ease forwards';
            } else {
                parentLink.style.display = 'none';
            }
        });
    });

    // Marcar chat como activo
    document.querySelectorAll('.chat-item').forEach(item => {
        item.addEventListener('click', function() {
            document.querySelectorAll('.chat-item').forEach(chat => chat.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Simulación de indicadores online
    function updateOnlineStatus() {
        const indicators = document.querySelectorAll('.online-indicator');
        indicators.forEach((indicator, index) => {
            if (Math.random() > 0.3) {
                indicator.classList.remove('offline-indicator');
                indicator.classList.add('online-indicator');
            } else {
                indicator.classList.remove('online-indicator');
                indicator.classList.add('offline-indicator');
            }
        });
    }

    // Actualizar estado cada 30 segundos
    setInterval(updateOnlineStatus, 30000);

</script>

<script>
function updateChats() {
    fetch("{{ route('docchats.refresh') }}")
        .then(res => res.json())
        .then(data => {
            const chatsList = document.getElementById('chatsList');
            chatsList.innerHTML = ''; // Limpiar lista actual

            if (data.length === 0) {
                chatsList.innerHTML = `
                    <div class="text-center p-4">
                        <div class="mb-3">
                            <i class="bi bi-chat-dots" style="font-size: 48px; color: #cbd5e0;"></i>
                        </div>
                        <h5 class="text-muted">No hay conversaciones</h5>
                        <p class="text-muted small">Los pacientes aparecerán aquí cuando inicien una conversación</p>
                    </div>
                `;
                return;
            }

            data.forEach(chat => {
                const a = document.createElement('a');
                a.href = `/doctor/chats/${chat.id}`;
                a.classList.add('text-decoration-none');

                a.innerHTML = `
                    <div class="chat-item" data-chat-name="${chat.name.toLowerCase()}">
                        <div class="position-relative">
                            <div class="avatar">${chat.avatar}</div>
                            <div class="online-indicator"></div>
                        </div>
                        <div class="chat-info">
                            <div class="chat-header-info">
                                <h6 class="chat-name">${chat.name}</h6>
                                <span class="chat-time">${chat.time}</span>
                            </div>
                            <div class="chat-meta">
                                <p class="last-message">
                                    ${chat.sentByMe ? '<i class="bi bi-check-all message-status me-1"></i>' : ''}
                                    ${chat.lastMessage || '<em>Conversación iniciada</em>'}
                                </p>
                                ${chat.unread > 0 ? `<div class="unread-badge">${chat.unread > 99 ? '99+' : chat.unread}</div>` : ''}
                            </div>
                        </div>
                    </div>
                `;
                chatsList.appendChild(a);
            });
        })
        .catch(err => console.error(err));
}

// Llamar cada 5 segundos
setInterval(updateChats, 5000);
updateChats(); // También llamar inmediatamente al cargar
</script>


    
</body>
</html>