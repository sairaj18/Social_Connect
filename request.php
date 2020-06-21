<?php
	include "php/db.inc.php";
	session_start();

	$rqtr = $_SESSION["user"];
	$rqtr = mysqli_real_escape_string($conn,$rqtr);
	$rqtr = htmlentities($rqtr);

	$rqte = $_POST["requestee"];
	$rqte = mysqli_real_escape_string($conn,$rqte);
	$rqte = htmlentities($rqte);

	$sql = "INSERT into request_details (requester, requestee) VALUES('$rqtr','rqte')";
	$result = $conn->query($sql);

?>