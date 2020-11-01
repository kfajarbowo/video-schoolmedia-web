@extends('layouts.app')

@section('title',$video->name)

@section('content')
<div class="section section-buttons">
  <div class="container">
      <div class="title">
      <h2>{{$video->name}}</h2>
      </div>

      <div class="row">
        <div class="col-md-12">
            @php $url = getYoutubeId($video->youtube) @endphp
            @if($url)
                <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{ $url }}"
                        style="margin-bottom: 20px" frameborder="0" allowfullscreen></iframe>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <p>
                <span style="margin-right: 20px">
                    <i class="nc-icon nc-user-run"></i> : {{ $video->user->name }}
                </span>
                <span style="margin-right: 20px">
                    <i class="nc-icon nc-calendar-60"></i> :  {{ $video->created_at }}
                </span>
                <span style="margin-right: 20px">
                    <i class="nc-icon nc-single-copy-04"></i> :    <a
                            href="{{ route('front.category' , ['id' => $video->cat->id ]) }}">
                    {{ $video->cat->name }}
                </a>
                </span>
            </p>
            <p>
                {{ $video->des }}
            </p>
        </div>
        <div class="col-md-3">
            <h6>Tags</h6>
            <p>
                @foreach($video->tags as $tag)
                    <a href="{{ route('front.tags' , ['id' => $tag->id]) }}">
                        <span class="badge badge-pill badge-primary">{{ $tag->name }}</span>
                    </a>
                @endforeach
            </p>
        </div>
        <div class="col-md-3">
            <h6>Skills</h6>
            <p>
                @foreach($video->skills as $skill)
                    <a href="{{ route('front.skill' , ['id' => $skill->id]) }}">
                        <span class="badge badge-pill badge-info">{{ $skill->name }}</span>
                    </a>
                @endforeach
            </p>
        </div>
    </div>

<br><br>

    <div class="row" id="#comments">
        <div class="col-md-12">
            <div class="card text-left">
                <div class="card-header card-header-rose">
                    @php $comments = $video->comments @endphp
                <h5>Comments ({{count($comments)}})</h5>
                </div>
                <div class="card-body">
                    @foreach($comments as $comment)
                <div class="row">
                 <div class="col-md-8">
                        <i class="nc-icon nc-chat-33"></i> : {{$comment->user->name}}
                    </div>

                    <div class="col-md-4 text-right">
                    <span>
                        <i class="nc-icon nc-calendar-60"></i> : {{$comment->created_at}} |
                    </span>

                 </div>
                </div>
                    <p>{{$comment->comment}}</p><hr>
                    @if(auth()->user())
                    @if((auth()->user()->group == 'admin') ||auth()-user()->id == $comment->user->id)
                    @endif
                    <a href="" onclick="$(this).next('div').slideToggle(1000);return false;">edit</a>

                <div style="display:none;">
                    <form action="{{route('front.commentUpdate',['id' =>$comment->id])}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="comment" class="form-control"  rows="4">{{$comment->comment}}</textarea>
                        </div>
                        <button type="submit" class="btn">Edit</button>
                    </form>
                </div>
                    @endif

                    @if(!$loop->last)
                    <hr>
                    @endif
                    @endforeach
                </div>
              </div>
        </div>
    </div>

    @if(auth()->user())
    <form action="{{route('front.commentStore',['id' =>$video->id])}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for=""></label>
            <textarea name="comment" class="form-control" rows="4" placeholder="Add comment" style="background-color:#e8ede9;"></textarea>
        </div>
        <button type="submit" class="btn">Comment</button>
    </form>
    @endif
  </div>
</div>
@endsection
