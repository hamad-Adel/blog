@extends('layouts.main')
@section('title')Edit- {{ $post->title }} @endsection

@section('content')
		{!! Form::open(['action'=>['Web\PostController@update', $post->id]]) !!}
			{{ Form::hidden('_method', 'PUT') }}
			<fieldset class="form-group">
				{{ Form::label('title') }}
				{{ Form::text('title', $post->title , ['class'=>'form-control']) }}
				<small class="text-danger">{{ $errors->first('title') }}</small>
			</fieldset>
			<fieldset class="form-group">
				{{ Form::label('content') }}
				{{ Form::textarea('content', $post->content , ['class'=>'form-control ckeditor']) }}
				<small class="text-danger">{{ $errors->first('content') }}</small>
			</fieldset>
			{{ Form::submit('Save', ['class'=>'btn btn-secondary']) }}
		{!! Form::close() !!}
@endsection

