@extends('back-end.layout.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

    @component('back-end.layout.header')
        @slot('nav_title')
            {{ $pageTitle }}
        @endslot
    @endcomponent

    @component('back-end.shared.edit' , ['pageTitle' => $pageTitle , 'pageDes' => $pageDes])
        <form action="{{ route($routeName.'.update' , ['id' => $users->id]) }}" method="POST">
            {{ method_field('put') }}
            @include('back-end.'.$folderName.'.form')
            <button type="submit" class="btn btn-primary pull-right">Update {{ $moduleName }}</button>
            <div class="clearfix"></div>
        </form>
    @endcomponent
@endsection

{{--
@extends('back-end.layout.app')

@section('title')
    Home Page
@endsection

@section('content')
    @component('back-end.layout.header')

    @slot('nav_title')
        Form Edit
    @endslot
    <li>
        <a href="#">Logout</a>
    </li>
    @endcomponent
<form action="{{route('users.update',['id' => $users->id])}}" method="POST">
    {{csrf_field()}}
    @method('PUT')
    <div class="row">
        <div class=" ml-5 col-md-10">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Edit Users</h4>
              <p class="card-category">- - - -</p>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Username</label>
                    <input type="text" name="name" value="{{$users->name}}" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Email address</label>
                      <input type="email" name="email" value="{{$users->email}}" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Password</label>
                      <input type="password" name="password" class="form-control">
                    </div>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary pull-right">Edit Users</button>
                <div class="clearfix"></div>
            </div>
          </div>
        </div>

      </div>

    </form>

@endsection --}}
