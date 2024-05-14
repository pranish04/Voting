<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<script src='https://www.google.com/recaptcha/api.js'></script>
<link rel="stylesheet" href="../css/style.css">

<body>
    <a href="../" class="btn btn-dark" name="back">Back</a>

    <center><br>
        <div id="loginSection">

            <fieldset>
                <form action="../api/adminlogin.php" id="form4" method="POST">
                    <h3>Admin-Login</h3>
                    <input type="text" name="admin" placeholder="Admin-Name" required><br><br>
                    <input type="password" name="pass" id="pass" placeholder="Enter password" required id="id_password">
                    <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                    <p class="pass-error text-danger"></p><br>
                    <div class="g-recaptcha" data-sitekey="6LflOtYjAAAAAA5h9Q4b0uxir84QAUkk45w1uQBA"></div>
                    <p class="captacha-error text-danger"></p>
                    <button id="loginbtn" type="submit" name="loginbtn">Login</button>
                </form>
            </fieldset>
        </div>

    </center> <br>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <!-- admin Js file -->
    <script src="../assets/js/admin.js"></script>


</body>

</html>