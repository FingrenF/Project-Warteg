<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/b67e368fa6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./daftarmenu.css">
    <title>Laporan Bahan Baku</title>
</head>
<body>
    <div align=center>
        <br>
        <h1>Daftar Bahan Baku</h1>
        <FORM METHOD="GET" ACTION="InsertBB.php">
<TABLE align="center" width="100%" cellpadding="3" cellspacing="10">

<TR>
	<TD align=right>No Beli : </TD>
	<TD><INPUT TYPE="number" NAME="no_barang" REQUIRED></TD>
</TR>

<TR>
  <TD align=right>Nama Bahan : </TD>
  <TD>
    <select name="nama_bahan">
      <option value="">-- Pilih Bahan --</option>
      <?php
        require('KoneksiBB.php');

        $sql = "SELECT DISTINCT nama_bahan FROM bahan";
        $query = mysqli_query($koneksi, $sql) or die('SQL error: '. mysqli_error($koneksi));

        while ($row = mysqli_fetch_array($query)) {
          echo "<option value=\"$row[nama_bahan]\">$row[nama_bahan]</option>";
        }

        mysqli_close($koneksi);
      ?>
    </select>
    <button onclick="location.href='insertBahan.php'" class="btn btn-primary">Tambah</button>
  </TD>
</TR>


<TR>
	<TD align=right>Jumlah : </TD>
	<TD><INPUT TYPE="number" NAME="jumlah" REQUIRED></TD>
</TR>

<TR>
	<TD align=right>Harga Bahan : </TD>
	<TD><INPUT TYPE="number" NAME="harga_bahan" REQUIRED></TD>
</TR>

<TR>
	<TD align=right>Tanggal Beli : </TD>
	<TD><INPUT TYPE="date" NAME="tanggal" REQUIRED></TD>
</TR>

<TR>
	<TD colspan=2 align=center><input TYPE="submit" VALUE="Rekam" class="crudbutton">
	    <input TYPE="reset" VALUE="Reset" class="crudbutton"></TD>
</TR>
</TABLE>
</FORM><BR>
<form method="POST">
    Filter Dengan Tanggal:
    <br>
    <input type="date" id="tgl" name="tgl">
    <button type="submit" name="filter_tgl" class="crudbutton">Filter</button>
</form>
<br>
        <table border="1" align="center" width="60%"
    cellpadding="3" cellspacing="0">
            <tr>
                <th>No Beli</th>
                <th>Nama Bahan</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Harga Bahan</th>
                <th>Tanggal</th>
            </tr>
            <?php
   require('KoneksiBB.php');

   $sql = "SELECT no_barang, b.nama_bahan, jumlah, satuan, harga_bahan, tanggal FROM bahan_baku a
            join bahan b on (a.nama_bahan = b.nama_bahan)";

   if (isset($_POST['filter_tgl'])) {
       $tgl = $_POST['tgl'];
       $sql .= " WHERE tanggal = '$tgl'  order by tanggal desc";
   }
   else $sql .= " order by tanggal desc";
   $query = mysqli_query($koneksi, $sql)
                    or die('SQL error: ' . mysqli_error($koneksi));

   while ($row = mysqli_fetch_array($query))
   {
	  echo "<TR>
            <TD align=center>$row[no_barang]</TD>
	        <TD align=center>$row[nama_bahan]</TD>
            <TD align=center>$row[jumlah]</TD>
            <TD align=center>$row[satuan]</TD>
	        <TD align=center>$row[harga_bahan]</TD>
            <TD align=center>$row[tanggal]</TD>
	        </TR>";
   }
   mysqli_close($koneksi);
?>
        </table>
    </div>
</body>
</html>