@extends('back-end.layout.app')

@section('title')
    Home Page
@endsection

@section('content')
    @component('back-end.layout.header')

    @slot('nav_title')
        {{$pageTitle}}
    @endslot
    <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
            @csrf
        </form>
    </li>
    @endcomponent

    @component('back-end.shared.table',['pageTitle' => $pageTitle, 'pageDes' => $pageDes])


        @slot('nav_title')
        {{$pageTitle}}
        @endslot

        @slot('addButton')
        <div class="col-md-4 text-right">
            <a href="{{route('users.create')}}" class="btn btn-white btn-round">
            Add {{ $sModuleName }}</a>
            </div>
        @endslot
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <tr>

                    <th>ID</th>
                    <th> Name </th>
                    <th>  Email </th>
                    <th>  Group </th>
                    <th class="">Action</th>
                </tr></thead>
                <tbody>
                @foreach($users as $key=>$user)
                    <tr>
                        <td> {{$key + 1}} </td>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->email }}  </td>
                        <td> {{ $user->group }}  </td>
                        <td class="td-actions">
                            @include('back-end.shared.buttons.edit')
                            @include('back-end.shared.buttons.delete')

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $users->links() !!}
        </div>
    @endcomponent




@endsection
