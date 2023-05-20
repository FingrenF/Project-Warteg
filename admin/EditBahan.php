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
    <?php
    $NB = $_GET['Bahan'];

       require('KoneksiBB.php');
        $sql = "select nama_bahan, stok, satuan from bahan where nama_bahan='$NB'";
        $query = mysqli_query($koneksi,$sql)
                    or die('SQL error: '. mysqli_error($koneksi));
        $row = mysqli_fetch_array($query);
?>
<h1>Data Bahan Baku</h1>
<FORM METHOD="GET" ACTION="EditBahanFunction.php">
<TABLE align="center" width="100%"
    cellpadding="3" cellspacing="10">
<TR>
	<TD align=right>Nama Bahan : </TD>
	<TD><INPUT TYPE="text" NAME="nama_bahan" <?php print "VALUE='$row[nama_bahan]'"; ?>></TD>
</TR>
<TR>
	<TD align=right>Stok : </TD>
	<TD><INPUT TYPE="number" NAME="stok" <?php print "VALUE='$row[stok]'"; ?>></TD>
</TR>
<TR>
	<TD align=right>Satuan : </TD>
	<TD><INPUT TYPE="text" NAME="satuan" <?php print "VALUE='$row[satuan]'"; ?>></TD>
</TR>
<TR>
	<TD Colspan=2 align=center><INPUT TYPE="submit" VALUE="Rekam" class="crudbutton">
	    <INPUT TYPE="reset" VALUE="Reset" class="crudbutton">
        </TD>
</TR>
</TABLE>
</FORM>

<td colspan=2 align=center> <button onclick="handleClick()" class="crudbutton">Kembali Ke Laporan</button></td>

<script>
    function handleClick() {
        window.location = 'index.php?page=bahanManage';
    }
</script>

<BR>
<BR>
<?php
   echo "<TABLE border=1align=center width=60%
   cellpadding=3 cellspacing=0>
         <TR>
            <TH>Nama Bahan</TH></TH>
            <TH>Stok</TH>
            <TH>Satuan</TH>
            <TH>Edit & Delete</TH>
         </TR>";

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
                     onClick='return confirm(\"Hapus bahan  $row[nama_bahan]?\")'>Hapus</A>
	        </TR>";
   }
   echo "</TABLE>";

   mysqli_close($koneksi);
?>

    </div>
    </BODY>
</HTML>