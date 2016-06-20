<?php
	session_start();

	if(isset($_POST['submit'])) {
		
		$id = $_POST['id'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$stu_number = $_POST['studentnumber'];
		$tel = $_POST['tel1'].$_POST['tel2'].$_POST['tel3'];
		$studentmajor = $_POST['studentmajor'];

		if(empty($_POST['id'])){
			echo "<script>alert('아이디를 입력해주세요!')</script>";
			echo "<script>document.location.replace('Hansung.php')</script>";
		}
		else if(empty($_POST['password'])){
			echo "<script>alert('비밀번호를 입력해주세요!')</script>";
			echo "<script>document.location.replace('Hansung.php')</script>";
		}
		else if(empty($_POST['studentnumber'])){
			echo "<script>alert('학번을 입력해주세요!')</script>";
			echo "<script>document.location.replace('Hansung.php')</script>";
		}
		else if(empty($_POST['tel1'])){
			echo "<script>alert('전화번호를 입력해주세요!')</script>";
			echo "<script>document.location.replace('Hansung.php')</script>";
		}
		else if(empty($_POST['tel2'])){
			echo "<script>alert('전화번호를 입력해주세요!')</script>";
			echo "<script>document.location.replace('Hansung.php')</script>";
		}
		else if(empty($_POST['tel3'])){
			echo "<script>alert('전화번호를 입력해주세요!')</script>";
			echo "<script>document.location.replace('Hansung.php')</script>";
		}
		else if(empty($_POST['studentmajor'])){
			echo "<script>alert('학과를 입력해주세요!')</script>";
			echo "<script>document.location.replace('Hansung.php')</script>";
		}
		else {

			$con = mysqli_connect("localhost","sse1","se12bin134","sse1");
			mysqli_query($con, 'set names utf8');
			
			$query = "INSERT INTO MemberList(id,password,name,stu_number,tel,studentmajor)  
			VALUES ('$id','$password','$name','$stu_number','$tel','$studentmajor')";

			mysqli_query($con,$query);

			header('Location: Hansung.php');

		}
	}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
</html>
