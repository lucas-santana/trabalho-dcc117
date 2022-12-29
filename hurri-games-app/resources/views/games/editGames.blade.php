@extends('layouts.main')

@section('title', 'Editar Usuário')

@push('css')
    <link rel="stylesheet" href="{{asset('css/editGames.css')}}">
@endpush

@section('body')

    <div class="pseudo-right">
        <div class="container">
            <div class="title">Editar dados do jogo</div>
            <x-message/>
            <div class="content">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Nome completo</span>
                            <input name="name" type="text" placeholder="" value="{{$user->name}}"/>
                        </div>

                        {{-- <div class="input-box">
                             <span class="details">Último nome</span>
                             <input type="text" placeholder="" >
                         </div>--}}

                        <div class="input-box">
                            <span class="details">Email</span>
                            <input name="email" type="text" placeholder="" value="{{$user->email}}"/>
                        </div>

                        <div class="input-box">
                            <span class="details">Apelido</span>
                            <input name="nick_name" type="text" placeholder="" value="{{$user->nick_name}}"/>
                        </div>

                        <div class="input-box">
                            <span class="details">Data de Nascimento</span>
                            <input name="birth_date" type="date" placeholder=""  value="{{$user->birth_date}}"/>
                        </div>

                        <div class="form-check">
                            <input name="status" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" {{$user->status?'checked':''}}>
                            <label class="form-check-label" for="flexCheckDefault">
                                Ativo
                            </label>
                        </div>

                        {{-- <div class="input-box">
                             <span class="details">Senha</span>
                             <input type="text" placeholder="" >
                         </div>--}}

                    </div>

                    <div class="botoes">
                        <div class="button1">
                            <button type="submit" class="but1">
                                <span>Atualizar</span>
                                <i class="uil uil-edit"></i>
                            </button>
                        </div>

                        <div class="button2">
                            <button class="but2" type="button" onclick="window.location='{{ route('games.index') }}'">
                                <span>Cancelar</span>
                                <i class="uil uil-x"></i>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div></div>
    </div>


@endsection
