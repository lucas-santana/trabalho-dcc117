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
                            <h1>25</h1>
                        </div>
                        <i class="ri-gamepad-line card--icon--lg"></i>
                    </div>
                </div>
                <div class="card card-2">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Custo Médio dos Jogos</h5>
                            <h1>4</h1>
                        </div>
                        <i class="ri-money-dollar-circle-fill card--icon--lg"></i>
                    </div>
                </div>
                <div class="card card-3">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Avaliação Média dos Jogos</h5>
                            <h1>17</h1>
                        </div>
                        <i class="ri-star-fill card--icon--lg"></i>
                    </div>
                </div>
            </div>
        </div>

        <section class="tabelaUsuarios">
            <div class="listaUsuarios">
                <h1>Usuários do Sistema</h1>
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
                    <tr>
                        <td>01</td>
                        <td>COD: BO2</td>
                        <td>Treyarch</td>
                        <td>15</td>
                        <td>18/05/2022</td>
                        <td>
                            <i class='bx bxs-edit-alt'></i>
                            <i class='bx bx-trash' ></i>
                        </td>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td>COD: WAW</td>
                        <td>SledgeHammer</td>
                        <td>10</td>
                        <td>18/05/2022</td>
                        <td>
                            <i class='bx bxs-edit-alt'></i>
                            <i class='bx bx-trash' ></i>
                        </td>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td>Super Mario World</td>
                        <td>Nintendo</td>
                        <td>14</td>
                        <td>18/05/2022</td>
                        <td>
                            <i class='bx bxs-edit-alt'></i>
                            <i class='bx bx-trash' ></i>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </section>
@endsection
