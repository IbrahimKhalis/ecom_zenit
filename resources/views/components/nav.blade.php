
    <section>
        <!-- navbar -->
        <div class="nvbr">
            <div class="logo">
                <svg viewBox="0 0 1728 82" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M741.621 55.5807H-78V-34H1812V55.5807H1005.52C988.547 55.5807 984.167 55.5807 978.692 69.3201C974.312 80.3116 963.362 82.3267 958.434 81.9603H779.399C772.281 81.9603 761.331 81.9603 758.046 68.2209C755.418 57.2294 746.001 55.2143 741.621 55.5807Z"
                        fill="#1C3879" />
                </svg>
                <div class="title">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/img/logo-zenit.png')}}" alt="">
                    </a>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <div class="search-web">
                        <form class="d-flex" action="{{ route('product.search') }}" method="GET" role="search">
                            @csrf
                            <div class="layout-search">
                                <input type="text" id="search-web" placeholder="Search Products..." name="search">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="navbar " id="navbarSupportedContent">
                        <div class="menu">
                            <ul class="nav d-flex align-items-center">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/notif') }}"><i class="fa-solid fa-bell"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/cart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link" href="{{ url('/favorite') }}"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                </li>
                                @if( Auth::check() && auth()->user()->level != 'customer')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('setting-info') }}"><i class="fa-solid fa-store"></i></a>
                                </li>
                                @endif

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <img src="{{ Auth::check() ? auth()->user()->profile->gallery->first()->getUrl() : asset('assets/img/user.png') }}" alt="" class="user">
                                    </a>
                                    <ul class="dropdown-menu">
                                        @if( !Auth::check() )
                                        <li><a class="dropdown-item logout" href="{{ url('/login') }}">Log In<i
                                                    class="fa-solid fa-right-from-bracket"></i></a></li>
                                        <li>
                                        @else
                                        <li><a class="dropdown-item user-setting" href="{{ url('profile/your-profile') }}">{{ Auth()->user()->name }}<i
                                                    class="fa-solid fa-user"></i></a>
                                        </li>
                                        <li>
                                            <form action="/logout" method="POST">
                                            @csrf
                                                <button class="dropdown-item logout" id="logout">Log Out
                                                <i class="fa-solid fa-right-from-bracket" id="logout"></i>
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item setting" href="{{ url('setting') }}">setting <i
                                                    class="fa-solid fa-gear"></i></a></li>
                                        @endif
                                    </ul>
                                </li>
                        </div>
                    </div>
                </div>

            </nav>
        </div>
        <!-- end navbar -->
    </section>
