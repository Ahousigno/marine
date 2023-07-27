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

    <h4>Modification des informations d'un nouveau personnel</h4>

</div>
@endsection

@section('content')
<?php $nav = "create" ?>
<div class="row">
    <div class="col-12 m-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Ajout d'un nouveau personnel</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">

                    <form role="form" action="{{route('admin.users.update',$user->id)}}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center text-white mb-3">Agent</h4>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="" value="">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="nom">Nom de l'agent<span style="color: red;"></span></label>
                                                <input type="text" id="nom" class="form-control" name="nom"
                                                    value="{{$user->nom}}">
                                                @if ($errors->has('nom'))
                                                <span class="text-danger fst-italic">
                                                    {{ $errors->first('nom') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="prenom"> prénoms de l'agent<span
                                                        style="color: red;"></span></label>
                                                <input type="text" id="prenom" class="form-control" name="prenom"
                                                    value="{{$user->prenom}}">
                                                @if ($errors->has('prenom'))
                                                <span class="text-danger fst-italic">
                                                    {{ $errors->first('prenom') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
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
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="email">Mail <span style="color: red;"></span></label>
                                                <input type="email" id="email" class="form-control" name="email"
                                                    value="{{$user->email}}">
                                                @if ($errors->has('email'))
                                                <span class="text-danger fst-italic">
                                                    {{ $errors->first('email') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="password">Mot de Passe<span
                                                        style="color: red;"></span></label>
                                                <input type="text" id="password" class="form-control"
                                                    name="password">{{--value="{{$user->password_confirm}}"--}}
                                                @if ($errors->has('password'))
                                                <span class="text-danger fst-italic">
                                                    {{ $errors->first('password') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="password_confirm">Confirmer mot de passe<span
                                                        style="color: red;"></span></label>
                                                <input type="text" id="password_confirm" class="form-control"
                                                    name="password_confirm">{{--value="{{$user->password_confirm}}"--}}
                                                @if ($errors->has('password_confirm'))
                                                <span class="text-danger fst-italic">
                                                    {{ $errors->first('password_confirm') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="cni">Numéro CNI<span style="color: red;"></span></label>
                                                <input type="text" id="cni" class="form-control" name="cni"
                                                    value="{{$user->cni}}">
                                                @if ($errors->has('cni'))
                                                <span class="text-danger fst-italic">
                                                    {{ $errors->first('cni') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="matricule">Matricule <span
                                                        style="color: red;"></span></label>
                                                <input type="matricule" id="matricule" class="form-control"
                                                    name="matricule" value="{{$user->matricule}}">
                                                @if ($errors->has('matricule'))
                                                <span class="text-danger fst-italic">
                                                    {{ $errors->first('matricule') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="naissance">Date de Naissance<span
                                                        style="color: red;"></span></label>
                                                <input type="date" id="naissance" class="form-control" name="naissance"
                                                    value="{{$user->naissance}}">
                                                @if ($errors->has('naissance'))
                                                <span class="text-danger fst-italic">
                                                    {{ $errors->first('naissance') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="fonction">Date de prise de fonction <span
                                                        style="color: red;"></span></label>
                                                <input type="date" id="fonction" class="form-control" name="fonction"
                                                    value="{{$user->fonction}}">
                                                @if ($errors->has('fonction'))
                                                <span class="text-danger fst-italic">
                                                    {{ $errors->first('fonction') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="photo">Photo <span style="color: red;"></span></label>
                                                <input type="file" id="photo" class=" form-control" name="photo"
                                                    value="{{$user->photo}}">
                                                @if ($errors->has('photo'))
                                                <span class="text-danger fst-italic">
                                                    {{ $errors->first('photo') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <input type="submit" value="Enregister" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection