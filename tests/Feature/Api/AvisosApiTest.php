<?php

use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('el listado responde 200', function () {
    $this->getJson('/api/avisos')->assertStatus(200);
});

test('el listado trae solo los avisos publicados', function () {
    Post::factory()->count(3)->create(['publicado' => true]);
    Post::factory()->create(['publicado' => false]);

    $this->getJson('/api/avisos')
        ->assertStatus(200)
        ->assertJsonCount(3, 'data');
});
