<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWishListRequest;
use App\Http\Requests\UpdateWishListRequest;
use App\Models\Game;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Auth::user()->wishList()->withAvg('reviews as avgReview','rate')->paginate();


        return view('games.wishList')->with(['games'=>$games]);
    }

    public function destroy(Game $game)
    {
        Auth::user()->wishList()->detach($game->id);

        Session::flash('success', ['msg' => "Jogo removido da lista de desejos com sucesso!"]);
        return redirect()->route('wishlist.index');
    }
}
