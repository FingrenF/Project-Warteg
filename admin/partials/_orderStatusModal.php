<?php 
    $itemModalSql = "SELECT * FROM `pesanan`";
    $itemModalResult = mysqli_query($conn, $itemModalSql);
    while($itemModalRow = mysqli_fetch_assoc($itemModalResult)){
        $id_pesanan = $itemModalRow['id_pesanan'];
        $id_user = $itemModalRow['id_user'];
        $status_pesanan = $itemModalRow['status_pesanan'];
    
?>

<!-- Modal -->
<div class="modal fade" id="status_pesanan<?php echo $id_pesanan; ?>" tabindex="-1" role="dialog" aria-labelledby="status_pesanan<?php echo $id_pesanan; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="status_pesanan<?php echo $id_pesanan; ?>">Status Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_orderManage.php" method="post" style="border-bottom: 2px solid #dee2e6;">
            <div class="text-left my-2">    
                <b><label for="name">Status Pesanan</label></b>
                <div class="row mx-2">
                <input class="form-control col-md-3" id="status" name="status" value="<?php echo $status_pesanan; ?>" type="number" min="0" max="6" required>    
                <button type="button" class="btn btn-secondary ml-1" data-container="body" data-toggle="popover" title="Informasi" data-placement="bottom" data-html="true" 
                data-content="0=Pesanan telah dibuat.<br> 
                             1=Pesanan dikonfirmasi.<br> 
                             2=Pesanan sedang disiapkan.<br> 
                             3=Pesanan sedang diantar.<br> 
                             4=Pesanan telah diterima.<br> 
                             5=Pesanan ditolak.<br> 
                             6=Pesanan dibatalkan">
                    <i class="fas fa-info"></i>
                </button>
                </div>
            </div>
            <input type="hidden" id="id_pesanan" name="id_pesanan" value="<?php echo $id_pesanan; ?>">
            <button type="submit" class="btn btn-success mb-2" name="updateStatus">Update</button>
        </form>
        <?php 
            $pengirimanql = "SELECT * FROM `pengiriman` WHERE `id_pesanan`= $id_pesanan";
            $pengirimanResult = mysqli_query($conn, $pengirimanql);
            $pengirimanRow = mysqli_fetch_assoc($pengirimanResult);
            $trackId = $pengirimanRow['id_pengiriman'];
            $kurir = $pengirimanRow['nama_kurir'];
            $kontak_kurir = $pengirimanRow['kontak_kurir'];
            $lama_waktu = $pengirimanRow['lama_waktu'];
            if($status_pesanan>0 && $status_pesanan<5) { 
        ?>
            <form action="partials/_orderManage.php" method="post">
                <div class="text-left my-2">
                    <b><label for="name">Nama Pengirim</label></b>
                    <input class="form-control" id="name" name="name" value="<?php echo $kurir; ?>" type="text" required>
                </div>
                <div class="text-left my-2 row">
                    <div class="form-group col-md-6">
                        <b><label for="phone">Nomor Telepon</label></b>
                        <input class="form-control" id="phone" name="phone" value="<?php echo $kontak_kurir; ?>" type="tel" required pattern="[0-9]{11}" maxlength="11">
                    </div>
                    <div class="form-group col-md-6">
                        <b><label for="catId">Estimasi pengiriman(menit)</label></b>
                        <input class="form-control" id="time" name="time" value="<?php echo $lama_waktu; ?>" type="number" min="1" max="120" required>
                    </div>
                </div>
                <input type="hidden" id="trackId" name="trackId" value="<?php echo $trackId; ?>">
                <input type="hidden" id="id_pesanan" name="id_pesanan" value="<?php echo $id_pesanan; ?>">
                <button type="submit" class="btn btn-success" name="updatePengiriman">Update</button>
            </form>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php
    }
?>

<style>
    .popover {
        top: -77px !important;
    }
</style>

<script>
    $(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>

