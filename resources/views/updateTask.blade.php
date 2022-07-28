<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
    crossorigin="anonymous">
    <title>Update Task</title>
</head>
<body>
    <div class="container">
        
        <form action="/task-update" method="post">
            {{csrf_field()}}
            <input type="text" class="form-control mt-5 mb-2" name="task" value="{{$taskData->task}}" >
            <input type="hidden" name="id" value="{{$taskData->id}}">
            <input type="submit" class="btn btn-success btn-sm" value="Update">
            &nbsp
            <input type="button" class="btn btn-danger btn-sm" value="Cancel">
        </form>
    </div>
</body>
</html>