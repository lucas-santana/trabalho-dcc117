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
                <form action="{{route('promotions.store')}}" method="POST">
                    @csrf
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Nome da Promoção</span>
                            <input name="name" type="text" placeholder="Digite o nome..." >
                        </div>

                        <div class="input-box">
                            <span class="details">Categorias Associadas</span>
                            <select name="categories" >
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-box">
                            <span class="details">Data de Ínicio</span>
                            <input name="starts_at" type="date">

                        </div>

                        <div class="input-box">
                            <span class="details">Data do Fim</span>
                            <input name="ends_at" type="date">

                        </div>

                        <div class="input-box">
                            <span class="details">Desconto que será aplicado nos jogos(%)</span>
                            <input name="discount_rate" type="text" placeholder="Digite a taxa...">
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
                            <button type="button" class="but2" onclick="window.location='{{ route('promotions.index') }}'">
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
