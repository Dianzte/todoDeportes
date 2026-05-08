<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="bg-orange-500 p-2 rounded-lg shadow-[4px_4px_0px_0px_rgba(255,255,255,0.3)]">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <h2 class="font-black text-3xl text-white uppercase italic tracking-tighter">
                {{ __('Inscribir Nueva Franquicia') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-900 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 overflow-hidden shadow-[0_25px_50px_-12px_rgba(0,0,0,0.7)] border-t-8 border-orange-500 rounded-b-xl">
                <div class="p-8">
                    <div class="mb-8 border-b border-slate-700 pb-4">
                        <p class="text-slate-400 font-bold uppercase text-xs tracking-[0.3em]">Formulario de Registro Oficial</p>
                    </div>

                    <form method="POST" action="{{ route('equipos.store') }}" class="space-y-6">
                        @csrf

                        <div class="group">
                            <x-input-label for="nombre" :value="__('Nombre de la Entidad')" class="text-orange-500 uppercase font-black italic text-xs tracking-widest mb-2 group-focus-within:text-white transition-colors" />
                            <x-text-input id="nombre" 
                                class="block mt-1 w-full bg-slate-900 border-2 border-slate-700 text-white focus:border-orange-500 focus:ring-0 font-bold text-lg uppercase tracking-tight py-4" 
                                type="text" name="nombre" :value="old('nombre')" required autofocus />
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2 text-red-400 font-bold text-xs uppercase italic" />
                        </div>

                        <div class="mt-4 group">
                            <x-input-label for="deporte" :value="__('Disciplina Deportiva')" class="text-orange-500 uppercase font-black italic text-xs tracking-widest mb-2 group-focus-within:text-white transition-colors" />
                            <div class="relative">
                                <select name="deporte" id="deporte" 
                                    class="block mt-1 w-full bg-slate-900 border-2 border-slate-700 rounded-none text-white focus:border-orange-500 focus:ring-0 font-black uppercase tracking-tight py-4 px-4 appearance-none cursor-pointer">
                                    <option value="Fútbol" class="bg-slate-800">Fútbol ⚽</option>
                                    <option value="Baloncesto" class="bg-slate-800">Baloncesto 🏀</option>
                                    <option value="Tenis" class="bg-slate-800">Tenis 🎾</option>
                                    <option value="Voleibol" class="bg-slate-800">Voleibol 🏐</option>
                                    <option value="Natación" class="bg-slate-800">Natación 🏊</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-orange-500">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" /></svg>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-10 gap-6 pt-6 border-t border-slate-700">
                            <a href="{{ route('equipos.index') }}" class="text-slate-500 hover:text-white font-black uppercase italic text-xs tracking-[0.2em] transition-all">
                                {{ __('Cancelar Registro') }}
                            </a>

                            <x-primary-button class="bg-orange-500 px-8 py-4 text-sm shadow-[6px_6px_0px_0px_rgba(255,255,255,0.1)] active:shadow-none active:translate-x-1 active:translate-y-1">
                                {{ __('Validar y Guardar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="mt-6 text-center">
                <span class="text-slate-600 font-black text-[9px] uppercase tracking-[0.6em]">System Authentication Active // Liga TodoDeportes</span>
            </div>
        </div>
    </div>
</x-app-layout>