<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Jugador: {{ $jugador->nombre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('jugadores.update', $jugador) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <x-input-label for="nombre" :value="__('Nombre del Jugador')" />
                        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $jugador->nombre)" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="dorsal" :value="__('Número / Dorsal')" />
                        <x-text-input id="dorsal" class="block mt-1 w-full" type="number" name="dorsal" :value="old('dorsal', $jugador->numero)" min="1" required />
                    </div>

                    <div class="flex items-center justify-end">
                        <a href="{{ route('equipos.show', $jugador->equipo_id) }}" class="mr-4 text-gray-600">Cancelar</a>
                        <x-primary-button>Guardar Cambios</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>