<?php
/* definitely depreciated */
/* definitely depreciated */
/* definitely depreciated */
/* definitely depreciated */
/* definitely depreciated */
require_once 'db_config.php';

if ($connection->connect_error) die($connection->connect_error);

//helper function
function get_post($connection, $var) {
   return $connection->real_escape_string($_POST[$var]);
}

if (isset($_POST['id'])) echo "<h1>id is set</h1><br>"; else echo "It isn't...";

//check values for set state
if (isset($_POST['id']) &&
    isset($_POST['name']) &&
    isset($_POST['username']) &&
    isset($_POST['email']) &&
    isset($_POST['password'])) {
   //
   $id = get_post($connection, 'id');
   $name = get_post($connection, 'name');
   $username = get_post($connection, 'username');
   $email = get_post($connection, 'email');
   $password = get_post($connection, 'password');

   //var_dump($_POST);

   $query = "INSERT INTO 'Student' VALUES" .
      "('$id','$name','$email','$username','$password')";
   $result = $connection->query($query);

   echo "Query: $query<br>";
   var_dump($result);

   if (!$result) echo "Insert failed: $query<br>" .
      $connection->error . "<br><br>";
   else {
      echo "<h1>Account made successfully!<br>" .
      "redirecting you back to signin page.<br>";
      header('Refresh: 10; URL=signin.html');
   }
} else {
   echo "...";
}
?>
