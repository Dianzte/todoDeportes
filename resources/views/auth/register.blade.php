<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-4xl font-black text-white uppercase italic tracking-tighter">
            NUEVO<span class="text-orange-500">REGISTRO</span>
        </h2>
        <p class="text-slate-500 text-xs font-bold uppercase tracking-[0.3em] mt-2">Únete a la liga oficial</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nombre de Atleta / Usuario')" class="text-orange-500 uppercase font-black italic text-[10px] tracking-widest mb-1" />
            <x-text-input id="name" 
                class="block mt-1 w-full bg-slate-900 border-2 border-slate-800 text-white focus:border-orange-500 focus:ring-0 font-bold uppercase tracking-tight py-3" 
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name" 
                placeholder="Ej: J. DOE" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 font-bold text-[10px] uppercase italic" />
        </div>

        <div>
            <x-input-label for="role" :value="__('Rango / Tipo de Usuario')" class="text-orange-500 uppercase font-black italic text-[10px] tracking-widest mb-1" />
            <div class="relative">
                <select id="role" name="role" 
                    class="block mt-1 w-full bg-slate-900 border-2 border-slate-800 text-white focus:border-orange-500 focus:ring-0 font-black uppercase italic tracking-tight py-3 appearance-none cursor-pointer">
                    <option value="visitante" class="bg-slate-900 text-white font-bold">{{ __('Visitante (Espectador)') }}</option>
                    <option value="entrenador" class="bg-slate-900 text-white font-bold">{{ __('Entrenador (Coach)') }}</option>
                    <option value="admin" class="bg-slate-900 text-white font-bold">{{ __('Administrador (Comisionado)') }}</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-orange-500">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" /></svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('role')" class="mt-2 text-red-500 font-bold text-[10px] uppercase italic" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Contraseña')" class="text-orange-500 uppercase font-black italic text-[10px] tracking-widest mb-1" />
            <x-text-input id="password" 
                class="block mt-1 w-full bg-slate-900 border-2 border-slate-800 text-white focus:border-orange-500 focus:ring-0 font-bold py-3"
                type="password" name="password" required autocomplete="new-password" 
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 font-bold text-[10px] uppercase italic" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-orange-500 uppercase font-black italic text-[10px] tracking-widest mb-1" />
            <x-text-input id="password_confirmation" 
                class="block mt-1 w-full bg-slate-900 border-2 border-slate-800 text-white focus:border-orange-500 focus:ring-0 font-bold py-3"
                type="password" name="password_confirmation" required autocomplete="new-password" 
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400 font-bold text-[10px] uppercase italic" />
        </div>

        <div class="flex flex-col gap-4 mt-8">
            <x-primary-button class="w-full justify-center py-4 bg-orange-500 hover:bg-white hover:text-orange-600 transition-all shadow-[6px_6px_0px_0px_rgba(255,255,255,0.1)] active:shadow-none active:translate-x-1 active:translate-y-1">
                {{ __('Finalizar Inscripción') }}
            </x-primary-button>

            <a class="text-center text-[10px] font-black uppercase italic text-slate-500 hover:text-orange-400 tracking-widest transition-colors" href="{{ route('login') }}">
                ¿Ya eres miembro? <span class="underline">Inicia sesión aquí</span>
            </a>
        </div>
    </form>
</x-guest-layout>