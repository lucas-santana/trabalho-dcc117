@extends('layouts.main')

@section('title', 'Usuários')

@push('css')
    <link rel="stylesheet" href="{{asset('css/users.css')}}">
@endpush

@section('body')
    <div class="main--content">
        <div class="overview">
            <div class="cards">
                <div class="card card-1">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Clientes</h5>
                            <h1>25</h1>
                        </div>
                        <i class="ri-user-2-line card--icon--lg"></i>
                    </div>
                </div>
                <div class="card card-2">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Desenvolvedores</h5>
                            <h1>4</h1>
                        </div>
                        <i class="ri-user-line card--icon--lg"></i>
                    </div>
                </div>
                <div class="card card-3">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Usuários ativos</h5>
                            <h1>17</h1>
                        </div>
                        <i class="ri-check-double-fill card--icon--lg"></i>
                    </div>
                </div>
                <div class="card card-4">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Vendas Mês Atual</h5>
                            <h1>15</h1>
                        </div>
                        <i class="ri-money-dollar-circle-line card--icon--lg"></i>
                    </div>
                </div>
            </div>
        </div>

        <section class="tabelaUsuarios">
            <div class="listaUsuarios">
                <h1>Usuários do Sistema</h1>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success fade show" role="alert">
                        {{$message}}
                    </div>
                @endif
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Número de Pontos</th>
                        <th>Data de Entrada</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>1023</td>
                            <td>{{$user->created_at->format('d/m/Y H:i:s')}}</td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    <a class='bx bxs-edit-alt' href="{{ route('users.edit', $user->id) }}"></a>

                                    @csrf
                                    @method('DELETE')
                                    <i class='bx bx-trash'><button type="submit"></button></i>


                                    <a class='bx bx-block' href="{{ route('users.block', $user->id) }}"></a>


                                    <a class='bx bx-message' href="{{ route('users.notificacao', $user->id) }}"></a>


                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
