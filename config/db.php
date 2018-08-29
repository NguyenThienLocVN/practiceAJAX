
<?php
 
$con = MySQLi_connect("localhost", "root","123456","search" );
 
 
 
//Check connection
 
if (MySQLi_connect_errno()) {
 
   echo "Failed to connect to MySQL: " . MySQLi_connect_error();
 
}
 
?>