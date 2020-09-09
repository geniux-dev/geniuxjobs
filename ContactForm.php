<?php

include 'dbh.inc.php';

$contactFormName = $_POST['contactname'];
$contactFormEmail = $_POST['contactEmail'];
$contactFormSubj = $_POST['contactSubject'];
$contactFormMsg = $_POST['message'];
if(isset($_POST['submit'])){

$sqlC = "INSERT INTO appointments (name,email,subject,message) VALUES('$contactFormName', '$contactFormEmail','$contactFormSubj','$contactFormMsg');";
mysqli_query($conn, $sqlC);
header("Location: index.php?=messageSent-success");


}else{
header("Location: index.php");
}






?>