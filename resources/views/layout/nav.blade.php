<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Nunito -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Font M PlUS 1 -->
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Raleway -->
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Font Quicksand -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- css native -->
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css')}}">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
      <!-- script iconify -->
  <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>


    @yield('css')

    <title>ZenIT</title>
</head>

<body>
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
                    <img src="{{ asset('assets/img/logo.png')}}" alt="">
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <div class="search-web">
                        <form class="d-flex" role="search">
                            <div class="layout-search">
                                <input type="text" name="search-web" id="search-web" placeholder="Search">
                                <button><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="navbar " id="navbarSupportedContent">
                        <div class="menu">
                            <ul class="nav d-flex align-items-center">
                                <li class="nav-item">
                                    <a class="nav-link" href=""><i class="fa-solid fa-bell"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('fav') }}"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <img src="{{ asset('assets/img/user.png')}}" alt="" class="user">
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item user-setting" href="#">Profile user <i
                                                    class="fa-solid fa-user"></i></a>
                                        </li>
                                        <li><a class="dropdown-item logout" href="loginseller.html">Log In<i
                                                    class="fa-solid fa-right-from-bracket"></i></a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item setting" href="#">setting <i
                                                    class="fa-solid fa-gear"></i></a></li>
                                    </ul>
                                </li>
                        </div>
                    </div>
                </div>

            </nav>
        </div>
        <!-- end navbar -->

        @yield('content')


    </section>
</body>

</html>