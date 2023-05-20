<?php
   $NB = $_GET['nama_bahan'];
   $stok = $_GET['stok'];
   $satuan = $_GET['satuan'];

   require('KoneksiBB.php');

   $sql = "update bahan set nama_bahan='$NB',stok='$stok', satuan='$satuan'
           where nama_bahan='$NB'";
   mysqli_query($koneksi,$sql)
   or die('SQL error: '. mysqli_error($koneksi));

   header("location:InsertBahan.php"); 
?>