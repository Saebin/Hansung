<?php
	session_start();

	if(isset($_POST['submit'])) {
		
		$id = $_POST['id'];
		$password = $_POST['password'];
	
		if(empty($_POST['id'])){
			echo "<script>alert('ID를 입력해주세요!')</script>";
			echo "<script>document.location.replace('Hansung.php')</script>";
		}
		else if(empty($_POST['password'])){
			echo "<script>alert('Password를 입력해주세요!')</script>";
			echo "<script>document.location.replace('Hansung.php')</script>";
		}
		else {

			$con = mysqli_connect("localhost","sse1","se12bin134","sse1");
			mysqli_query($con, 'set names utf8');
			
			$query = "SELECT id,password FROM MemberList 
			WHERE id ='$id' AND password='$password'";
			$result1=mysqli_query($con,$query);
		
			if(mysqli_num_rows($result1) > 0){

				$_SESSION['login']=$id;

				header('Location: Hansung.php');
			
			}
			else{
				echo "<script>alert('ID 또는 Password가 틀립니다!')</script>";
				echo "<script>document.location.replace('Hansung.php')</script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
</html>
