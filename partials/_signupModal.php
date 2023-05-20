  <!-- Sign up Modal -->
  <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: rgb(255 37 0); color: white;">
            <h5 class="modal-title" id="signupModal">Buat Akun</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="partials/_handleSignup.php" method="post">
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
              <div class="form-group">
                <b><label for="no_telp">No Telepon:</label></b>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon">+62</span>
                  </div>
                  <input type="tel" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan nomor telepon" required pattern="[0-9]{10}" maxlength="10">
                </div>
              </div>
              <div class="text-left my-2">
                  <b><label for="password">Password:</label></b>
                  <input class="form-control" id="password" name="password" placeholder="Masukkan Password" type="password" required data-toggle="password" minlength="4" maxlength="21">
              </div>
              <div class="text-left my-2">
                  <b><label for="password1">Renter Password:</label></b>
                  <input class="form-control" id="cpassword" name="cpassword" placeholder="Renter Password" type="password" required data-toggle="password" minlength="4" maxlength="21">
              </div>
              <button type="submit" class="btn btn-success" style="background-color: #FFEA00; color: black;">Buat Akun</button>
            </form>
            <p class="mb-0 mt-1">Sudah punya akun? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Login</a>.</p>
          </div>
        </div>
      </div>
    </div>


