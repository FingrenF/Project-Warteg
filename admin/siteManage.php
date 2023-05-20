<?php
                    $sql = "SELECT * FROM `situs`";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);

                    $nama_situs = $row['nama_situs'];
                    $alamat = $row['alamat'];
                    $email = $row['email'];
                    $kontak1 = $row['kontak1'];
                    $kontak2 = $row['kontak2'];

echo '<div class="container-fluid" style="padding-left: 470px;margin-top:98px">
    <div class="card col-lg-6 p-0">
        <div class="title" style="background-color: rgb(111 202 203);">
            <em><h2 class="text-center" style="margin-top: 11px;">' .$nama_situs. '</h2></em>
        </div>
        <div class="card-body">
            <form action="partials/_siteManage.php" method="post">
                <div class="form-group">
                    <label for="name" class="control-label">Nama Situs</label>
                    <input type="text" class="form-control" id="name" name="nama_situs" value="' .$nama_situs. '" required>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="' .$email. '" required>
                </div>
                <div class="form-group">
                    <label for="contact" class="control-label">Kontak 1</label>
                    <input type="tel" class="form-control" id="kontak1" name="kontak1" value="' .$kontak1. '" required>
                </div>
                <div class="form-group">
                    <label for="contact" class="control-label">Kontak 2(opsional)</label>
                    <input type="tel" class="form-control" id="kontak2" name="kontak2" value="' .$kontak2. '" required>
                </div>
                <div class="form-group">
                    <label for="alamat" class="control-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="' .$alamat. '" required>
                </div>
                <center>
                    <button name="updateDetail" class="btn btn-info btn-primary btn-block col-md-3">Save</button>
                </center>
            </form>
        </div>
    </div>';
    
?>

