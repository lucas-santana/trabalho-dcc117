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
            $games = Game::withSum('reviews as sumRate','rate')
                ->withCount('reviews as totalReviews');
        }else{
            $games = Game::withSum('reviews as sumRate','rate')
                ->withCount('reviews as totalReviews')
                ->where('dev_user_id','=', Auth::id());
        }

        $games = $games->orderBy('id')->paginate();


        $gamesTotal = $games->count();
        $gamesAvgPrice = $games->average('normal_price');
        $gamesAvgReview = $games->avg('sumRate');


        return view('games.index')
            ->with([
                'games'=>$games,
                'gamesTotal'=>$gamesTotal,
                'gamesAvgPrice'=>$gamesAvgPrice,
                'gamesAvgReview'=>$gamesAvgReview
            ]);
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
            'normal_price' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);



        if (empty($request->session()->get('game'))) {
            $game = new Game();

        } else {
            $game = $request->session()->get('game');
        }

        if($request->has('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('games_image'), $imageName);

            $dadosValidados['image'] = $imageName;
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
        $game->dev_user_id = Auth::id();
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
        return view('games.editGames')->with([
            'game' => $game,
        ]);
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

        $dadosValidados = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'languages' => 'required',
            'normal_price' => 'required',
            'operational_system' => 'required',
            'processor' => 'required',
            'graphics_card' => 'required',
            'directx' => 'required',
            'storage' => 'required',
            'memory' => 'required',
        ]);

        $dadosValidados["languages"] = json_encode($dadosValidados["languages"]);
        $game->update($dadosValidados);

        if(!$game->wasChanged()){
            Session::flash('warning', ['msg' => __('messages.sem_modificacao')]);
        }else{
//            dd($game->getChanges());
            Session::flash('success', ['msg' => __('messages.sucesso_atualizacao')]);
        }

        return redirect()->route('games.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Game $game
     * @return Response
     */
    public function destroy(Game $game)
    {
        $game->categories()->detach();//excluir da tabela intermediária category_game
        $game->delete();//excluir o jogo em si

        Session::flash('success', ['msg' => __('messages.sucesso_exclusao')]);
        return redirect()->route('games.index');
    }
}
