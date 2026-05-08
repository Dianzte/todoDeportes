<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-4xl font-black text-white uppercase italic tracking-tighter">
            TODO<span class="text-orange-500">DEPORTES</span>
        </h2>
        <p class="text-slate-500 text-xs font-bold uppercase tracking-[0.3em] mt-2">Acceso a Vestuarios</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nombre de Usuario')" class="text-orange-500 uppercase font-black italic text-xs tracking-widest mb-1" />
            <x-text-input id="name" 
                class="block mt-1 w-full bg-slate-900 border-2 border-slate-800 text-white focus:border-orange-500 focus:ring-0 font-bold uppercase tracking-tight py-3" 
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name" 
                placeholder="ATLETA / ADMIN" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 font-bold text-[10px] uppercase italic" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" class="text-orange-500 uppercase font-black italic text-xs tracking-widest mb-1" />
            <x-text-input id="password" 
                class="block mt-1 w-full bg-slate-900 border-2 border-slate-800 text-white focus:border-orange-500 focus:ring-0 font-bold py-3"
                type="password"
                name="password"
                required autocomplete="current-password" 
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 font-bold text-[10px] uppercase italic" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" class="rounded-none border-slate-700 bg-slate-900 text-orange-500 shadow-sm focus:ring-0 focus:ring-offset-0" name="remember">
                <span class="ms-2 text-xs font-black uppercase italic text-slate-500 group-hover:text-slate-300 transition-colors">{{ __('Recordar sesión') }}</span>
            </label>
        </div>

        <div class="flex flex-col gap-4 mt-8">
            <x-primary-button class="w-full justify-center py-4 bg-orange-500 hover:bg-white hover:text-orange-600 transition-all shadow-[6px_6px_0px_0px_rgba(255,255,255,0.1)] active:shadow-none active:translate-x-1 active:translate-y-1">
                {{ __('Entrar a la Cancha') }}
            </x-primary-button>

            @if (Route::has('password.request'))
                <a class="text-center text-[10px] font-black uppercase italic text-slate-500 hover:text-orange-400 tracking-widest transition-colors" href="{{ route('register') }}">
                   ¿No tienes cuenta? <span class="underline">Regístrate aquí</span>
                </a>
            @endif
        </div>
    </form>

    <div class="mt-10 flex justify-center items-center gap-2">
        <div class="h-[1px] w-10 bg-slate-800"></div>
        <span class="text-[8px] text-slate-700 font-black tracking-[0.5em] uppercase text-center">Auth Secure Protocol 2.6</span>
        <div class="h-[1px] w-10 bg-slate-800"></div>
    </div>
</x-guest-layout>