@extends('layouts.main')

@section('title', 'Categorias')

@push('css')
    <link rel="stylesheet" href="{{asset('css/categories.css')}}">
@endpush

@section('body')
    <div class="main--content">
        <div class="overview">
            <div class="cards">
                <div class="card card-1">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Total Categorias</h5>
                            <h1>25</h1>
                        </div>
                        <i class="ri-file-list-line card--icon--lg"></i>
                    </div>
                </div>
                <div class="card card-2">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Categoria com mais jogos</h5>
                            <h1>4</h1>
                        </div>
                        <i class="ri-sort-asc card--icon--lg"></i>
                    </div>
                </div>
                <div class="card card-3">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Categoria favorita</h5>
                            <h1>17</h1>
                        </div>
                        <i class="ri-star-fill card--icon--lg"></i>
                    </div>
                </div>
            </div>
        </div>

        <section class="tabelaUsuarios">
            <div class="listaUsuarios">
                <h1>Categorias do Sistema</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome da Categoria</th>
                        <th>Total de Jogos Associados</th>
                        <th>Avaliação Média</th>

                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>6</td>
                            <td>2.5</td>

                            <td>
                                <a class='bx bxs-edit-alt' href="{{ route('categories.edit', $category->id) }}"></a>
                                <abbr title="Deletar"><i class='bx bx-trash'></i></abbr>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <button class="but1">

                    <span><i class="uil uil-plus"><a class='uil uil-plus' href="{{ route('categories.create') }}"></a></i>Cadastrar Categoria</span>
                </button>
            </div>
        </section>
    </div>
@endsection
