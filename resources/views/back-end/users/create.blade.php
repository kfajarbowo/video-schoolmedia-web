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

    @component('back-end.shared.create' , ['pageTitle' => $pageTitle , 'pageDes' => $pageDes])
        <form action="{{ route($routeName.'.store') }}" method="POST">
            @include('back-end.'.$folderName.'.form')
            <button type="submit" class="btn btn-primary pull-right">Add {{ $moduleName }}</button>
            <div class="clearfix"></div>
        </form>
    @endcomponent
@endsection









{{-- @extends('back-end.layout.app')

@section('title')
    Home Page
@endsection

@section('content')
    @component('back-end.layout.header')

    @slot('nav_title')
        Form Create
    @endslot
    <li>
        <a href="#">Logout</a>
    </li>
    @endcomponent
<form action="{{route('users.store')}}" method="POST">
    {{csrf_field()}}
    <div class="row">
        <div class=" ml-5 col-md-10">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Create Users</h4>
              <p class="card-category">- - - -</p>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Username</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Email address</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Password</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>
                  </div>
                </div>

                {{-- <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating"></label>
                        <textarea class="form-control" rows="5"></textarea>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlSelect1">City</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>1</option>
                          <option style="color:black;">2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>

                    <div class="col-md-4">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Country</label>
                        <input type="text" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Tag</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>

                  </div> --}}
                {{-- <button type="submit" class="btn btn-primary pull-right">Add Users</button>
                <div class="clearfix"></div>
            </div>
          </div>
        </div>

      </div>

    </form> --}}

{{-- @endsection --}} --}}
