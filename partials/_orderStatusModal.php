<style>
    /* .modal-body {
        background-color: #eeeeee;
        font-family: 'Open Sans', serif
    } */

    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 0.10rem
    }

    .card-header:first-child {
        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1)
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background: #FF5722
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background: #ee5435;
        color: #fff
    }

    .track .step.deactive:before {
        background: #030303;
    }

    .track .step.deactive .icon {
        background: #030303;
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }

    .btn-warning {
        color: #ffffff;
        background-color: #ee5435;
        border-color: #ee5435;
        border-radius: 1px
    }

    .btn-warning:hover {
        color: #ffffff;
        background-color: #ff2b00;
        border-color: #ff2b00;
        border-radius: 1px
    }
    
</style>
<?php 
    $statusmodalsql = "SELECT * FROM `pesanan` WHERE `id_user`= $id_user";
    $statusmodalresult = mysqli_query($conn, $statusmodalsql);
    while($statusmodalrow = mysqli_fetch_assoc($statusmodalresult)){
        $id_pesanan = $statusmodalrow['id_pesanan'];
        $status = $statusmodalrow['status_pesanan'];
        if ($status == 0) 
            $tstatus = "Pesanan telah dibuat";
        elseif ($status == 1) 
            $tstatus = "Pesanan dikonfirmasi.";
        elseif ($status == 2)
            $tstatus = "Pesanan sedang disiapkan.";
        elseif ($status == 3)
            $tstatus = "Pesanan sedang diantar.";
        elseif ($status == 4) 
            $tstatus = "Pesanan telah diterima.";
        elseif ($status == 5) 
            $tstatus = "Pesanan ditolak";
        else
            $tstatus = "Pesanan dibatalkan.";

        if($status >= 1 && $status <= 4) {
            $deliverydetailsql = "SELECT * FROM `pengiriman` WHERE `id_pesanan`= $id_pesanan";
            $deliveryDetailResult = mysqli_query($conn, $deliverydetailsql);
            $deliveryDetailRow = mysqli_fetch_assoc($deliveryDetailResult);
            $trackId = $deliveryDetailRow['id_pengiriman'];
            $nama_kurir = $deliveryDetailRow['nama_kurir'];
            $kontak_kurir = $deliveryDetailRow['kontak_kurir'];
            $lama_waktu = $deliveryDetailRow['lama_waktu'];
            if($status == 4)
                $lama_waktu = '30';
        }
        else {
            $trackId = 'xxxxx';
            $nama_kurir = '';
            $kontak_kurir = '';
            $lama_waktu = 'xx';
        }

?>
<!-- Modal -->
<div class="modal fade" id="status_pesanan<?php echo $id_pesanan; ?>" tabindex="-1" role="dialog" aria-labelledby="status_pesanan<?php echo $id_pesanan; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="status_pesanan<?php echo $id_pesanan; ?>">Status Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="printThis">
                <div class="container" style="padding-right: 0px;padding-left: 0px;">
                    <article class="card">
                        <div class="card-body">
                            <h6><strong>Id Pesanan:</strong> #<?php echo $id_pesanan; ?></h6>
                            <article class="card">
                                <div class="card-body row">
                                    <div class="col"> <strong>Estimasi Pengiriman:</strong> <br><?php echo $lama_waktu; ?> minute </div>
                                    <div class="col"> <strong>Nama Pengirim:</strong> <br> <?php echo $nama_kurir; ?> | <i class="fa fa-phone"></i> <?php echo $kontak_kurir; ?> </div>
                                    <div class="col"> <strong>Status:</strong> <br> <?php echo $tstatus; ?> </div>
                                    <div class="col"> <strong>Tracking #:</strong> <br> <?php echo $trackId; ?> </div>
                                </div>
                            </article>
                            <div class="track">
                            <?php
                                if($status == 0){
                                      echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pesanan dibuat</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Pesanan dikonfirmasi</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Pesanan disiapkan</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Pesanan diantar</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Pesanan tiba</span> </div>';
                                }
                                elseif($status == 1){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pesanan dibuat</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pesanan dikonfirmasi</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Pesanan disiapkan</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Pesanan diantar</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Pesanan tiba</span> </div>';
                                }
                                elseif($status == 2){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pesanan dibuat</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pesanan dikonfirmasi</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pesanan disiapkan</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Pesanan diantar</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Pesanan tiba</span> </div>';
                                }
                                elseif($status == 3){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pesanan dibuat</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pesanan dikonfirmasi</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pesanan disiapkan</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Pesanan diantar</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Pesanan tiba</span> </div>';
                                }
                                elseif($status == 4){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pesanan dibuat</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pesanan dikonfirmasi</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pesanan disiapkan</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Pesanan diantar</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Pesanan tiba</span> </div>';
                                } 
                                elseif($status == 5){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pesanan dibuat</span> </div>
                                          <div class="step deactive"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pesanan ditolak</span> </div>';
                                }
                                else {
                                    echo '<div class="step deactive"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pesanan dibatalkan</span> </div>';
                                }
                            ?>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>


