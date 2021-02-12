<?php 
session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;

}

require 'functions.php';
//ambil data url
$id = $_GET["id"];
//query data mhs berdasar id
$mhs = query("SELECT * FROM mahasiswa WHERE id= $id")[0];



if (isset($_POST["submit"])){

    
   //cek data berhasil diupdate gak
   if(ubah($_POST) > 0) {
    echo "
        <script>
        alert('Data berhasil diubah!');
        document.location.href='index.php';
        </script>
    
    ";
} else{
    echo "
    <script>
    alert('Data Gagal diubah');
    document.location.href='index.php';
    </script>

";
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
    <title>Ubah Data Mahasiswa</title>
</head>
<body class="text-center bg-dark text-white mr-5 mt-3">
    <h1 class="mt-4 ml-5">Ubah Data Mahasiswa</h1>
    <br><br>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"];?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"];?>">
        <ul>
        
            <label for="nim">NIM: </label>
                <input type="text" name="nim" id="nim" required
                value="<?= $mhs["nim"];?>"
                >
                <br>
            <label for="nama">Nama: </label>
                
                <input type="text" name="nama" id="nama" 
                value="<?= $mhs["nama"];?>"
                >
                <br><br>
            <label for="email">Email: </label>
                <input type="text" name="email" id="email" 
                value="<?= $mhs["email"];?>"
                >
                <br><br>
            <label for="jurusan">Jurusan: </label>
                <input type="text" name="jurusan" id="jurusan"
                value="<?= $mhs["jurusan"];?>"
                 >
                 <br><br>
            <label for="gambar">Gambar: </label>
               <img src="img/<?=$mhs["gambar"];?>" width="40">
                <input type="file" name="gambar" id="gambar"
                
                 >
          <br><br>
            
         
        <button type="submit" class="btn btn-primary" name="submit">Ubah Data!</button>

            </li>
        </ul>
    
    
    
    </form>

       
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    
</body>
</html>