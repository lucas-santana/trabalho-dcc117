<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesActive = Category::where('is_active','=',true)->count();

        $categories = Category::orderBy('id', 'asc')->get();

        $categoriesTotal = $categories->count();

        $categories = Category::withCount('games as totalGames')->get();

        $maxGames = $categories->max('totalGames');

        return view('categories.index')->with([
            'categoriesActive' => $categoriesActive,
            'categoriesTotal' => $categoriesTotal,
            'categories' => $categories,
            'maxGames' => $maxGames,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $dadosValidados = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'is_active' => 'boolean'
        ]);

        Category::create($dadosValidados);
        Session::flash('success', ['msg' => __('messages.sucesso_cadastro')]);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCategoryRequest $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $dadosValidados = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $dadosValidados['is_active'] = $request->has('is_active') ? 1 : 0;

        $category->update($dadosValidados);

        if(!$category->wasChanged()){
            Session::flash('warning', ['msg' => __('messages.sem_modificacao')]);
        }else{
            Session::flash('success', ['msg' => __('messages.sucesso_atualizacao')]);
        }


        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        Session::flash('success', ['msg' => __('messages.sucesso_exclusao')]);
        return redirect()->route('categories.index');
    }
}
