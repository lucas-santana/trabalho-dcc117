<?php

namespace App\Http\Controllers;

use App\Models\DeveloperData;
use App\Models\Notifications;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $users = User::withCount('library')->get();
        $usersTotal = User::all()->count();
        $usersActive =User::where('status','=',true)->count();
        $usersDev = User::where('is_dev','=',true)->count();

        return view('users.index')->with([
            'users'=> $users,
            'usersTotal'=> $usersTotal,
            'usersActive'=> $usersActive,
            'usersDev'=> $usersDev
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View|Response
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse|Response
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

    public function ban(Request $request, User $user)
    {
        $dadosValidados = $request->validate(['ban_time' => 'required', 'ban_reason' => 'required']);


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

        $notification = new Notifications();
        $notification->message = $user->ban_reason;

        $user->notifications()->save($notification);

        Session::flash('success', ['msg' => __('messages.usuario_banido')]);
        return redirect()->route('users.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse|Response
     */
    public function update(Request $request, User $user)
    {
        $dadosValidados = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'birth_date' => 'required',
            'nick_name' => 'string',
            'status' => 'boolean']);


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

    public function notifyForm(User $user)
    {
        Gate::authorize('send-notifications', \Auth::user());
        return view('users.notification')->with('user', $user);
    }

    public function notify(Request $request, User $user)
    {
        Gate::authorize('send-notifications', \Auth::user());
        $dadosValidados = $request->validate([
            'message' => 'required'
        ]);

        $notification = new Notifications($dadosValidados);

        $user->notifications()->save($notification);

        Session::flash('success', ['msg' => "Notificação enviada com sucesso!"]);
        return redirect()->route('users.index');
    }

    public function registerDevForm(User $user)
    {
        if(\Auth::user()->is_dev){
            Session::flash('warning', ['msg' => "Notificação enviada com sucesso!"]);
        }
        return view('users.registerDev')->with('user', $user);
    }

    public function registerDev(Request $request, User $user)
    {
        $dadosValidados = $request->validate([
            'company_name' => 'required',
            'branch' => 'required',
            'account' => 'required'
        ]);

        $developerData = new DeveloperData($dadosValidados);

        $user->is_dev = true;
        $user->save();
        $user->developerData()->save($developerData);

        Session::flash('success', ['msg' => 'Cadastro de desenvolvedor realizado!']);
        return redirect()->route('home');
    }
}
