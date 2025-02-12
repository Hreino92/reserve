<?php
namespace App\Http\Controllers;

use App\Models\Paquete;
use App\Models\Itinerario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaqueteController extends Controller
{
    public function index()
    {
         // Cargar los paquetes con sus itinerarios
         $paquetes = Paquete::with('itinerarios')->orderBy('duracion', 'asc')->get();;
         $paquetesAgrupados = $paquetes->groupBy('duracion');
         return view('paquetes.index', compact('paquetesAgrupados'));         
    }
    public function elsalvador()
{
    // Cargar los paquetes con sus itinerarios
    $paquetes = Paquete::with('itinerarios')->orderBy('duracion', 'asc')->get();
    $paquetesAgrupados = $paquetes->groupBy('duracion');
    $texto = "El Salvador";
    // Pasar la variable $paquetesAgrupados a la vista
    return view('elsalvador', compact('paquetesAgrupados'));         
}

    public function create()
    {
        return view('paquetes.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del paquete
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'required|image',
            'duracion' => 'required|integer|min:1',
            'itinerarios.*.descripcion' => 'required|string',
        ]);

        if ($request->hasFile('imagen')) {
            
            $imagePath = $request->file('imagen')->store('imagenes', 'public');
        }
        

        // Crear el paquete
        $paquete = Paquete::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen' => $imagePath,
            'duracion' => $request->duracion,
        ]);

        // Guardar los itinerarios
        foreach ($request->itinerarios as $dia => $itinerario) {
            Itinerario::create([
                'paquete_id' => $paquete->id,
                'dia' => $dia,
                'descripcion' => $itinerario['descripcion'],
            ]);
        }

        return redirect()->route('paquetes.index')->with('success', 'Paquete creado exitosamente!');
    }
    public function edit($id)
    {
        // Buscar el paquete por su ID, incluyendo los itinerarios
        $paquete = Paquete::with('itinerarios')->findOrFail($id);
    
        // Pasar el paquete a la vista para editarlo
        return view('paquetes.edit', compact('paquete'));
    }
    public function update(Request $request, $id)
{
    // Validar los datos del paquete
    $request->validate([
        'nombre' => 'required',
        'descripcion' => 'required',
        'precio' => 'required|numeric',
        'imagen' => 'nullable|image',
        'duracion' => 'required|integer|min:1',
        'itinerarios.*.descripcion' => 'required|string',
    ]);

    // Buscar el paquete por su ID
    $paquete = Paquete::findOrFail($id);

    // Si hay una nueva imagen, se elimina la anterior y se guarda la nueva
    if ($request->hasFile('imagen')) {
        // Eliminar la imagen anterior
        if ($paquete->imagen) {
            Storage::delete('public/' . $paquete->imagen);
        }

        // Guardar la nueva imagen
        $imagePath = $request->file('imagen')->store('imagenes', 'public');
    } else {
        // Si no se sube una nueva imagen, conservar la imagen anterior
        $imagePath = $paquete->imagen;
    }

    // Actualizar el paquete
    $paquete->update([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'precio' => $request->precio,
        'imagen' => $imagePath,
        'duracion' => $request->duracion,
    ]);

    // Obtener los días enviados en el formulario
    $diasDelFormulario = array_keys($request->itinerarios);

    // Eliminar itinerarios que ya no existen debido a la reducción de días
    $itinerariosAEliminar = $paquete->itinerarios()->whereNotIn('dia', $diasDelFormulario)->get();
    foreach ($itinerariosAEliminar as $itinerario) {
        $itinerario->delete();
    }

    // Actualizar o crear nuevos itinerarios
    foreach ($request->itinerarios as $dia => $itinerario) {
        $existingItinerary = Itinerario::where('paquete_id', $paquete->id)
            ->where('dia', $dia)
            ->first();

        if ($existingItinerary) {
            // Actualizar itinerario existente
            $existingItinerary->update([
                'descripcion' => $itinerario['descripcion'],
            ]);
        } else {
            // Si no existe, crear un nuevo itinerario
            Itinerario::create([
                'paquete_id' => $paquete->id,
                'dia' => $dia,
                'descripcion' => $itinerario['descripcion'],
            ]);
        }
    }

    return redirect()->route('paquetes.index')->with('success', 'Paquete actualizado exitosamente!');
}

public function destroy($id)
{
    // Buscar el paquete por su ID, incluyendo los itinerarios
    $paquete = Paquete::with('itinerarios')->findOrFail($id);

    // Eliminar la imagen asociada al paquete si existe en almacenamiento
    if ($paquete->imagen) {
        Storage::delete('public/' . $paquete->imagen);
    }

    // Eliminar los itinerarios relacionados con el paquete
    $paquete->itinerarios()->delete();

    // Eliminar el paquete
    $paquete->delete();

    // Redirigir al usuario con un mensaje de éxito
    return redirect()->route('paquetes.index')->with('success', 'Paquete eliminado exitosamente!');
}

}
