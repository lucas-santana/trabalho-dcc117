<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /*
     * Página principal da Loja
     */
    public function index(Request $request)
    {

        //Buscar apenas os jogos que o usuário não tem
        //select `game_id` from `games` inner join `library` on `games`.`id` = `library`.`game_id` where `library`.`user_id` = ?
        $userGames = Auth::user()->library()->pluck('game_id')->toArray();

        //select * from `games` where `id` not in (?, ?, ?)
        $games = Game::whereNotIn('id', $userGames);


        //filtrar por categoria
        if ($request->has('search_categories')) {
            $games = Game::whereHas('categories', function ($query) use ($request) {
                $query->where('category_id', $request->get('search_categories'));
            });
        }

        if ($request->has('search_price')) {
            if ($request->get('search_price') == '10_20') {
                $games->whereBetween('normal_price', [10, 20]);
            }

            if ($request->get('search_price') == '20_50') {
                $games->whereBetween('normal_price', [20, 50]);
            }

            if ($request->get('search_price') == '50_100') {
                $games->whereBetween('normal_price', [50, 100]);
            }

            if ($request->get('search_price') == 'm100') {
                $games->where('normal_price', '>', 100);
            }

        }

        if ($request->has('search_name_game')) {
            $games->where('name', 'like', '%' . $request->get('search_name_game') . '%');
        }

        $games = $games->get();

        //verificar, para cada jogo se já esta na lista de desejos
        $userWishList = Auth::user()->wishList()->pluck('game_id')->toArray();
        $games = $games->map(function ($g) use($userWishList) {
            $g->isOnWishList = in_array($g->id,$userWishList);
            return $g;
        });

        $totalItensCarrinho = 0;

        $order = Order::where(['user_id' => Auth::id(), 'status' => 'PEN'])->first();
        if ($order) {
            $totalItensCarrinho = $order->orderItems()->get()->count();
        }

        $categories = Category::all();

        return view('games.store')
            ->with('categories', $categories)
            ->with('games', $games)
            ->with('totalItensCarrinho', $totalItensCarrinho);
    }

    /*
     * Mostra detalhes do jogo antes de adicionar ao carrinho
     */
    public function showCartProduct(Request $request, Game $game)
    {

        return view('games.showCartProduct')->with('game', $game);
    }

    /*
     * Adicionar jogo no carrinho
     * Cria o pedido se ainda não existir algum pedido com status PEN
     */
    public function addCart(Request $request, Game $game)
    {
        $order = Order::where(['user_id' => Auth::id(), 'status' => 'PEN'])->first();

        //1. Se não existe pedido pendente, cria o pedido
        if (!$order) {

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

    /*
     * Mostrar o carrinho com todos os itens
     */
    public function showCart(Request $request)
    {
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


    /*
     * Exclui um item do carrinho
     */
    public function deleteCartProduct(Request $request, OrderItem $orderItem)
    {
        $orderItem->delete();
        return redirect()->route('store.showCart');
    }

    /*
     * Finaliza a compra, alterando o status do pedido pra concluido (CON)
     * e adicionando os jogos na biblioteca do usuario
     */
    public function checkout(Request $request)
    {
        $order = Order::where(['user_id' => Auth::id(), 'status' => 'PEN'])->first();

        if ($order) {
            //alterar status do pedido
            $order->status = 'CON';//Concluído
            $order->save();

            //ids dos jogos comprados
            $ids = $order->orderItems()->pluck('game_id')->toArray();

            //add jogos a biblioteca do usuário
            $user = Auth::user();
            $user->library()->sync($ids);
        }

        return redirect()->route('store.index');
    }

    public function addWishList(Request $request, Game $game)
    {
        Auth::user()->wishList()->attach($game->id);
        return response()->json(['success' => $game->name]);
    }
}
