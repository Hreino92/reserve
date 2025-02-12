<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotels.index', compact('hotels'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('hotels.create');
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048',
        'category' => 'required|string|max:50',
        'description' => 'nullable|string',
    ]);

    $imagePath = $request->file('image') ? $request->file('image')->store('hotels', 'public') : null;

    Hotel::create([
        'name' => $request->name,
        'address' => $request->address,
        'image' => $imagePath,
        'category' => $request->category,
        'description' => $request->description,
    ]);

    return redirect()->route('hotels.index');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
{
    return view('hotels.edit', compact('hotel'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048',
        'category' => 'required|string|max:50',
        'description' => 'nullable|string',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('hotels', 'public');
        $hotel->image = $imagePath;
    }

    $hotel->update($request->except('image') + ['image' => $hotel->image]);

    return redirect()->route('hotels.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
{
    $hotel->delete();
    return redirect()->route('hotels.index');
}

public function hoteles(){
    $hotels = Hotel::all();
    return view('hoteles', compact('hotels'));
}

}
