<nav x-data="{ open: false }" class="bg-slate-950 border-b-4 border-orange-500 shadow-2xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20"> <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="#" class="text-2xl font-black italic tracking-tighter text-white">
                        TODO<span class="text-orange-500">DEPORTES</span>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    
                    
                    <x-nav-link :href="route('equipos.index')" :active="request()->routeIs('equipos.*')" 
                        class="text-slate-400 hover:text-white font-black uppercase italic text-xs tracking-widest transition-all border-b-0 hover:border-b-2 hover:border-orange-500">
                        {{ __('Franquicias') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-slate-700 text-xs leading-4 font-black uppercase italic rounded-none text-slate-300 bg-slate-900 hover:text-white focus:outline-none transition ease-in-out duration-150">
                            <div class="mr-2">{{ Auth::user()->name }}</div>
                            <span class="text-orange-500 text-[10px] bg-orange-500/10 px-1 rounded">{{ Auth::user()->role }}</span>
                            
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="font-bold uppercase text-xs">
                            {{ __('Mi Perfil') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="font-bold uppercase text-xs text-red-500">
                                {{ __('Cerrar Sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>