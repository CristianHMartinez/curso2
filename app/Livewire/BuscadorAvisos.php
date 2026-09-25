<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class BuscadorAvisos extends Component
{
    public string $busqueda = '';

    public function limpiar(): void
    {
        $this->busqueda = '';
    }

    public function render()
    {
        return view('livewire.buscador-avisos', [
            'avisos' => Post::publicados()
                ->with('categoria')
                ->where('titulo', 'like', "%{$this->busqueda}%")
                ->latest()
                ->get(),
        ]);
    }
}
