@extends('layouts.main')
@section('title', 'Pages')

@section('content')
	<p>Welcome to pages</p>
	<h2>{{ $kalam }}</h2>
	<p>name: {{ $name }} age : {{ $age }} </p>
	{{Config('app.name')}}
@endsection