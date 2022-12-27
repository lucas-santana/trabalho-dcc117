@extends('layouts.main')

@section('title', 'Especificações Jogo')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <link rel="stylesheet" href="{{asset('css/registerGame.css')}}">
@endpush

@section('body')
    <div class="pseudo-right">
        <div class="container">
            <h3>Cadastrar Jogos</h3>
            <div class="title">Especificações de Requisitos</div>
            <div class="content">
                <form action="" method="POST">
                    @csrf
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Nome do Título</span>
                            <input name="name" type="text" placeholder="Digite o nome..." >
                        </div>

                        <div class="input-box">
                            <span class="details">Breve Descrição</span>

                        </div>
                        <textarea class="form-control" id="formControl" rows="3"></textarea>

                        <div class="input-box">
                            <span class="details">Nome do Desenvolvedor</span>
                            <input name="name" type="text" placeholder="Digite o nome..." >
                        </div>

                        <div class="input-box">
                            <span class="details">Categorias Relacionadas ao Título</span>

                            <div class="categorias">
                                <!-- add class p-curve -->
                                <div class="pretty p-default p-curve">
                                    <input type="checkbox" />
                                    <div class="state">
                                        <label>Ação</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve p-fill">
                                    <input type="checkbox" />
                                    <div class="state">
                                        <label>Aventura</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve p-thick">
                                    <input type="checkbox" />
                                    <div class="state">
                                        <label>Azaração</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve p-thick">
                                    <input type="checkbox" />
                                    <div class="state">
                                        <label>Romance Esportivo</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="input-box">
                            <span class="details">Idiomas Disponíveis</span>

                            <div class="idiomas">
                                <!-- add class p-curve -->
                                <div class="pretty p-default p-curve">
                                    <input type="checkbox" />
                                    <div class="state">
                                        <label>PT-BR</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve p-fill">
                                    <input type="checkbox" />
                                    <div class="state">
                                        <label>ENG-USA</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve p-thick">
                                    <input type="checkbox" />
                                    <div class="state">
                                        <label>SPA</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve p-thick">
                                    <input type="checkbox" />
                                    <div class="state">
                                        <label>GER</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <span class="details">Preço Padrão</span>
                            <input name="name" type="text" placeholder="Digite o preço..." >
                        </div>
                    </div>
                    <div class="botoes">
                        <div class="button1">
                            <button class="but1">
                                <span>Avançar</span>
                                <i class="uil uil-edit"></i>
                            </button>
                        </div>

                        <div class="button2">
                            <button class="but2">
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