<?php
session_start();
require 'config.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_student']);

    $query = "DELETE FROM student WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: data_stud.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: data_stud.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $pnum = mysqli_real_escape_string($conn, $_POST['pnum']);

    $query = "UPDATE student SET name='$name', email='$email', course='$course', year='$year', pnum='$pnum' WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: data_stud.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: data_stud.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $pnum = mysqli_real_escape_string($conn, $_POST['pnum']);

    $query = "INSERT INTO student (name,email,course,year,pnum) VALUES ('$name','$email','$course','$year','$pnum')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: data_create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: data_create.php");
        exit(0);
    }
}

?>