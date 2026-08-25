# Consultas Tinker · Sesion 2

Consultas probadas en php artisan tinker.

## Bloque A

1. Los 5 posts publicados mas recientes, mostrando solo titulo y created_at.

```php
Post::publicados()->latest()->take(5)->get(['titulo', 'created_at']);
// Devolvio 5 registros (ordenados del mas nuevo al mas viejo):
// 1) Cambio de horario en barandilla
// 2) Curso de primeros auxilios
// 3) Mantenimiento de patrullas
// 4) Actualizacion del directorio interno
// 5) Taller de manejo defensivo
```

2. Cuantos posts estan publicados y cuantos en borrador.

```php
[
    'publicados' => Post::publicados()->count(),
    'borrador' => Post::where('publicado', false)->count(),
];
// Devolvio: publicados = 6, borrador = 2
```

3. Los posts de una categoria usando el scope deCategoria, ordenados del mas nuevo al mas viejo.

```php
Post::deCategoria(1)->latest()->get(['titulo', 'created_at']);
// Devolvio 3 registros:
// - Cambio de horario en barandilla
// - Actualizacion del directorio interno
// - Renovacion de credenciales
```

4. Los posts publicados cuyo titulo contenga una palabra elegida (Operativo).

```php
Post::publicados()->where('titulo', 'like', '%Operativo%')->get(['titulo', 'created_at']);
// Devolvio 1 registro:
// - Operativo coordinado en el sector norte
```

5. Scope recientes($dias = 7) encadenado con publicados().

```php
Post::publicados()->recientes(30)->get(['titulo', 'created_at']);
// Devolvio 6 registros publicados creados en los ultimos 30 dias
```

## Bloque B

Prueba de attach y sync (nivel 2):

```php
$post = Post::first();
$post->etiquetas()->attach([1, 2]);
$post->etiquetas()->pluck('nombre');
// Devolvio etiquetas en el post (ejemplo): ['seguridad', 'operativo']

$post->etiquetas()->sync([2, 3]);
$post->fresh()->etiquetas->pluck('nombre');
// Devolvio solo el set sincronizado: ['operativo', 'aviso']
```

6. Posts sin ninguna etiqueta.

```php
Post::doesntHave('etiquetas')->get(['titulo']);
// Devolvio 5 registros sin etiquetas:
// - Actualizacion del directorio interno
// - Taller de manejo defensivo
// - Operativo coordinado en el sector norte
// - Renovacion de credenciales
// - Simulacro de evacuacion en oficinas centrales
```

7. Etiquetas ordenadas por cuantos posts las usan, de mayor a menor.

```php
Etiqueta::withCount('posts')->orderByDesc('posts_count')->get(['nombre']);
// Devolvio:
// - seguridad (2)
// - operativo (2)
// - aviso (1)
```

8. Consulta combinada (scope + condicion sobre relacion + with()).

```php
Post::publicados()
    ->deCategoria(3)
    ->whereRelation('etiquetas', 'nombre', 'operativo')
    ->with('categoria', 'etiquetas')
    ->latest()
    ->get(['id', 'titulo', 'categoria_id']);
// Pregunta que responde: Que avisos publicados de la categoria Operativo tienen la etiqueta operativo.
// Devolvio 1 registro: Operativo coordinado en el sector norte
```
