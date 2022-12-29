@extends('layouts.main')

@section('title', 'Receber mensagens')

@push('css')
    <link rel="stylesheet" href="{{asset('css/receiveMessage.css')}}">
@endpush

@section('body')

    <div class="pseudo-right">
        <div class="chat-history">
            <ul>
                <li class="clearfix">
                    <div class="message-data align-right">
                        <span class="message-data-time" >Maicola,</span>
                        <span class="message-data-time" >10:10, hoje</span>
                        <span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i>

                    </div>
                    <div class="message other-message float-right">
                        Olá, como vai você ?
                    </div>
                </li>

                <li>
                    <div class="message-data">
                        <span class="message-data-time" >Zézão,</span>

                        <span class="message-data-time">10:12, Hoje</span>
                    </div>
                    <div class="message my-message">
                        Olá, que bom te ver... Estou bem, e você ?
                    </div>
                </li>


                <li class="clearfix">
                    <div class="message-data align-right">
                        <span class="message-data-time" >Maicola,</span>
                        <span class="message-data-time" >10:10, hoje</span>
                        <span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i>

                    </div>
                    <div class="message other-message float-right">
                        Melhor impossível. Você sabia que o cálculo foi desenvolvido a partir da Álgebra e da Geometria, e que o mesmo
                        se dedica ao estudo de taxas de variação de grandezas e a acumulação de quantidades ?
                    </div>
                </li>

                <li>
                    <div class="message-data">
                        <span class="message-data-time" >Zézão,</span>

                        <span class="message-data-time">10:12, Hoje, NOVA MENSAGEM</span>
                    </div>
                    <div class="message my-message">
                        Não sabia. Mas que fato extraordinário...
                    </div>
                </li>
            </ul>

        </div>


@endsection

