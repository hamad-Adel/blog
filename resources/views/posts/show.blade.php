@extends('layouts.main')
@section('title') {{ $post->title }} @endsection

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">{{ $post->title }}</h5>
    <p class="card-text">{!! $post->content !!}</p>
	@if(Auth::id() === $post->user->id)
		<a href="{{ route('posts.edit', ['post_id'=>$post->id]) }}" class="card-link">Edit</a>	   
		{!! Form::open(['action'=>['Web\PostController@destroy', $post->id], 'method'=>'post']) !!}
			{{ Form::hidden('_method', 'DELETE') }}
			{{ Form::submit('Delete', ['class'=>'card-link']) }}
		{!! Form::close() !!}
	@endif
  </div>
</div>
@endsection