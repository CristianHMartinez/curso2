<div>
    <div class="flex gap-3 items-center mb-6">
        <input
            type="text"
            wire:model.live.debounce.300ms="busqueda"
            placeholder="Buscar aviso por título..."
            class="flex-1 rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
        >

        @if ($busqueda)
            <button
                wire:click="limpiar"
                class="text-sm font-semibold text-blue-700 hover:underline whitespace-nowrap"
            >
                Limpiar
            </button>
        @endif

        <span wire:loading wire:target="busqueda" class="text-sm text-gray-400">Buscando...</span>
    </div>

    <div class="grid md:grid-cols-2 gap-4">
        @forelse ($avisos as $aviso)
            <x-tarjeta-post :post="$aviso" />
        @empty
            <p class="text-gray-500 col-span-2 text-center py-8">No se encontraron avisos.</p>
        @endforelse
    </div>
</div>
