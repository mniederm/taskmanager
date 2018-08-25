@extends('layouts/app')

@section('content')    
    <h1>Edit Task Nr. {!!$task->id!!}</h1>  
    {!! Form::open(['action' => ['TasksController@update', $task->id], 'methode' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $task->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $task->body, ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Taks Body'])}}
        </div>
        <div class="form-group btn btn-secondary">
            {{Form::file('task_image')}}
        </div>
        {{-- request has to be a put request if you look to the rout therefor we put this hidden field--}}
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary float-md-right'])}}
    {!! Form::close() !!}
@endsection

@section('beforeClosingBody')
    <!-- Script for WYSIWYG Editor -->
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
    <!-- End Script -->
@endsection