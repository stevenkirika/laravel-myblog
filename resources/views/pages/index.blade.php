@extends('layouts.app')

@section('content')

 
 	<div class="jumbotron text-center">
 		 <h1>Welcome to My Blog</h1>
         <p>This is my blog </p>
         @if (Auth::guest())
         <a href="/login" class="btn btn-success">Login</a>
         <a href="/register" class="btn btn-primary">Register</a>
         @else
         <a href="/login" class="btn btn-primary">Go To Dashboard</a>
         <a href="/posts/create" class="btn btn-success">Create A New Post</a>
         @endif
 	</div>
 
   
@endsection
