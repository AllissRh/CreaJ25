<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recordatorio Veterinario</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #bae6fd 100%);
            padding: 20px;
            margin: 0;
            min-height: 100vh;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid #e1f5fe;
        }
        
        .header {
            background: linear-gradient(135deg, #87ceeb 0%, #b8e0ff 100%);
            padding: 30px 40px;
            text-align: center;
            position: relative;
        }
        
        .notification-icon {
            width: 60px;
            height: 60px;
            background: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            position: relative;
        }
        
        .notification-icon::before {
            content: '🔔';
            font-size: 28px;
            animation: bell-ring 2s ease-in-out infinite;
        }
        
        .notification-icon::after {
            content: '';
            position: absolute;
            top: -5px;
            right: -5px;
            width: 20px;
            height: 20px;
            background: #ff4757;
            border-radius: 50%;
            border: 3px solid white;
        }
        
        @keyframes bell-ring {
            0%, 50%, 100% { transform: rotate(0deg); }
            10%, 30% { transform: rotate(-10deg); }
            20%, 40% { transform: rotate(10deg); }
        }
        
        .header h1 {
            color: #1e3a8a;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .header .subtitle {
            color: #1e40af;
            font-size: 16px;
            font-weight: 500;
            opacity: 0.9;
        }
        
        .content {
            padding: 40px;
            background: #ffffff;
        }
        
        .greeting {
            font-size: 24px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 24px;
            text-align: center;
        }
        
        .pet-info-card {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border: 2px solid #bae6fd;
            border-radius: 12px;
            padding: 24px;
            margin: 24px 0;
            text-align: center;
            position: relative;
        }
        
        .pet-info-card::before {
            content: '🐾';
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: #ffffff;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 20px;
            border: 2px solid #bae6fd;
        }
        
        .pet-name {
            font-size: 22px;
            font-weight: 700;
            color: #1e40af;
            margin-bottom: 12px;
        }
        
        .treatment-info {
            background: #ffffff;
            border-radius: 8px;
            padding: 16px;
            border-left: 4px solid #87ceeb;
            margin: 16px 0;
        }
        
        .treatment-type {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
        }
        
        .date-highlight {
            background: linear-gradient(135deg, #ff6b6b, #ffa500);
            color: white;
            padding: 12px 20px;
            border-radius: 25px;
            font-weight: 700;
            font-size: 16px;
            display: inline-block;
            margin: 16px 0;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }
        
        .reminder-text {
            font-size: 16px;
            line-height: 1.6;
            color: #4b5563;
            margin: 20px 0;
            text-align: center;
            background: #f8fafc;
            padding: 20px;
            border-radius: 10px;
            border-left: 4px solid #87ceeb;
        }
        
        .footer {
            background: #f8fafc;
            padding: 30px 40px;
            text-align: center;
            border-top: 1px solid #e5e7eb;
        }
        
        .footer-message {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.5;
        }
        
        .logo-section {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }
        
        .logo-text {
            color: #87ceeb;
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 5px;
        }
        
        .tagline {
            color: #9ca3af;
            font-size: 12px;
        }
        
        /* Decorative elements */
        .decorative-dots {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 8px;
        }
        
        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            opacity: 0.6;
        }
        
        .dot-1 { background: #ffffff; }
        .dot-2 { background: #bae6fd; }
        .dot-3 { background: #ffffff; }
        
        @media (max-width: 600px) {
            body { padding: 10px; }
            .content, .header, .footer { padding: 20px; }
            .header h1 { font-size: 24px; }
            .greeting { font-size: 20px; }
            .pet-name { font-size: 18px; }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="decorative-dots">
                <div class="dot dot-1"></div>
                <div class="dot dot-2"></div>
                <div class="dot dot-3"></div>
            </div>
            
            <div class="notification-icon"></div>
            
            <h1>Recordatorio Veterinario</h1>
            <div class="subtitle">Vital Vet - Cuidando la salud de tu mascota</div>
        </div>
        
        <div class="content">
            <div class="greeting">
                ¡Hola {{ $cartilla->mascota->user->name }}! 👋
            </div>
            
            <div class="pet-info-card">
                <div class="pet-name">{{ $cartilla->mascota->nombre }}</div>
                
                <div class="treatment-info">
                    <div class="treatment-type">
                        Próximo tratamiento programado:
                    </div>
                    <strong>{{ $tipo }}</strong>
                    <strong>{{ $tipo == 'Vacuna' ? $cartilla->nom_vacuna : $cartilla->producto }}</strong>
                </div>
                
                <div class="date-highlight">
                    📅 {{ $cartilla->proxima_dosis }}
                </div>
            </div>
            
            <div class="reminder-text">
                <strong>Recordatorio importante:</strong><br>
                Por favor, no olvides acudir a la veterinaria a tiempo para mantener al día la salud de tu mascota. 
                Tu puntualidad es clave para su bienestar.
            </div>
        </div>
        
        <div class="footer">
            <div class="footer-message">
                Muchas gracias por confiar en nosotros para el cuidado de tu mascota.<br>
                ¡Que tengas un feliz día! 😊
            </div>
            
            <div class="logo-section">
                <div class="logo-text">🏥 Vital Vet</div>
                <div class="tagline">Salud y bienestar animal</div>
            </div>
        </div>
    </div>
</body>
</html>