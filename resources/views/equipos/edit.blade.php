<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <span class="bg-orange-500 text-white text-[10px] font-black uppercase px-2 py-1 italic tracking-tighter">Edit Mode</span>
            <h2 class="font-black text-3xl text-white uppercase italic leading-tight tracking-tighter">
                {{ __('Configurar Franquicia: ') }} <span class="text-orange-500">{{ $equipo->nombre }}</span>
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-900 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.5)] border-t-4 border-orange-500 rounded-b-xl">
                <div class="p-8">
                    
                    <form method="POST" action="{{ route('equipos.update', $equipo) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="nombre" :value="__('Nombre del Equipo')" class="text-slate-400 uppercase font-black italic text-xs tracking-widest mb-2" />
                            <x-text-input id="nombre" name="nombre" type="text" 
                                class="block w-full bg-slate-900 border-2 border-slate-700 text-white focus:border-orange-500 focus:ring-0 font-bold text-lg uppercase tracking-tight" 
                                :value="old('nombre', $equipo->nombre)" required />
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="deporte" :value="__('Disciplina Deportiva')" class="text-slate-400 uppercase font-black italic text-xs tracking-widest mb-2" />
                            <div class="relative">
                                <select name="deporte" id="deporte" 
                                    class="block w-full bg-slate-900 border-2 border-slate-700 text-white rounded-none focus:border-orange-500 focus:ring-0 font-bold uppercase tracking-tight appearance-none py-3 px-4">
                                    @php
                                        $deportes = ['Fútbol', 'Baloncesto', 'Tenis', 'Voleibol', 'Natación'];
                                    @endphp

                                    @foreach($deportes as $opcion)
                                    <option value="{{ $opcion }}" {{ old('deporte', $equipo->deporte) == $opcion ? 'selected' : '' }} class="bg-slate-800">
                                        {{ $opcion }}
                                    </option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-orange-500">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.707 6.586 4.293 7.293l5 5z"/></svg>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('deporte')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-between mt-10 border-t border-slate-700 pt-6">
                            <a href="{{ route('equipos.index') }}" class="text-slate-500 hover:text-white font-black uppercase italic text-xs tracking-widest transition-colors">
                                ✕ Cancelar
                            </a>
                            
                            <x-primary-button class="bg-orange-500 hover:bg-white hover:text-orange-600 transition-all shadow-[4px_4px_0px_0px_rgba(255,255,255,0.2)] active:shadow-none active:translate-x-[2px] active:translate-y-[2px]">
                                {{ __('Actualizar Franquicia') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>

            <p class="text-center text-slate-600 text-[10px] uppercase font-black tracking-[0.3em] mt-6">
                Official TodoDeportes Management System v2.6
            </p>
        </div>
    </div>
</x-app-layout>