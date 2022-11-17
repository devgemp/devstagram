<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function user()
    {
        // Relacion: Un post pertenece a un Usuario
        return $this->belongsTo(User::class)->select(['name', 'username']); // Campos seleccionados
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
