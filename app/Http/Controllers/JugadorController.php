<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'numero' => 'required|integer|min:0|max:99',
            'equipo_id' => 'required|exists:equipos,id'
        ]);

        \App\Models\Jugador::create([
            'nombre' => $request->nombre,
            'numero' => $request->numero,
            'equipo_id' => $request->equipo_id,
        ]);

        return back()->with('success', 'Jugador guardado correctamente.');
    }

    public function destroy(Jugador $jugador)
    {
        $jugador->delete();
        return back()->with('success', 'Jugador eliminado.');
    }

    public function edit(Jugador $jugador)
    {
        return view('jugadores.edit', compact('jugador'));
    }

    public function update(Request $request, Jugador $jugador)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'dorsal' => 'required|integer|min:1',
        ]);

        $jugador->update([
            'nombre' => $request->nombre,
            'numero' => $request->dorsal, // Mapeo de nuevo
        ]);

        return redirect()->route('equipos.show', $jugador->equipo_id)
            ->with('success', 'Jugador actualizado correctamente.');
    }
}
