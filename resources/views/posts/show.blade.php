@extends('layouts.app')

@section('content')
<div class="well">

	<a href="/posts" class="btn btn-default">Go Back</a>
	@if(! empty($post))
    <h3>{{$post->title}}</h3>
    <img style="max-width:100%;display: block;margin-bottom: 20px;" src="/storage/cover_images/{{$post->cover_image}}">
	<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
	<p>{!!$post->body!!}</p>
@if(!Auth::guest())

 @if(Auth::user()->id == $post->user_id)

	<hr>
	<a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>

	<script>

		  function ConfirmDelete()
		  {
		  var x = confirm("Are you sure you want to delete?");
		  if (x)
		    return true;
		  else
		    return false;
		  }
    </script>

	{{Form::open(['action'=>['PostsController@destroy', $post->id], 'method'=>'POST', 'class'=>'pull-right', 'onsubmit' => 'return ConfirmDelete()'])}}
	    {{Form::hidden('_method', 'DELETE')}}
  		{{Form::submit('Delete',['class'=>'btn btn-danger'] )}}
	{{Form::close() }}
 @endif
@endif
	@else
	<h3>No Post Found</h3>
	@endif
</div>
@endsection