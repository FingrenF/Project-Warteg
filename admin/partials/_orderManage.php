<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['updateStatus'])) {
        $id_pesanan = $_POST['id_pesanan'];
        $status = $_POST['status'];

        $sql = "UPDATE `pesanan` SET `status_pesanan`='$status' WHERE `id_pesanan`='$id_pesanan'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('update successfully');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('failed');
                window.location=document.referrer;
                </script>";
        }
    }
    
    if(isset($_POST['updatePengiriman'])) {
        $trackId = $_POST['trackId'];
        $id_pesanan = $_POST['id_pesanan'];
        $name = $_POST['name'];
        $time = $_POST['time'];
        $phone = $_POST['phone'];
        if($trackId == NULL) {
            $sql = "INSERT INTO `pengiriman` (`id_pesanan`, `nama_kurir`, `kontak_kurir`, `lama_waktu`, `waktu_db`) VALUES ('$id_pesanan', '$name', '$phone', '$time', current_timestamp())";   
            $result = mysqli_query($conn, $sql);
            $trackId = $conn->insert_id;
            if ($result){
                echo "<script>alert('update successfully');
                    window.location=document.referrer;
                    </script>";
            }
            else {
                echo "<script>alert('failed');
                    window.location=document.referrer;
                    </script>";
            }
        }
        else {
            $sql = "UPDATE `pengiriman` SET `nama_kurir`='$name', `kontak_kurir`='$phone', `lama_waktu`='$time',`waktu_db`=current_timestamp() WHERE `id_pengiriman`='$trackId'";   
            $result = mysqli_query($conn, $sql);
            if ($result){
                echo "<script>alert('update successfully');
                    window.location=document.referrer;
                    </script>";
            }
            else {
                echo "<script>alert('failed');
                    window.location=document.referrer;
                    </script>";
            }
        }
    }
}

?>

