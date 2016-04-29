<?php
   include_once 'db_config.php';
   session_start();
   /* below pulls username from session superglobal.
      it would be more user friendly to pull the name
      from the username to display it in the page.  */
   $name=null;
   if (isset($_SESSION['name'])) {
      $name=$_SESSION['name'];
   } else {
      $name="VISITOR";
   }

   //double check to make sure id exists
   if (!isset($_SESSION['userid'])) die("userid not set");
   $id = $_SESSION['userid'];

   //get course information
   $courses = array();
   $course_query = "SELECT * FROM `course` WHERE `idStudent` = '$id'";
   if ($result = $connection->query($course_query)) {
      while($row = mysqli_fetch_array($result)) {
         $courses[] = $row;
      }
      $result->free();
   }
   $courseArrayLen = count($courses);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Authoring Tool Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/clemson.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" id="navheader">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Authoring Tool</a>
                <p class="navbar-text">Signed in as
                    <?php echo $name; ?>
                </p>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="dashboard.php">Dashboard</a>
                    </li>
                    <li><a href="courses.php">Courses</a>
                    </li>
                    <li><a href="attendance.php">Attendance</a>
                    </li>
                    <li><a href="profile.php">Profile</a>
                    </li>
                    <li><a href="#">Help</a>
                    </li>
                    <li><a href="logout.php">Sign Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li><a href="dashboard.php">Overview</a>
                    </li>
                    <li class="active"><a href="#">Courses<span class="sr-only">(current)</span></a>
                    </li>
                    <li><a href="attendance.php">Attendance</a>
                    </li>
                    <li><a href="profile.php">Profile</a>
                    </li>
                    <li><a href="#">Help</a>
                    </li>
                </ul>
                <!-- Extra Nav Sidebar items
                <ul class="nav nav-sidebar">
                    <li><a href="">Nav item</a>
                    </li>
                </ul>
                -->
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header"><?php echo $name; ?>'s Courses</h1>

                <h2 class="sub-header">Section title</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course Name</th>
                                <th>Course ID</th>
                                <th>Course Professor</th>
                                <th>Days</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <!-- to do: make php function that goes through coure info -->
                        <?php
                           //i - number of courses
                           //j - the 6 columns
                           echo "<tbody>";
                           for ($i=0; $i < $courseArrayLen; $i++) {
                              echo "<tr>";
                              echo "<td>"; echo $i+1;                            echo "</td>";
                              echo "<td>"; print_r($courses[$i]['className']);   echo "</td>";
                              echo "<td>"; print_r($courses[$i]['idCourse']);    echo "</td>";
                              echo "<td>"; print_r($courses[$i]['idProfessor']); echo "</td>";
                              echo "<td>"; print_r($courses[$i]['dayOfWeek']);   echo "</td>";
                              echo "<td>"; print_r($courses[$i]['timeSlot']);    echo "</td>";
                              echo "</tr>";
                           }
                           echo "</tbody>";
                           ?>
                    </table>
                 </div>
                 <hr>
                 <input class="btn btn-primary btn-clemson" value="Refresh" role="button" onClick="window.location.reload()">
                 <!-- an idea that required jquery and I sadly don't have time to implement it
                 <button type="button" name="button" class="btn btn-clemson btn-primary"
                        data-toggle="modal" data-target="#addModal">Add</button>
                        <div class="modal fade" id="addModal" role="dialog">
                           <div class="modal-dialog">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Add a course</h4>
                                </div>

                                <div class="modal-body">
                                   <div class="form-group">
                                      <label for="inputID">Course Name</label>
                                      <input type="text" name="id" class="form-control" id="InputID" placeholder="course 101" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputID">Course ID</label>
                                      <input type="text" name="id" class="form-control" id="InputID" placeholder="11111111111" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputID">Course Professor ID</label>
                                      <input type="text" name="id" class="form-control" id="InputID" placeholder="111111111" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputID">Days out of the week</label>
                                      <input type="text" name="id" class="form-control" id="InputID" placeholder="1" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputID">Time Length</label>
                                      <input type="text" name="id" class="form-control" id="InputID" placeholder="01:00:00" required>
                                  </div>
                                </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>

                              </div>
                           </div>
                        </div>
                     -->
                 <a class="btn btn-primary btn-clemson" href="add_course.php" role="button">Add</a>
                 <br><br>
                 <!--
                 <?php echo "<pre>"; print_r($courses); echo "</pre>"; ?>
                 <?php echo "<br>elements in array courses: " . count($courses); ?>
                 <?php echo "<br><br>courses[0][0]:"; print_r($courses[0][0]); ?>
              -->
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.12.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
