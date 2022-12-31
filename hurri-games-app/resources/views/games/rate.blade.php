@extends('layouts.main')

@section('title', 'Receber mensagens')

@push('css')
    <link rel="stylesheet" href="{{asset('css/receiveMessage.css')}}">
    <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-all.min.css">
    <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro.min.css">
    <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-colors.min.css">
    <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-rtl.min.css">
    <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-icons.min.css">
@endpush

@section('body')

    <div class="pseudo-right">
        <h1>Dark Souls III</h1>
        <div class="chat-history">
            <ul>

                <li>
                    <div class="message-data">
                        <input disabled data-role="rating" data-value="4" data-star-color="gold" data-stared-color="gold">
                        <span class="message-data-time" >Eminem,</span>

                        <span class="message-data-time">10:12, Hoje</span>
                    </div>
                    <div class="message my-message">
                        Joguinho maneiro...
                    </div>

                </li>


                <li>
                    <div class="message-data">
                        <input disabled data-role="rating" data-value="1" data-star-color="gold" data-stared-color="gold">
                        <span class="message-data-time" >Fabin_do_Pneu,</span>

                        <span class="message-data-time">10:12, Hoje</span>
                    </div>
                    <div class="message my-message">
                        Esse jogo é uma porra, vão se foder
                    </div>
                </li>

                <li>
                    <div class="message-data">
                        <input disabled data-role="rating" data-value="5" data-star-color="gold" data-stared-color="gold">
                        <span class="message-data-time" >Zézão,</span>

                        <span class="message-data-time">10:12, Hoje</span>
                    </div>
                    <div class="message my-message">
                        Fabin_do_Pneu pistolou kkkkk
                    </div>
                </li>

                <li>
                    <div class="message-data">
                        <input disabled data-role="rating" data-value="5" data-star-color="gold" data-stared-color="gold">
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
            <input class="rating" data-role="rating" data-star-color="gold" data-stared-color="gold">
            <textarea name="message-to-send" id="message-to-send" placeholder ="Digite sua mensagem" rows="3"></textarea>

            <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
            <i class="fa fa-file-image-o"></i>

            <button>Enviar</button>
        </div>

        <script src="https://cdn.korzh.com/metroui/v4/js/metro.min.js"></script>
@endsection

