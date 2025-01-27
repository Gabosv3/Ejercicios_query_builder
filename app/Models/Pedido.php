<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    
    //se definen los campos de la tabla
    protected $fillable = ['producto', 'cantidad', 'total', 'id_usuario'];

    //relacion uno a muchos con la tabla usuarios
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}