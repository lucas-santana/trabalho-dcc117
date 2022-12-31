@extends('layouts.main')

@section('title', 'Cadastrar Categoria')

@push('css')
    <link rel="stylesheet" href="{{asset('css/categoriesEdit.css')}}">
@endpush

@section('body')
    <div class="pseudo-right">
        <div class="container">
            <div class="title">Cadastrar Promoção</div>
            <div class="content">
                <form action="" method="POST">
                    @csrf
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Nome da Promoção</span>
                            <input name="name" type="text" placeholder="Digite o nome..." >
                        </div>

                        <div class="input-box">
                            <span class="details">Categorias Associadas</span>
                            <select class="form-select" multiple aria-label="multiple select example">
                                <option value="0">AVENTURA</option>
                                <option value="1">FPS</option>
                                <option value="2">RPG</option>
                                <option value="3">MOBA</option>
                            </select>
                        </div>

                        <div class="input-box">
                            <span class="details">Data de Ínicio</span>
                            <input type="date">

                        </div>

                        <div class="input-box">
                            <span class="details">Data do Fim</span>
                            <input type="date">

                        </div>

                        <div class="input-box">
                            <span class="details">Desconto que será aplicado nos jogos(%)</span>
                            <input type="text" placeholder="Digite a taxa...">

                        </div>
                    </div>

                    <div>
                        <h3>Informe um valor entre 0 e 100 para o desconto.</h3>
                    </div>

                    <div class="botoes">
                        <div class="button1">
                            <button class="but1">
                                <span>Cadastrar</span>
                                <i class="uil uil-edit"></i>
                            </button>
                        </div>

                        <div class="button2">
                            <button type="button" class="but2" onclick="window.location=''">
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
