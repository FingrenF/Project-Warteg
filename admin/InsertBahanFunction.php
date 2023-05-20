<?php
   $NB = $_GET['nama_bahan'];
   $stok= $_GET['stok'];
   $satuan = $_GET['satuan'];

   require('KoneksiBB.php');

   $sql = "insert into bahan
           values ('$NB','$stok','$satuan')";
   mysqli_query($koneksi,$sql)
   or die('SQL error: '. mysqli_error($koneksi));

   echo "<script>alert('success');
            window.location=document.referrer;
        </script>";
?>