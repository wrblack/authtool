<?php
   $DB_USER = 'root';
   $DB_PASSWORD = '';
   $DB_DATABASE = 'cpsc399LoginApp';
   $DB_SERVER = 'localhost';
   $DB_TABLE = 'members';
   //$connection = new mysqli($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_DATABASE);
   print_r(PDO::getAvailableDrivers());
?>

<?php
try{
   $pcon = new PDO("mysql:host=$DB_SERVER;dbname=$DB_DATABASE", $DB_USER, $DB_PASSWORD);
}
catch(PDOException $e) {
   echo $e->getMessage();
}
?>
