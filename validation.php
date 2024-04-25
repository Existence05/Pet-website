<?php
session_start();

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    //connect to the database
    $conn = mysqli_connect("hostname","username","password","database_name");

    //Query the database for user
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

    $rows = mysqli_num_rows($query);
    if($rows == 1){
        $_SESSION['username'] = $username;
        header("Location: home.php");
    }else{
        echo "Invalid username or password";
    }
}

?>