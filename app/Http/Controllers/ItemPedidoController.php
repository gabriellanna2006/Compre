<?php

namespace App\Http\Controllers;

use App\Models\ItemPedido;
use Illuminate\Http\Request;

class ItemPedidoController extends Controller
{
    public function index()
    {
        return ItemPedido::all();
    }

    public function store(Request $request)
    {
        $itemPedido = ItemPedido::create([
            'pedido_id' => $request->pedido_id,
            'produto_id' => $request->produto_id,
            'quantidade' => $request->quantidade,
            'preco' => $request->preco
        ]);

        return response()->json($itemPedido, 201);
    }

    public function show(string $id)
    {
        return ItemPedido::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $itemPedido = ItemPedido::findOrFail($id);

        $itemPedido->update([
            'pedido_id' => $request->pedido_id,
            'produto_id' => $request->produto_id,
            'quantidade' => $request->quantidade,
            'preco' => $request->preco
        ]);

        return response()->json($itemPedido, 200);
    }

    public function destroy(string $id)
    {
        ItemPedido::findOrFail($id)->delete();

        return response()->json([
            'message' => 'ItemPedido deletado com sucesso'
        ]);
    }
}