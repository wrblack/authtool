<?php
   require_once 'db_config.php';
   session_start();
   session_destroy();
   $connection->close();
   header('Location: signin.html');
?>
