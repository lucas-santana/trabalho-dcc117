<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function index()
    {
        $games = Game::all();
        $totalItensCarrinho = 0;

        $order = Order::where(['user_id' => Auth::id(), 'status' => 'PEN'])->first();
        if($order){
            $totalItensCarrinho = $order->orderItems()->get()->count();
        }

        return view('games.store')->with('games', $games)->with('totalItensCarrinho',$totalItensCarrinho);
    }

    public function showCartProduct(Request $request, Game $game){

        return view('games.showCartProduct')->with('game',$game);
    }

    public function showCart(Request $request){
        $order = Order::where(['user_id' => Auth::id(), 'status' => 'PEN'])->first();

        if (!$order) {
            //1. Se não existe pedido pendente, cria o pedido
            $order = new Order();
            $order->user_id = Auth::id();
            $order->status = 'PEN';
            $order->save();
        }

        $orderItems = $order->orderItems()->get();

        return view('games.cart')->with('orderItems', $orderItems);
    }

    public function cart(Request $request, Game $game)
    {
        $order = Order::where(['user_id' => Auth::id(), 'status' => 'PEN'])->first();

        if (!$order) {
            //1. Se não existe pedido pendente, cria o pedido
            $order = new Order();
            $order->user_id = Auth::id();
            $order->status = 'PEN';
            $order->save();
        }

        //2. Cria item do pedido com o pedido passado como parâmetro
        $orderItem = new OrderItem();
        $orderItem->game_id = $game->id;
        $orderItem->price = $game->normal_price;
        $order->orderItems()->save($orderItem);

        return redirect()->route('store.showCart');
    }
}
