<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['updateDetail'])) {
        $nama_situs = $_POST["nama_situs"];
        $email = $_POST["email"];
        $kontak1 = $_POST["kontak1"];
        $kontak2 = $_POST["kontak2"];
        $alamat = $_POST["alamat"];

        $sql = "UPDATE `situs` SET nama_situs = '$nama_situs' WHERE id_situs = 1";   
        $result = mysqli_query($conn, $sql);
        $sql = "UPDATE `situs` SET email = '$email' WHERE id_situs = 1";   
        $result = mysqli_query($conn, $sql);
        $sql = "UPDATE `situs` SET kontak1 = '$kontak1' WHERE id_situs = 1";   
        $result = mysqli_query($conn, $sql);
        $sql = "UPDATE `situs` SET kontak2 = '$kontak2' WHERE id_situs = 1";   
        $result = mysqli_query($conn, $sql);
        $sql = "UPDATE `situs` SET `alamat` = '$alamat' WHERE id_situs = 1";   
        $result = mysqli_query($conn, $sql);
        
        if($result){
            echo "<script>alert('success');
                window.location=document.referrer;
                </script>";
        }    
    }
    
}
?>

