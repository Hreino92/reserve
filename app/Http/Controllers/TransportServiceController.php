<?php
namespace App\Http\Controllers;

use App\Models\TransportService;
use Illuminate\Http\Request;

class TransportServiceController extends Controller
{
    public function index()
    {
        $services = TransportService::all();
        return view('transport-services.index', compact('services'));
    }

    public function create()
    {
        return view('transport-services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('transport-services', 'public') : null;

        TransportService::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->route('transport-services.index');
    }

    public function edit(TransportService $transportService)
    {

        return view('transport-services.edit', compact('transportService'));
    }

    public function update(Request $request, TransportService $transportService)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('transport-services', 'public');
            $transportService->image = $imagePath;
        }

        $transportService->update($request->except('image') + ['image' => $transportService->image]);

        return redirect()->route('transport-services.index');
    }

    public function destroy(TransportService $transportService)
    {
        $transportService->delete();
        return redirect()->route('transport-services.index');
    }
    public function transporte()
    {
        $services = TransportService::all();
        return view('transporte', compact('services'));
    }
}

