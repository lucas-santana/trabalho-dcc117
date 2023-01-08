@extends('layouts.main')

@section('title', 'Jogos')

@push('css')
    <link rel="stylesheet" href="{{asset('css/games.css')}}">
@endpush

@section('body')
    <div class="main--content">
        <div class="overview">
            <div class="cards">
                <div class="card card-1">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Total Jogos</h5>
                            <h1>{{$gamesTotal}}</h1>
                        </div>
                        <i class="ri-gamepad-line card--icon--lg"></i>
                    </div>
                </div>
                <div class="card card-2">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Custo Médio dos Jogos</h5>
                            <h1>@money($gamesAvgPrice)</h1>
                        </div>
                        <i class="ri-money-dollar-circle-fill card--icon--lg"></i>
                    </div>
                </div>
                <div class="card card-3">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Avaliação Média dos Jogos</h5>
                            <h1>{{number_format($gamesAvgReview,2)}}</h1>
                        </div>
                        <i class="ri-star-fill card--icon--lg"></i>
                    </div>
                </div>
            </div>
        </div>

        <section class="tabelaUsuarios">
            <div class="listaUsuarios">
                <h1>Jogos</h1>
                <x-message/>
                <div >
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Jogo</th>
                            <th>Nome Desenvolvedor</th>
                            <th>Número de Avaliações</th>
                            <th>Data de Entrada</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($games as $game)
                            <tr>
                                <td>{{$game->id}}</td>
                                <td>{{$game->name}}</td>
                                <td >{{$game->developer->name}}</td>
                                <td >{{$game->totalReviews}}</td>
                                <td >{{$game->released_at->format('d/m/Y')}}</td>
                                <td>
                                    <form action="{{ route('games.destroy', $game->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <a class='bx bxs-edit-alt'
                                           href="{{ route('games.edit', $game->id) }}"></a>

                                        <x-btnDelete tipo="trash" classe="show_confirm"/>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$games->links()}}
                </div>

                @can('create-game')
                    <a class="btnDefault" href="{{ route('games.createStep1') }}">
                        <i class="uil uil-plus"></i>
                        <span>Cadastrar Jogo</span>&nbsp;
                    </a>
            @endcan

        </section>

@endsection
