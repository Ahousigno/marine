@extends('layouts.admin_layout')

@section('main-title')
<h1>Gestion des roles</h1>
@endsection

@section('content')
<?php 
    use Spatie\Permission\Models\Permission;
    use Illuminate\Support\Facades\DB;
    ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between flex-wrap">
                <div class="header-title">
                    <h4 class="card-title mb-0">Roles & Permissions</h4>
                </div>
                <div class="">
                    <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop-1">
                        <i class="btn-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </i>
                        <span>Nouveau Role</span>
                    </a>
                    <div class="modal fade" id="staticBackdrop-1" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter un nouveau role</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(array('route' => 'roles.store', 'method' => 'post')) !!}
                                    <div class="form-group">
                                        {!! Form::label('name', 'Nom du Rôle') !!}<sup
                                            class="text-danger fw-bold">*</sup>
                                        {!! Form::text('name', old('name'), array('class' => 'form-control')) !!}
                                        @if ($errors->has('name'))
                                        <span class="text-danger fst-italic">
                                            {{ $errors->first('name') }}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('permission', 'Attributions des droits') !!}<sup
                                            class="text-danger fw-bold">*</sup>
                                        <br>
                                        <div class="row">
                                            @foreach($permission as $value)
                                            <span
                                                class="col-md-4">{{ Form::checkbox('permission[]', $value->id, false, array('id' => 'permission')) }}
                                                {{ $value->name }}</span>
                                            @endforeach
                                        </div>
                                        @if ($errors->has('permission'))
                                        <span class="text-danger fst-italic">
                                            {{ $errors->first('permission') }}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="text-start mt-2">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Annuler</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" data-toggle="data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Permission</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <?php
                                    $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
                                                                    ->where("role_has_permissions.role_id",$role->id)->get();

                                                                    // dd($rolePermissions);
                                ?>
                            <tr>
                                <td class="cell fw-bold">#{{++$i}}</td>
                                <td class="cell">{{$role->name}}</td>
                                <td class="cell">
                                    @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $p)
                                    <label disabled class="badge bg-secondary p-2">{{ $p->name }}</label>
                                    @endforeach
                                    @endif
                                </td>
                                <td class="cell">
                                    <form method="post" action="{{route('roles.destroy', $role->id)}}">
                                        {{-- <a href="{{route('roles.show', $role->id)}}"><i
                                            class="fa-solid fa-eye btn btn-info text-white"></i></a> --}}
                                        <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#role_edit{{ $role->id }}">

                                            <svg width="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg>

                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">

                                            <svg width="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                <path
                                                    d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>

                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <?php
                                    $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role->id)
                                                        ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                                                        ->all();
                                    // dd($rolePermissions);
                                ?>
                            <div class="modal fade" id="role_edit{{ $role->id }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="role_editLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="role_editLabel">Modification du role</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update',
                                            $role->id]]) !!}
                                            <div class="form row">
                                                <div class="form-group">
                                                    {!! Form::label('name', 'Nom du Rôle') !!}<sup
                                                        class="text-danger fw-bold">*</sup>
                                                    {!! Form::text('name', old('name'), array('class' =>
                                                    'form-control')) !!}
                                                    @if ($errors->has('name'))
                                                    <span class="text-danger fst-italic">
                                                        {{ $errors->first('name') }}
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('permission', 'Attributions des droits') !!}<sup
                                                        class="text-danger fw-bold">*</sup>
                                                    <br>
                                                    <div class="row">
                                                        @foreach($permission as $value)
                                                        <span
                                                            class="ml-3">{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'permission')) }}
                                                            {{ $value->name }}</span>
                                                        @endforeach
                                                    </div>
                                                    @if ($errors->has('permission'))
                                                    <span class="text-danger fst-italic">
                                                        {{ $errors->first('permission') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-info btn-block text-white mt-3">Enregistrer <i
                                                    class="fa-solid fa-floppy-disk"></i></button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection