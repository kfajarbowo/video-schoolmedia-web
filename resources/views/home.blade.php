@extends('layouts.app')

@section('content')
<div class="section section-buttons">
    <div class="container">
      <div class="title">
        <h2>Latest Videos</h2>
      </div>
      @include('front-end.shared.video-user')
    </div>
</div>
@endsection
