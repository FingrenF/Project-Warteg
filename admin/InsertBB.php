<?php
   $No = $_GET['no_barang'];
   $NB = $_GET['nama_bahan'];
   $jumlah = $_GET['jumlah'];
   $HB = $_GET['harga_bahan'];
   $TGL = $_GET['tanggal'];

   require('KoneksiBB.php');

   $sql1 = "INSERT INTO bahan_baku VALUES ('$No','$NB','$jumlah','$HB','$TGL')";
   mysqli_query($koneksi,$sql1) or die('SQL error: '. mysqli_error($koneksi));

   $sql2 = "UPDATE bahan SET stok = stok + '$jumlah' WHERE nama_bahan = '$NB'";
   mysqli_query($koneksi,$sql2) or die('SQL error: '. mysqli_error($koneksi));

   echo "<script>alert('success');
                            window.location=document.referrer;
        </script>";
?>