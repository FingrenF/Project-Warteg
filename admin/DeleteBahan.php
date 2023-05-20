<?php
   $NB = $_GET['Bahan'];
   require('KoneksiBB.php');
   mysqli_query($koneksi,"delete from bahan where nama_bahan='$NB'")
   or die('SQL error: '. mysqli_error($koneksi));
   echo "<script>alert('success');
            window.location=document.referrer;
        </script>";
?>