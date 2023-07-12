<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/offcanvas-navbar/">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('client/assets/css/bootstrap.min.css')}}" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}" />
    <meta name="theme-color" content="#7952b3">
    <link rel="stylesheet" href="{{asset('client/assets/css/style.css')}}">

    <!-- the fileinput plugin styling CSS file -->
    {{-- <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
        crossorigin="anonymous">--}}

    <!-- Custom styles for this template -->
    <link href="{{asset('client/assets/css/offcanvas.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/1066a12b52.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="//db.onlinewebfonts.com/c/9cb830e3472ffe12fb4943f3ed80832f?family=Segoe+Print" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" type="text/css" href="footer.css">
    <script src="https://kit.fontawesome.com/f200a6bdeb.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <nav class="ff fixed-top">
        <div class="topnav"></div>
        <div class="bottomnav">
            <nav class="navbar navbar-expand-lg  navbar-dark" aria-label="Main navigation" id="nav-bar">
                <div class="container-fluid container">
                    <a class="navbar-brand" href="#"><img class="me-3" src="{{asset('client/assets/img/logo.jpg')}}"
                            alt="" width="58" height="58"></a>
                    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse"
                        aria-label="Toggle navigation">
                        <i class="fa fa-bars fa-2x" style="color: black" aria-hidden="true"></i>
                    </button>
                    <div class="navbar-collapse  justify-content-between offcanvas-collapse" id="navbarsExampleDefault">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link <?php if ($nav == "accueil") : ?>active<?php endif; ?>"
                                    href="{{route('client.accueil')}}" id="nav-link">
                                    <i class="fa fa-home" aria-hidden="true"></i> Accueil
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link <?php if ($nav == "index") : ?>active<?php endif; ?>" href="{{route('admin.users.index')}}" id="nav-link">
                                    <i class="fa fa-send" aria-hidden="true"></i> Ajouter un nouvel agent
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link <?php if ($nav == "demande_permission") : ?>active<?php endif; ?>"
                                    href="{{route('client.demande_permission')}}" id="nav-link">
                                    <i class="fa fa-archive" aria-hidden="true"></i> Demande de permission
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            @if (Auth::user())
                            <!-- <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown link
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div> -->
                            <!-- nouveau dropdown -->

                            <li class="nav-item">
                                <span class="dropdown">
                                    <a class="dropdown-toggle text-decoration-none" href="#" role="button"
                                        data-bs-toggle="dropdown" id="nav-link">
                                        <i class="fa fa-user" aria-hidden="true"></i> {{Auth::user()['nom']}}
                                    </a>
                                    <ul class=" dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{route('admin.index_admin')}}"
                                                target="_blank">Tableau
                                                de bord</a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                       document.getElementById(' logout-form').submit();">
                                                {{ __('DECONNEXION') }}
                                            </a>
                                        </li>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </span>
                            </li>

                            @else
                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('login')}}" id="nav-link"><i class="fa fa-user"
                                        aria-hidden="true"></i> Connecter</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{route('register')}}" id="nav-link">
                                    </i> S'inscrire
                                </a>
                            </li> -->

                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </nav>

    <main class="">
        @yield("contenu")
    </main>

    <footer id="rs-footer" class="rs-footer">
        <div class="footer-top mb-0 pb-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="widget footer_widget">
                            <h5 class="footer-title">Administration</h5>
                            <ul>
                                <li class="text-white"><i class="fa fa-phone mr-2"></i>(+225) 01-02-30-58-65 /
                                    05-46-10-47-10 / 07-89-13-46-66/
                                </li>
                                <li class="text-white"><i class="fa fa-envelope mr-2 mt-3"></i>sakoum68@gmail.com</li>
                                <li class="text-white"><i class="fa fa-paste mr-2 mt-3"></i>Adresse Postale</li>
                                <li class="text-white"><i class="fa fa-map-marker mr-2 mt-3 "></i>Abidjan Cocody
                                    Angré 7e tranche <br>(GPS: adresse GPS)</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="widget footer_widget">
                            <h5 class="footer-title">Administration</h5>
                            <ul>
                                <li class="text-white"><i class="fa fa-phone mr-2"></i>(+225) 01-02-30-58-65 /
                                    05-46-10-47-10 / 07-89-13-46-66/
                                </li>
                                <li class="text-white"><i class="fa fa-envelope mr-2 mt-3"></i>sakoum68@gmail.com</li>
                                <li class="text-white"><i class="fa fa-paste mr-2 mt-3"></i>Adresse Postale</li>
                                <li class="text-white"><i class="fa fa-map-marker mr-2 mt-3 "></i>Abidjan Cocody
                                    Angré 7e tranche <br>(GPS: adresse GPS)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 ">
                        <span class="text-white slogan-2">&copy; 2023 - Affaires Maritime et Portuaires.</span>
                    </div>
                    <div class="col-lg-3 col-md-12 text-center ">
                        <ul class="list-inline d-flex justify-content-center">
                            <li><a href="#" target=_blank class="btn-link"><i class="fa fa-facebook mr-3"></i></a></li>
                            <li><a href="#" target=_blank class="btn-link"><i class="fa fa-twitter mr-3 "></i></a></li>
                            <li><a href="#" target=_blank class="btn-link"><i class="fa fa-linkedin mr-3"></i></a></li>
                            <li><a href="#" target=_blank class="btn-link"><i class="fa fa-youtube mr-3"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="{{asset('client/assets/js/bootstrap.bundle.min.js')}}"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{asset('client/assets/js/offcanvas.js')}}"></script>

    <!-- the main fileinput plugin script JS file -->
    {{--<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/LANG.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/piexif.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/sortable.min.js"
        type="text/javascript"></script>--}}

    {{--@include('sweetalert::alert')--}}
</body>

<style>
ul {
    padding-left: 0;
}

h5 {
    margin-top: 25px;
}
</style>

</html>