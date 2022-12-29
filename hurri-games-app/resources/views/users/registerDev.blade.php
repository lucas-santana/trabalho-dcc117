@extends('layouts.main')

@section('title', 'Usuários')

@push('css')

    <link rel="stylesheet" href="{{asset('css/usersEdit.css')}}">
@endpush

@section('body')
    <div class="pseudo-right">
        <div class="container">
            <div class="title">Cadastro de Desenvolvedor</div>
            <x-message/>
            <div class="content">
                <form action="{{ route('users.registerDev', $user->id) }}" method="POST">
                    @csrf
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Razão social</span>
                            <input name="company_name" class="form-control"  type="text"/>
                        </div>

                        <div class="input-box">
                            <span class="details">Agência</span>
                            <input name="branch" class="form-control"  type="text"/>
                        </div>

                        <div class="input-box">
                            <span class="details">Conta</span>
                            <input name="account" class="form-control" type="text"/>
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Concordo com o compartilhamento dos meus dados seguindo a <a class="ancora" href="">Política de Privacidade</a> do site.
                            </label>
                        </div>
                    </div>

                    <div class="botoes">
                        <div class="button1">
                            <button type="submit" class="but1">
                                <span>Cadastrar</span>
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
    </div>

@endsection
