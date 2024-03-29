@php use Illuminate\Support\Carbon; @endphp
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
                        <th>Data Início</th>
                        <th>Data Fim</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($promotions as $promotion)
                        <tr>
                            <td>{{$promotion->id}}</td>
                            <td>{{$promotion->name}}</td>
                            <td>Sim/Não</td>
                            <td>
                                @foreach($promotion->categories()->get() as $ca)
                                    <strong>{{$ca->name}}</strong>
                                @endforeach
                            </td>
                            <td>{{Carbon::create($promotion->starts_at)->format('d/m/y')}}</td>
                            <td>{{Carbon::create($promotion->ends_at)->format('d/m/y')}}</td>
                            <td>
                                <form action="{{ route('promotions.destroy', $promotion->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <x-btnDelete tipo="trash" classe="show_confirm"/>
                                    <i class="uil uil-power"></i> <!--Inverte Status??-->
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$promotions->links()}}
                <a class="btnDefault" href="{{ route('promotions.create') }}">
                    <i class="uil uil-plus"></i>
                    <span>Cadastrar</span>&nbsp;
                </a>

            </div>
        </section>

    <script type="text/javascript">

    </script>
@endsection
