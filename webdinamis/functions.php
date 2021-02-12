<?php 

//koneksi ke database
$conn=mysqli_connect("localhost","root","","phpdasar");


function query($query) {
    global $conn;
    $result = mysqli_query($conn,$query );
    $rows =[];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;

    }
    return $rows;
}

function tambah($data){
    global $conn;

    $nim = htmlspecialchars($data["nim"]);
   $nama = htmlspecialchars($data["nama"]);
   $email=htmlspecialchars($data["email"]);
   $jurusan=htmlspecialchars($data["jurusan"]);
  
   //upload gambar
   $gambar = upload();
   if(!$gambar)
   {
    return false;


   }
   $query = "INSERT INTO mahasiswa VALUES ('','$nim','$nama','$email','$jurusan','$gambar')";
   mysqli_query($conn,$query);
   return mysqli_affected_rows($conn);


}

function upload(){
    global $conn;
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tdk ada gambar yg diupload
    if($error === 4){
        echo "<script>
            alert('Pilih gambar terlebih dahulu');
        </script>";
        return false;
    }
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$ekstensiGambarValid)) {
        echo "
        <script> alert('Yang anda upload bukan gambar!');
        </script>
        ";
        return false;
    }
    //cek ukuran terlalu besar
    if($ukuranfile > 1000000){
        echo "
        <script> alert('ukuran gambar terlalu besar');
        </script>
        ";
        return false;
    }

   
    //lulus pengecekan n siap upload gambar
    //generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    
    move_uploaded_file($tmpName,'img/'. $namafile);
    
    
    return $namaFileBaru;

}


function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data){

    global $conn;
    $id = $data["id"];

    $nim = htmlspecialchars($data["nim"]);
   $nama = htmlspecialchars($data["nama"]);
   $email=htmlspecialchars($data["email"]);
   $jurusan=htmlspecialchars($data["jurusan"]);
   $gambarLama = htmlspecialchars($data["gambarLama"]);
   

   //cek user pilih gambar baru atau ngga 
   if($_FILES['gambar']['error'] === 4){
    $gambar = $gambarLama;
   }else{
        $gambar = upload();
   }
   

   
   $query = "UPDATE mahasiswa SET 
   nim='$nim',
   nama='$nama',
   email='$email',
   jurusan = '$jurusan',
   gambar='$gambar'
   WHERE id = $id
";
   mysqli_query($conn,$query);
   return mysqli_affected_rows($conn);
}

function cari($keyword) {

    $query= "SELECT * FROM mahasiswa WHERE
        nama LIKE '%$keyword%' OR
        nim LIKE '%$keyword%' OR
        email LIKE '%$keyword%' OR
        jurusan  LIKE '%$keyword%' 
    
    ";
    return query($query);


}

function registrasi($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_String($conn, $data["password2"]);

    //cek username udh ada belom
    $result= mysqli_query($conn,"SELECT username FROM  user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert('Username sudah terdaftar!');
        </script>";
        return false;
    }
    //cek konfirmasi pass
    if($password !== $password2){
        echo "<script>
            alert('Konfirmasi password tidak sesuai! ');
            </script>";
        return false;
    }
  
    //enkripsi pass
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambah user ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$password')");
    return mysqli_affected_rows($conn);



}

?>