<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FacturaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $productos;
    public $subtotal;
    public $iva;
    public $total;
    public $fecha;
    public $hora;
    public $pdfPath;

    public function __construct($usuario, $productos, $subtotal, $iva, $total, $fecha, $hora, $pdfPath)
    {
        $this->usuario = $usuario;
        $this->productos = $productos;
        $this->subtotal = $subtotal;
        $this->iva = $iva;
        $this->total = $total;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this->subject('Tu Factura VitalVet')
            ->view('VerFactura')
            ->with([
                'usuario'   => $this->usuario,
                'productos' => $this->productos,
                'subtotal'  => $this->subtotal,
                'iva'       => $this->iva,
                'total'     => $this->total,
                'fecha'     => $this->fecha,
                'hora'      => $this->hora
            ])
            ->attach($this->pdfPath);
    }
}
