<!DOCTYPE html>
<html>
<head>
 <title>Your appointment has been changed</title>
</head>
<body>

 <h1>Auto community</h1>
 <p> {{$appointment->id}}</p>
 <p>your new appointment is from </p>
 {{$appointment->start_time}}
 <p>
    to
 </p>
 <p> {{$appointment->end_time}}</p>

</body>
</html>
