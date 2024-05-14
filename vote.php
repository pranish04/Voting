<?php
    session_start();
    include("connection.php");

    $votes = $_POST['gvotes'];

    $total_votes= $votes+1;
    $pid = $_POST['gid'];
    $uid = $_SESSION['id'];

    //$update_votes = mysqli_query($connect, "update user set votes='$total_votes' where id='$pid'");
    $update_votes = mysqli_query($connect, "Update party set votes='$total_votes' where id='$pid'");
    $update_status = mysqli_query($connect, "Update user set status=1 where id='$uid'");

    if($update_status and $update_votes){
       // $getParties = mysqli_query($connect, "SELECT name, photo, votes, id FROM user where role=2 ");
        $getParties = mysqli_query($connect, "SELECT name, id, votes, mobile, pass, est, photo FROM party");
        $parties = mysqli_fetch_all($getParties, MYSQLI_ASSOC);
        $_SESSION['parties'] = $parties;
        $_SESSION['status'] = 1;
        echo '<script>
                    alert("Voting successfull!");
                    window.location = "../routes/dashboard.php";
                </script>';
    }
    else{
        echo '<script>
                    alert("Voting failed!.. Try again.");
                    window.location = "../routes/dashboard.php";
                </script>';
    }
    
?>