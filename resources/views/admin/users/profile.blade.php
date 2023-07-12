@extends('layouts.admin_layout')

@section('main-title')
    <h1>Mon profil</h1>
@endsection

@section('content')
    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="profile-img position-relative me-3 mb-3 mb-lg-0 profile-logo profile-logo1">
                                <img src="" alt="User-Profile"
                                    class="theme-color-default-img img-fluid rounded-pill avatar-100">
                            </div>
                            <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                                <h4 class="me-2 h4"></h4>
                                <span> - {{ $user->service }}</span>
                            </div>
                        </div>
                        <ul class="d-flex nav nav-pills mb-0 text-center profile-tab nav-slider" data-toggle="slider-tab"
                            id="profile-pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link show active" data-bs-toggle="tab" href="#profile-event" role="tab"
                                    aria-selected="false">Mes évènements</a>
                            </li>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#profile-profile" role="tab"
                                    aria-selected="false">Profil</a>
                            </li>
                            <div class="nav-slider-thumb position-absolute nav-link"
                                style="padding: 0px; width: 69px; transform: translate3d(0px, 0px, 0px); transition: all 300ms ease-in-out 0s;">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#profile-feed" role="tab"
                                    aria-selected="false">-</a>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="profile-img position-relative me-3 mb-3 mb-lg-0 profile-logo profile-logo1">
                                <img src="{{ asset('admin/assets/images/user.png') }}" alt="User-Profile"
                                    class="theme-color-default-img img-fluid rounded-pill avatar-100">
                            </div>
                            <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                                <h4 class="me-2 h4">{{ $user->name }} {{ $user->pname }}</h4>
                                <span> - {{ $user->service }}</span>
                            </div>
                        </div>
                        <ul class="d-flex nav nav-pills mb-0 text-center profile-tab" data-toggle="slider-tab"
                            id="profile-pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#profile-profile" role="tab"
                                    aria-selected="false">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#profile-feed" role="tab"
                                    aria-selected="false">Modifiez mes informations</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
        <div class="col-8">
            <div class="profile-content tab-content">
                <div id="profile-profile" class="tab-pane fade active show">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title">
                                <h4 class="card-title">Profil</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <h6 class="mb-1">Nom</h6>
                                    <p>{{ $user->name }}</p>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <h6 class="mb-1">Prénoms</h6>
                                    <p>{{ $user->pname }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <h6 class="mb-1">Email</h6>
                                    <p>{{ $user->email }}</p>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <h6 class="mb-1">Service</h6>
                                    <p>{{ $user->service }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="profile-feed" class="tab-pane fade">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title">
                                <h4 class="card-title">Modifier mes informations</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('name', 'Nom:') !!}<sup class="text-danger fw-bold">*</sup>
                                    {!! Form::text('name', null, ['class' => 'form-control border border-dark']) !!}
                                    @if ($errors->has('name'))
                                        <span class="text-danger fst-italic">
                                            {{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('pname', 'Prénoms:') !!}<sup class="text-danger fw-bold">*</sup>
                                    {!! Form::text('pname', null, ['class' => 'form-control border border-dark']) !!}
                                    @if ($errors->has('pname'))
                                        <span class="text-danger fst-italic">
                                            {{ $errors->first('pname') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('email', 'Email') !!}<sup class="text-danger fw-bold">*</sup>
                                    {!! Form::text('email', null, ['class' => 'form-control border border-dark']) !!}
                                    @if ($errors->has('email'))
                                        <span class="text-danger fst-italic">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('service', 'Service') !!}<sup class="text-danger fw-bold">*</sup>
                                    {!! Form::text('service', null, ['class' => 'form-control border border-dark']) !!}
                                    @if ($errors->has('service'))
                                        <span class="text-danger fst-italic">
                                            {{ $errors->first('service') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <h5 class="mb-3">Securité</h5>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('password', 'Mot de Passe') !!}<sup class="text-danger fw-bold">*</sup>
                                    {!! Form::password('password', ['class' => 'form-control border border-dark']) !!}
                                    @if ($errors->has('password'))
                                        <span class="text-danger fst-italic">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('password-confirm', 'Répetez le mot de passe') !!}<sup class="text-danger font-weight-bold">*</sup>
                                    {!! Form::password('password-confirm', ['class' => 'form-control border border-dark']) !!}
                                    @if ($errors->has('password-confirm'))
                                        <span class="text-danger fst-italic">
                                            {{ $errors->first('password-confirm') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row" style="display: none">
                                <div class="form-group col-md-6">
                                    {!! Form::label('roles', 'Attribution des Rôles (selection multiple : ctrl + clic droit)') !!}<sup class="text-danger fw-bold">*</sup>
                                    {!! Form::select('roles[]', $roles, $userRoles, ['class' => 'form-control', 'multiple']) !!}
                                    @if ($errors->has('roles'))
                                        <span class="fst-italic text-danger">
                                            {{ $errors->first('roles') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
@endsection
