<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CotizacionMail;
use App\Models\Hotel;
use App\Models\TransportService;
use App\Models\Paquete;
use App\Models\Cotizacion;

class CotizacionController extends Controller
{
    public function cotizar()  // ✅ Método para mostrar la vista de cotización
    {
        $hotels = Hotel::all();
        $transportServices = TransportService::all();
        $paquetes = Paquete::all();

        return view('services', compact('hotels', 'transportServices', 'paquetes'));
    }

    public function enviarCorreo(Request $request)
    {
        // Validación de los datos
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:15',
            'tipo' => 'required|string|in:paquetes,transporte,hoteles,boletos',
            'opcionSeleccionada' => 'required_if:tipo,paquetes,transporte,hoteles|nullable',
            'ciudad_origen' => 'required_if:tipo,boletos|string|max:255|nullable',
            'ciudad_destino' => 'required_if:tipo,boletos|string|max:255|nullable',
            'equipaje' => 'required_if:tipo,boletos|in:si,no|nullable',
            'clase_viaje' => 'required_if:tipo,boletos|in:turista,ejecutiva|nullable',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
            'comentarios' => 'nullable|string|max:1000',
        ]);

        // Capturar el valor de la opción seleccionada
        $opcionSeleccionada = $data['opcionSeleccionada'] ?? null;

        // Si el tipo es 'boletos', capturar los valores adicionales
        if ($data['tipo'] == 'boletos') {
            $ciudadOrigen = $data['ciudad_origen'];
            $ciudadDestino = $data['ciudad_destino'];
            $equipaje = $data['equipaje'];
            $claseViaje = $data['clase_viaje'];
        }

         // Guardar la cotización en la base de datos
        // Crear una nueva cotización
    $cotizacion = new Cotizacion;

    // Asignar los valores validados a los campos del objeto
    $cotizacion->nombre = $data['nombre'];
    $cotizacion->email = $data['email'];
    $cotizacion->telefono = $data['telefono'];
    $cotizacion->tipo = $data['tipo'];
    $cotizacion->opcion_seleccionada = $data['opcionSeleccionada'] ?? null;
    $cotizacion->ciudad_origen = $data['ciudad_origen'] ?? null;
    $cotizacion->ciudad_destino = $data['ciudad_destino'] ?? null;
    $cotizacion->equipaje = $data['equipaje'] ?? null;
    $cotizacion->clase_viaje = $data['clase_viaje'] ?? null;
    $cotizacion->fecha_inicio = $data['fecha_inicio'];
    $cotizacion->fecha_final = $data['fecha_final'];
    $cotizacion->comentarios = $data['comentarios'] ?? null;

    // Guardar la cotización en la base de datos
    $cotizacion->save();
        // Lógica para enviar el correo
        Mail::to("reserve503.travel@gmail.com")->send(new CotizacionMail($data, $opcionSeleccionada));
        //dd($data);
        // Retornar una respuesta después de enviar el correo

        return back()->with('success', '¡Cotización enviada con éxito!');
    }
}
