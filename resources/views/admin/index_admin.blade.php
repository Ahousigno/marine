@extends('layouts.admin_layout')

@section('main-title')
<h1>Tableau de bord</h1>
@endsection
@section('btn-search')
<span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requete">
    <i class="fa fa-search" aria-hidden="true"></i> RECHERCHE
</span>
@endsection
@section('info-dashboard')
<div class="row mt-3">
    <h4>tableau de gestion des officiers et des demandes de permission</h4>
</div>
@endsection

@section('content')
<?php $nav = 'index_admin' ?>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="row row-cols-1">
            <div class="overflow-hidden d-slider1 ">
                <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                    <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700"
                        data-bs-toggle="modal" data-bs-target="#event">

                        <div class="card-body" id="card-b">
                            <div class="progress-widget">
                                <div id="circle-progress-01" style="color: rgb(18, 166, 80)">
                                    <!-- <i class="fa fa-paper-plane fa-3x" aria-hidden="true"></i> -->
                                    <i class="fa fa-spinner fa-spin fa-3x"></i>
                                </div>
                                <div class="progress-detail">

                                    <a href="{{route('admin.infos_demande')}}">
                                        <p class="mb-2" style="color: rgb(18, 166, 80)">Demande en cours</p>
                                    </a>
                                    {{--<h4 class="counter">{{$events_soumis->count()}}</h4>--}}
                                </div>
                            </div>
                        </div>

                    </li>
                    <li class=" swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700"
                        data-bs-toggle="modal" data-bs-target="#event-valide">
                        <div class="card-body" id="card-b">

                            <div class="progress-widget">
                                <div id="circle-progress-01" style="color: rgb(18, 166, 80)">
                                    <i class="fa fa-check fa-3x" aria-hidden="true"></i>
                                </div>
                                <div class="progress-detail">

                                    <a href="{{route('admin.demande_accepte')}}">
                                        <p class="mb-2" style="color: rgb(18, 166, 80)">Demande acceptées</p>
                                    </a>
                                    {{--<h4 class="counter">{{$events_valide->count()}}</h4>--}}
                                </div>
                            </div>

                        </div>
                    </li>
                    <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700"
                        data-bs-toggle="modal" data-bs-target="#event-encours">
                        <div class="card-body" id="card-b">


                            <div class="progress-widget">
                                <div id="circle-progress-01" style="color: rgb(18, 166, 80)">
                                    <!-- <i class="fa fa-danger fa-spin fa-3x"></i> -->
                                    <i class="fa fa-exclamation  fa-3x" aria-hidden="true"></i>
                                </div>
                                <div class="progress-detail">

                                    <a href="{{route('admin.demande_rejete')}}">
                                        <p class="mb-2" style="color: rgb(18, 166, 80)">Demande rejetées</p>
                                    </a>
                                    {{--<h4 class="counter">{{$events_encours->count()}}</h4>--}}
                                </div>
                            </div>
                            {{-- </a>--}}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="row row-cols-1">
            <div class="overflow-hidden d-slider1 ">
                <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                    <li class="swiper-slide card card-slide col-8   " data-aos="fade-up" data-aos-delay="700"
                        data-bs-toggle="modal" data-bs-target="#event-acheve">
                        <div class="card-body" id="card-b">
                            {{-- <a href="{{route('sdevent.acheve')}}">--}}
                            <div class="progress-widget">
                                <div id="circle-progress-01" style="color: rgb(18, 166, 80)">
                                    <i class="fa fa-history fa-3x" aria-hidden="true"></i>
                                </div>
                                <div class="progress-detail">
                                    <a href="#"></a>
                                    <p class="mb-2" style="color: rgb(18, 166, 80)">Retraite Proche</p>
                                    {{--<h4 class="counter">{{$events_encours->count()}}</h4>--}}
                                </div>
                            </div>
                            {{-- </a>--}}
                        </div>
                    </li>
                    <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700"
                        data-bs-toggle="modal" data-bs-target="#medias-valide">
                        <div class="card-body" id="card-b">
                            {{-- <a href="{{route('media.validated')}}">--}}
                            <div class="progress-widget">
                                <div id="circle-progress-01" style="color: rgb(18, 166, 80)">
                                    <i class="fa fa-check fa-3x" aria-hidden="true"></i>
                                </div>
                                <div class="progress-detail">
                                    <p class="mb-2" style="color: rgb(18, 166, 80)">Agents retraités</p>
                                    {{--<h4 class="counter">{{$events_encours->count()}}</h4>--}}
                                </div>
                            </div>
                            {{-- </a>--}}
                        </div>
                    </li>
                    <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700"
                        data-bs-toggle="modal" data-bs-target="#medias-valide">
                        <div class="card-body" id="card-b">
                            {{-- <a href="{{route('media.validated')}}">--}}
                            <div class="progress-widget">
                                <div id="circle-progress-01" style="color: rgb(18, 166, 80)">
                                    <i class="fa fa-check fa-3x" aria-hidden="true"></i>
                                </div>
                                <div class="progress-detail">
                                    <p class="mb-2" style="color: rgb(18, 166, 80)">Agents retraités</p>
                                    {{--<h4 class="counter">{{$events_encours->count()}}</h4>--}}
                                </div>
                            </div>
                            {{-- </a>--}}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

{{--Modal event valide
<div class="modal fade" id="event-valide" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="requete_editLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="requete_editLabel">Evènements validés</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                            </div>
                            <div class="card-body px-0">
                                <div class="table-responsive">
                                    <table id="user-list-table" class="table table-bordered" role="grid">
                                        <thead>
                                            <tr class="ligth">
                                                <th>Nom</th>
                                                <th>Date de début</th>
                                                <th>Date de Fin</th>
                                                <th>Détails</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($events_valide as $event)
                                            <tr>
                                                <td>{{$event->nom}}</td>
<td>{{Carbon\Carbon::parse($event->date_debut)->translatedFormat('d F Y')}}
</td>
<td>{{Carbon\Carbon::parse($event->created_at)->translatedFormat('d F Y')}}
</td>
<td>
    <a href="{{route('sdevent.detail', $event->id)}}">
        <i class="fas fa-eye btn btn-primary"></i></a>
</td>
</tr>
@endforeach
</tbody>
</table>
<div class="mt-3">
    {{$events_valide->links()}}
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
--}}









<style>
#card-b:hover {
    cursor: pointer;
}
</style>

@endsection