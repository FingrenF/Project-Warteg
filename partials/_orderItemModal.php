<?php 
    $itemModalSql = "SELECT * FROM `pesanan` WHERE `id_user`= $id_user";
    $itemModalResult = mysqli_query($conn, $itemModalSql);
    while($itemModalRow = mysqli_fetch_assoc($itemModalResult)){
        $id_pesanan = $itemModalRow['id_pesanan'];
    
?>

<!-- Modal -->
<div class="modal fade" id="orderItem<?php echo $id_pesanan; ?>" tabindex="-1" role="dialog" aria-labelledby="orderItem<?php echo $id_pesanan; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderItem<?php echo $id_pesanan; ?>">Item Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="container">
                    <div class="row">
                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <table class="table text">
                            <thead>
                                <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="px-3">Item</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="text-center">Jumlah</div>
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $mysql = "SELECT * FROM `daftar_pesanan` WHERE id_pesanan = $id_pesanan";
                                    $myresult = mysqli_query($conn, $mysql);
                                    while($myrow = mysqli_fetch_assoc($myresult)){
                                        $menu_id = $myrow['menu_id'];
                                        $jumlah = $myrow['jumlah'];
                                        
                                        $itemsql = "SELECT * FROM `menu` WHERE menu_id = $menu_id";
                                        $itemresult = mysqli_query($conn, $itemsql);
                                        $itemrow = mysqli_fetch_assoc($itemresult);
                                        $nama_menu = $itemrow['nama_menu'];
                                        $harga_menu = $itemrow['harga_menu'];
                                        $deskripsi_menu = $itemrow['deskripsi_menu'];
                                        $kategori_id_menu= $itemrow['kategori_id_menu'];

                                        echo '<tr>
                                                <th scope="row">
                                                    <div class="p-2">
                                                    <img src="img/makanan-'.$menu_id. '.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">'.$nama_menu. '</a></h5><span class="text-muted font-weight-normal font-italic d-block">Rp. ' .$harga_menu. '/-</span>
                                                    </div>
                                                    </div>
                                                </th>
                                                <td class="align-middle text-center"><strong>' .$jumlah. '</strong></td>
                                            </tr>';
                                    }
                                ?>
                            </tbody>
                            </table>
                        </div>
                        <!-- End -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
    }
?>

