@extends('layouts.main')

@section('title', 'Notificação')

@push('css')
    <link rel="stylesheet" href="{{asset('css/notification.css')}}">
@endpush

@section('body')
    <div class="pseudo-right">
        <div class="container">
            <div class="title">Notificar usuário</div>
            <x-message/>
            <div class="content">
                <form action="{{ route('users.notify', $user->id) }}" method="POST">
                    @csrf
                    <div class="user-details">

                        <span>Usuário a ser notificado: <strong>{{$user->name}}</strong></span>

                        {{--<span>ID do Usuário: {{$user->id}}</span> <!--Recuperar o ID do usuário-->--}}

                        {{--<span>Horário que será enviado: <input type="time"></span>--}}

                        {{--<span>Data do envio: <input type="date"></span>--}}

                        <div class="input-box">
                            <span class="details">Mensagem</span>
                            <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>


                    </div>

                    <div class="botoes">
                            <button type="submit" class="but1">
                                <span>Enviar</span>
                                <i class="uil uil-edit"></i>
                            </button>

                            <button class="but2" type="button" onclick="window.location='{{ route('users.index') }}'">
                                <span>Cancelar</span>
                                <i class="uil uil-x"></i>
                            </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
