<?php
   session_start();
   require_once 'db_config.php';

   if ($connection->connect_error) {
      die($connection->connect_error);
   }

   $username = $_POST['username'];
   $password = $_POST['password'];
   $table = "Student";  //looks like we're only doing Students here

   $sql = "SELECT * FROM $table WHERE username='$username' and
            password='$password'";
   $result = $connection->query($sql);

   if (!$result) die($connection->error);

   $rows = $result->num_rows;

   //if result matched, table row must be 1 row
   if($rows == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;

      //fecthing realname using fetch_assoc()
      $name_query = "SELECT name FROM $table WHERE username='$username' and password='$password'";
      $result = $connection->query($name_query);
      if (!$result) echo "failure getting real name<br>";
      $row = $result->fetch_assoc();
      $_SESSION['name'] = $row['name'];

      //fetching id using fetch_assoc()
      $id_query = "SELECT `idStudent` FROM `student` WHERE username='$username'";
      $result = $connection->query($id_query);
      if (!$result) echo "failure getting user id<br>";
      $row = $result->fetch_assoc();
      $_SESSION['userid'] = $row['idStudent'];


      echo "Logging you in...<br><br>";
      header("location:dashboard.php");
   } else {
      echo "<h1>Wrong Username or Password</h1>";
   }
?>
