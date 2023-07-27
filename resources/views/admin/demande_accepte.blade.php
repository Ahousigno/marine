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

<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card" style="margin-top:10px">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title" style="text-align: center;">Liste des Demandes
                            de
                            permission acceptées
                        </h4>
                    </div>

                </div>
                <div class="card-body px-0">
                    <div class="table-responsive">
                        <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                            <thead>
                                <tr class="ligth">
                                    <th>N°</th>
                                    <th>Nom & Prénoms</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Motif de la demande</th>
                                    <th>Date de départ</th>
                                    <th>Date de reprise</th>

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
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{$demandes->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection