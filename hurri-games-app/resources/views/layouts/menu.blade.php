<div class="left">
    <nav class="navbar fixed-top">
        <div class="sidebar">
            <div class="logo">
                <i class="bx bx-menu menu-icon"></i>
                <span class="logo-name">HurriGames</span>
            </div>
            <div class="sidebar-content">
                <ul class="lists">
                    <li class="list">
                        <a href="{{route('home')}}" class="nav-link">
                            <i class='bx bx-home icon'></i>
                            <span id="home" class="link {{Route::is('home') ? 'destaque' : ''}}">Home</span>
                        </a>
                    </li>
                    @can('manage-users')
                        <li class="list">
                            <a href="{{route('users.index')}}" class="nav-link">
                                <i class='bx bxs-user-circle icon'></i>
                                <span class="link {{Route::is('users.index') ? 'destaque' : ''}}">Gerenciamento de Usuários</span>
                            </a>
                        </li>
                    @endcan

                    @can('manage-games')
                        <li class="list">
                            <a href="{{route('games.index')}}" class="nav-link">
                                <i class='bx bxs-game icon'></i>
                                <span  class="link {{Route::is('games.*') ? 'destaque' : ''}}">Gerenciamento de Jogos</span>
                            </a>
                        </li>
                    @endcan

                    <li class="list">
                        <a href="{{route('library.index')}}" class="nav-link">
                            <i class='bx bx-library icon'></i>
                            <span class="link {{Route::is('library.*') ? 'destaque' : ''}}">Biblioteca</span>
                        </a>
                    </li>

                    <li class="list">
                        <a href="{{route('store.index')}}" class="nav-link">
                            <i class='bx bxs-store icon'></i>
                            <span class="link {{Route::is('store.*') ? 'destaque' : ''}}">Loja e Promoções</span>
                        </a>
                    </li>

                    <li class="list">
                        <a href="{{route('wishlist.index')}}" class="nav-link">
                            <i class='bx bxs-shopping-bag icon'></i>
                            <span class="link {{Route::is('wishlist.*') ? 'destaque' : ''}}">Lista de Desejos</span>
                        </a>
                    </li>

                    @can('manage-category')
                        <li class="list">
                            <a href="{{route('categories.index')}}" class="nav-link">
                                <i class='bx bxs-category icon'></i>
                                <span class="link {{Route::is('categories.*') ? 'destaque' : ''}}">Gerenciamento de Categorias</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage-category')
                        <li class="list">
                            <a href="{{route('promotions.index')}}" class="nav-link">
                                <i class='bx bxs-hot icon'></i>
                                <span class="link {{Route::is('promotions.*') ? 'destaque' : ''}}"">Cadastro/Efetivação de Promoções</span>
                            </a>
                        </li>
                    @endcan
                    <li class="list">
                        <a href="{{route('users.listNotifications')}}" class="nav-link">
                            <i class='bx bxs-bell icon'></i>
                            <span class="link {{Route::is('users.listNotifications') ? 'destaque' : ''}}">Notificações</span>
                        </a>
                    </li>
                    @can('developer-register')
                        <li class="list">
                            <a href="{{ route('users.registerDevForm', \Illuminate\Support\Facades\Auth::user()->id) }}" class="nav-link">
                                <i class='bx bxs-user-circle icon'></i>
                                <span class="link {{Route::is('users.registerDevForm') ? 'destaque' : ''}}">Desenvolvedor</span>
                            </a>
                        </li>
                    @endcan
                </ul>


                <div class="bottom-content">
                    <ul>
                        <li class="list">
                            <a href="{{ route('logout') }}" class="nav-link"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">

                                <i class='bx bx-log-out icon'></i>
                                <span class="link">{{ __('Logout') }}</span>
                            </a>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>
