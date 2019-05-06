@extends('layouts/app')

@section('content')
    <div class="well">
        <div class="row">
            @if($task->task_image != '' and $task->task_image != 'noimage.jpg')
                <div class="col-md-3 col-sm-3">
                    <a href="" data-toggle="modal" data-target="#taskimmagemodal"><img style="width:100%" src="/storage/task_images/{{$task->task_image}}"></a>
                    <div class="modal fade" id="taskimmagemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{$task->title}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img style="width:100%" src="/storage/task_images/{{$task->task_image}}">
                                </div>
                                <!-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button> 
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-md-9 col-sm-9">  
            @else
                <div class="col-md-12 col-sm-12">    
            @endif
            <h1>{{$task->title}}</h1>  
                <div>status: {!!config('enums.task_status.'.$task->status)!!}</div>
                @php
                    // only if task is implemented show the timestamp
                    if ($task->status == 3){
                        echo '<div>taks implemented at: '.$task->implemented_at.'</div>';
                    }
                @endphp
                <div>impact: {!!config('enums.task_impact.'.$task->impact)!!}</div>    
                <div>{!!$task->body!!}</div> 
                <hr> 
                <small>created: {{$task->created_at}} from user: {{$task->user->name}}</small> 
                <br><small> last modified: {{$task->updated_at}}</small>
                <hr>
            </div>    
        </div>
        <div class="row"> 
            <div class="col-md-12 cols-sm-12">       
                @if(!Auth::guest())  
                    @if(Auth::user()->id == $task->user_id) 
                        <a href="/tasks/{{$task->id}}/edit" class="btn btn-secondary">Edit</a>

                        <a href="" data-toggle="modal" data-target="#deletemodal" class="btn btn-danger float-right">Delete</a>
                        <?php 
                            $title = $task->title; 
                            $delet_message = 'Are you sure you want to put that out?';
                            $action = 'TasksController@destroy';
                            $action_id = $task->id;
                        ?>
                        <!-- Delete prompt -->
                        @extends('inc/delete_prompt')
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection