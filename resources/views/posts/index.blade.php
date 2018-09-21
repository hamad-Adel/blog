@extends('layouts.main')
@section('title', 'Posts')
@section('content')
	<div class="row">
		<div class="col-12 m-4">
			<a href="{{ route('posts.create') }}" class="btn btn-secondary">Add New Post</a>
		</div>
		@foreach($posts as $post)
			<div class="col-6">
				<div class="card mb-5 p-3">
					<h3>
						<a href="{{ route('posts.show', ['slug'=>$post->slug]) }}"> 
							{{ $post->title }}
						</a>
						<small style="font-size: 12px;">{{ $post->created_at->diffForHumans() }}</small>
					</h3> 
					 <hr>
			  		<div class="card-body">
			  			<p>{!! str_limit(strip_tags($post->content), 50) !!}</p>
			  		</div>
			  		<small style="text-transform: capitalize;"> <b>created by:</b>  {{ $post->user->name }}</small>
				</div>
			</div>
		@endforeach
		{{ $posts->links() }}
    </div>
@endsection

