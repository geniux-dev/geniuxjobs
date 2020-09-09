<?php 
include 'dbh.inc.php';
$result = mysqli_query($conn, "SELECT * FROM post where industry='Gauteng'");
$totalNumOfGeneralJob = mysqli_num_rows($result);

?>