<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Perfil de Usuario</title>

  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      background: url('https://png.pngtree.com/background/20210716/original/pngtree-cute-dog-tiled-background-bone-claw-print-picture-image_1349644.jpg') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      position: relative;
    }

    body::before {
      content: "";
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-color: rgba(0, 0, 0, 0.6);
      z-index: 0;
    }

    .form-container {
      background: rgba(255, 255, 255, 0.95);
      padding: 2rem;
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
      width: 100%;
      max-width: 500px;
      text-align: center;
      position: relative;
      z-index: 1;
    }

    h2 {
      margin-bottom: 1.2rem;
      color: #333;
    }

    .profile-wrapper {
      position: relative;
      width: 120px;
      height: 120px;
      margin: 0 auto 1.5rem;
    }

    .profile-pic {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      object-fit: cover;
      aspect-ratio: 1 / 1;
      background-color: #ccc;
      border: 2px solid #ddd;
      cursor: pointer;
      display: block;
    }

    .edit-icon {
      position: absolute;
      bottom: 0;
      right: 0;
      background: #0077ff;
      padding: 6px;
      border-radius: 50%;
      cursor: pointer;
    }

    .edit-icon svg {
      width: 16px;
      height: 16px;
      fill: white;
    }

    input[type="file"] {
      display: none;
    }

    .input-group {
      position: relative;
      margin-bottom: 1.2rem;
      text-align: left;
    }

    label {
      display: block;
      font-weight: bold;
      color: #333;
      margin-bottom: 0.3rem;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
      width: 100%;
      padding: 0.6rem 2.5rem 0.6rem 0.8rem;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 1rem;
      background-color: #f3f3f3;
      color: #333;
    }

    .input-edit-icon {
      position: absolute;
      right: 10px;
      top: 37px;
      background: transparent;
      border: none;
      cursor: pointer;
      padding: 0;
    }

    .input-edit-icon svg {
      width: 18px;
      height: 18px;
      fill: #0077ff;
    }

    .btn {
      display: block;
      width: 100%;
      padding: 0.75rem;
      background: #0077ff;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .btn:hover {
      background: #005fd1;
    }

    .toggle-password {
      position: absolute;
      right: 10px;
      top: 40px;
      cursor: pointer;
    }

    .row {
      display: flex;
      gap: 10px;
    }

    .row .input-group {
      flex: 1;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>Usuario</h2>

  
  <div class="profile-wrapper">
    <label for="profile-input">
      <img src="https://via.placeholder.com/100" alt="Foto de perfil" class="profile-pic" id="profile-preview">
      <div class="edit-icon">
        <svg viewBox="0 0 24 24">
          <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 
            7.04a1.003 1.003 0 0 0 0-1.42l-2.34-2.34a1.003 
            1.003 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.84-1.82z"/>
        </svg>
      </div>
    </label>
    <input type="file" id="profile-input" accept="image/*" onchange="previewImage(event)">
  </div>

  
  <form id="user-form">

    <div class="input-group">
      <label for="rol">Rol:</label>
      <select id="rol" name="rol" required>
        <option value="Administrador">Administrador</option>
        <option value="Cliente">Cliente</option>
        <option value="Doctor">Doctor</option>
      </select>
    </div>

    <div class="input-group">
      <label for="nombreCompleto">Nombre Completo:</label>
      <input type="text" id="nombreCompleto" name="nombreCompleto" required>
    </div>

    <div class="input-group">
      <label for="usuario">Usuario:</label>
      <input type="text" id="usuario" name="usuario" required>
    </div>

    <div class="row">
      <div class="input-group">
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>
      </div>
      <div class="input-group">
        <label for="dui">DUI:</label>
        <input type="text" id="dui" name="dui" required>
      </div>
    </div>

    <div class="input-group">
      <label for="direccion">Dirección:</label>
      <input type="text" id="direccion" name="direccion" required>
    </div>

    <div class="input-group">
      <label for="correo">Correo:</label>
      <input type="email" id="correo" name="correo" required>
    </div>

    <div class="row">
      <div class="input-group" style="position: relative;">
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
        <span class="toggle-password" onclick="togglePassword('contrasena')">👁️</span>
      </div>
      <div class="input-group" style="position: relative;">
        <label for="confirmarContrasena">Confirma Contraseña:</label>
        <input type="password" id="confirmarContrasena" name="confirmarContrasena" required>
        <span class="toggle-password" onclick="togglePassword('confirmarContrasena')">👁️</span>
      </div>
    </div>

    <button type="submit" class="btn">Guardar</button>
  </form>
</div>

<script>
  function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
      const output = document.getElementById('profile-preview');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }

  function togglePassword(id) {
    const input = document.getElementById(id);
    input.type = input.type === "password" ? "text" : "password";
  }

  document.getElementById('user-form').addEventListener('submit', function(e) {
    e.preventDefault();

    Swal.fire({
      icon: 'success',
      title: '¡Registro exitoso!',
      text: 'Los datos se guardaron correctamente.',
      confirmButtonColor: '#0077ff'
    });
  });
</script>

</body>
</html>
