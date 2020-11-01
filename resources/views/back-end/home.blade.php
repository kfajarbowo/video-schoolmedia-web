@extends('back-end.layout.app')

@section('title')
    Home Page
@endsection

@section('content')
    @component('back-end.layout.header')

    @slot('nav_title')
        Home Page
    @endslot
    <li>
        <a href="#">Logout</a>
    </li>
    @endcomponent



    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-youtube"></i>
                    </div>
                    <p class="card-category">Videos</p>
                    <h3 class="card-title">{{ \App\Models\Video::count() }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="{{ route('videos.index') }}" class="warning-link">All videos</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <p class="card-category">Skills</p>
                    <h3 class="card-title">{{ \App\Models\Skill::count() }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="{{ route('skills.index') }}" class="warning-link">All Skills</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-tags"></i>
                    </div>
                    <p class="card-category">Tags</p>
                    <h3 class="card-title">{{ \App\Models\Tag::count() }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="{{ route('tags.index') }}" class="warning-link">All Tags</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-comments"></i>
                    </div>
                    <p class="card-category">Comments</p>
                    <h3 class="card-title">{{ \App\Models\Comments::count() }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="{{ route('videos.index') }}" class="warning-link">Check Videos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Latest Comments</h4>
                    <p class="card-category">Here you can see the latest comments in website</p>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <tr><th>ID</th>
                            <th>Name</th>
                            <th>Video</th>
                            <th>Comment</th>
                            <th>date</th>
                            <th>Action</th>
                        </tr></thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>
                                    <a href="{{ route('users.edit' , ['id' => $comment->user->id]) }}">
                                        {{ $comment->user->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('videos.edit' , ['id' => $comment->video->id]) }}">
                                        {{ $comment->video->name }}
                                    </a>
                                </td>
                                <td> {{ $comment->comment }}</td>
                                <td>{{ $comment->created_at }}</td>
                                <td>
                                    <a style="margin-left:15px;" href="{{ route('comment.delete' , ['id' => $comment->id]) }}">
                                        <i class="material-icons">delete</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $comments->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
