@extends('layouts.main')
@section('title', 'Contact Us')

@section('content')
	
	@if(Session::has('success'))
		<p class="alert alert-success"> {{ Session::get('success') }} </p>
	@endif

	<form action=" {{ route('email.send')}}" method="POST" role="form">
		<legend>Contact Us</legend>
	
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" class="form-control" id="name"  value="{{ old('name') }}">
			<small class="{{ $errors->has('name') ?'text-danger':''}}"> 
				{{ $errors->first('name') }}
			</small>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" class="form-control" id="email"   value="{{ old('email') }}">
			<small class="{{ $errors->has('email') ? 'text-danger':''}}"> 
				{{ $errors->first('email') }}
			</small>
		</div>
		<div class="form-group">
			<label for="sub">Subject</label>
			<input type="text" name="subject" class="form-control" id="sub"   value="{{ old('subject') }}">
			<small class="{{ $errors->has('subject') ? 'text-danger':''}}"> 
				{{ $errors->first('subject') }}
			</small>
		</div>
		<div class="form-group">
			<label for="msg">Your Message</label>
			<textarea name="message" id="msg" class="form-control" cols="10" rows="5">{{ old('message') }}</textarea>
			<small class="{{ $errors->has('message') ? 'text-danger':''}}"> 
				{{ $errors->first('message') }}
			</small>
			
		</div>
		{{ csrf_field() }}

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection