<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Factura - Vital Vet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c7da0;
            --secondary-color: #a9d6e5;
            --accent-color: #01497c;
            --light-color: #e9f5f9;
            --dark-color: #012a4a;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .invoice-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 20px;
            margin-bottom: 40px;
        }
        
        .header-section {
            border-bottom: 2px solid var(--secondary-color);
            padding-bottom: 20px;
            margin-bottom: 25px;
        }
        
        .clinic-name {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 5px;
        }
        
        .clinic-details {
            color: var(--dark-color);
            font-size: 14px;
        }
        
        .client-info {
            background-color: var(--light-color);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 25px;
        }
        
        .info-label {
            font-weight: 600;
            color: var(--accent-color);
            margin-bottom: 5px;
            font-size: 14px;
        }
        
        .info-value {
            color: var(--dark-color);
            margin-bottom: 15px;
        }
        
        .table thead {
            background-color: var(--primary-color);
            color: white;
        }
        
        .table th {
            border: none;
            padding: 12px 15px;
        }
        
        .table td {
            padding: 12px 15px;
            vertical-align: middle;
        }
        
        .btn-add {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            transition: all 0.3s;
        }
        
        .btn-add:hover {
            background-color: var(--accent-color);
            transform: translateY(-2px);
        }
        
        .totals-section {
            background-color: var(--light-color);
            border-radius: 8px;
            padding: 20px;
            margin-top: 25px;
        }
        
        .total-label {
            font-weight: 600;
            color: var(--accent-color);
        }
        
        .total-value {
            font-weight: 700;
            color: var(--dark-color);
            font-size: 18px;
        }
        
        .btn-submit {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 5px;
            margin-top: 20px;
            transition: all 0.3s;
        }
        
        .btn-submit:hover {
            background-color: var(--dark-color);
            transform: translateY(-2px);
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(44, 125, 160, 0.25);
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .logo {
            width: 60px;
            height: 60px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
            font-size: 24px;
        }
        
        @media (max-width: 768px) {
            .invoice-container {
                padding: 15px;
            }
            
            .table-responsive {
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-4 mb-5">
        <a href="{{ route('docVerPerfil', ['usuario' => $usuario->id]) }}" class="btn btn-secondary">
    <i class="fas fa-arrow-left me-2"></i> Volver
</a>

        <div class="invoice-container">
            
            <!-- Encabezado -->
            <div class="header-section">
                <div class="logo-container">
                    <div class="logo">
                        <i class="fas fa-paw"></i>
                    </div>
                    <div>
                        <h1 class="clinic-name">Vital Vet S.A. de C.V.</h1>
                        <div class="clinic-details">
                            <div>Clínica Veterinaria • Soyapango, San Salvador</div>
                            <div>NCR: 106064 | NIT: 06111107971011 | TEL: 75509310</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Información de cliente -->
            <div class="row client-info">
                <div class="col-md-4">
                    <div class="info-label">FECHA</div>
                    <div class="info-value">{{ date('d/m/Y') }}</div>
                </div>
                <div class="col-md-4">
                    <div class="info-label">CLIENTE</div>
                    <div class="info-value">{{ $usuario->name }}</div>
                </div>
                <div class="col-md-4">
                    <div class="info-label">CORREO</div>
                    <div class="info-value">{{ $usuario->email }}</div>
                </div>
            </div>
            
            <!-- Formulario de factura -->
            <form action="{{ route('factura.guardar', $usuario->id) }}" method="POST">
                @csrf
                
                <!-- Tabla de productos -->
                <div class="table-responsive">
                    <table class="table table-hover" id="tablaProductos">
                        <thead>
                            <tr>
                                <th width="15%">Cantidad</th>
                                <th width="45%">Descripción</th>
                                <th width="20%">Precio Unitario</th>
                                <th width="20%">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="number" name="productos[0][cantidad]" value="1" min="1" class="form-control cantidad"></td>
                                <td><input type="text" name="productos[0][descripcion]" class="form-control descripcion" placeholder="Descripción del producto"></td>
                                <td><input type="number" name="productos[0][precio]" value="0.00" step="0.01" min="0" class="form-control precio"></td>
                                <td><input type="number" class="form-control subtotal" value="0.00" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <button type="button" class="btn btn-add mb-4" id="agregarFila">
                    <i class="fas fa-plus-circle me-2"></i>Agregar producto
                </button>
                
                <!-- Totales -->
                <div class="totals-section">
                    <div class="row mb-2">
                        <div class="col-md-9 text-end total-label">Subtotal:</div>
                        <div class="col-md-3">
                            <input type="number" id="subtotalGeneral" readonly class="form-control text-end total-value">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-9 text-end total-label">IVA 13%:</div>
                        <div class="col-md-3">
                            <input type="number" id="iva" readonly class="form-control text-end total-value">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-9 text-end total-label">TOTAL:</div>
                        <div class="col-md-3">
                            <input type="number" id="total" readonly class="form-control text-end total-value" style="font-size: 20px;">
                        </div>
                    </div>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-submit">
                        <i class="fas fa-paper-plane me-2"></i>Enviar Factura
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function calcularTotales() {
            let filas = document.querySelectorAll("#tablaProductos tbody tr");
            let subtotalGeneral = 0;
            
            filas.forEach(fila => {
                let cantidad = parseFloat(fila.querySelector(".cantidad").value) || 0;
                let precio = parseFloat(fila.querySelector(".precio").value) || 0;
                let subtotal = cantidad * precio;
                
                fila.querySelector(".subtotal").value = subtotal.toFixed(2);
                subtotalGeneral += subtotal;
            });
            
            let iva = subtotalGeneral * 0.13;
            let total = subtotalGeneral + iva;

            document.getElementById("subtotalGeneral").value = subtotalGeneral.toFixed(2);
            document.getElementById("iva").value = iva.toFixed(2);
            document.getElementById("total").value = total.toFixed(2);
        }

        document.addEventListener("input", function(e){
            if(e.target.classList.contains("cantidad") || e.target.classList.contains("precio")){
                calcularTotales();
            }
        });

        // Agregar fila
        document.getElementById("agregarFila").addEventListener("click", function(){
            let tabla = document.querySelector("#tablaProductos tbody");
            let index = tabla.rows.length;
            let fila = document.createElement("tr");
            
            fila.innerHTML = `
                <td><input type="number" name="productos[${index}][cantidad]" value="1" min="1" class="form-control cantidad"></td>
                <td><input type="text" name="productos[${index}][descripcion]" class="form-control descripcion" placeholder="Descripción del producto"></td>
                <td><input type="number" name="productos[${index}][precio]" value="0.00" step="0.01" min="0" class="form-control precio"></td>
                <td><input type="number" class="form-control subtotal" value="0.00" readonly></td>
            `;
            
            tabla.appendChild(fila);
            
            // Agregar event listeners a los nuevos campos
            fila.querySelector('.cantidad').addEventListener('input', calcularTotales);
            fila.querySelector('.precio').addEventListener('input', calcularTotales);
        });

        // Calcular totales iniciales
        document.addEventListener('DOMContentLoaded', function() {
            calcularTotales();
        });
    </script>
</body>
</html>