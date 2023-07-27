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

    <h4>Gestion des demandes de permissions</h4>

</div>
@endsection

@section('content')
<?php

use Carbon\Carbon; ?>

<?php $nav = "index" ?>
<div class="my-3 bg-body rounded shadow-sm">
    <div style="text-align: center">
        @if(session()->has("success"))

        <div class="alert alert-success">

            <h3>{{session()->get("success")}}</h3>
        </div>

        @endif

        @if ($errors->any())
        <div class="alert alert-danger">

            <ul>
                @foreach($errors->all() as $error)

                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="margin-top:10px">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title" style="text-align: center;">Liste des Demandes de
                                permission
                            </h4>
                        </div>

                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table id="user-list-table" class="table table-striped" role="grid"
                                data-toggle="data-table">
                                <thead>
                                    <tr class="ligth">
                                        <th>N°</th>
                                        <th>Nom & Prénoms</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Motif de la demande</th>
                                        <th>Date de départ</th>
                                        <th>Date de reprise</th>
                                        <th>Date de demande</th>
                                        <th style="min-width: 100px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($demandes as $demande)
                                    <?php
                                    $user = App\Models\User::first();
                                    ?>

                                    @if (Auth::user())
                                    <tr>
                                        <th scope="row">{{$loop->index + 1}}</th>
                                        <td>{{ $user->nom }} {{ $user->prenom }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->contact }}</td>
                                        <td>{{ $demande->motif }}</td>
                                        <td>{{ Carbon::parse($demande->date_depart)->format('d F Y') }}</td>
                                        <td>{{ Carbon::parse($demande->date_retour)->format('d F Y') }}</td>
                                        <td>{{ Carbon::parse($demande->created_at)->format('d F Y') }}</td>
                                        <td>
                                            @if($demande->dg_validated == 0 && empty($demande->motif_rejet))
                                            <div class="d-flex justify-content-sm-around">
                                                <div class="mt-2 text-center">



                                                    <a href="#" class="btn btn-success btn-icon" data-bs-toggle="modal"
                                                        data-bs-target="#validation" data-placement=" top"
                                                        title="Valider" data-original-title="Valider">
                                                        <li class="fa fa-check"></li>
                                                        <span> </span>
                                                    </a>
                                                </div>

                                                <div class="mt-2 text-center">
                                                    <a href="#" class="btn btn-danger btn-icon" data-bs-toggle="modal"
                                                        data-bs-target="#motif" data-placement=" top" title="Rejeter"
                                                        data-original-title="Rejeter">
                                                        <li class="fa fa-close"></li>
                                                        <span> </span>
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif($demande->dg_validated == 1)
                                            <h5 class="m-2" style="background-color: green; color: white">Cette demande
                                                a
                                                été
                                                validée
                                            </h5>
                                            @elseif($demande->dg_validated == 0 && !empty($event->motif_rejet))
                                            <h5 class="m-2" style="background-color: red; color: white">Cette demande a
                                                été
                                                réfusée
                                            </h5>
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    {{--Modal de refus--}}
    <div class="row">
        <div class="modal fade" id="motif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Dites pourquoi vous réfusez cette
                            demande</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {!! Form ::open(array('route' => ['admin.demande_rejet'], 'method'
                        =>
                        'post', 'enctype' => 'multipart/form-data')) !!}
                        {{--<input type="hidden" name="" value="{{$demandes->id}}">--}}
                        <div class="form-group col-sm-12">
                            <label for=""></label>
                            <textarea name="motif" id="" cols="30" rows="6" class="form-control"></textarea>
                            @if ($errors->has('motif'))
                            <span class="text-danger fst-italic">
                                {{ $errors->first('motif') }}
                            </span>
                            @endif
                        </div>
                        <div class="text-start mt-2">
                            <button type="submit" class="btn btn-primary">Réfuser</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Modal de validation--}}
    <div class="row">
        <div class="modal fade" id="validation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Voulez vous vraimment valider
                            cette demande ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(array('route' => ['admin.demande_accept'], 'method' =>
                        'post')) !!}
                        <div class="text-start mt-2">
                            <button type="submit" class="btn btn-primary">Valider</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection