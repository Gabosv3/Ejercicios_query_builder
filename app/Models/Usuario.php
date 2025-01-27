<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    //se definen los campos de la tabla
    protected $fillable = ['nombre', 'email', 'telefono'];


    //relacion uno a muchos con la tabla pedidos
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_usuario');
    }
}
