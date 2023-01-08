@extends('layouts.main')

@section('title', 'Registrar Jogo')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <link rel="stylesheet" href="{{asset('css/registerGame.css')}}">
@endpush

@section('body')
    <div class="pseudo-right">
        <div class="container">
            <h3>Cadastrar Jogos</h3>
            <div class="title">Dados Básicos</div>
            <x-message/>
            <div class="content">
                <form action="{{route('games.storeStep1')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Nome do Título</span>
                            <input name="name" type="text" placeholder="Digite o nome do jogo"  value="{{old('name') }}">
                        </div>

                        <div class="input-box">
                            <span class="details">Breve Descrição</span>
                        </div>
                        <textarea name="description" class="form-control" id="formControl" rows="3">{{ old('description') }}</textarea>

                        <div class="input-box">
                            <span class="details">Nome do Desenvolvedor</span>
                            <input name="dev_name" type="text" placeholder="Digite o nome..." value="{{Auth::user()->name}}" disabled>
                        </div>

                        <div class="input-box">
                            <span class="details">Categorias Relacionadas ao Título</span>

                            <div class="categorias">
                                @foreach($categories as $category)
                                    <!-- add class p-curve -->
                                    <div class="pretty p-default p-curve">
                                        <input name="categories[]" id="{{$category->id}}" value="{{$category->id}}" type="checkbox"
                                            {{ (is_array(old('categories')) && in_array($category->id, old('categories'))) ? ' checked' : '' }}
                                        />
                                        <div class="state">
                                            <label for="{{$category->id}}">{{$category->name}}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="input-box">
                            <span class="details">Idiomas Disponíveis</span>

                            <div class="idiomas">
                                <!-- add class p-curve -->
                                <div class="pretty p-default p-curve">
                                    <input name="languages[]" type="checkbox" value="PT-BR"
                                        {{ (is_array(old('languages')) && in_array('PT-BR', old('languages'))) ? ' checked' : '' }}
                                    />
                                    <div class="state">
                                        <label>PT-BR</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve">
                                    <input name="languages[]" type="checkbox" value="ENG-USA"
                                        {{ (is_array(old('languages')) && in_array('ENG-USA', old('languages'))) ? ' checked' : '' }}
                                    />
                                    <div class="state">
                                        <label>ENG-USA</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve">
                                    <input name="languages[]" type="checkbox" value="SPA"
                                        {{ (is_array(old('languages')) && in_array('SPA', old('languages'))) ? ' checked' : '' }}
                                    />
                                    <div class="state">
                                        <label>SPA</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve">
                                    <input name="languages[]" type="checkbox" value="GER"
                                        {{ (is_array(old('languages')) && in_array('GER', old('languages'))) ? ' checked' : '' }}
                                    />
                                    <div class="state">
                                        <label>GER</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve">
                                    <input name="languages[]" type="checkbox" value="FRA"
                                        {{ (is_array(old('languages')) && in_array('GER', old('languages'))) ? ' checked' : '' }}
                                    />
                                    <div class="state">
                                        <label>FRA</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve">
                                    <input name="languages[]" type="checkbox" value="FRA"
                                        {{ (is_array(old('languages')) && in_array('GER', old('languages'))) ? ' checked' : '' }}
                                    />
                                    <div class="state">
                                        <label>RUS</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve">
                                    <input name="languages[]" type="checkbox" value="FRA"
                                        {{ (is_array(old('languages')) && in_array('GER', old('languages'))) ? ' checked' : '' }}
                                    />
                                    <div class="state">
                                        <label>JAP</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="input-box">
                            <span class="details">Preço Padrão</span>
                            <input name="normal_price" type="text" placeholder="Digite o preço..." >
                        </div>

                        <div class="input-box">
                            <span>Imagem do Título</span>
                            <label class="send-image" for="image">Escolher arquivo</label>
                            <input type="file" id="image" name="image">
                        </div>
                    </div>
                    <div class="botoes">

                        <a href="{{route('games.createStep2')}}">
                            <div class="button1">
                                <button type="submit" class="but1">
                                    <span>Avançar</span>
                                    <i class="uil uil-edit"></i>
                                </button>
                            </div>
                        </a>

                        <div class="button2">
                            <button type="button" class="but2" onclick="window.location='{{ route('games.index') }}'">
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
