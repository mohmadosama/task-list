
@extends('layouts.app')

@section('include')
<div class="col-sm-offset-2 col-sm-8">
    <!--s@extends('layouts.app')-->
    <div class="panel panel-default">
        <div class="panel-heading">
            New Task
        </div>

        <div class="panel-body">
            <!-- Display Validation Errors -->
            <!-- New Task Form-->

            @if ($idTask == -1)
                <form action="insert" method="POST" class="form-horizontal" >
                    @csrf
                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{$nameTask}}">
                        </div>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" name = "add" class="btn btn-danger">
                                <i class="fa fa-btn fa-plus"></i>Add Task
                            </button>
                            <!--
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <button type="submit" name = "update" class="btn btn-default">
                                <i class="fa fa-btn fa-exchange"></i>Update
                            </button>

                        -->
                        </div>

                    </div>
                </form>
            @else
                <form action="update/{{$idTask}}" method="POST" class="form-horizontal" >
                    @csrf
                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{$nameTask}}">
                        </div>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <!--
                            <button type="submit" name = "add" class="btn btn-danger">
                                <i class="fa fa-btn fa-plus"></i>Add Task
                            </button>

                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            -->
                            <button type="submit" name = "update" class="btn btn-default">
                                <i class="fa fa-btn fa-exchange"></i>Update
                            </button>


                        </div>

                    </div>
                </form>
            @endif


        </div>
    </div>

    <!-- Current Tasks -->
        <div class="panel panel-default">
            <div class="panel-heading">Current Tasks</div>
            <div class="panel-body">

                <table class="table table-striped task-table">
                    <thead>
                        <th>Task</th>
                        <th>created_at</th>
                        <th>updated_at</th>


                        <th>&nbsp;</th>

                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>

                                <td class="table-text"><div>{{$task->name}}</div></td>
                                <td class="table-text"><div>{{$task->created_at}}</div></td>
                                <td class="table-text"><div>{{$task->updated_at}}</div></td>



                                <form action="update/{{$task->id}}" method="POST">
                                        @csrf

                                </form>
                                <td>
                                    <!---here put link we go to delete that make in web.php
                                    <form action="delete/{{$task->id}}" method="POST">-->
                                    <form action="{{ route('task.delete',$task->id) }}" method="POST">
                                        @csrf


                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>



                                    </form>
                                </td>
                                <td>
                                    <form action="#" method="GET">
                                        @csrf
                                        <button type="submit" name="nameTask" class="btn btn-default" value='{{$task->id . '|'.$task->name}}'>
                                            <i class="fa fa-btn fa-exchange"></i>Update
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach

                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection
