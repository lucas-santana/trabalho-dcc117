@extends('layouts.main')

@section('title', 'Categorias')

@push('css')
    <link rel="stylesheet" href="{{asset('css/categories.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
@endpush

@section('body')

        <section class="tabelaUsuarios">
            <div class="listaPromocoes">
                <h1>Cadastro/Efetivação de Promoções</h1>
                <x-message/>
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th> <!--Promoção de Inverno, Promoção Deu a Louca no Gerente Promoção Jogos do Ano, Promoção de Verão, Promoção Olimpiadas 2026, etc...-->
                        <th>Ativa</th>
                        <th>Categorias Associadas</th>
                        <th>Data Início/Data Fim</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>Promoção de Verão</td>
                            <td>Desativada</td>
                            <td>Ação/Aventura/FPS</td>
                            <td>23/06/1989 : 23/07/1989</td>
                            <td>
                                <i class="uil uil-trash"></i>
                                <i class="uil uil-power"></i> <!--Inverte Status??-->
                            </td>
                    </tbody>
                </table>
                <a class="btnDefault" href="{{ route('promo.create') }}">
                    <i class="uil uil-plus"></i>
                    <span>Cadastrar</span>&nbsp;
                </a>

            </div>
        </section>

    <script type="text/javascript">

    </script>
@endsection
