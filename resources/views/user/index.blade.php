@extends('layouts.app')
@section('head')

@endsection

@section('title','Users')

@section('titleaction')

@endsection

@section('content')

<div class="wrapper wrapper-content">
  <div class="row animated fadeInRightBig">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Users List</h5>
        </div>
        <div class="ibox-content">
          <table class="table">
            <tr>
              <td>
                Name
              </td>
              <td>
                Email
              </td>
              <td>
                Role(s)
              </td>
              <td>
                Permission(s)
              </td>
              <td>
                Action
              </td>
            </tr>
            @foreach ($users as $user)
            <tr>
              <td>
                {{$user->name}}
              </td>
              <td>
                {{$user->email}}
              </td>
              <td>
                @foreach ($user->roles as $role)
                <span class="badge badge-info">{{$role->name}}</span>
                @endforeach
              </td>
              <td>
                @foreach ($user->getPermissionsViaRoles() as $permission)
                <span class="badge badge-success">{{$permission->name}}</span>
                @endforeach

                @foreach ($user->getDirectPermissions() as $permission)
                <span class="badge badge-warning">{{$permission->name}}</span>
                @endforeach
              </td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Assign Role
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    @foreach ($roles as $role)
                    <li><a href="{{route('user.assignroletouser',['user'=>$user->id,'role'=>$role->name])}}">{{ucfirst($role->name)}}</a></li>
                    @endforeach

                  </ul>
                </div>
                @can('assign permission to user')
                <div class="dropdown">
                  <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Assign Permission
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    @foreach ($permissions as $permission)
                    <li><a href="{{route('user.assignpermissiontouser',['user'=>$user->id,'permission'=>$permission->name])}}">{{ucfirst($permission->name)}}</a></li>
                    @endforeach
                  </ul>
                </div>
                @endcan
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
