@extends('layouts.main')

@section('title', 'Usuários')

@push('css')
    <link rel="stylesheet" href="{{asset('css/usersEdit.css')}}">
@endpush

@section('body')

    <div class="pseudo-right">
        <div class="container">
            <div class="title">Verificação dos dados do desenvolvedor</div>
            <x-message/>
            <div class="content">
                <form action="" method="">
                    @csrf
                    @method('PUT')
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">ID do Desenvolvedor: <strong>1234</strong></span>
                        </div>

                        <div class="input-box">
                            <span class="details">Razão Social</span>
                            <input name="name" type="text" placeholder="" value=""/>
                        </div>

                        {{-- <div class="input-box">
                             <span class="details">Último nome</span>
                             <input type="text" placeholder="" >
                         </div>--}}

                        <div class="input-box">
                            <span class="details">Agência</span>
                            <input name="email" type="text" placeholder="" value=""/>
                        </div>

                        <div class="input-box">
                            <span class="details">Conta</span>
                            <input name="nick_name" type="text" placeholder="" value=""/>
                        </div>


                        <div class="form-check">
                            <input name="status" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Executei os procedimentos conforme à <a class="ancora" href="">Política de Privacidade</a> do site.
                            </label>
                        </div>

                        {{-- <div class="input-box">
                             <span class="details">Senha</span>
                             <input type="text" placeholder="" >
                         </div>--}}

                    </div>

                    <div class="botoes">
                        <div class="button1">
                            <button type="submit" class="but1">
                                <span>Aprovar</span>
                                <i class="uil uil-edit"></i>
                            </button>
                        </div>

                        <div class="button3">
                            <button type="submit" class="but3">
                                <span>Reprovar</span>
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
        </div></div>
    </div>

@endsection
