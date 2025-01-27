<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    //

    public function insertarDatos()
    {
        // Inserta usuarios
        Usuario::insert([
            ['nombre' => 'Juan Pérez', 'email' => 'juan@example.com', 'telefono' => '12345678'],
            ['nombre' => 'Roberto García', 'email' => 'roberto@example.com', 'telefono' => '98765432'],
            ['nombre' => 'Ana López', 'email' => 'ana@example.com', 'telefono' => '55512345'],
            ['nombre' => 'Ricardo Díaz', 'email' => 'ricardo@example.com', 'telefono' => '44498765'],
            ['nombre' => 'María Fernández', 'email' => 'maria@example.com', 'telefono' => '33378945'],
        ]);

        // Inserta pedidos
        Pedido::insert([
            ['producto' => 'Producto A', 'cantidad' => 2, 'total' => 200, 'id_usuario' => 1],
            ['producto' => 'Producto B', 'cantidad' => 1, 'total' => 150, 'id_usuario' => 2],
            ['producto' => 'Producto C', 'cantidad' => 3, 'total' => 300, 'id_usuario' => 3],
            ['producto' => 'Producto D', 'cantidad' => 4, 'total' => 100, 'id_usuario' => 4],
            ['producto' => 'Producto E', 'cantidad' => 2, 'total' => 250, 'id_usuario' => 5],
        ]);

        return response()->json(['mensaje' => 'Datos insertados correctamente']);
    }

    //En esta función se muestran todos los pedidos de un usuario específico
    public function pedidosUsuarioID2()
    {
        $pedidos = Pedido::where('id_usuario', 2)->get();
        return response()->json($pedidos);
    }


    //En esta función se muestran todos los pedidos con sus respectivos usuarios
    public function pedidosConUsuarios()
    {
        $pedidos = Pedido::with('usuario')->get();
        return  response()->json($pedidos);
    }


    //En esta función se muestran todos los pedidos cuyo total esté entre 100 y 250
    public function pedidosPorRango()
    {
        $pedidos = Pedido::whereBetween('total', [100, 250])->get();
        return  response()->json($pedidos);
    }


    //En esta función se muestran todos los usuarios cuyo nombre empiece por la letra R
    public function usuariosConR()
    {
        $usuarios = Usuario::where('nombre', 'like', 'R%')->get();
        return  response()->json($usuarios);
    }


    //En esta función se muestran todos los pedidos de un usuario específico
    public function totalPedidosUsuario5()
    {
        $totalPedidos = Pedido::where('id_usuario', 5)->count();
        return  response()->json($totalPedidos);
    }


    //En esta función se muestran todos los pedidos de un usuario específico
    public function pedidosOrdenados()
    {
        $pedidos = Pedido::with('usuario')->orderBy('total', 'desc')->get();
        return  response()->json($pedidos);
    }


    //En esta función se muestran todos los pedidos de un usuario específico
    public function sumaTotalPedidos()
    {
        $sumaTotal = Pedido::sum('total');
        return  response()->json($sumaTotal);
    }


    //En esta función se muestran todos los pedidos de un usuario específico
    public function pedidoMasEconomico()
    {
        $pedido = Pedido::with('usuario')->orderBy('total', 'asc')->first();
        return  response()->json($pedido);
    }


    //En esta función se muestran todos los pedidos de un usuario específico
    public function pedidosAgrupadosPorUsuario()
    {
        $pedidos = Pedido::select('id_usuario', 'producto', 'cantidad', 'total')
            ->groupBy('id_usuario', 'producto', 'cantidad', 'total')
            ->get();
        return  response()->json($pedidos);
    }
}
