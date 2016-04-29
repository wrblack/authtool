<?php
include_once 'db_config.php';
session_start();

if(isset($_POST['id'])) {
   $id = mysql_real_escape_string($_POST['id']);
   $name = mysql_real_escape_string($_POST['name']);
   $username = mysql_real_escape_string($_POST['username']);
   $email = mysql_real_escape_string($_POST['email']);
   $password = mysql_real_escape_string($_POST['password']);

   $query = "INSERT INTO `student`(`idStudent`, `name`, `email`, `username`, `password`) VALUES " .
      "('$id','$name','$email','$username','$password')";
   $result = $connection->query($query);
   if ($result) {
      ?>
      <script>
         alert('You have been registered!');
      </script>
      <?php
   } else {
      ?>
      <script type="text/javascript">
         alert('Error in registration...');
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

    <title>Register new user</title>
</head>

<body>
    <div class="container">
        <div class="header clearfix">
            <h3>New User Registration</h3>
        </div>

        <form method="post" action="register.php">
           <div class="form-group">
               <label for="inputID">ID Number</label>
               <input type="text" name="id" class="form-control" id="InputID" placeholder="ID" required>
           </div>
            <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" name="name" class="form-control" id="InputName" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="inputUsername">Username</label>
                <input type="text" name="username" class="form-control" id="InputUsername" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="inputEmail">Email address</label>
                <input type="text" name="email" class="form-control" id="InputEmail" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="InputPassword">Password</label>
                <input type="text" name="password" class="form-control" id="InputPassword" placeholder="Password" required>
            </div>
            <br>
            <button type="submit" class="btn btn-lg btn-block btn-clemson">Submit</button>
            <br>
        </form>
        <a class="btn btn-lg btn-clemson btn-block" href="signin.html" role="button">Return to Login Page</a>
</body>

</html>
