<?php
session_start();

if (isset($_SESSION['wait_time'])) {
    $difference = time() - $_SESSION['wait_time'];
    if ($difference > 30) {
        unset($_SESSION['wait_time']);
        unset($_SESSION['login_attempt']);
    }
}

if (count($_POST) > 0) {
    if (empty($_POST['g-recaptcha-response'])) {
        echo "Please solve captcha";
    }
}
?>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Online voting system \- Home</title>
    <link rel="stylesheet" href="./css/stylesheet.css">
    <link rel="stylesheet" href="./css/style.css">
    <marquee direction="right">Please Vote The Right Candidate....Please Vote The Right Candidate....Please Vote The Right Candidate....Please Vote The Right Candidate....</marquee>
    <!-- <link rel='stylesheet' href="./assets/css/login.css"> -->
</head>
<script src='https://www.google.com/recaptcha/api.js'></script>

<body style="background-color: white;">
    <div class="header" style="display: flex; justify-content: space-between;flex-direction:row-reverse;">
        <div class="header-right">
            <a class="active" href="#home">Home</a>
            <a href="routes/party.php">Party</a>
            <a href="routes/adminlogin.php">Admin</a>
        </div>
    </div>


    <center><br>
        <div id="loginSection" class="login-box">
            <form action="api/login.php" id="form1" method="POST">

                <h2>Login</h2><br>
                <div>
                    <input type="number" class="input" id="mob" name="mob" placeholder="Enter mobile" required><br>
                    <p class="mob-error text-danger"></p>

                    <input type="password" class="input" id="pass" name="pass" placeholder="Enter password" required id="id_password">
                    <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                </div>
                <p class="pass-error text-danger"></p>
                <br>


                <div class="g-recaptcha" data-sitekey="6LflOtYjAAAAAA5h9Q4b0uxir84QAUkk45w1uQBA"></div>
                <br>
                <p class="captacha-error text-danger"></p>

                <?php
                if (isset($_SESSION['login_attempt']) && $_SESSION['login_attempt'] >= 3) {
                    echo "<p class='p-1 text-danger'> Please wait for 30 sec to login again!!! </p>";
                    $_SESSION['wait_time'] = time();
                } else {

                ?>
                    <button id="loginbtn" type="submit" class="btn btn dark" name="loginbtn">Login</button>


                <?php } ?>
                <p class="text-danger">
                    <?php if (isset($_SESSION['error'])) {
                        $error = $_SESSION['error'];
                        echo $error;
                        unset($_SESSION['error']);
                    } ?></p>

                New user? <a href="routes/register.php" style="color: #03e9f4;">Register here</a>



            </form>
        </div>

    </center> <br>

    <footer id="foot">
        <center>&copy; Copyright Government of Nepal, National Information Technology Center(NITC).</center>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <!-- Login Js file -->
    <script src="./assets/js/login.js"></script>
</body>

</html>