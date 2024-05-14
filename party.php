<?php
include("connection.php");

$name = $_POST['name'];
$mobile = $_POST['mob'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];
$est = $_POST['est'];
$image = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];

if ($cpass != $pass) {
    echo '<script>
                alert("Passwords do not match!");
                window.location = "../routes/party.php";
            </script>';
} else {

    move_uploaded_file($tmp_name, "../uploads/$image");
    $insert = mysqli_query($connect, "INSERT INTO party (name, mobile, pass, est, photo) VALUES('$name', '$mobile', '$pass', '$est','$image') ");
    if ($insert) {
        echo '<script>
                    alert("Registration successfull!");
                    window.location = "../";
                </script>';
    }
    if (mysqli_num_rows($check) > 0) {
        $getParties = mysqli_query($connect, "SELECT name, mobile, pass, est, photo FROM party");
        if (mysqli_num_rows($getParties) > 0) {
            $groups = mysqli_fetch_all($getParties, MYSQLI_ASSOC);
        }
        $data = mysqli_fetch_array($check);
        $_SESSION['id'] = $data['id'];
        $_SESSION['status'] = $data['status'];
        $_SESSION['data'] = $data;
        echo '<script>
                            window.location = "../routes/dashboard.php";
                        </script>';
    }
}


?>
<html>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<!-- Register Js file -->
<script src="../assets/js/party.js"></script>

</html>