@extends('layouts/app')

@section('content')
    <h1>Tasks</h1> 
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam libero cum odio dignissimos reprehenderit rem magni animi hic tempora perspiciatis, voluptates cupiditate ex placeat molestiae. Beatae provident omnis temporibus inventore!</p>  

    @if(count($tasks) > 0)
        <div class="row">
            @foreach($tasks as $task)    
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"><a href="/tasks/{{$task->id}}">{{$task->title}}</a></h3>
                            <p class="card-text">{{$task->body}}</p>
                            <div class="card-footer text-muted">
                                <small>created: {{$task->created_at}} modified: {{$task->updated_at}}</small>
                            </div>
                        </div>
                    </div>
                </div>         
            @endforeach
            {{$tasks->links()}}
        </div>    
    @else 
        <p>No Tasks found</p>
    @endif    
@endsection