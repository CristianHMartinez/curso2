<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use SoftDeletes;
    use hasFactory;

    protected $fillable = ['titulo', 'contenido', 'categoria_id', 'publicado', 'user_id', 'resumen'];

    protected $casts = ['publicado' => 'boolean'];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function etiquetas(): BelongsToMany
    {
        return $this->belongsToMany(Etiqueta::class);
    }

    public function scopePublicados($query)
    {
        return $query->where('publicado', true);
    }

    public function scopeDeCategoria($query, $categoriaId)
    {
        return $query->where('categoria_id', $categoriaId);
    }

    public function scopeRecientes($query, $dias = 7)
    {
        return $query->where('created_at', '>=', now()->subDays($dias));
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function esNuevo(): Attribute
    {
        return Attribute::get(fn () =>
            $this->publicado
            && $this->created_at->gt(now()->subDays(7))
        );
    }
}