<?php

use App\Models\DemandeModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

$demandes = DB::table('demande_models')->select('*')->get();
// $SD_pending_event = Evenement::where('sd_validated', 0)
//     ->where('motif_rejet', null)
//     ->get();
// $secre_pending_event = Evenement::where('secretariat_service_validated', 0)
//     ->where('sd_validated', 1)
//     ->limit(3)
//     ->get();

// $media_pending_event = Evenement::where('media_validated', 0)
//     ->where('sd_validated', 1)
//     ->limit(3)
//     ->get();

// $log_pending_event = Evenement::where('logistic_validated', 0)
//     ->where('sd_validated', 1)
//     ->limit(3)
//     ->get();
// $com_pending_event = Evenement::where('communication_validated', 0)
//     ->where('sd_validated', 1)
//     ->limit(3)
//     ->get();

// // Count
// $cpt_SD = Evenement::where('sd_validated', 0)
//     ->where('motif_rejet', null)
//     ->get()
//     ->count();
// $cpt_secre = Evenement::where('secretariat_service_validated', 0)
//     ->where('sd_validated', 1)
//     ->get()
//     ->count();

// $cpt_media = Evenement::where('media_validated', 0)
//     ->where('sd_validated', 1)
//     ->get()
//     ->count();

// $cpt_log = Evenement::where('logistic_validated', 0)
//     ->where('sd_validated', 1)
//     ->get()
//     ->count();
// $cpt_com = Evenement::where('communication_validated', 0)
//     ->where('sd_validated', 1)
//     ->get()
//     ->count();

// $event_years = Evenement::select('date_debut')->pluck('date_debut')->map(function ($date) {
//     return Carbon::parse($date)->year;
// })->unique()->toArray();
//$event_years = Evenement::select('date_fin')->pluck('date_fin')->toArray();

?>

<!doctype html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/core/libs.min.css') }}" />

    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/aos/dist/aos.css') }}" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/hope-ui.min.css?v=1.2.0') }}" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom.min.css?v=1.2.0') }}" />

</head>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    <aside class="sidebar sidebar-default navs-rounded-all ">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="{{route('admin.index_admin')}}" class="navbar-brand">
                <!--Logo start-->
                <img src="{{ asset('admin/assets/images/logo.jpg') }}" width="40" height="40">
                <!--logo End-->
                <h4 class="logo-title">DashBoard</h4>
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </i>
            </div>
        </div>
        <div class="sidebar-body pt-0 data-scrollbar">
            <div class="sidebar-list">
                <!-- Sidebar Menu Start -->
                <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            {{-- <span class="default-icon">Home</span> --}}
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.index_admin')}}" class="nav-link active" aria-current="page" href="">
                            <i class="icon">
                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                                </svg>
                                {{-- <img src="{{ asset('admin/assets/images/logo.png') }}" width="40" height="40"> --}}

                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    </li>
                    {{--partie super admin--}}
                    {{-- @if (Auth::user()->getRoleNames()[0] == 'admin')--}}
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
                            <i class="icon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </i>
                            <span class="item-name">Gestion des Demandes</span>

                        </a>
                        <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('admin.infos_demande')}}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name"> Demandes en cours </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('admin.demande_accepte')}}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name"> Demandes acceptées </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('admin.demande_rejete')}}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name"> Demandes rejetées </span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    {{-- Gestion des Utilisateurs --}}
                    <li class=" nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#user-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                </svg>
                            </i>
                            <span class="item-name">Gestion des agents</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="user-menu" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('admin.users.create')}}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name"> Ajouter un agent</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('admin.users.index')}}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name"> Liste du personnel</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('admin.users.stagiaire')}}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name"> Liste des stagiaires</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="{{route('roles-permission')}}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    {{-- <i class="sidenav-mini-icon">  </i> --}}
                                    <span class=" item-name">Roles & Permissions</span>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
                            <i class="icon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </i>
                            <span class="item-name">Gestion des rapports</span>

                        </a>
                        <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('admin.infos_demande')}}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name"> Listes des rapports déposés</span>
                                </a>
                            </li>
                        </ul>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
                            <i class="icon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </i>
                            <span class="item-name">Gestion des bateaux</span>

                        </a>
                        <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('admin.infos_demande')}}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name"> Bateau</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    </li> {{--partie personnel--}}
                    {{-- @elseif(Auth::user()->getRoleNames()[0] == 'personnel')--}}
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
                            <i class="icon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </i>
                            <span class="item-name">Gestion des permissions</span>

                        </a>
                        <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('client.demande_permission')}}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name"> Demander une permission</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('client.statut_demande')}}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name"> Etat de mes demandes </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name"> Modifier une demande</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
                            <i class="icon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </i>
                            <span class="item-name">Gestion des rapports</span>

                        </a>
                        <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu" data-bs-toggle="modal" data-bs-target="#DepotRapport">
                            <li class="nav-item">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <span class="item-name">
                                    Deposer mon rapport</span>

                            </li>

                        </ul>
                    </li>



                    {{--partie stagiaire--}}

                    {{-- @elseif(Auth::user()->getRoleNames()[0] == 'stagiaire')--}}
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
                            <i class="icon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </i>
                            <span class="item-name">Gestion des permissions</span>

                        </a>
                        <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('client.demande_permission')}}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name"> Demander une permission</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('client.statut_demande')}}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name"> Etat de mes demandes </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name"> Modifier une demande</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
                            <i class="icon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </i>
                            <span class="item-name">Gestion des rapports</span>

                        </a>
                        <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu" data-bs-toggle="modal" data-bs-target="#DepotRapport">
                            <li class="nav-item">
                                <a class="nav-link " href="')}}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name">
                                        Deposer mon rapport</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    {{-- @endif--}}




                    {{-- <li><hr class="hr-horizontal"></li> --}}
                </ul>
                <!-- Sidebar Menu End -->
            </div>
        </div>
        <div class="sidebar-footer"></div>
    </aside>
    <main class="main-content">
        <div class="position-relative iq-banner">


            <!--Nav Start-->
            <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
                <div class="container-fluid navbar-inner">
                    <a href="{{route('admin.index_admin')}}" class="navbar-brand">
                        <img src="{{ asset('admin/assets/images/logo.jpg') }}" width="40" height="40">
                        <h4 class="logo-title">DashBoard</h4>
                    </a>
                    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                        <i class="icon">
                            <svg width="20px" height="20px" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                            </svg>
                        </i>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <span class="mt-2 navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">

                            {{-- Lien accueil --}}
                            <li class="nav-item dropdown me-3">
                                <a href="{{route('client.accueil')}}" class="btn btn-primary">Accueil</a>
                            </li>

                            {{-- Notifications --}}

                            {{-- Viz SD --}}
                            {{--@if (Auth::user()->getRoleNames()[0] == 'Admin' && count($SD_pending_event) != 0)--}}
                            <a href="#" class="position-relative text-secondary" id="notification-drop" data-bs-toggle="dropdown">
                                <svg width="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.7695 11.6453C19.039 10.7923 18.7071 10.0531 18.7071 8.79716V8.37013C18.7071 6.73354 18.3304 5.67907 17.5115 4.62459C16.2493 2.98699 14.1244 2 12.0442 2H11.9558C9.91935 2 7.86106 2.94167 6.577 4.5128C5.71333 5.58842 5.29293 6.68822 5.29293 8.37013V8.79716C5.29293 10.0531 4.98284 10.7923 4.23049 11.6453C3.67691 12.2738 3.5 13.0815 3.5 13.9557C3.5 14.8309 3.78723 15.6598 4.36367 16.3336C5.11602 17.1413 6.17846 17.6569 7.26375 17.7466C8.83505 17.9258 10.4063 17.9933 12.0005 17.9933C13.5937 17.9933 15.165 17.8805 16.7372 17.7466C17.8215 17.6569 18.884 17.1413 19.6363 16.3336C20.2118 15.6598 20.5 14.8309 20.5 13.9557C20.5 13.0815 20.3231 12.2738 19.7695 11.6453Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M14.0088 19.2283C13.5088 19.1215 10.4627 19.1215 9.96275 19.2283C9.53539 19.327 9.07324 19.5566 9.07324 20.0602C9.09809 20.5406 9.37935 20.9646 9.76895 21.2335L9.76795 21.2345C10.2718 21.6273 10.8632 21.877 11.4824 21.9667C11.8123 22.012 12.1482 22.01 12.4901 21.9667C13.1083 21.877 13.6997 21.6273 14.2036 21.2345L14.2026 21.2335C14.5922 20.9646 14.8734 20.5406 14.8983 20.0602C14.8983 19.5566 14.4361 19.327 14.0088 19.2283Z" fill="currentColor"></path>
                                </svg>
                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-warning rounded-circle">
                                </span>
                            </a>
                            <div class="p-0 sub-drop dropdown-menu dropdown-menu-end" aria-labelledby="notification-drop">
                                <div class="m-0 shadow-none card">
                                    <div class="py-3 card-header d-flex justify-content-between bg-success">
                                        <div class="header-title">
                                            <h5 class="mb-0 text-white">Demande en attente</h5>
                                        </div>
                                    </div>
                                    <div class="p-0 card-body">
                                        @foreach ($demandes as $demande)
                                        <a href="" class="iq-sub-card">
                                            <div class="d-flex align-items-center">
                                                <img class="p-1 avatar-40 rounded-pill bg-soft-primary" src="{{ asset('admin/assets/images/event.png') }}" alt="">
                                                <div class="ms-3 w-100">
                                                    <h6 class="mb-0 ">{{ $demande->motif }}</h6>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <small class="float-end font-size-12">{{ Carbon::parse($demande->created_at)->format('d F Y') }}
                                                            à
                                                        </small>
                                                        {{ Carbon::parse($demande->created_at)->format('h:m') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                    <a href="" class="btn btn-secondary btn-block">
                                        Plus...
                                    </a>
                                </div>
                            </div>
                            {{-- @else--}}
                            <div class="p-0 sub-drop dropdown-menu dropdown-menu-end" aria-labelledby="notification-drop">
                                <div class="m-0 shadow-none card">
                                    <div class="py-3 card-header d-flex justify-content-between bg-success">
                                        <div class="header-title">
                                            <h5 class="mb-0 text-white">Evènements en cours</h5>
                                        </div>
                                    </div>
                                    <div class="p-0 card-body">
                                        <p class="fst-italic ms-2">Aucun évènement en cours...</p>
                                    </div>
                                </div>
                            </div>
                            {{--@endif--}}
                            {{-- End Viz SD --}}
                            </li>

                            <li class="nav-item dropdown">
                                <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('admin/assets/images/user.png') }}" alt="User-Profile" class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                                    <div class="caption ms-3 d-none d-md-block ">
                                        <h6 class="mb-0 caption-title">{{ Auth::user()->nom }}</h6>
                                        <p class="mb-0 caption-sub-title"></p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="">Profil</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                            <span class="nav-icon text-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                                                    <path d="M7.5 1v7h1V1h-1z" />
                                                    <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                                                </svg>
                                            </span>
                                            <span class="nav-link-text text-danger">Déconnexion</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Nav Header Component Start -->
            <div class="iq-navbar-header" style="height: 215px;">
                <div class="container-fluid iq-container pb-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex-wrap d-flex justify-content-between align-items-center">
                                <div>
                                    @yield('main-title')
                                </div>
                                <div>
                                    @yield('btn-search')
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            @yield('info-dashboard')
                        </div>
                    </div>
                </div>
                <div class="iq-header-img">
                    <img src="{{ asset('admin/assets/images/dashboard/bg_header.png') }}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                </div>
            </div>
            <!-- Nav Header Component End -->
            <!--Nav Start-->
        </div>
        <div class="container-fluid content-inner mt-n5 py-0">
            @yield('content')
        </div>



        <!-- Footer Section Start -->
        <footer class="footer">
            <div class="footer-body">
                <div class="text-center">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> - 2023 - Affaires Maritime et Portuaires.
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->
    </main>

    <!-- Library Bundle Script -->
    <script src="{{ asset('admin/assets/js/core/libs.min.js') }}"></script>

    <!-- External Library Bundle Script -->
    <script src="{{ asset('admin/assets/js/core/external.min.js') }}"></script>

    <!-- Widgetchart Script -->
    <script src="{{ asset('admin/assets/js/charts/widgetcharts.js') }}"></script>

    <!-- mapchart Script -->
    <script src="{{ asset('admin/assets/js/charts/vectore-chart.js') }}"></script>
    <script src="{{ asset('admin/assets/js/charts/dashboard.js') }}"></script>

    <!-- fslightbox Script -->
    <script src="{{ asset('admin/assets/js/plugins/fslightbox.js') }}"></script>

    <!-- Settings Script -->
    <script src="{{ asset('admin/assets/js/plugins/setting.js') }}"></script>

    <!-- Slider-tab Script -->
    <script src="{{ asset('admin/assets/js/plugins/slider-tabs.js') }}"></script>

    <!-- Form Wizard Script -->
    <script src="{{ asset('admin/assets/js/plugins/form-wizard.js') }}"></script>

    <!-- AOS Animation Plugin-->
    <script src="{{ asset('admin/assets/vendor/aos/dist/aos.js') }}"></script>

    <!-- App Script -->
    <script src="{{ asset('admin/assets/js/hope-ui.js') }}" defer></script>

    <!--fontawesone-->
    <script src="https://kit.fontawesome.com/1066a12b52.js" crossorigin="anonymous"></script>


</body>

</html>




{{--Modal Depôt_Rapport--}}
<div class="row">
    <div class="modal fade" id="DepotRapport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="depotRapport" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter le rapport</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(array('route' => 'rapport', 'method' => 'post', 'enctype' =>
                    'multipart/form-data')) !!}
                    <input type="hidden" name="rapport" value="">
                    <div class="form-group col-sm-12">
                        <label for="">Rapport</label>
                        <input type="file" id="" name="rapport" class="form-control">
                        @if ($errors->has('rapport'))
                        <span class="text-danger fst-italic">
                            {{ $errors->first('rapport') }}
                        </span>
                        @endif
                    </div>

                    <div class="text-start mt-2">
                        <button type="submit" class="btn btn-primary">Envoyer </button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
