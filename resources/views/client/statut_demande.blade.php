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

    <h4>statut de la demande</h4>

</div>
@endsection

@section('content')
<?php

use Carbon\Carbon; ?>

<?php $nav = "statut_demande" ?>
<br>


<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="row row-cols-1">


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

                <section class="content">
                    <div class="container-fluid">
                        <!-- Info boxes -->
                        <?php
                        $demande = App\Models\DemandeModel::first();
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Statut de ma demande</div>
                                    <div class="card-body">

                                        <br /><br />
                                        <div class="table-responsive">
                                            <table id="config-table" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Motif</th>
                                                        <th>Date de départ</th>
                                                        <th>Date de reprise</th>
                                                        <th>Statut</th>

                                                    </tr>
                                                </thead>
                                                <tbody id='content'>
                                                    @forelse($demande as $demandes)
                                                    <tr style="font-size:13px">
                                                        <td>{{$demande->motif}}</td>
                                                        <td>{{$demande->date_depart}}</td>
                                                        <td>{{$demande->date_retour}}</td>

                                                        <td>
                                                            @if($demande->dg_validated == 0 &&
                                                            empty($demande->motif_rejet))
                                                            <h6><span class="badge badge-success" style="color:blue">Encours</span>
                                                            </h6>
                                                            @elseif($demande->dg_validated == 1)
                                                            <h6><span class="badge badge-danger" style="color:blue">Validé</span></h6>
                                                            @else
                                                            <h6><span class="badge badge-warning" style="color:blue">Rejeté</span></h6>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="7">AUCUNE INFORMATION DISPONIBLE</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @endsection