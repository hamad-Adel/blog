@extends('layouts.main')
@section('title', 'Create-Post')

@section('content')
		{!! Form::open(['action'=>'Web\PostController@store', 'method'=>'post']) !!}
			<fieldset class="form-group">
				{{ Form::label('title') }}
				{{ Form::text('title','', ['class'=>'form-control']) }}
				<small class="text-danger">{{ $errors->first('title') }}</small>
			</fieldset>
			<fieldset class="form-group">
				{{ Form::label('content') }}
				{{ Form::textarea('content','', ['class'=>'form-control ckeditor']) }}
				<small class="text-danger">{{ $errors->first('content') }}</small>
			</fieldset>
			{{ Form::submit('Save', ['class'=>'btn btn-secondary']) }}
		{!! Form::close() !!}
@endsection

@section('scripts')
	

@endsection