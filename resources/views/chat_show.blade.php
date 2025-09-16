<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Chat con {{ $chat->user->name }}</title>
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
    padding-top: 70px;
}

/* Navbar styles */
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
    border: none;
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

/* Chat Container */
.chat-container {
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    background: #fff;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    height: calc(100vh - 100px);
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    backdrop-filter: blur(10px);
}

/* Chat Header */
.chat-header {
    padding: 24px 32px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    display: flex;
    align-items: center;
    gap: 20px;
    position: relative;
    box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
}

.back-button {
    background: rgba(255,255,255,0.2);
    border: none;
    color: white;
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.back-button:hover {
    background: rgba(255,255,255,0.3);
    transform: translateX(-2px);
}

.header-avatar {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: rgba(255,255,255,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 22px;
    flex-shrink: 0;
    border: 3px solid rgba(255,255,255,0.3);
    backdrop-filter: blur(10px);
}

.header-info {
    flex: 1;
}

.header-name {
    font-size: 24px;
    font-weight: 700;
    margin: 0;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.header-status {
    font-size: 14px;
    opacity: 0.9;
    margin: 4px 0 0 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

.online-dot {
    width: 8px;
    height: 8px;
    background: #48bb78;
    border-radius: 50%;
    box-shadow: 0 0 8px rgba(72, 187, 120, 0.6);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.1); opacity: 0.7; }
    100% { transform: scale(1); opacity: 1; }
}

.chat-actions {
    display: flex;
    gap: 12px;
}

.action-btn {
    background: rgba(255,255,255,0.2);
    border: none;
    color: white;
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.action-btn:hover {
    background: rgba(255,255,255,0.3);
    transform: scale(1.05);
}

/* Chat Body */
.chat-body {
    flex: 1;
    padding: 32px;
    overflow-y: auto;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    position: relative;
}

.chat-body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 20% 20%, rgba(102, 126, 234, 0.03) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(118, 75, 162, 0.03) 0%, transparent 50%);
    pointer-events: none;
}

.message {
    margin-bottom: 20px;
    max-width: 75%;
    padding: 16px 20px;
    border-radius: 20px;
    clear: both;
    word-wrap: break-word;
    position: relative;
    animation: messageSlide 0.3s ease;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}

@keyframes messageSlide {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.message-doctor {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    float: right;
    text-align: right;
    border-bottom-right-radius: 6px;
    margin-left: auto;
}

.message-user {
    background: white;
    color: #2d3748;
    float: left;
    border-bottom-left-radius: 6px;
    border: 1px solid rgba(0,0,0,0.06);
}

.message-time {
    font-size: 11px;
    margin-top: 8px;
    opacity: 0.8;
    font-weight: 500;
}

.message-doctor .message-time {
    color: rgba(255,255,255,0.8);
}

.message-user .message-time {
    color: #718096;
}

/* Chat Footer */
.chat-footer {
    padding: 24px 32px;
    background: white;
    display: flex;
    gap: 16px;
    align-items: center;
    border-top: 1px solid rgba(0,0,0,0.06);
    box-shadow: 0 -4px 20px rgba(0,0,0,0.08);
}

.message-input {
    flex: 1;
    padding: 16px 24px;
    border-radius: 25px;
    border: 2px solid #e2e8f0;
    font-size: 15px;
    transition: all 0.3s ease;
    background: #f8fafc;
}

.message-input:focus {
    outline: none;
    border-color: #667eea;
    background: white;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.message-input::placeholder {
    color: #a0aec0;
}

.send-button {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    color: white;
    width: 52px;
    height: 52px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 16px rgba(102, 126, 234, 0.4);
}

.send-button:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
}

.send-button:active {
    transform: scale(0.95);
}

.send-button i {
    font-size: 18px;
}

/* Scrollbar personalizado */
.chat-body::-webkit-scrollbar {
    width: 8px;
}

.chat-body::-webkit-scrollbar-track {
    background: rgba(0,0,0,0.05);
    border-radius: 4px;
}

.chat-body::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 4px;
}

.chat-body::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #5a6fd8, #6b63b5);
}

/* Responsive */
@media (max-width: 768px) {
    .chat-container {
        height: calc(100vh - 80px);
        border-radius: 0;
        margin: 0;
    }
    
    .chat-header {
        padding: 20px;
    }
    
    .header-name {
        font-size: 20px;
    }
    
    .chat-body {
        padding: 20px;
    }
    
    .chat-footer {
        padding: 16px 20px;
    }
    
    .message {
        max-width: 85%;
        padding: 12px 16px;
    }
}

/* Typing indicator */
.typing-indicator {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px 20px;
    background: white;
    border-radius: 20px;
    margin-bottom: 20px;
    max-width: 100px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}

.typing-dot {
    width: 8px;
    height: 8px;
    background: #cbd5e0;
    border-radius: 50%;
    animation: typing 1.4s infinite ease-in-out;
}

.typing-dot:nth-child(1) { animation-delay: -0.32s; }
.typing-dot:nth-child(2) { animation-delay: -0.16s; }

@keyframes typing {
    0%, 80%, 100% {
        transform: scale(0);
        opacity: 0.5;
    }
    40% {
        transform: scale(1);
        opacity: 1;
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
                    <li><a class="dropdown-item" href="{{ route('doctor.chats') }}">Chats</a></li>
                    <li><a class="dropdown-item" href="{{ route('consultas.index') }}">Consultas</a></li>
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

    <div class="chat-container">
        <!-- Chat Header -->
        <div class="chat-header">
            <button class="back-button" onclick="window.location.href='{{ route('doctor.chats') }}'">
                <i class="bi bi-arrow-left"></i>
            </button>
            
            <div class="header-avatar">
                {{ strtoupper(substr($chat->user->name, 0, 1)) }}
            </div>
            
            <div class="header-info">
                <h4 class="header-name">{{ $chat->user->name }}</h4>
                
            </div>
            
            
        </div>

        <!-- Chat Body -->
        <div class="chat-body" id="chatBody">
            @foreach($chat->messages as $message)
                <div class="message {{ $message->sender_id == auth()->id() ? 'message-doctor' : 'message-user' }}">
                    {{ $message->message }}
                    <div class="message-time">
                        {{ $message->created_at->format('H:i') }}
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Chat Footer -->
        <div class="chat-footer">
            <form id="chatForm" class="d-flex w-100 gap-3">
                @csrf
                <input type="text" 
                       id="messageInput" 
                       placeholder="Escribe tu mensaje..." 
                       class="message-input" 
                       required>
                <button type="submit" class="send-button">
                    <i class="bi bi-send-fill"></i>
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Google Translate Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
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
    </script>

    <script>
        const chatId = {{ $chat->id }};
        const chatForm = document.getElementById('chatForm');
        const messageInput = document.getElementById('messageInput');
        const chatBody = document.getElementById('chatBody');

        // Renderizar un mensaje
        function renderMessage(msg, isDoctor) {
            const div = document.createElement('div');
            div.className = `message ${isDoctor ? 'message-doctor' : 'message-user'}`;
            div.innerHTML = `
                ${msg.message}
                <div class="message-time">
                    ${new Date(msg.created_at.replace(' ', 'T')).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}
                </div>
            `;
            chatBody.appendChild(div);
            chatBody.scrollTop = chatBody.scrollHeight;
        }

        // Enviar mensaje
        chatForm.addEventListener('submit', function(e){
            e.preventDefault();
            const message = messageInput.value.trim();
            if(!message) return;

            const formData = new FormData();
            formData.append('message', message);
            formData.append('_token', '{{ csrf_token() }}');

            // Deshabilitar el botón de envío temporalmente
            const sendButton = chatForm.querySelector('.send-button');
            sendButton.style.opacity = '0.6';
            sendButton.disabled = true;

            fetch(`/doctor/chats/${chatId}/send`, {
                method: 'POST',
                body: formData
            })
            .then(res => {
                if (!res.ok) throw new Error('Error en la respuesta del servidor');
                return res.json();
            })
            .then(data => {
                if(data.success){
                    renderMessage(data.message, true); 
                    lastMessageId = data.message.id;
                    messageInput.value = '';
                } else {
                    alert('Error al enviar el mensaje');
                }
            })
            .catch(err => {
                console.error('Error enviando mensaje:', err);
                alert('Error al enviar el mensaje. Revisa consola.');
            })
            .finally(() => {
                // Rehabilitar el botón
                sendButton.style.opacity = '1';
                sendButton.disabled = false;
                messageInput.focus();
            });
        });

        // Actualización automática (polling)
        let lastMessageId = {{ $chat->messages->last()->id ?? 0 }};

        function fetchNewMessages() {
            fetch(`/doctor/chats/${chatId}/messages?after=${lastMessageId}`)
                .then(res => res.json())
                .then(data => {
                    if (data.success && data.messages.length > 0) {
                        data.messages.forEach(msg => {
                            const isDoctor = msg.sender_id === {{ auth()->id() }};
                            renderMessage(msg, isDoctor);
                            lastMessageId = msg.id;
                        });
                    }
                })
                .catch(err => console.error("Error obteniendo mensajes nuevos:", err));
        }

        // Polling cada 3 segundos
        setInterval(fetchNewMessages, 3000);

        // Scroll inicial al final
        chatBody.scrollTop = chatBody.scrollHeight;

        // Auto-resize del textarea y envío con Enter
        messageInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                chatForm.dispatchEvent(new Event('submit'));
            }
        });

        // Mantener el foco en el input
        messageInput.focus();
    </script>

    
</body>
</html>