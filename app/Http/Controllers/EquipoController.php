<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Equipo;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = Equipo::with('user')->get();
        return view('equipos.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role === 'visitante') {
            return redirect()->route('equipos.index')->with('error', 'No tienes permiso.');
        }
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // REGLA: Solo Admin o Entrenador crean
        if (Auth::user()->role === 'visitante') {
            abort(403, 'No tienes permiso para crear equipos.');
        }

        $request->validate(['nombre' => 'required|string|max:255',
            'deporte' => 'required|string|max:255',
        ]);

        Equipo::create([
            'nombre' => $request->nombre,
            'user_id' => Auth::id(),
            'deporte' => $request->deporte,
        ]);


        return redirect()->route('equipos.index')->with('success', 'Equipo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show( Equipo $equipo)
    {
        $equipo->load('jugadores');
        return view('equipos.show', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo)
    {
        if (Auth::id() !== $equipo->user_id && Auth::user()->role !== 'admin') {
            abort(403, 'No tienes permiso para editar este equipo.');
        }

        return view('equipos.edit', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'deporte' => 'required|string|max:255',
        ]);

        $equipo->update([
            'nombre' => $request->nombre,
            'deporte' => $request->deporte,
        ]);
        // REGLA: Solo el creador o un Admin pueden modificar
        if (Auth::id() !== $equipo->user_id && Auth::user()->role !== 'admin') {
            abort(403, 'Solo el creador puede modificar este equipo.');
        }

        $equipo->update($request->all());
        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipo $equipo)
    {
        if (Auth::id() !== $equipo->user_id && Auth::user()->role !== 'admin') {
            abort(403);
        }

        $equipo->delete();

        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado.');
    }
    
    //Metodo de la grafica
    public function estadisticas()
    {
        $equipos = Equipo::withCount('jugadores')->get();

        $nombresEquipos = $equipos->pluck('nombre');
        $cantidadJugadores = $equipos->pluck('jugadores_count');

        return view('equipos.estadisticas', compact('nombresEquipos', 'cantidadJugadores'));
    }
   
}
