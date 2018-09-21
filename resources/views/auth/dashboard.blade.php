@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					@if(Auth::check())
						<h3>Control your posts</h3>
	                    <hr>
	                    <table class="table table-bordered table-inverse table-hover">
	                    	<thead>
	                    		<tr>
	                    			<th colspan="5">
	                    				<a class="btn btn-secondary btn-block" href="posts/create">Create Post</a>
	                    			</th>
	                    		</tr>
	                    		<tr>
	                    			<th>Title</th>
	                    			<th>Created</th>
	                    			<th>Last Update</th>
	                    			<th>Edit</th>
	                    			<th>Delete</th>
	                    		</tr>
	                    	</thead>
	                    	<tbody>
	                    		@foreach(Auth::user()->posts as $post)
	                    			<tr>
	                    				<td><a href="posts/{{ $post->slug }}">{{ $post->title }}</a></td>
	                    				<td>{{ $post->created_at->diffForHumans() }}</td>
	                    				<td>{{ $post->updated_at->diffForHumans() }}</td>
	                    				<td>
	                <a class="btn btn-info" href="{{ route('posts.edit', ['post'=>$post->id]) }}">Edit</a>
	                    				</td>
	                    				<td>
	{!! Form::open(['action'=>['Web\PostController@destroy',$post->id], 'method'=>'post']) !!}
												{{ Form::hidden('_method', 'DELETE') }}
												{{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
											{!! Form::close() !!}
	                    				</td>
	                    			</tr>
	                    		@endforeach
	                    	</tbody>
	                    </table>
					@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
