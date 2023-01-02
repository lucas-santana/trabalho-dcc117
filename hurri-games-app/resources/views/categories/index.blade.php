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
                <x-message/>
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Ativa</th>
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
                            <td>{{$category->description}}</td>
                            <td>{{$category->is_active?'Sim':'Não'}}</td>
                            <td>6</td>
                            <td>2.5</td>

                            <td>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <a class='bx bxs-edit-alt'
                                       href="{{ route('categories.edit', $category->id) }}"></a>

                                    <x-btnDelete tipo="trash" classe="show_confirm"/>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <a class="btnDefault" href="{{ route('categories.create') }}">
                    <i class="uil uil-plus"></i>
                    <span>Cadastrar</span>&nbsp;
                </a>

            </div>
        </section>
    </div>
    <script type="text/javascript">


    </script>
@endsection
