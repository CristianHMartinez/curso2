<?php

namespace Tests\Feature;

use App\Livewire\BuscadorAvisos;
use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class BuscadorAvisosTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $categoria = Categoria::create(['nombre' => 'General']);

        Post::create(['titulo' => 'Curso de primeros auxilios', 'contenido' => 'x', 'categoria_id' => $categoria->id, 'publicado' => true]);
        Post::create(['titulo' => 'Taller de manejo defensivo', 'contenido' => 'x', 'categoria_id' => $categoria->id, 'publicado' => true]);
        Post::create(['titulo' => 'Mantenimiento de patrullas', 'contenido' => 'x', 'categoria_id' => $categoria->id, 'publicado' => true]);
    }

    public function test_filtra_los_avisos_por_titulo_en_tiempo_real(): void
    {
        Livewire::test(BuscadorAvisos::class)
            ->assertSee('Curso de primeros auxilios')
            ->assertSee('Taller de manejo defensivo')
            ->set('busqueda', 'curso')
            ->assertSee('Curso de primeros auxilios')
            ->assertDontSee('Taller de manejo defensivo')
            ->assertDontSee('Mantenimiento de patrullas');
    }

    public function test_el_boton_limpiar_vacia_la_busqueda_y_muestra_todos_los_avisos_otra_vez(): void
    {
        Livewire::test(BuscadorAvisos::class)
            ->set('busqueda', 'curso')
            ->assertDontSee('Taller de manejo defensivo')
            ->call('limpiar')
            ->assertSet('busqueda', '')
            ->assertSee('Taller de manejo defensivo')
            ->assertSee('Curso de primeros auxilios');
    }
}
