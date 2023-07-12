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

    <h4>information sur l'agent</h4>

</div>
@endsection

@section('content')

<?php

use Carbon\Carbon; ?>

<?php $nav = "show" ?>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                    <h4 class="card-title" style="text-align: center;">Profil</h4>
                </div>
            </div>

            <div class="card-body">
                <div class="text-center">
                    <div class="user-profile">

                        <img src="{{asset('/docs/images/lms/'.$user->photo)}}" alt="profile-img"
                            class="rounded-pill avatar-130 img-fluid">
                    </div>
                    <div class="mt-3">
                        <h3 class="d-inline-block">{{ $user->nom }} {{ $user->prenom }}</h3>
                        <p class="d-inline-block pl-3"> {{ $user->matricule }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                    <h4 class="card-title" style="text-align: center;">A propos</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="mt-2">
                    <h6 class="mb-1" style="font-weight:bold;">Date de naissance:</h6>
                    <p>{{ Carbon::parse($user->naissance)->format('d F Y') }}</p>
                </div>
                <div class="mt-2">
                    <h6 class="mb-1" style="font-weight:bold;">Email:</h6>
                    <p><a href="#" class="text-body">{{ $user->email }}</a></p>
                </div>
                <div class="mt-2">
                    <h6 class="mb-1" style="font-weight:bold;">Contact:</h6>
                    <p><a href="#" class="text-body">{{ $user->contact }}</a></p>
                </div>
                <div class="mt-2">
                    <h6 class="mb-1" style="font-weight:bold;">Date de prise de fonction:</h6>
                    <p> <a href="#" class="text-body"> {{ Carbon::parse($user->fonction)->format('d F Y') }}</a></p>
                </div>
                <div class="mt-2">
                    <h6 class="mb-1" style="font-weight:bold;">Date de retraite:</h6>
                    <p> <a href="#" class="text-body">
                            {{ Carbon::parse($user->fonction)->addYears(30)->format('d F Y')}}</a>
                    </p>
                </div>
                <div class="mt-2">
                    <h6 class="mb-1" style="font-weight:bold;">Numéro de la pièce d'identité:</h6>
                    <p><a href="#" class="text-body">{{ $user->cni }}</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endsection