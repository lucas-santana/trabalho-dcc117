<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibrayController extends Controller
{

    public function index(Request $request)
    {
        $games = Auth::user()->library()->withAvg('reviews as avgReview','rate');

        //filtrar por categoria
        if ($request->has('search_categories')) {
            $games = $games->whereHas('categories', function ($query) use ($request) {
                $query->where('category_id', $request->get('search_categories'));
            });
        }

        if ($request->has('search_name_game')) {
            $games->where('name', 'like', '%' . $request->get('search_name_game') . '%');
        }
        $games = $games->orderBy('id')->get();


        return view('games.library')->with(['categories' => Category::all(), 'games' => $games]);
    }

    public function reviewForm(Request $request, Game $game){
        return view('games.rate')->with(['game'=>$game]);
    }

    public function saveReview(Request $request, Game $game){

        $dadosValidados = $request->validate([
            'rate' => 'required',
            'review' => 'required'
        ]);

        $dadosValidados['user_id'] = Auth::id();

        $game->reviews()->create($dadosValidados);
        return view('games.rate')->with(['game'=>$game]);
    }

}
