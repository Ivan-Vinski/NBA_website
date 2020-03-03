<?php
    include "./login.php";
    if (isset($_SESSION['username']) ){
        header("Location: ../settings/settings.php");
    }
?>

<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <title> Login Page </title>
  <link rel="stylesheet" href="./loginPage.css"></link>

</head>

<body>
  <?php include "../header.php" ?>
  <section>
    <div class="loginFormContainer" id="loginFormContainer">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="text" name="username" placeholder="Username" class="userInput" autofocus><br><br>
            <input type="password" name="password" placeholder="Password" class="userInput"><br><br>
            <button type="submit" name="login" class="buttons" id="buttonLogin">Login</button>
            <button type="submit" name="register" class="buttons" id="buttonRegister">Register</button>
        </form>
    </div>
  </section>
  <?php include "../footer.php" ?>
</body>
</html>
