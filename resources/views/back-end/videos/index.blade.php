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

    @component('back-end.shared.table' , ['pageTitle' => $pageTitle , 'pageDes' => $pageDes])
        @slot('addButton')
            <div class="col-md-4 text-right">
                <a href="{{ route($routeName.'.create') }}" class="btn btn-white btn-round">
                    Add {{ $sModuleName }}
                </a>
            </div>
        @endslot
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <tr>
                    <th> ID  </th>
                    <th> Name </th>
                    <th>  Published </th>
                    <th>  Categories    </th>
                    <th> User </th>
                    <th class="text-right">  Action </th>
                </tr></thead>
                <tbody>
                @foreach($users as $key=>$user)
                    <tr>
                        <td>   {{ $key + 1}} </td>
                        {{-- <td>
                            {{ $user->id }}
                        </td> --}}
                        <td> {{ $user->name }} </td>
                        <td>
                            @if($user->published == 1)
                                published
                            @else
                                hidden
                            @endif
                        </td>
                        <td>  {{ $user->cat->name }} </td>
                        <td>   {{ $user->user->name }} </td>

                        <td class="td-actions text-right">
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
