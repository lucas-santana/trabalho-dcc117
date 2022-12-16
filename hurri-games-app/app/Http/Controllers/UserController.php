<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','asc')->get();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $dadosValidados = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'bithDate' => 'required',
        ]);

        $user->update($dadosValidados);

        if(!$user->wasChanged()){
            Session::flash('warning', ['msg' => __('messages.sem_modificacao')]);
        }else{
            Session::flash('success', ['msg' => __('messages.sucesso_atualizacao')]);
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('success', ['msg' => __('messages.sucesso_exclusao')]);
        return redirect()->route('users.index');
    }
}
