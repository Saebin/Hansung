<?php
	session_start();

	if(!isset($_SESSION['login'])) {
		echo "<script>alert('로그인을 해주세요!')</script>";
		echo "<script>document.location.replace('Hansung.php')</script>";
	} else if(isset($_POST['submit'])) {
		
		$id = $_SESSION['login'];
		$comment = $_POST['comment'];
		$date = date("Y-m-d h:i:s");
		$num = $_POST['num'];


		$con = mysqli_connect("localhost","sse1","se12bin134","sse1");
		mysqli_query($con, 'set names utf8');
		
		$query1 = "SELECT name FROM MemberList 
			WHERE id ='$id'";
		$res=mysqli_query($con,$query1);
		while($row = mysqli_fetch_array($res)) {
            $name = $row['name'];
        }
		$query = "INSERT INTO Comment(name,comment,date,comment_num)  
			VALUES ('$name','$comment','$date','$num')";
					
 		mysqli_query($con,$query);
 		echo "<script>alert('정상적으로 등록되었습니다.')</script>";
		echo "<script>document.location.replace('Hansung.php')</script>";
	} else
		echo "<script>document.location.replace('Hansung.php')</script>";

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
</html>
