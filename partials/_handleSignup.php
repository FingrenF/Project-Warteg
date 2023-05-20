<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username = $_POST["username"];
    $nama_depan = $_POST["nama_depan"];
    $nama_belakang = $_POST["nama_belakang"];
    $email = $_POST["email"];
    $no_telp = $_POST["no_telp"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // Check whether this username exists
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "Username sudah ada, silahkan ganti username.";
        header("Location: /Project Warteg/index.php?signupsuccess=false&error=$showError");
    }
    else{
      if(($password == $cpassword)){
          $hash = password_hash($password, PASSWORD_DEFAULT);
          $sql = "INSERT INTO `users` ( `username`, `nama_depan`, `nama_belakang`, `email`, `no_telp`, `password`, `waktu_join`) VALUES ('$username', '$nama_depan', '$nama_belakang', '$email', '$no_telp', '$hash', current_timestamp())";   
          $result = mysqli_query($conn, $sql);
          if ($result){
              $showAlert = true;
              header("Location: /Project Warteg/index.php?signupsuccess=true");
          }
      }
      else{
          $showError = "Password tidak sesuai";
          header("Location: /Project Warteg/index.php?signupsuccess=false&error=$showError");
      }
    }
}
    
?>

