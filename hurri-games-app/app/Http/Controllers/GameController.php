<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Category;
use App\Models\Game;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        if(Auth::user()->is_admin){
            $games = Game::all();
        }else{
            $games = Game::where('user_id','=', Auth::id())->get();
        }

        return view('games.index')->with('games', $games);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function createStep1(Request $request)
    {

        $categories = Category::all();
        //$game = $request->session()->get('game');
        $request->session()->forget('game');

        return view('games.registerGame')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGameRequest $request
     * @return RedirectResponse|Response
     */
    public function storeStep1(StoreGameRequest $request)
    {
        $dadosValidados = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'categories' => 'required',
            'languages' => 'required',
            'normal_price' => 'required'
        ]);

        if (empty($request->session()->get('game'))) {
            $game = new Game();

        } else {
            $game = $request->session()->get('game');
        }

        $game->fill($dadosValidados);
        $request->session()->put('game', $game);

        return redirect()->route('games.createStep2');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function createStep2(Request $request)
    {
        $game = $request->session()->get('game');

        return view('games.statsGames')->with('game', $game);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGameRequest $request
     * @return RedirectResponse
     */
    public function storeStep2(StoreGameRequest $request)
    {
        $dadosValidados = $request->validate([
            'operational_system' => 'required',
            'processor' => 'required',
            'graphics_card' => 'required',
            'directx' => 'required',
            'storage' => 'required',
            'memory' => 'required'
        ]);

        $game = $request->session()->get('game');
        $game->fill($dadosValidados);
        $game->user_id = Auth::id();
        $game->released_at = Carbon::now();

        $game->languages = json_encode($game->languages);
        $categories =$game->categories;
        unset($game->categories);
        $game->save();


        $game->categories()->sync($categories);

        $request->session()->forget('game');
        Session::flash('success', ['msg' => __('messages.sucesso_cadastro')]);

        return redirect()->route('games.index');

    }

    /**
     * Display the specified resource.
     *
     * @param Game $game
     * @return Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Game $game
     * @return Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGameRequest $request
     * @param Game $game
     * @return Response
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Game $game
     * @return Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
