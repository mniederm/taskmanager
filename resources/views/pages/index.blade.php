@extends('layouts/app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-5">Welcome to {{config('app.name', 'Taskmanager')}} wiht MySQL DB</h1> 
        <p class="lead">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam libero cum odio dignissimos reprehenderit rem magni animi hic tempora perspiciatis, voluptates cupiditate ex placeat molestiae. Beatae provident omnis temporibus inventore!</p>  
        <hr class="my-4">
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>
@endsection