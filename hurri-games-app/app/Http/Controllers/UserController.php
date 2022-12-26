<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $users = User::orderBy('id', 'asc')->get();
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
        return view('users.edit')->with('user', $user);
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
            'birth_date' => 'required',
            'nick_name' => 'string',
            'status' => 'boolean'
        ]);


        $dadosValidados['status'] = $request->has('status') ? 1 : 0;
        if ($dadosValidados['status'] == 1) {
            //$user->banned_at = NULL;
            $user->banned_until = NULL;
            //$user->ban_reason = NULL;
        }

        //dd($dadosValidados);
        $user->update($dadosValidados);

        if (!$user->wasChanged()) {
            Session::flash('warning', ['msg' => __('messages.sem_modificacao')]);
        } else {
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

    public function banForm(User $user)
    {
        if ($user->status == 0) {
            Session::flash('warning', ['msg' => __('messages.usuario_ja_banido')]);
            return redirect()->route('users.index');
        }
        return view('users.banir')->with('user', $user);
    }

    public function notify(User $user)
    {
        return view('users.notification')->with('user', $user);
    }

    public function ban(Request $request, User $user)
    {
        $dadosValidados = $request->validate([
            'ban_time' => 'required',
            'ban_reason' => 'required'
        ]);


        //dd($dadosValidados['ban_time']);
        switch ($dadosValidados['ban_time']) {
            case "3H":
                $user->banned_until = Carbon::now()->addHours(3);
                break;
            case "6H":
                $user->banned_until = Carbon::now()->addHours(6);
                break;
            case "1D":
                $user->banned_until = Carbon::now()->addDay();
                break;
            case "1S":
                $user->banned_until = Carbon::now()->addWeek();
                break;
            default:
                return redirect()->back()->withErrors(['token' => __('messages.tempo_banimento_invalido')]);
        }


        $user->ban_reason = $dadosValidados['ban_reason'];
        $user->banned_at = Carbon::now();
        $user->status = 0;

        $user->update($dadosValidados);

        Session::flash('success', ['msg' => __('messages.usuario_banido')]);
        return redirect()->route('users.index');
    }
}
