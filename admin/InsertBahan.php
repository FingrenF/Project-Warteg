<!DOCTYPE HTML>
<HTML>
<HEAD>
	<META charset="UTF-8">
    <script src="https://kit.fontawesome.com/b67e368fa6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./daftarmenu.css">
	<TITLE>Insert Bahan</TITLE>
</HEAD>
<BODY>
    <div align=center>
    <h1>Data Bahan Baku</h1>
<FORM METHOD="GET" ACTION="InsertBahanFunction.php">
<TABLE align="center" width="100%"
    cellpadding="3" cellspacing="10">
<TR>
	<TD align=right>Nama Bahan : </TD>
	<TD><INPUT TYPE="text" NAME="nama_bahan" REQUIRED></TD>
</TR>
<TR>
	<TD align=right>Stok : </TD>
	<TD><INPUT TYPE="number" NAME="stok" REQUIRED></TD>
</TR>
<TR>
	<TD align=right>Satuan : </TD>
	<TD><INPUT TYPE="text" NAME="satuan" REQUIRED></TD>
</TR>
<TR>
	<TD Colspan=2 align=center><INPUT TYPE="submit" VALUE="Rekam" class="crudbutton">
	    <INPUT TYPE="reset" VALUE="Reset" class="crudbutton">
        </TD>
</TR>
<tr>
    <td colspan=2 align=center> <button onclick="handleClick()" class="crudbutton">Kembali Ke Laporan</button></td>
</tr>

<script>
    function handleClick() {
        window.location = 'index.php?page=bahanManage';
    }
</script>

</TABLE>
</FORM><BR>

<TABLE border="1" align="center" width="60%"
    cellpadding="3" cellspacing="0">
  <TR>
     <TH>Nama Bahan</TH>
     <TH>Stok</TH>
     <TH>Satuan</TH>
     <TH>Fungsi</TH>
  </TR>

<?php
   require('KoneksiBB.php');
   $sql = "select nama_bahan, stok, satuan from bahan";
   $query = mysqli_query($koneksi,$sql) 
            or die('SQL error: '. mysqli_error($koneksi));

   while ($row = mysqli_fetch_array($query))
   {
	  echo "<TR>
	        <TD align=center>$row[nama_bahan]</TD>
            <TD align=center>$row[stok]</TD>
	        <TD align=center>$row[satuan]</TD>
	        <TD align=center>
	        <A HREF='EditBahan.php?Bahan=$row[nama_bahan]'>Edit</A>&nbsp;
            <A HREF='DeleteBahan.php?Bahan=$row[nama_bahan]'
                     onClick='return confirm(\"Hapus Bahan  $row[nama_bahan]?\")'>Hapus</A>
	        </TR>";
   }
   mysqli_close($koneksi);
?>
</TABLE>
    </div>
</BODY>
</HTML>