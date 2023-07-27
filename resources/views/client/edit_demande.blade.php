@extends('layouts.admin_layout')

@section('contenu')

<?php $nav = "demande_permission" ?>
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
                <form role="form" action="{{route('client.demande_update',$demande->id')}}"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-white mb-3">Demander une permission</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-lg-12">
                                <br><br>
                                <input type="hidden" name="" value="$user->id">
                                <?php
                                $user = App\Models\User::first();
                                ?>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="nom">Nom de l'agent<span style="color: red;"></span></label>
                                            <input type="text" id="nom" class="form-control" name="nom"
                                                value="{{$user->nom}} {{$user->prenom}}">
                                            @if ($errors->has('nom'))
                                            <span class="text-danger fst-italic">
                                                {{ $errors->first('nom') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="contact">Contact<span style="color: red;"></span></label>
                                            <input type="text" id="contact" class="form-control" name="contact"
                                                value="{{$user->contact}}">
                                            @if ($errors->has('contact'))
                                            <span class="text-danger fst-italic">
                                                {{ $errors->first('contact') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="matricule">Matricule <span style="color: red;"></span></label>
                                            <input type="matricule" id="matricule" class="form-control" name="matricule"
                                                value="{{$user->matricule}}">
                                            @if ($errors->has('matricule'))
                                            <span class="text-danger fst-italic">
                                                {{ $errors->first('matricule') }}
                                            </span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="motif">motif de l'absence<span
                                                    style="color: red;"></span></label>
                                            <input type="text" id="ordre" class="form-control" name="motif" value="{{$demande->motif}}>
                                            @if ($errors->has('motif'))
                                            <span class=" text-danger fst-italic">
                                            {{$errors->first('motif')}}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="date_reunion">Date de Depart<span
                                                    style="color: red;"></span></label>
                                            <input type="date" id="date_depart" class="form-control" name="date_depart"
                                                value="{{$demande->date_depart}}>
                                            @if ($errors->has('date_depart'))
                                            <span class=" text-danger fst-italic">
                                            {{ $errors->first('date_depart') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="date_reunion">Date de reprise<span
                                                    style="color: red;"></span></label>
                                            <input type="date" id="date_depart" class="form-control" name="date_retour"
                                                value="{{$demande->date_retour}}>
                                            @if ($errors->has('date_retour'))
                                            <span class=" text-danger fst-italic">
                                            {{ $errors->first('date_retour') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <input type="submit" value="Soumettre la demande!" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @endsection