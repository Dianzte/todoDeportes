<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-3xl text-white uppercase italic tracking-tighter italic">
                {{ __('Panel de Franquicias') }}
                <span class="block text-xs font-bold tracking-widest text-orange-500 uppercase not-italic">TodoDeportes Temporada 2026</span>
            </h2>

            @if(auth()->user()->role !== 'visitante')
            <a href="{{ route('equipos.create') }}" class="inline-flex items-center px-6 py-3 bg-orange-500 border-2 border-orange-600 rounded-tr-xl rounded-bl-xl font-black text-xs text-white uppercase tracking-widest hover:bg-white hover:text-orange-500 transition-all duration-300 shadow-[4px_4px_0px_0px_rgba(255,255,255,1)] hover:shadow-none active:translate-x-1 active:translate-y-1">
                {{ __('+ Registrar Equipo') }}
            </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12 bg-slate-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Alerta Estilo Breaking News --}}
            @if (session('success'))
            <div class="mb-6 font-black text-sm text-white bg-green-600 border-l-8 border-green-800 p-4 shadow-lg animate-pulse uppercase italic">
                ⚡ REPORTE: {{ session('success') }}
            </div>
            @endif

            <div class="bg-slate-800 overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.5)] sm:rounded-lg border border-slate-700">
                <div class="p-0 text-gray-100">
                    <table class="min-w-full border-collapse">
                        <thead>
                            <tr class="bg-slate-700 border-b-2 border-orange-500">
                                <th class="px-6 py-4 text-left text-xs font-black text-orange-400 uppercase tracking-[0.2em]">Equipo</th>
                                <th class="px-6 py-4 text-left text-xs font-black text-orange-400 uppercase tracking-[0.2em]">Disciplina</th>
                                <th class="px-6 py-4 text-left text-xs font-black text-orange-400 uppercase tracking-[0.2em]">Head Coach</th>
                                <th class="px-6 py-4 text-right text-xs font-black text-orange-400 uppercase tracking-[0.2em]">Operaciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            @forelse($equipos as $equipo)
                            <tr class="hover:bg-slate-700/50 transition-colors group">
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <div class="text-xl font-black uppercase italic group-hover:text-orange-400 transition-colors">
                                        {{ $equipo->nombre }}
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center px-3 py-1 bg-slate-900 border border-slate-600 text-white text-xs font-bold uppercase rounded-none italic">
                                        <span class="mr-2">
                                            @if($equipo->deporte == 'Fútbol') ⚽ 
                                            @elseif($equipo->deporte == 'Baloncesto') 🏀 
                                            @else 🏆 @endif
                                        </span>
                                        {{ $equipo->deporte }}
                                    </span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-sm font-medium text-slate-400">
                                    {{ $equipo->user->name }}
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-right text-sm font-black">
                                    <div class="flex justify-end gap-4">
                                        <a href="{{ route('equipos.show', $equipo) }}" class="text-white bg-indigo-600 px-3 py-1 rounded hover:bg-white hover:text-indigo-600 transition-all uppercase text-[10px]">Plantilla</a>

                                        @if(auth()->id() === $equipo->user_id || auth()->user()->role === 'admin')
                                        <a href="{{ route('equipos.edit', $equipo) }}" class="text-orange-400 hover:text-white transition-colors uppercase text-[10px] mt-1">Editar</a>

                                        <form action="{{ route('equipos.destroy', $equipo) }}" method="POST" onsubmit="return confirm('¿Confirmar baja del equipo?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-300 transition-colors uppercase text-[10px] mt-1">Eliminar</button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-slate-500 italic font-medium">
                                    No hay registros en la liga oficial.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>