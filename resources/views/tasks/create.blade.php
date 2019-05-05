@extends('layouts/app')

@section('content')    
    <h1>Create Task</h1>  
    {!! Form::open(['action' => 'TasksController@store', 'methode' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('status', 'Status')}}
            {{Form::select('status', config('enums.task_status'))}}
        </div>
        <div class="form-group">
            {{Form::label('keyword', 'Keyword')}}
            {{Form::text('keyword', '', ['class' => 'form-control', 'placeholder' => 'Keyword this task belongs to, if no leave empty.'])}}
        </div>
        <div class="form-group">
            {{Form::label('url', 'URL')}}
            {{Form::text('url', '', ['class' => 'form-control', 'placeholder' => 'URL this task belongs to, if no leave empty.'])}}
        </div>
        <div class="form-group">
            {{Form::label('impact', 'Impact')}}
            {{Form::select('impact', config('enums.task_impact'))}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Description')}}
            {{Form::textarea('body', '', ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Taks description'])}}
        </div>
        <div class="form-group btn btn-secondary">
            {{Form::file('task_image')}}
        </div>
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