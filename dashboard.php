<?php
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
                    <!-- nice but not needed
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Settings <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a>
                            </li>
                            <li><a href="#">Action</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated Action</a>
                            </li>
                        </ul>
                    </li>
                    -->
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
                    <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a>
                    </li>
                    <li><a href="courses.php">Courses</a>
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
                <h1 class="page-header">Dashboard</h1>
                <div class="jumbotron">
                    <h2 style="text-align: center;">Welcome to your dashboard, <?php echo $name; ?>!</h2>
                    <br>
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-clemson">Courses</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-clemson">Attendance</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-clemson">Profile</button>
                        </div>
                    </div>
                </div>
                <!-- Could be used but not here
                <h2 class="sub-header">Section title</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Header</th>
                                <th>Header</th>
                                <th>Header</th>
                                <th>Header</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1,001</td>
                                <td>Lorem</td>
                                <td>ipsum</td>
                                <td>dolor</td>
                                <td>sit</td>
                            </tr>
                            <tr>
                                <td>1,002</td>
                                <td>amet</td>
                                <td>consectetur</td>
                                <td>adipiscing</td>
                                <td>elit</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
             -->
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.12.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
