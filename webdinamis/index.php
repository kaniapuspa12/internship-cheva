
<?php 
session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;

}

require 'functions.php';


$mahasiswa = query("SELECT * FROM mahasiswa ");

//tombol cari diklik
if(isset($_POST["cari"])){
     $mahasiswa = cari($_POST["keyword"]);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <title>Halaman Admin</title>
</head>
<body class="text-center">

    <h1>Daftar Mahasiswa</h1>

    
        <br>
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="search" autocomplete="off">
    
        <button type="submit" class="btn btn-primary" name="cari">Cari</button>
    
    
    </form>
   
    


    <br>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Aksi</th>
      <th scope="col">Gambar</th>
      <th scope="col">NIM</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Jurusan</th>
  
  
  
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php $i = 1;?>
        <?php 
        foreach( $mahasiswa as $row) :
           
        ?>
    <tr>

        <td><?= $i; ?></td>
        <td>
           
            <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>|
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin');">Hapus</a>

        </td>
        <td>
            <img src="img/<?= $row["gambar"]; ?>" width="50px" height="50px">
        </td>
        <td><?= $row["nim"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["email"]; ?></td>
        <td><?= $row["jurusan"]; ?></td>

    </tr>
    <?php $i++?>
    <?php endforeach; ?>
     
   
    
  </tbody>
</table>
<a href="tambah.php">Tambah Data Mahasiswa</a>


<button type="button" class="btn btn-danger float-right"><a href="logout.php" class="text-white" >Logout</a></button>
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    
</body>
</html>