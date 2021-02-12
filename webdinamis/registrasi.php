<?php 
require 'functions.php';
    if(isset($_POST["register"])) {

        if(registrasi($_POST)> 0){
            echo "<script>
            alert('user baru berhasil ditambah!');
            
        </script>";
    }else{
        echo mysqli_error($conn);
    }

        }
       

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <title>Halaman Registrasi</title>
</head>
<body class="text-center bg-dark text-white mr-5 mt-3">
    <h1 class="mt-4 ml-5">Halaman Registrasi</h1>
<br>
    <form action="" method="post">
        <ul>
            
                <label for="username">Username: </label>
                <input type="text" name="username" id="username">
          <br><br>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password">
            
           <br> <br>
                <label for="password2">Confirm Password:  </label>
                <input type="password" name="password2" id="password2">
                <br>
                <button type="submit" class="btn btn-primary" name="register">Register!</button>
            
        
        </ul>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>