@extends('layouts/app')

@section('content')
    <a href="/tasks" class="btn btn-secondary">Go Back</a>    
    <h1>{{$task->title}}</h1>  
        <div>{{$task->body}}</div> 
        <hr> 
        <small>created: {{$task->created_at}} modified: {{$task->updated_at}}</small>
@endsection