@extends('layouts.main')

@section('title', 'Usuários')

@push('css')
    <link rel="stylesheet" href="{{asset('css/users.css')}}">
@endpush
<script type="text/javascript">

    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete this record?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });

</script>
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
                <x-message/>
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ativo</th>
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
                            <td>{{$user->status?'Sim':'Não'}}</td>
                            <td>1023</td>
                            <td>{{$user->created_at->format('d/m/Y H:i:s')}}</td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <a class='bx bxs-edit-alt' href="{{ route('users.edit', $user->id) }}"></a>

                                    @include('components.btnDelete')

                                    <a class='bx bx-block' href="{{ route('users.banForm', $user->id) }}"></a>
                                    @can('send-notifications')
                                        <a class='bx bx-message' href="{{ route('users.notifyForm', $user->id) }}"></a>
                                    @endcan

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
