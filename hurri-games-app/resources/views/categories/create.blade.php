@extends('layouts.main')

@section('title', 'Cadastrar Categoria')

@push('css')
    <link rel="stylesheet" href="{{asset('css/categoriesEdit.css')}}">
@endpush

@section('body')
    <div class="container">
        <div class="title">Cadastrar Categoria</div>
        <div class="content">
            <form action="#">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Nome da Categoria</span>
                        <input type="text" placeholder="Digite o nome..." >
                    </div>

                    <div class="input-box">
                        <span class="details">Descrição</span>
                        <input type="text" placeholder="Informe uma breve descrição..." >
                    </div>

                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Ativa
                    </label>
                </div>

                <div class="botoes">
                    <div class="button1">
                        <button class="but1">
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
@endsection
