<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        return Pedido::all();
    }

    public function store(Request $request)
    {
        $pedido = Pedido::create([
            'user_id' => $request->user_id,
            'data_pedido' => $request->data_pedido,
            'status' => $request->status
        ]);

        return response()->json($pedido, 201);
    }

    public function show(string $id)
    {
        return Pedido::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $pedido = Pedido::findOrFail($id);

        $pedido->update([
            'user_id' => $request->user_id,
            'data_pedido' => $request->data_pedido,
            'status' => $request->status
        ]);

        return response()->json($pedido, 200);
    }

    public function destroy(Request $request, string $id)
    {
        $pedido = Pedido::findOrFail($id);

        if ($pedido->user_id != $request->user()->id) {

            return response()->json([
                'message' => 'Você não pode deletar este pedido'
            ], 403);

        }

        $pedido->delete();

        return response()->json([
            'message' => 'Pedido deletado com sucesso'
        ]);
    }
}