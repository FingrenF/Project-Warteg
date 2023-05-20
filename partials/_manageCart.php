<?php
include '_dbconnect.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_SESSION['id_user'];
    if(isset($_POST['addToCart'])) {
        $itemId = $_POST["itemId"];
        // Check whether this item exists
        $existSql = "SELECT * FROM `keranjang` WHERE menu_id = '$itemId' AND `id_user`='$id_user'";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows > 0){
            echo "<script>alert('Item Already Added.');
                    window.history.back(1);
                    </script>";
        }
        else{
            $sql = "INSERT INTO `keranjang` (`menu_id`, `jumlah`, `id_user`, `waktu_masuk_keranjang`) VALUES ('$itemId', '1', '$id_user', current_timestamp())";   
            $result = mysqli_query($conn, $sql);
            if ($result){
                echo "<script>
                    window.history.back(1);
                    </script>";
            }
        }
    }
    if(isset($_POST['removeItem'])) {
        $itemId = $_POST["itemId"];
        $sql = "DELETE FROM `keranjang` WHERE `menu_id`='$itemId' AND `id_user`='$id_user'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed');
                window.history.back(1);
            </script>";
    }
    if(isset($_POST['removeAllItem'])) {
        $sql = "DELETE FROM `keranjang` WHERE `id_user`='$id_user'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed All');
                window.history.back(1);
            </script>";
    }
    if(isset($_POST['checkout'])) {
        $biaya = $_POST["amount"];
        $alamat = $_POST["address"];
        $alamat1 = $_POST["address1"];
        $no_telp = $_POST["phone"];
        $kode_pos = $_POST["zipcode"];
        $password = $_POST["password"];
        $alamat = $alamat.", ".$alamat1;
        
        $passSql = "SELECT * FROM users WHERE id='$id_user'"; 
        $passResult = mysqli_query($conn, $passSql);
        $passRow=mysqli_fetch_assoc($passResult);
        $userName = $passRow['username'];   
        if (password_verify($password, $passRow['password'])){ 
            $sql = "INSERT INTO `pesanan` (`id_user`, `alamat`, `kode_pos`, `no_telp`, `biaya`, `cara_bayar`, `status_pesanan`, `waktu_pesanan`) VALUES ('$id_user', '$alamat', '$kode_pos', '$no_telp', '$biaya', '0', '0', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $id_pesanan = $conn->insert_id;
            if ($result){
                $addSql = "SELECT * FROM `keranjang` WHERE id_user='$id_user'"; 
                $addResult = mysqli_query($conn, $addSql);
                while($addrow = mysqli_fetch_assoc($addResult)){
                    $menu_id = $addrow['menu_id'];
                    $jumlah = $addrow['jumlah'];
                    $itemSql = "INSERT INTO `daftar_pesanan` (`id_pesanan`, `menu_id`, `jumlah`) VALUES ('$id_pesanan', '$menu_id', '$jumlah')";
                    $itemResult = mysqli_query($conn, $itemSql);
                }
                $deletesql = "DELETE FROM `keranjang` WHERE `id_user`='$id_user'";   
                $deleteresult = mysqli_query($conn, $deletesql);
                echo '<script>alert("Terima kasih telah memesan dan membayar di Warteg Cibadak. Id pesanan Anda ' .$id_pesanan. '.");
                    window.location.href="http://localhost/Project Warteg/index.php";  
                    </script>';
                    exit();
            }
        } 
        else{
            echo '<script>alert("Password tidak cocok, silakan input yang benar.");
                    window.history.back(1);
                    </script>';
                    exit();
        }    
    }
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        $menu_id = $_POST['menu_id'];
        $qty = $_POST['jumlah'];
        $updatesql = "UPDATE `keranjang` SET `jumlah`='$qty' WHERE `menu_id`='$menu_id' AND `id_user`='$id_user'";
        $updateresult = mysqli_query($conn, $updatesql);

        // Perhitungan total harga yang baru
        $totalSql = "SELECT `harga_menu` * `jumlah` AS total FROM `keranjang` JOIN `menu` ON `keranjang`.`menu_id` = `menu`.`menu_id` WHERE `keranjang`.`menu_id` = '$menu_id' AND `keranjang`.`id_user` = '$id_user'";
        $totalResult = mysqli_query($conn, $totalSql);
        $totalRow = mysqli_fetch_assoc($totalResult);
        $newTotal = $totalRow['total'];

        echo $newTotal; // Return value total harga sesuai AJAX
    }

    
}
?>

