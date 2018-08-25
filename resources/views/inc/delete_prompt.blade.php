<!-- This is how you can call this and which variables have to be set
<a href="" data-toggle="modal" data-target="#deletemodal" class="btn btn-danger float-right">Delete</a>
-->
<?php 
//    $title = $task->title; 
//    $delet_message = 'Are you sure you want to put that out?';
//    $action = 'TasksController@destroy';
//    $action_id = $task->id;
?>

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Delete {{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{$delet_message}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mb-auto" data-dismiss="modal">Cancel</button>
                {!!Form::open(['action' => [$action, $action_id], 'methode' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['type' => 'button', 'class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>