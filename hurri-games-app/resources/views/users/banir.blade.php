@extends('layouts.main')

@section('title', 'Usuários')

@push('css')
<link rel="stylesheet" href="{{asset('css/userBan.css')}}">
@endpush

@section('body')
<div class="container">
    <div class="title">Banir usuário</div>
    <x-message/>
    <div class="content">
        <form action="{{ route('users.ban', $user->id) }}" method="POST">
            @csrf
            <div class="user-details">
                {{--<div class="input-box">
                    <span class="details">Selecione o usuário a ser banido</span>
                    <select class="form-select" aria-label="Default select example">
                        <option value="1">MadarinhaXD</option>
                        <option value="2">McCocota553</option>
                        <option value="3">FabinDoPneu_2x</option>
                    </select>
                </div>--}}

                <span><strong>Usuário:</strong> {{$user->name}}</span>

                <div class="input-box">
                    <span class="details">Tempo de Banimento</span>
                    <select name="ban_time" class="form-select" aria-label="Default select example">
                        <option value="3H">3 horas</option>
                        <option value="6H">6 horas</option>
                        <option value="1D">1 dia</option>
                        <option value="1S">1 semana</option>
                    </select>
                </div>

                <div class="input-box">
                    <span class="details">Motivo do banimento</span>
                    <textarea name="ban_reason" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>


            </div>

            <div class="botoes">
                <div class="button1">
                    <button class="but1">
                        <span>Banir</span>
                        <i class="uil uil-edit"></i>
                    </button>
                </div>

                <div class="button2">
                    <button class="but2">
                        <span>Cancelar</span>
                        <i class="uil uil-x"></i>
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
