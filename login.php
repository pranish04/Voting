<?php
session_start();
include("connection.php");

$mobile = $_POST['mob'];
$pass = $_POST['pass'];
// $role = $_POST['role'];

$check = mysqli_query($connect, "select * from user where mobile='$mobile' and password='$pass' ");

if (mysqli_num_rows($check) > 0) {
    // $getParties = mysqli_query($connect, "select name, photo, votes, id from user where role=2 ");
    $getParties = mysqli_query($connect, "SELECT name, id, votes, mobile, pass, est, photo from party");

    if (mysqli_num_rows($getParties) > 0) {
        $parties = mysqli_fetch_all($getParties, MYSQLI_ASSOC);
        $_SESSION['parties'] = $parties;
    }
    $data = mysqli_fetch_array($check);
    $_SESSION['id'] = $data['id'];
    $_SESSION['status'] = $data['status'];
    $_SESSION['data'] = $data;
    echo '<script>
                window.location = "../routes/dashboard.php";
            </script>';
} else {
    $_SESSION['login_attempt'] += 1;
    $_SESSION['error'] = "Sorry, Credentials didn't match our records";
    echo '<script>
                window.location = "../";
            </script>';
}
