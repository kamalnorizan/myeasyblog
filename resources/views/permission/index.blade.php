@extends('layouts.app')
@section('head')

@endsection

@section('title','Permissions')

@section('titleaction')

@endsection

@section('content')

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Create Role</h5>
                </div>
                <div class="ibox-content">
                    {!! Form::open(['method' => 'POST', 'route' => 'permission.storerole']) !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Role Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>

                        <div class="btn-group pull-right">
                            {!! Form::submit("Tambah", ['class' => 'btn btn-success']) !!}
                        </div>

                    {!! Form::close() !!}
                    <br><br>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Create Permission</h5>
                </div>
                <div class="ibox-content">
                    {!! Form::open(['method' => 'POST', 'route' => 'permission.storepermission']) !!}

                        <div class="form-group{{ $errors->has('permissionName') ? ' has-error' : '' }}">
                            {!! Form::label('permissionName', 'Permission Name') !!}
                            {!! Form::text('permissionName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('permissionName') }}</small>
                        </div>

                        <div class="btn-group pull-right">

                            {!! Form::submit("Tambah Permission", ['class' => 'btn btn-success']) !!}
                        </div>

                    {!! Form::close() !!}
                    <br><br>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Roles</h5>
                </div>
                <div class="ibox-content">
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                Role Name
                            </td>
                            <td>
                                Permission(s)
                            </td>
                            <td>
                                Action
                            </td>
                        </tr>
                        @foreach ($roles as $role)
                        <tr>
                            <td>
                                {{ucfirst($role->name)}}
                            </td>
                            <td>
                                @foreach ($role->permissions as $permission)

                                <a href="{{route('permission.revokeRolePermission',['role'=>$role->id,'permission'=>$permission->name])}}" onclick="return confirm('Are you sure you want to remove this permission from role {{$role->name}}?')">
                                    <span class="badge badge-primary">{{$permission->name}}</span>
                                </a>

                                @endforeach

                            </td>
                            <td>
                                <div class="dropdown pull-right">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                      Assign Permission
                                      <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        @foreach ($permissions as $permission)
                                        <li><a href="{{route('permission.assignPermissionToRole',['role'=>$role->id,'permission'=>$permission->name])}}">{{$permission->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Permissions</h5>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <tr>
                            <td>
                                Permission Name
                            </td>
                            <td>
                                Action
                            </td>
                        </tr>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{ucfirst($permission->name)}}
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger btn-xs">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
