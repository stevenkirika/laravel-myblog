@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                   <h3>Your Blog Posts</h3>
                   <hr>
                   @if(count($posts)>0)
                   <table class="table table-striped">
                       <thead>
                           <tr>
                               <th>Title</th>
                               <th></th>
                               <th></th>
                           </tr>
                       </thead>

                       <tbody>
                           @foreach($posts as $post)
                          <tr>
                               <td>{{$post->title}} </td>
                               <td><a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a></td>
                               <td>
    {{Form::open(['action'=>['PostsController@destroy', $post->id], 'method'=>'POST'])}}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete',['class'=>'btn btn-danger'] )}}
    {{Form::close() }}
                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                   @else
                   <h4 class="text-center">No post found</h4>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
