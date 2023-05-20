<div class="container-fluid" style="margin-top:98px">
    
    <div class="col-lg-12">
        <div class="row">
            <!-- FORM Panel -->
            <div class="col-md-4">
            <form action="partials/_menuManage.php" method="post" enctype="multipart/form-data">
                <div class="card mb-3">
                    <div class="card-header" style="background-color: rgb(111 202 203);">
                        Menambah Item Baru
                    </div>
                    <div class="card-body">
                            <div class="form-group">
                                <label class="control-label">Nama: </label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Deskripsi: </label>
                                <textarea cols="30" rows="3" class="form-control" name="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Harga</label>
                                <input type="number" class="form-control" name="price" required min="1">
                            </div>  
                            <div class="form-group">
                                <label class="control-label">Kategori: </label>
                                <select name="categoryId" id="categoryId" class="custom-select browser-default" required>
                                <option hidden disabled selected value>None</option>
                                <?php
                                    $catsql = "SELECT * FROM `kategori`"; 
                                    $catresult = mysqli_query($conn, $catsql);
                                    while($row = mysqli_fetch_assoc($catresult)){
                                        $catId = $row['kategori_id'];
                                        $catName = $row['nama_kategori'];
                                        echo '<option value="' .$catId. '">' .$catName. '</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="image" class="control-label">Gambar</label>
                                <input type="file" name="image" id="image" accept=".jpg" class="form-control" required style="border:none;">
                                <small id="Info" class="form-text text-muted mx-3">Upload gambar .jpg</small>
                            </div>
                    </div>
                            
                    <div class="card-footer">
                        <div class="row">
                            <div class="mx-auto">
                                <button type="submit" name="createItem" class="btn btn-sm btn-primary"> Create </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <!-- FORM Panel -->

            <!-- Table Panel -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover mb-0">
                            <thead style="background-color: rgb(111 202 203);">
                                <tr>
                                    <th class="text-center" style="width:7%;">Cat. Id</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center" style="width:58%;">Detil Item</th>
                                    <th class="text-center" style="width:18%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT * FROM `menu`";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $menu_id = $row['menu_id'];
                                    $nama_menu = $row['nama_menu'];
                                    $harga_menu = $row['harga_menu'];
                                    $deskripsi_menu = $row['deskripsi_menu'];
                                    $kategori_id_menu = $row['kategori_id_menu'];

                                    echo '<tr>
                                            <td class="text-center">' .$kategori_id_menu. '</td>
                                            <td>
                                                <img src="/Project Warteg/img/makanan-'.$menu_id. '.jpg" alt="image for this item" width="150px" height="150px">
                                            </td>
                                            <td>
                                                <p>Nama : <b>' .$nama_menu. '</b></p>
                                                <p>Deskripsi : <b class="truncate">' .$deskripsi_menu. '</b></p>
                                                <p>Harga : <b>' .$harga_menu. '</b></p>
                                            </td>
                                            <td class="text-center">
                                                <div class="row mx-auto" style="width:112px">
                                                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#updateItem' .$menu_id. '">Edit</button>
                                                    <form action="partials/_menuManage.php" method="POST">
                                                        <button name="removeItem" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
                                                        <input type="hidden" name="menu_id" value="'.$menu_id. '">
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>';
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table Panel -->
        </div>
    </div>  
</div>

<?php 
    $menuSql = "SELECT * FROM `menu`";
    $menuResult = mysqli_query($conn, $menuSql);
    while($menuRow = mysqli_fetch_assoc($menuResult)){
        $menu_id = $menuRow['menu_id'];
        $nama_menu = $menuRow['nama_menu'];
        $harga_menu = $menuRow['harga_menu'];
        $kategori_id_menu = $menuRow['kategori_id_menu'];
        $deskripsi_menu = $menuRow['deskripsi_menu'];
?>

<!-- Modal -->
<div class="modal fade" id="updateItem<?php echo $menu_id; ?>" tabindex="-1" role="dialog" aria-labelledby="updateItem<?php echo $menu_id; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="updateItem<?php echo $menu_id; ?>">Item Id: <?php echo $menu_id; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_menuManage.php" method="post" enctype="multipart/form-data">
            <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
                <div class="form-group col-md-8">
                    <b><label for="image">Gambar</label></b>
                    <input type="file" name="itemimage" id="itemimage" accept=".jpg" class="form-control" required style="border:none;" onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
                    <small id="Info" class="form-text text-muted mx-3">Upload gambar .jpg</small>
                    <input type="hidden" id="menu_id" name="menu_id" value="<?php echo $menu_id; ?>">
                    <button type="submit" class="btn btn-success my-1" name="updateItemPhoto">Update Img</button>
                </div>
                <div class="form-group col-md-4">
                    <img src="/Project Warteg/img/makanan-<?php echo $menu_id; ?>.jpg" id="itemPhoto" name="itemPhoto" alt="item image" width="100" height="100">
                </div>
            </div>
        </form>
        <form action="partials/_menuManage.php" method="post">
            <div class="text-left my-2">
                <b><label for="name">Nama</label></b>
                <input class="form-control" id="name" name="name" value="<?php echo $nama_menu; ?>" type="text" required>
            </div>
            <div class="text-left my-2 row">
                <div class="form-group col-md-6">
                    <b><label for="price">Harga</label></b>
                    <input class="form-control" id="price" name="price" value="<?php echo $harga_menu; ?>" type="number" min="1" required>
                </div>
                <div class="form-group col-md-6">
                    <b><label for="catId">Kategori Id</label></b>
                    <input class="form-control" id="catId" name="catId" value="<?php echo $kategori_id_menu; ?>" type="number" min="1" required>
                </div>
            </div>
            <div class="text-left my-2">
                <b><label for="desc">Deskripsi</label></b>
                <textarea class="form-control" id="desc" name="desc" rows="2" required minlength="6"><?php echo $deskripsi_menu; ?></textarea>
            </div>
            <input type="hidden" id="menu_id" name="menu_id" value="<?php echo $menu_id; ?>">
            <button type="submit" class="btn btn-success" name="updateItem">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
    }
?>

