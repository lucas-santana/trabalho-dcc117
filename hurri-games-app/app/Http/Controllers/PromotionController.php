<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Models\Category;
use App\Models\Promotion;
use Session;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::orderBy('id','asc')->paginate();

        return view('promotions.index')->with('promotions', $promotions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('promotions.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePromotionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromotionRequest $request)
    {
        $dadosValidados = $request->validate([
            'name' => 'required',
            'discount_rate' => 'required',
            'starts_at' => 'required',
            'ends_at' => 'required'
        ]);


        $promotion = Promotion::create($dadosValidados);

        $category = Category::find($request->get('categories'));

        $category->promotion()->associate($promotion);

        $category->save();

        Session::flash('sucess', ['msg' => __('messages.sucesso_cadastro')]);

        return redirect()->route('promotions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePromotionRequest  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePromotionRequest $request, Promotion $promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $categories = $promotion->categories()->get();

        $categories->map(function($c){
            $c->promotion_id = null;
            $c->save();
        });
//        $category->promotion()->associate($promotion);

        $promotion->delete();
        Session::flash('success', ['msg' => __('messages.sucesso_exclusao')]);
        return redirect()->route('promotions.index');
    }
}
