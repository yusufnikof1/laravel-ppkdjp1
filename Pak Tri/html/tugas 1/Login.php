<?php
session_start();
session_regenerate_id();
session_destroy();
session_unset();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="Login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <ul>
    <li><a href="Home.php">Home</a></li>
    <li><a href="DownloadCV.html">Download CV</a></li>
    <li><a href="Contact.html">Contact</a></li>
    <li><a href="Aboutme.html">About me</a></li>
    <li><a href="Login.php">Login</a></li>
  </ul>
  <div class="container">
    <div class="row mt-4">
      <div class="col-2"></div>
      <div class="col-8">
        <div class="card">
          <div class="card-header text-center">LOGIN</div>
          <div class="card-body">
            <form action="LoginControl.php" method="POST" onsubmit="return validasi()">
              <div class="mt-2">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" />
                <span id="emailError" class="text-danger" style="display: none">Email Tidak Valid!</span>
              </div>
              <div class="mt-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" />
                <span id="passwordError" class="text-danger" style="display: none">Password harus terdiri dari 8 karakter, termasuk satu huruf besar, satu huruf kecil, satu angka, dan satu karakter khusus.</span>
              </div>
              <div class="mt-2 text-end">
                <button type="submit" name="login_yuk" class="btn btn-primary">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    function validasi() {
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      var emailError = document.getElementById("emailError");
      var passwordError = document.getElementById("passwordError");
      var isValid = true;
      var emailReg = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      var passReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?&])[A-Za-z\d@.#$!%*?&]{8,}$/;

      if (emailReg.test(email)) {
        // console.log("Valid Email adress");
        emailError.style.display = "none";
      } else if (!emailReg.test(email)) {
        // console.log("Invalid Email adress");
        emailError.style.display = "block";
        isValid = false;
      }
      if (passReg.test(password)) {
        // console.log("Valid Password");
        passwordError.style.display = "none";
      } else if (!passReg.test(password)) {
        // console.log("Invalid Password");
        passwordError.style.display = "block";
        isValid = false;
      }
      return isValid;
      // console.log(passReg.test(password))
    }
  </script>

  <div class="footer">
    Copyright 2025 @ Yusuf Niko Fitranto
  </div>
</body>

</html>