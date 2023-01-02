@extends('layouts.main')

@section('title', 'Recebimento de Mensagens')

@push('css')
    <link rel="stylesheet" href="{{asset('css/receiveMessage.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('body')
    <div class="pseudo-right">
        <h1>Dark Souls III</h1>
        <div class="chat-history">
            <ul>

                <li>
                    <div class="message-data">

                        <span class="message-data-time" >Eminem,</span>

                        <span class="message-data-time">10:12, Hoje</span>
                    </div>
                    <div class="message my-message">
                        Joguinho maneiro...
                    </div>

                </li>


                <li>
                    <div class="message-data">

                        <span class="message-data-time" >Fabin_do_Pneu,</span>

                        <span class="message-data-time">10:12, Hoje</span>
                    </div>
                    <div class="message my-message">
                        Esse jogo é uma porra, vão se foder
                    </div>
                </li>

                <li>
                    <div class="message-data">

                        <span class="message-data-time" >Zézão,</span>

                        <span class="message-data-time">10:12, Hoje</span>
                    </div>
                    <div class="message my-message">
                        Fabin_do_Pneu pistolou kkkkk
                    </div>
                </li>

                <li>
                    <div class="message-data">

                        <span class="message-data-time" >Mariazinha,</span>

                        <span class="message-data-time">10:12, Hoje</span>
                    </div>
                    <div class="message my-message">
                        Só sei que nada sei...
                    </div>
                </li>
            </ul>
        </div>
        <div class="chat-message clearfix">
            <h3>Avaliação</h3>
            <div class="stars">

                <form action="">

                    <input class="star star-5" id="star-5" type="radio" name="star"/>

                    <label class="star star-5" for="star-5"></label>

                    <input class="star star-4" id="star-4" type="radio" name="star"/>

                    <label class="star star-4" for="star-4"></label>

                    <input class="star star-3" id="star-3" type="radio" name="star"/>

                    <label class="star star-3" for="star-3"></label>

                    <input class="star star-2" id="star-2" type="radio" name="star"/>

                    <label class="star star-2" for="star-2"></label>

                    <input class="star star-1" id="star-1" type="radio" name="star"/>

                    <label class="star star-1" for="star-1"></label>

                </form>

                <textarea name="message-to-send" id="message-to-send" placeholder ="Digite sua mensagem" rows="3"></textarea>

            <button>Enviar</button>
        </div>

        <script src="https://cdn.korzh.com/metroui/v4/js/metro.min.js"></script>
@endsection
