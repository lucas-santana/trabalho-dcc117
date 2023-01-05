@php use Illuminate\Support\Carbon; @endphp
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
        <h1>{{$game->name}}</h1>
        <div class="chat-history">
            <ul>

                @foreach($game->reviews()->get() as $review)
                    <li>
                        <div class="message-data">

                            <span class="message-data-time">{{$review->user->name}}</span>

                            <span
                                class="message-data-time">{{Carbon::create($review->created_at)->format('d/m/y')}}</span>

                            @for($i = (int)$review->rate;$i>0;$i--)
                                <i class="bx bxs-star"></i>
                            @endfor
                        </div>
                        <div class="message my-message">
                            {{$review->review}}
                        </div>

                    </li>
                @endforeach

            </ul>
        </div>
        <div class="chat-message clearfix">
            <h3>Avaliação</h3>
            <x-message/>
            <div class="stars">

                <form action="{{route('library.saveReview', $game->id)}}" method="POST">
                    @csrf
                    <input class="star star-5" id="star-5" type="radio" name="rate" value="5"/>
                    <label class="star star-5" for="star-5"></label>

                    <input class="star star-4" id="star-4" type="radio" name="rate" value="4"/>

                    <label class="star star-4" for="star-4"></label>

                    <input class="star star-3" id="star-3" type="radio" name="rate" value="3"/>

                    <label class="star star-3" for="star-3"></label>

                    <input class="star star-2" id="star-2" type="radio" name="rate" value="2"/>

                    <label class="star star-2" for="star-2"></label>

                    <input class="star star-1" id="star-1" type="radio" name="rate" value="1"/>

                    <label class="star star-1" for="star-1"></label>

                    <label for="message-to-send">Mensagem</label>
                    <textarea name="review" id="message-to-send" placeholder="Digite sua mensagem" rows="3"
                              style="border: 1px solid black"></textarea>
                    <button>Enviar</button>
                </form>


            </div>

            <script src="https://cdn.korzh.com/metroui/v4/js/metro.min.js"></script>
@endsection
