@extends('layouts.main')

@section('title', 'Atualizar Categoria')

@push('css')
    <link rel="stylesheet" href="{{asset('css/categoriesEdit.css')}}">
@endpush

@section('body')
    <div class="pseudo-right">
        <div class="container">
            <div class="title">Atualizar Categoria</div>
            <x-message/>

            <div class="content">
                <form action="{{route('categories.update', $category->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Nome da Categoria</span>
                            <input name="name" type="text" placeholder="Digite o nome..." value="{{$category->name}}">
                        </div>

                        <div class="input-box">
                            <span class="details">Descrição</span>
                            <input name="description" type="text" placeholder="Informe uma breve descrição..." value="{{$category->description}}">
                        </div>

                    </div>

                    <div class="form-check">
                        <input name="is_active" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" {{$category->is_active?'checked':''}}>
                        <label class="form-check-label" for="flexCheckDefault">
                            Ativa
                        </label>
                    </div>

                    <div class="botoes">
                        <div class="button1">
                            <button class="but1">
                                <span>Atualizar</span>
                                <i class="uil uil-edit"></i>
                            </button>
                        </div>

                        <div class="button2">
                            <button  class="but2" type="button" onclick="window.location='{{ route('categories.index') }}'">
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
