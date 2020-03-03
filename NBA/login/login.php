<?php
    session_start();
    $username = $password="";
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["login"])){
        if (empty($_POST['username'])){
            echo "<body><script>alert('Enter username');</script></body>";
        }
        else{
            $username = testInput($_POST["username"]);
            if (empty($_POST['password'])){
             echo "<body><script>alert('Enter password');</script></body>";
            }
            else{
               $password = testInput($_POST["password"]);
               login($username, $password);
            }
        }
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])){
        insertAccount($_POST["username"], $_POST["password"]);
    }

    function connectToDatabase($serverName, $username, $password){
        $conn = new mysqli($serverName, $username, $password);
        if ($conn->connect_error) {
            echo "<body><script>alert('Connection failed');</script></body>";
        }
        return $conn;
    }

    function testInput($data){
        //ove funkcije ne rade bas dobro :( https://www.tutorialspoint.com/php/php_login_example.htm
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function login($username, $password){
        $conn = connectToDatabase("localhost", "root", "");

        //create and execute sql query
        $sql = "SELECT * FROM nba_accounts.accounts WHERE username='".$username."'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) { 
            echo "<body><script>alert('No account with given username.');</script></body>";
        }
        //check if password is a match
        else{
            $row = $result->fetch_assoc();
            $dbUsername = $row["username"];
            $dbPassword = $row["password"];

            if (password_verify($password, $dbPassword)){
                $_SESSION['username'] = $username;
                header("Location: ../settings/settings.php");
            }
            else{
                echo "<body><script>alert('Wrong Password');</script></body>";
            }
        }

        $conn->close(); 
    }

    function insertAccount($username, $password){
        $conn = connectToDatabase("localhost", "root", "");

        $hashedPass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO nba_accounts.accounts(username, password) VALUES ('".$username."', '".$hashedPass."')";
        $result = $conn->query($sql);

        echo "<body><script>alert('Account inserted');</script></body>";
        $conn->close();
    }
?>