<x-app-layout>
    <div class="py-12 bg-slate-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6">
                <a href="{{ route('equipos.index') }}" class="inline-flex items-center text-orange-500 font-black uppercase italic tracking-widest text-xs hover:text-white transition-colors group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Volver a la Liga
                </a>
            </div>

            <div class="mb-8 border-b-4 border-orange-500 pb-2">
                <h2 class="text-4xl font-black text-white uppercase italic tracking-tighter">
                    Gestión de Plantilla: <span class="text-orange-500">{{ $equipo->nombre }}</span>
                </h2>
            </div>

            {{-- Formulario para añadir jugador (Panel de Fichaje) --}}
            @if(auth()->id() === $equipo->user_id || auth()->user()->role === 'admin')
            <div class="bg-slate-800 p-8 rounded-tr-3xl rounded-bl-3xl shadow-2xl mb-10 border border-slate-700 relative overflow-hidden">
                <div class="absolute right-0 top-0 opacity-10 font-black text-8xl italic text-slate-500 select-none -mr-10 -mt-10">
                    SIGN
                </div>
                
                <h3 class="text-white font-black uppercase italic mb-6 flex items-center">
                    <span class="bg-orange-500 w-2 h-6 mr-3"></span>
                    Nuevo Fichaje
                </h3>

                <form action="{{ route('jugadores.store') }}" method="POST" class="flex flex-col md:flex-row gap-6 relative z-10">
                    @csrf
                    <input type="hidden" name="equipo_id" value="{{ $equipo->id }}">
                    
                    <div class="flex-1">
                        <input type="text" name="nombre" placeholder="Nombre completo del jugador" 
                            class="w-full bg-slate-900 border-2 border-slate-700 rounded-none text-white focus:border-orange-500 focus:ring-0 font-bold placeholder-slate-500 uppercase tracking-tight" required>
                    </div>

                    <div class="w-full md:w-32">
                        <input type="number" name="numero" placeholder="DOR" 
                            class="w-full bg-slate-900 border-2 border-slate-700 rounded-none text-orange-500 focus:border-orange-500 focus:ring-0 font-black text-center text-xl italic" min="0" max="99" required>
                    </div>

                    <x-primary-button class="h-full">
                        Inscribir
                    </x-primary-button>
                </form>
            </div>
            @endif

            {{-- Tabla de Jugadores (Estilo Alineación) --}}
            <div class="bg-slate-800 overflow-hidden shadow-2xl border border-slate-700">
                <div class="p-0">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-slate-700">
                                <th class="px-6 py-4 text-left text-xs font-black text-orange-400 uppercase tracking-widest">Dorsal</th>
                                <th class="px-6 py-4 text-left text-xs font-black text-orange-400 uppercase tracking-widest">Jugador</th>
                                @if(auth()->id() === $equipo->user_id || auth()->user()->role === 'admin')
                                <th class="px-6 py-4 text-right text-xs font-black text-orange-400 uppercase tracking-widest">Operaciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            @foreach($equipo->jugadores as $jugador)
                            <tr class="hover:bg-slate-750 transition-colors group">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-3xl font-black italic text-white group-hover:text-orange-500 transition-colors">
                                        {{ str_pad($jugador->numero, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-lg font-bold text-slate-200 uppercase tracking-tight group-hover:translate-x-2 transition-transform">
                                        {{ $jugador->nombre }}
                                    </div>
                                </td>
                                
                                @if(auth()->id() === $equipo->user_id || auth()->user()->role === 'admin')
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="inline-flex gap-4">
                                        {{-- Botón Editar --}}
                                        <a href="{{ route('jugadores.edit', $jugador) }}" 
                                            class="text-slate-400 hover:text-indigo-400 font-black uppercase text-[10px] tracking-tighter self-center transition-colors">
                                            Editar
                                        </a>

                                        {{-- Botón Eliminar --}}
                                        <form action="{{ route('jugadores.destroy', $jugador) }}" method="POST" onsubmit="return confirm('¿Baja definitiva del jugador?');">
                                            @csrf @method('DELETE')
                                            <button class="bg-red-600/10 text-red-500 hover:bg-red-600 hover:text-white px-3 py-1 font-black uppercase text-[10px] transition-all">
                                                Despedir
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    @if($equipo->jugadores->isEmpty())
                        <div class="p-10 text-center text-slate-500 italic uppercase font-bold tracking-widest">
                            No hay jugadores inscritos en la plantilla
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>