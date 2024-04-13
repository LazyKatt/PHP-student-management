<?php
session_start();
include("php/config.php");

if(!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit;
}

if(isset($_GET['delete'], $_GET['id']) && $_GET['type'] == 'student') {
    $studentId = $_GET['id'];
    $deleteQuery = mysqli_query($con, "DELETE FROM students WHERE STUDENT_ID = $studentId");

    if($deleteQuery) {
        echo "<script>alert('Student deleted successfully.'); window.location.href='home.php';</script>";
    } else {
        echo "<script>alert('Error occurred while deleting the student.'); window.location.href='home.php';</script>";
    }
} else {
    header("Location: home.php");
}
?>