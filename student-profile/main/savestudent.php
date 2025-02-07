<?php
session_start();
include('../connect.php');
$a = $_POST['student_id'];
$k = $_POST['name'];
$b = $_POST['last_name'];
$c = $_POST['dob'];
$d = $_POST['gender'];
$e = $_POST['admission_year'];
$f = $_POST['faculty'];
$g = $_POST['course'];
$h = $_POST['semester'];
// query

$file_name  = strtolower($_FILES['file']['name']);
$file_ext = substr($file_name, strrpos($file_name, '.'));
$prefix = 'your_site_name_'.md5(time()*rand(1, 9999));
$file_name_new = $prefix.$file_ext;
$path = '../uploads/'.$file_name_new;


    /* check if the file uploaded successfully */
    if(@move_uploaded_file($_FILES['file']['tmp_name'], $path)) {

  //do your write to the database filename and other details   
$sql = "INSERT INTO student (student_id, name, last_name, dob, gender, admission_year, faculty, course, semester, file) VALUES (:a,:k,:b,:c,:d,:e,:f,:g,:h,:i)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':k'=>$k,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$file_name_new));
header("location: students.php");

	}
?>