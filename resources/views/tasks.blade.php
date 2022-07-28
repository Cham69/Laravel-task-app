<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
    crossorigin="anonymous">
    <title>Tasks</title>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h2>Daily Tasks</h2>
            <div class="row">
                <div class="col-md-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                    <form action="save-task" method="post">
                        {{csrf_field()}}
                        <input type="text" class="form-control" name="task" placeholder="Enter your task">
                        <br>
                        <input type="submit" class="btn btn-success" value="SAVE">
                        <input type="button" class="btn btn-warning" value="CLEAR">
                    </form>
                    <table class="table table-dark mt-3">
                        <tr>
                            <th>ID</th>
                            <th>Task</th>
                            <th>Completed</th>
                            <th>Action</th>
                        </tr>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{$task->id}}</td>
                                    <td>{{$task->task}}</td>
                                    <td>
                                        @if($task->isCompleted)
                                            <button class="btn btn-success btn-sm">Completed</button>
                                        @else
                                            <button class="btn btn-warning btn-sm">Not Completed</button>
                                        @endif
                                    </td>
                                    <td>                
                                        @if(!$task->isCompleted)
                                        <a href="/toggleCompleted/{{$task->id}}" class="btn btn-light btn-sm">Mark as completed</a>
                                        @else
                                        <a href="/toggleCompleted/{{$task->id}}" class="btn btn-danger btn-sm">Mark as not completed</a> 
                                        @endif
                                        <a href="/deleteTask/{{$task->id}}" class="btn btn-warning btn-sm">Delete</a>   
                                        <a href="/update-task/{{$task->id}}" class="btn btn-success btn-sm">Update</a>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>