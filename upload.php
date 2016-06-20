<?php
$title = $_POST['title'];
$content = $_POST['content'];
$amount = $_POST['amount'];
$file = $_POST['file'];
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["userfile"]["name"]);
$target_name = basename($_FILES["userfile"]["name"]);
$uploadOk = 1;

echo $title.'<br>';
echo $content.'<br>';
echo $amount.'<br>';
echo $target_file.'<br>';
echo $target_name.'<br>';
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
 if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["userfile"]["tmp_name"]);
	$image = basename($_FILES["userfile"]["name"]).$imageFileType;
	echo $image."<br>";
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    echo "<script>alert('이미 존재하는 이미지 파일입니다.')</script>";    
    echo "<script>document.location.replace('Hansung.php')</script>";
}
// Check file size
if ($_FILES["userfile"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    echo "<script>alert('이미지 파일 용량이 너무 큽니다.')</script>";    
    echo "<script>document.location.replace('Hansung.php')</script>";
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    echo "<script>alert('이미지 파일 확장자가 다릅니다.')</script>";    
    echo "<script>document.location.replace('Hansung.php')</script>";
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    echo "<script>alert('이미지 파일 업로드를 실패하였습니다.')</script>";    
    echo "<script>document.location.replace('Hansung.php')</script>";
// if everything is ok, try to upload file
} else {
	//echo "12<br>";
	//echo $target_file."<br>";
    //echo "==>".var_dump(iconv_get_encoding('all'))."<br>";  
    //$target_file = iconv("utf-8","euc-kr",$target_file);
    //$target_file  = utf8_encode($_FILES["userfile"]["tmp_name"]);
    //echo "==>".var_dump(iconv_get_encoding('target_file1'))."<br>";  

    if (move_uploaded_file($_FILES["userfile"]["tmp_name"],$target_file)) {

		echo "13<br>";
		echo $image."<br>";
        echo "The file ". basename($_FILES["userfile"]["name"]). " has been uploaded.";
		
        $con = mysqli_connect("localhost","sse1","se12bin134","sse1");
		mysqli_query($con, 'set names utf8');

        $query = "Insert INTO Content 
		(num,title,content,image,amount,event) 
		VALUES(NULL,'$title','$content','$target_name','$amount',' ') " ;
		$result1=mysqli_query($con,$query);

        mysqli_close($con);
        echo "<script>alert('물품이 등록되었습니다.')</script>";    
        echo "<script>document.location.replace('Hansung.php')</script>";
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
 

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
</html>
