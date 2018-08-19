@extends('layouts/app')

@section('content')
    <h1>{{$task->title}}</h1>  
        <div>{!!$task->body!!}</div> 
        <hr> 
        <small>created: {{$task->created_at}} modified: {{$task->updated_at}}</small>
@endsection