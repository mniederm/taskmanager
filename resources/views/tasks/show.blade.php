@extends('layouts/app')

@section('content')
    <h1>{{$task->title}}</h1>  
        <div>{!!$task->body!!}</div> 
        <hr> 
        <small>created: {{$task->created_at}} from user: {{$task->user->name}}</small> 
        <br><small> last modified: {{$task->updated_at}}</small>
        <hr>
    @if(!Auth::guest())  
        @if(Auth::user()->id == $task->user_id) 
            <a href="/tasks/{{$task->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['TasksController@destroy', $task->id], 'methode' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection