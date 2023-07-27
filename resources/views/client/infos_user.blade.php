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

    <h4>Completer mes informations</h4>

</div>
@endsection

@section('content')
<?php $nav = "create" ?>
<div class="row">
    <div class="col-12 m-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">completer mes informations</h4>
                </div>l
            </div>
            <div class="card-body">
                <div class="new-user-info">



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

                        <form role="form" action="{{route('admin.users.store')}}" enctype="multipart/form-data"
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
                                                    <label for="nom">Nom de l'agent<span
                                                            style="color: red;"></span></label>
                                                    <input type="text" id="nom" class="form-control" name="nom">
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
                                                    <input type="text" id="prenom" class="form-control" name="prenom">
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
                                                    <label for="contact">Contact<span
                                                            style="color: red;"></span></label>
                                                    <input type="text" id="contact" class="form-control" name="contact">
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
                                                    <input type="email" id="email" class="form-control" name="email">
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
                                                        name="password">
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
                                                        name="password_confirm">
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
                                                    <input type="text" id="cni" class="form-control" name="cni">
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
                                                        name="matricule">
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
                                                    <input type="date" id="naissance" class="form-control"
                                                        name="naissance">
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
                                                    <input type="date" id="fonction" class="form-control"
                                                        name="fonction">
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
                                                    <input type="file" id="photo class=" form-control" name="photo">
                                                    @if ($errors->has('photo'))
                                                    <span class="text-danger fst-italic">
                                                        {{ $errors->first('photo') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Status</label>
                                                    <select class="form-select" type="text" name="status">
                                                        <option selected>...</option>
                                                        <option value="Commercial">Stagiaire</option>
                                                        <option value="Scientifique">Personnel</option>
                                                    </select>
                                                    @if ($errors->has('status'))
                                                    <span class="text-danger fst-italic">
                                                        {{ $errors->first('status') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">role</label>
                                                    <select class="form-select" type="text" name="role">
                                                        <option selected>...</option>
                                                        <option value="Commercial">admin</option>
                                                        <option value="Scientifique">stagiaire</option>
                                                        <option value="Scientifique">autre</option>
                                                    </select>
                                                    @if ($errors->has('role'))
                                                    <span class="text-danger fst-italic">
                                                        {{ $errors->first('role) }}
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