<?php 
    session_start();
        
    require 'functions.php';
    //cek cookie
    if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        //ambil username berdasar id 
        $result = mysqli_query($conn,"SELECT username FROM user WHERE id = '$id'");
        $row = mysqli_fetch_assoc($result);

        //cek cookie dan username 
        if($key === hash('sha256', $row['username'])){
            $_SESSION['login'] = true;
            
        }
       
    }
    if(isset($_SESSION["login"])){
        header("Location: index.php");
        exit;

    }

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username ='$username'");

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password,$row["password"])) {
                
                //set session
                $_SESSION["login"] = true;

                //cek remember me 
                if(isset($_POST['remember'])) {
                    //buat cookie

                    setcookie('id', $row['id'], time()+ 60);
                    setcookie('key' ,hash('sha256',$row['username']), time()+60);
                }


                header("Location: index.php");
                exit;
            }
        }
        $error = true;

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <title>Halaman Login</title>

</head>
<body class="text-center bg-dark text-white mr-5 mt-3">
<h1 class="mt-4 ml-5">Halaman Login</h1>
<?php if(isset($error)) :?>
<p  style="color:red;font-style:italic">username/password salah!</p>

<?php endif;?>

<form action="" method="post">
<ul>
  
    <label for="username">Username: </label>
    <input type="text" name="username" id="username">
    <br>
  
    <label for="password">Password: </label>
    <input type="password" name="password" id="password"> <br>

   
        <input type="checkbox" name="remember" id="remember"> 
        <label for="remember">Remember Me</label>
        <br> <br>

        <button type="submit" class="btn btn-primary" name="login">Login</button>          <br> <br>
        <a href="registrasi.php" class="text-white">Buat Akun</a>
   

 
</ul>

</form>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>