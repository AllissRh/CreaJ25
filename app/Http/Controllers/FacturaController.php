<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\FacturaMail;


class FacturaController extends Controller
{
    // Mostrar vista factura
    public function show($usuarioId)
{
    $usuario = User::findOrFail($usuarioId);
    $fecha = now()->format('Y-m-d');
    $hora = now()->format('H:i');

    return view('factura', compact('usuario', 'fecha', 'hora'));
}

public function guardar(Request $request, $usuarioId)
{
    $usuario = User::findOrFail($usuarioId);

    $productos = [];
    if($request->has('productos')){
        foreach($request->input('productos') as $p){
            $productos[] = [
                'cantidad' => $p['cantidad'],
                'descripcion' => $p['descripcion'],
                'precio' => $p['precio'],
                'subtotal' => $p['cantidad'] * $p['precio']
            ];
        }
    }

    $subtotal = collect($productos)->sum('subtotal');
    $iva = $subtotal * 0.13;
    $total = $subtotal + $iva;
    $fecha = now()->format('Y-m-d');
    $hora = now()->format('H:i');

    $pdf = Pdf::loadView('VerFactura', compact('usuario', 'productos', 'subtotal', 'iva', 'total', 'fecha', 'hora'));
    $pdfPath = storage_path("app/facturas/factura_{$usuario->id}_" . time() . ".pdf");
    $pdf->save($pdfPath);

    Mail::to($usuario->email)->send(new FacturaMail($usuario, $productos, $subtotal, $iva, $total, $fecha, $hora, $pdfPath));

    return redirect()->route('docVerPerfil', $usuario->id)->with('success', 'Factura enviada correctamente al correo.');
}


    
}
