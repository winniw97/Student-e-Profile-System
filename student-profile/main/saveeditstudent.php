<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['student_id'];
$b = $_POST['name'];
$c = $_POST['last_name'];
$d = $_POST['dob'];
$e = $_POST['gender'];
$f = $_POST['admission_year'];
$g = $_POST['faculty'];
$h = $_POST['course'];
$i = $_POST['semester'];

// query

$sql = "UPDATE student 
        SET student_id=?, name=?, last_name=?, dob=?, gender=?, admission_year=?, faculty=?, course=?, semester=?
		WHERE id=?";
$q = $db->prepare($sql);
    if ($q->execute(array($a, $b, $c, $d, $e, $f, $g, $h, $i, $id))) {
        echo "✅ Student updated successfully!";
    } else {
        echo "❌ Error updating student!";
        print_r($q->errorInfo()); // Show SQL error details
    }
    exit();   
header("location: students.php");



?>