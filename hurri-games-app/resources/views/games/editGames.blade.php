@extends('layouts.main')

@section('title', 'Editar Usuário')

@push('css')
    <link rel="stylesheet" href="{{asset('css/statsGame.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
@endpush

@section('body')

    <div class="pseudo-right">
        <div class="container">
            <div class="title">Editar dados básicos e requisitos do jogo</div>
            <x-message/>
            <div class="content">
                <form action="{{route('games.update', $game->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Nome</span>
                            <input name="name" type="text" placeholder="" value="{{$game->name}}"/>
                        </div>

                        {{-- <div class="input-box">
                             <span class="details">Último nome</span>
                             <input type="text" placeholder="" >
                         </div>--}}

                        <div class="input-box">
                            <span class="details">Descrição</span>
                            <textarea name="ban_reason" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$game->description}}</textarea>
                        </div>

                        <div class="input-box">
                            <span class="details">Preço Padrão</span>
                            <input name="nick_name" type="text" placeholder="" value="{{$game->normal_price}}"/>
                        </div>

                        <div id="language" class="input-box">
                            <span class="details">Idiomas Disponíveis</span>

                            <div class="idiomas">
                                <!-- add class p-curve -->
                                <div class="pretty p-default p-curve">
                                    <input name="languages[]" type="checkbox" value="PT-BR"
                                        {{ (is_array(old('languages')) && in_array('PT-BR', old('languages'))) ? ' checked' : '' }}
                                        {{in_array("PT-BR", json_decode($game->languages)) ? 'checked' : ''}}
                                    />
                                    <div class="state">
                                        <label>PT-BR</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve">
                                    <input name="languages[]" type="checkbox" value="ENG-USA"
                                        {{ (is_array(old('languages')) && in_array('ENG-USA', old('languages'))) ? ' checked' : '' }}
                                        {{in_array("ENG-USA", json_decode($game->languages)) ? 'checked' : ''}}
                                    />
                                    <div class="state">
                                        <label>ENG-USA</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve">
                                    <input name="languages[]" type="checkbox" value="SPA"
                                        {{ (is_array(old('languages')) && in_array('SPA', old('languages'))) ? ' checked' : '' }}
                                        {{in_array("SPA", json_decode($game->languages)) ? 'checked' : ''}}
                                    />
                                    <div class="state">
                                        <label>SPA</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve">
                                    <input name="languages[]" type="checkbox" value="GER"
                                        {{ (is_array(old('languages')) && in_array('GER', old('languages'))) ? ' checked' : '' }}
                                        {{in_array("GER", json_decode($game->languages)) ? 'checked' : ''}}
                                    />
                                    <div class="state">
                                        <label>GER</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve">
                                    <input name="languages[]" type="checkbox" value="FRA"
                                        {{ (is_array(old('languages')) && in_array('FRA', old('languages'))) ? ' checked' : '' }}
                                        {{in_array("FRA", json_decode($game->languages)) ? 'checked' : ''}}
                                    />
                                    <div class="state">
                                        <label>FRA</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve">
                                    <input name="languages[]" type="checkbox" value="FRA"
                                        {{ (is_array(old('languages')) && in_array('RUS', old('languages'))) ? ' checked' : '' }}
                                        {{in_array("RUS", json_decode($game->languages)) ? 'checked' : ''}}
                                    />
                                    <div class="state">
                                        <label>RUS</label>
                                    </div>
                                </div>

                                <div class="pretty p-default p-curve">
                                    <input name="languages[]" type="checkbox" value="FRA"
                                        {{ (is_array(old('languages')) && in_array('JAP', old('languages'))) ? ' checked' : '' }}
                                        {{in_array("JAP", json_decode($game->languages)) ? 'checked' : ''}}
                                    />
                                    <div class="state">
                                        <label>JAP</label>
                                    </div>
                                </div>

                                <div class="input-box">
                                    <span class="details">Sistema Operacional</span>
                                    <select  name="operational_system">
                                        <option {{$game->operational_system == "Windows 7" ? 'selected' : ''}} value="Windows 7 32 bits">Windows 7 32 bits</option>
                                        <option {{$game->operational_system == "Windows Vista" ? 'selected' : ''}} value="Windows Vista">Windows Vista</option>
                                        <option {{$game->operational_system == "Windows 8" ? 'selected' : ''}} value="Windows 8 32 bits">Windows 8 32 bits</option>
                                        <option {{$game->operational_system == "Windows 8 64 Bits" ? 'selected' : ''}}value="Windows 8 64 bits">Windows 8 64 bits</option>
                                        <option {{$game->operational_system == "Windows 10" ? 'selected' : ''}} value="Windows 10 32 bits">Windows 10 32 bits</option>
                                        <option value="Windows 10 64 bits">Windows 10 64 bits</option>
                                        <option {{$game->operational_system == "Windows 11" ? 'selected' : ''}} value="Windows 11 64 bits">Windows 11 64 bits</option>
                                        <option {{$game->operational_system == "Linux" ? 'selected' : ''}} value="SO Linux">SO Linux</option>
                                        <option {{$game->operational_system == "Mac" ? 'selected' : ''}} value="Mac OS">Mac OS</option>
                                    </select>
                                </div>


                                <div class="input-box">
                                    <span class="details">Processador</span>
                                    <select name="processor" >
                                        <option {{$game->processor == "Intel Core I5" ? 'selected' : ''}} value="Processador Intel® Core™ i5-750 cache de 8 M, 2,66 GHz">Processador Intel® Core™ i5-750 cache de 8 M, 2,66 GHz</option>
                                        <option {{$game->processor == "Intel Core I3" ? 'selected' : ''}} value="Processador Intel® Core™ i3-390M cache de 3 M, 2,66 GHz">Processador Intel® Core™ i3-390M cache de 3 M, 2,66 GHz</option>
                                        <option {{$game->processor == "Intel Core I7" ? 'selected' : ''}} value="Processador Intel® Core™ i7-9700 (12 M de cache, até 4,70 GHz)">Processador Intel® Core™ i7-9700 (12 M de cache, até 4,70 GHz)</option>
                                        <option {{$game->processor == "Intel Core I5-7440HQ" ? 'selected' : ''}} value="Processador Intel® Core™ i5-7440HQ (cache de 6 M, até 3,80 GHz)">Processador Intel® Core™ i5-7440HQ (cache de 6 M, até 3,80 GHz)</option>
                                        <option {{$game->processor == "Ryzen 5" ? 'selected' : ''}} value="AMD Ryzen™ 5 PRO 3600">AMD Ryzen™ 5 PRO 3600</option>
                                        <option {{$game->processor == "Ryzen 3" ? 'selected' : ''}} value="AMD Ryzen 3 1200">AMD Ryzen 3 1200</option>
                                        <option {{$game->processor == "Ryzen 5 1500x" ? 'selected' : ''}} value="AMD Ryzen 5 1500X">AMD Ryzen 5 1500X</option>
                                        <option {{$game->processor == "Athlon" ? 'selected' : ''}} value="AMD Athlon 64 X2 6000+">AMD Athlon 64 X2 6000+</option>
                                        <option {{$game->processor == "Intel Core Duo" ? 'selected' : ''}} value="Intel Core2 Duo E8400, 3.0GHz">Intel Core2 Duo E8400, 3.0GHz</option>
                                        <option {{$game->processor == "Intel Dual Core" ? 'selected' : ''}} value="Intel Core 2 DUO 2.4 GHz">Intel Core 2 DUO 2.4 GHz</option>
                                        <option {{$game->processor == "Intel Core I3-2100" ? 'selected' : ''}} value="Intel Core i3-2100">Intel Core i3-2100</option>
                                        <option {{$game->processor == "AMD FX-6300" ? 'selected' : ''}}  value="AMD® FX-6300">AMD® FX-6300</option>
                                    </select>
                                </div>

                                <div class="input-box">
                                    <span class="details">Placa de Vídeo</span>
                                    <select name="graphics_card" >
                                        <option {{$game->graphics_card == "9600 GT" ? 'selected' : ''}} value="Geforce 9600 GT">Geforce 9600 GT</option>
                                        <option {{$game->graphics_card == "RTX 3090" ? 'selected' : ''}} value="AMD HD 3870 512MB">AMD HD 3870 512MB</option>
                                        <option {{$game->graphics_card == "GTX 960" ? 'selected' : ''}} value="NVIDIA GTX 960">NVIDIA GTX 960</option>
                                        <option {{$game->graphics_card == "AMD R9" ? 'selected' : ''}} value="AMD R9 290X">AMD R9 290X</option>
                                        <option {{$game->graphics_card == "GTX 1060" ? 'selected' : ''}} value="NVIDIA GTX 1060 (6 GB)">NVIDIA GTX 1060 (6 GB)</option>
                                        <option {{$game->graphics_card == "RX 570" ? 'selected' : ''}} value="AMD RX 570">AMD RX 570</option>
                                        <option {{$game->graphics_card == "Radeon R7" ? 'selected' : ''}} value="Radeon R7 370 2GB">Radeon R7 370 2GB</option>
                                    </select>
                                </div>

                                <div class="input-box">
                                    <span class="details">DirectX</span>
                                    <select name="directx" >
                                        <option {{$game->directx == "Versão 8.1" ? 'selected' : ''}}  value="Versão 8.1">Versão 8.1</option>
                                        <option {{$game->directx == "Versão 9.0a" ? 'selected' : ''}} value="Versão 9.0a">Versão 9.0a</option>
                                        <option {{$game->directx == "Versão 9.0b" ? 'selected' : ''}} value="Versão 9.0b">Versão 9.0b</option>
                                        <option {{$game->directx == "Versão 9.0c" ? 'selected' : ''}} value="Versão 9.0c">Versão 9.0c</option>
                                        <option {{$game->directx == "Versão 10.0" ? 'selected' : ''}} value="Versão 10.0">Versão 10.0</option>
                                        <option {{$game->directx == "Versão 10.1" ? 'selected' : ''}} value="Versão 10.1">Versão 10.1</option>
                                        <option {{$game->directx == "Versão 11.0" ? 'selected' : ''}} value="Versão 11.0">Versão 11.0</option>
                                        <option {{$game->directx == "Versão 11.1" ? 'selected' : ''}} value="Versão 11.1">Versão 11.1</option>
                                        <option {{$game->directx == "Versão 11.2" ? 'selected' : ''}} value="Versão 11.2">Versão 11.2</option>
                                        <option {{$game->directx == "Versão 12.0" ? 'selected' : ''}} value="Versão 12.0">Versão 12.0</option>
                                    </select>
                                </div>

                                <div class="input-box">
                                    <span class="details">Armazenamento(GB)</span>
                                    <input name="storage" type="text" placeholder="" value="{{$game->storage}}"/>
                                </div>

                                <div class="input-box">
                                    <span class="details">Memória RAM</span>
                                    <select name="memory" >
                                        <option {{$game->memory == "2" ? 'selected' : ''}} value="2 GB">2 GB</option>
                                        <option {{$game->memory == "4" ? 'selected' : ''}} value="4 GB">4 GB</option>
                                        <option {{$game->memory == "8" ? 'selected' : ''}} value="8 GB">8 GB</option>
                                        <option {{$game->memory == "12" ? 'selected' : ''}} value="12 GB">12 GB</option>
                                        <option {{$game->memory == "16" ? 'selected' : ''}} value="16 GB">16 GB</option>
                                        <option {{$game->memory == "32" ? 'selected' : ''}} value="32 GB">32 GB</option>
                                    </select>
                                </div>
                        </div>
                    </div>


                    <div class="botoes">
                        <div class="button1">
                            <button type="submit" class="but1">
                                <span>Atualizar</span>
                                <i class="uil uil-edit"></i>
                            </button>
                        </div>

                        <div class="button2">
                            <button class="but2" type="button" onclick="window.location='{{ route('games.index') }}'">
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
