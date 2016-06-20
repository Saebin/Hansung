<?php
	$amount = $_POST['amount'];
	$title = $_POST['title'];
	$con = mysqli_connect("localhost","sse1","se12bin134","sse1");
	mysqli_query($con, 'set names utf8');

    $query = "Update Content Set amount = '$amount' where title = '$title'" ;

	$result1=mysqli_query($con,$query);

    mysqli_close($con);
	echo "<script>document.location.replace('Hansung.php')</script>";

?>