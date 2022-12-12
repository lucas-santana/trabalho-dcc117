@extends('layouts.main')

@section('title', 'Editar Usuário')

@push('css')
    <link rel="stylesheet" href="{{asset('css/usersEdit.css')}}">
@endpush

@section('body')
    <div class="container">
        <div class="title">Editar dados do usuário</div>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="content">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="user-details">
                    <div class="input-box">
                        <label class="details">Primeiro nome
                            <input name="name" type="text" placeholder="" value="{{$user->name}}"/>
                        </label>
                    </div>

                    <div class="input-box">
                        <label class="details">Último nome
                            <input name="lastName" type="text" placeholder=""/>
                        </label>
                    </div>

                    <div class="input-box">
                        <label class="details">Email
                            <input name="email" type="text" placeholder="" value="{{$user->email}}"/>
                        </label>
                    </div>

                    <div class="input-box">
                        <label class="details">Apelido
                            <input type="text" placeholder="">
                        </label>
                    </div>

                    <div class="input-box">
                        <label class="details">Data de Nascimento
                            <input name="bithDate" type="date" placeholder="">
                        </label>
                    </div>

                    <div class="input-box">
                        <label class="details">Senha
                            <input type="text" placeholder="">
                        </label>
                    </div>

                </div>

                <div class="botoes">
                    <div class="button1">
                        <button type="submit" class="but1">
                            <span>Editar</span>
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
