
<div class="container-fluid" style="margin-top:98px">
    
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#newUser"><i class="fa fa-plus"></i> New user</button>
        </div>
    </div>
        <br>
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">
                <table class="table-striped table-bordered col-md-12 text-center">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th>Id User</th>
                            <th style="width:7%">Foto</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Telepon</th>
                            <th>Tipe</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM users"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row=mysqli_fetch_assoc($result)) {
                                $Id = $row['id'];
                                $username = $row['username'];
                                $nama_depan = $row['nama_depan'];
                                $nama_belakang = $row['nama_belakang'];
                                $email = $row['email'];
                                $no_telp = $row['no_telp'];
                                $tipe_user = $row['tipe_user'];
                                if($tipe_user == 0) 
                                    $tipe_user = "user";
                                else
                                    $tipe_user = "Admin";

                                echo '<tr>
                                    <td>' .$Id. '</td>
                                    <td><img src="/Project Warteg/img/person-' .$Id. '.jpg" alt="image for this user" onError="this.src =\'/Project Warteg  /img/profilePic.jpg\'" width="100px" height="100px"></td>
                                    <td>' .$username. '</td>
                                    <td>
                                        <p>First Name : <b>' .$nama_depan. '</b></p>
                                        <p>Last Name : <b>' .$nama_belakang. '</b></p>
                                    </td>
                                    <td>' .$email. '</td>
                                    <td>' .$no_telp. '</td>
                                    <td>' .$tipe_user. '</td>
                                    <td class="text-center">
                                        <div class="row mx-auto" style="width:112px">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editUser' .$Id. '" type="button">Edit</button>';
                                            if($Id == 1) {
                                                echo '<button class="btn btn-sm btn-danger" disabled style="margin-left:9px;">Delete</button>';
                                            }
                                            else {
                                                echo '<form action="partials/_userManage.php" method="POST">
                                                        <button name="removeUser" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
                                                        <input type="hidden" name="Id" value="'.$Id. '">
                                                    </form>';
                                            }

                                    echo '</div>
                                    </td>
                                </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- newUser Modal -->
<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="newUser" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="newUser">Buat Akun Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_userManage.php" method="post">
              <div class="form-group">
                  <b><label for="username">Username</label></b>
                  <input class="form-control" id="username" name="username" placeholder="Buat username yang unik" type="text" required minlength="3" maxlength="11">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <b><label for="nama_depan">Nama Depan:</label></b>
                  <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama depan" required>
                </div>
                <div class="form-group col-md-6">
                  <b><label for="nama_belakang">Nama Belakang:</label></b>
                  <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama belakang" required>
                </div>
              </div>
              <div class="form-group">
                  <b><label for="email">Email:</label></b>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
              </div>
              <div class="form-group row my-0">
                    <div class="form-group col-md-6 my-0">
                        <b><label for="no_telp">Nomor Telepon:</label></b>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon">+62</span>
                            </div>
                            <input type="tel" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan no. telepon" required pattern="[0-9]{10}" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group col-md-6 my-0">
                        <b><label for="tipe_user">Tipe:</label></b>
                        <select name="tipe_user" id="tipe_user" class="custom-select browser-default" required>
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                        </select>
                    </div>
              </div>
              <div class="form-group">
                  <b><label for="password">Password:</label></b>
                  <input class="form-control" id="password" name="password" placeholder="Masukkan password" type="password" required data-toggle="password" minlength="4" maxlength="21">
              </div>
              <div class="form-group">
                  <b><label for="password1">Renter Password:</label></b>
                  <input class="form-control" id="cpassword" name="cpassword" placeholder="Renter Password" type="password" required data-toggle="password" minlength="4" maxlength="21">
              </div>
              <button type="submit" name="createUser" class="btn btn-success">Buat Akun</button>
            </form>
      </div>
    </div>
  </div>
</div>

<?php 
    $usersql = "SELECT * FROM `users`";
    $userResult = mysqli_query($conn, $usersql);
    while($userRow = mysqli_fetch_assoc($userResult)){
        $Id = $userRow['id'];
        $name = $userRow['username'];
        $nama_depan = $userRow['nama_depan'];
        $nama_belakang = $userRow['nama_belakang'];
        $email = $userRow['email'];
        $no_telp = $userRow['no_telp'];
        $tipe_user = $userRow['tipe_user'];

?>
<!-- editUser Modal -->
<div class="modal fade" id="editUser<?php echo $Id; ?>" tabindex="-1" role="dialog" aria-labelledby="editUser<?php echo $Id; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="editUser<?php echo $Id; ?>">User Id: <b><?php echo $Id; ?></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            
            <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
                <div class="form-group col-md-8">
                    <form action="partials/_userManage.php" method="post" enctype="multipart/form-data">
                        <b><label for="image">Profile Picture</label></b>
                        <input type="file" name="userimage" id="userimage" accept=".jpg" class="form-control" required style="border:none;">
                        <small id="Info" class="form-text text-muted mx-3">Please upload .jpg file.</small>
                        <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                        <button type="submit" class="btn btn-success mt-3" name="updateProfilePhoto">Update Img</button>
                    </form>         
                </div>
                <div class="form-group col-md-4">
                    <img src="/Project Warteg/img/person-<?php echo $Id; ?>.jpg" alt="Profile Photo" width="100" height="100" onError="this.src ='/OnlinePizzaDelivery/img/profilePic.jpg'">
                    <form action="partials/_userManage.php" method="post">
                        <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                        <button type="submit" class="btn btn-success mt-2" name="removeProfilePhoto">Remove Img</button>
                    </form>
                </div>
            </div>
            
            <form action="partials/_userManage.php" method="post">
                <div class="form-group">
                    <b><label for="username">Username</label></b>
                    <input class="form-control" id="username" name="username" value="<?php echo $name; ?>" type="text" disabled>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <b><label for="nama_depan">Nama Depan:</label></b>
                    <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="<?php echo $nama_depan; ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <b><label for="nama_belakang">Nama Belakang:</label></b>
                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="<?php echo $nama_belakang; ?>" required>
                </div>
                </div>
                <div class="form-group">
                    <b><label for="email">Email:</label></b>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group row my-0">
                    <div class="form-group col-md-6 my-0">
                        <b><label for="no_telp">Nomor Telepon:</label></b>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon">+62</span>
                            </div>
                            <input type="tel" class="form-control" id="no_telp" name="no_telp" value="<?php echo $no_telp; ?>" required pattern="[0-9]{11}" maxlength="11">
                        </div>
                    </div>
                    <div class="form-group col-md-6 my-0">
                        <b><label for="tipe_user">Tipe:</label></b>
                        <select name="tipe_user" id="tipe_user" class="custom-select browser-default" required>
                        <?php 
                            if($tipe_user == 1) {
                        ?>
                            <option value="0">User</option>
                            <option value="1" selected>Admin</option>
                        <?php
                            } 
                            else {
                        ?>
                            <option value="0" selected>User</option>
                            <option value="1">Admin</option>
                        <?php
                            } 
                        ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                <button type="submit" name="editUser" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
  </div>
</div>

<?php
    }
?>
