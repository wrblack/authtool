<?php
include_once 'db_config.php';
session_start();

if(isset($_POST['courseId'])) {
   $courseId = mysql_real_escape_string($_POST['courseId']);
   $studentId = mysql_real_escape_string($_POST['studentId']);
   $professorId = mysql_real_escape_string($_POST['professorId']);
   $beaconId = mysql_real_escape_string($_POST['beaconId']);
   $className = mysql_real_escape_string($_POST['className']);
   $dayOfWeek = mysql_real_escape_string($_POST['dayOfWeek']);
   $timeSlot = mysql_real_escape_string($_POST['timeSlot']);

   $query = "INSERT INTO `course` VALUES " .
   "('$courseId',
   '$studentId',
   '$professorId',
   '$beaconId',
   '$className',
   '$dayOfWeek',
   '$timeSlot')";
   $result = $connection->query($query);
   if ($result) {
      ?>
      <script>
         alert("Class has been added");
      </script>
      <?php
   } else {
      ?>
      <script type="text/javascript">
         alert('Error in adding new class...');
      </script>
      <?php
   }
}

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Authoring Tool</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/register.css" rel="stylesheet">
    <link href="css/clemson.css" rel="stylesheet">

    <title>Add new course</title>
</head>

<body>
    <div class="container">
        <div class="header clearfix">
            <h3>Add new course</h3>
        </div>

        <form method="post" action="add_course.php">
           <div class="form-group">
               <label for="inputID">Course ID</label>
               <input type="text" name="courseId" class="form-control" placeholder="Course ID" required>
           </div>
            <div class="form-group">
                <label for="inputName">Your student ID</label>
                <input type="text" name="studentId" class="form-control" placeholder="Student ID" required>
            </div>
            <div class="form-group">
                <label for="inputUsername">Professor ID</label>
                <input type="text" name="professorId" class="form-control" placeholder="Professor ID" required>
            </div>
            <div class="form-group">
                <label for="inputEmail">Beacon ID</label>
                <input type="text" name="beaconId" class="form-control" placeholder="Beacon ID" required>
            </div>
            <div class="form-group">
                <label for="InputPassword">Class Name</label>
                <input type="text" name="className" class="form-control"placeholder="Class Name" required>
            </div>
            <div class="form-group">
                <label for="InputPassword"># of days per week</label>
                <input type="text" name="dayOfWeek" class="form-control" placeholder="Number of days per week in days (ex. 3 is 3 days)" required>
            </div>
            <div class="form-group">
                <label for="InputPassword">Duration</label>
                <input type="text" name="timeSlot" class="form-control" placeholder="Duration (ex. 01:43:00 is 1 hour, 43 minutes)" required>
            </div>
            <br>
            <button type="submit" class="btn btn-lg btn-block btn-clemson">Submit</button>
            <br>
        </form>
        <a class="btn btn-lg btn-clemson btn-block" href="dashboard.php" role="button">Return to Dashboard</a>
</body>

</html>
