<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Factura VitalVet Profesional</title>
  <style>
    @page {
      size: letter;
      margin: 0.5in;
    }
    body {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12px;
      color: #333;
      background-color: #fff;
      margin: 0;
      padding: 0;
      width: 100%;
    }
    .factura-container {
      width: 100%;
      max-width: 7.5in;
      margin: 0 auto;
      border: 1px solid #ddd;
      padding: 20px;
      box-sizing: border-box;
    }
    .header-section {
      border-bottom: 2px solid #2c7da0;
      padding-bottom: 15px;
      margin-bottom: 20px;
      overflow: auto;
    }
    .logo {
      width: 60px;
      height: 60px;
      background-color: #2c7da0;
      border-radius: 50%;
      float: left;
      margin-right: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 24px;
      font-weight: bold;
    }
    .logo:after {
      content: "V";
    }
    .header-content {
      overflow: hidden;
    }
    .clinic-name {
      color: #2c7da0;
      font-weight: bold;
      font-size: 20px;
      margin: 0 0 5px 0;
    }
    .clinic-details {
      color: #555;
      font-size: 11px;
      margin: 0;
      line-height: 1.4;
    }
    .info-section {
      margin-bottom: 20px;
      overflow: auto;
    }
    .info-column {
      width: 48%;
      float: left;
    }
    .info-column:last-child {
      float: right;
    }
    .info-label {
      font-weight: bold;
      color: #2c7da0;
      font-size: 11px;
      margin: 0 0 3px 0;
    }
    .info-value {
      color: #333;
      margin: 0 0 10px 0;
      padding: 2px 0;
    }
    .table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
      page-break-inside: avoid;
    }
    .table th {
      background-color: #2c7da0;
      color: white;
      padding: 8px;
      text-align: left;
      font-weight: bold;
      font-size: 11px;
      border: 1px solid #1a5a7a;
    }
    .table td {
      padding: 8px;
      border: 1px solid #ddd;
      vertical-align: top;
      font-size: 11px;
    }
    .totals-section {
      margin-top: 20px;
      width: 100%;
      page-break-inside: avoid;
    }
    .total-row {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 5px;
    }
    .total-label {
      width: 120px;
      text-align: right;
      padding-right: 15px;
      font-weight: bold;
      color: #555;
      font-size: 11px;
    }
    .total-value {
      width: 100px;
      text-align: right;
      font-weight: 500;
      font-size: 11px;
    }
    .grand-total {
      font-weight: bold;
      font-size: 13px;
      color: #2c7da0;
      border-top: 1px solid #ddd;
      padding-top: 5px;
      margin-top: 5px;
    }
    .footer {
      text-align: center;
      font-size: 10px;
      color: #777;
      border-top: 1px solid #eee;
      padding-top: 10px;
      margin-top: 30px;
      page-break-inside: avoid;
    }
    .text-right {
      text-align: right;
    }
    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }
  </style>
</head>
<body>
  <div class="factura-container">
    <!-- Encabezado -->
    <div class="header-section">
      <div class="logo"></div>
      <div class="header-content">
        <h1 class="clinic-name">Vital Vet S.A. de C.V.</h1>
        <div class="clinic-details">
          <div>Clínica Veterinaria • Soyapango, San Salvador</div>
          <div>NCR: 106064 | NIT: 06111107971011 | TEL: 75509310</div>
        </div>
      </div>
    </div>

    <!-- Información de la factura -->
    <div class="info-section clearfix">
      <div class="info-column">
        <div class="info-label">FECHA</div>
        <div class="info-value">{{ $fecha }}</div>
        
        <div class="info-label">CLIENTE</div>
        <div class="info-value">{{ $usuario->name }}</div>
      </div>
      <div class="info-column">
        <div class="info-label">HORA</div>
        <div class="info-value">{{ $hora }}</div>
        
        <div class="info-label">DUI</div>
        <div class="info-value">{{ $usuario->dui }}</div>
      </div>
    </div>
    
    <div class="info-section">
      <div class="info-label">CORREO ELECTRÓNICO</div>
      <div class="info-value">{{ $usuario->email }}</div>
    </div>

    <!-- Tabla de Productos -->
    <table class="table">
      <thead>
        <tr>
          <th width="15%">Cantidad</th>
          <th width="50%">Descripción</th>
          <th width="15%">Precio Unitario</th>
          <th width="20%">Subtotal</th>
        </tr>
      </thead>
      <tbody>
        @foreach($productos as $p)
        <tr>
          <td>{{ $p['cantidad'] }}</td>
          <td>{{ $p['descripcion'] }}</td>
          <td class="text-right">${{ number_format($p['precio'], 2) }}</td>
          <td class="text-right">${{ number_format($p['subtotal'], 2) }}</td>
        </tr>
        @endforeach
        
        <!-- Espaciado para llenar la página -->
        @for($i = count($productos); $i < 10; $i++)
        <tr>
          <td>&nbsp;</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        @endfor
      </tbody>
    </table>

    <!-- Totales -->
    <div class="totals-section">
      <div class="total-row">
        <div class="total-label">Subtotal:</div>
        <div class="total-value">${{ number_format($subtotal, 2) }}</div>
      </div>
      <div class="total-row">
        <div class="total-label">IVA (13%):</div>
        <div class="total-value">${{ number_format($iva, 2) }}</div>
      </div>
      <div class="total-row grand-total">
        <div class="total-label">TOTAL:</div>
        <div class="total-value">${{ number_format($total, 2) }}</div>
      </div>
    </div>

    <!-- Pie de página -->
    <div class="footer">
      <div>¡Gracias por su preferencia!</div>
      <div>Vital Vet S.A. de C.V. • Clínica Veterinaria • Soyapango, San Salvador</div>
      <div>Teléfono: 75509310 • vitalvet@email.com</div>
    </div>
  </div>
</body>
</html>