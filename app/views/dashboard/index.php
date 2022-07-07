
    <!-- CONTENT -->
    <div class="col-lg-10 bg-white p-4 mt-1">
        <!-- JUMBOTRON -->
        <div class="jumbotron shadow text-white text-center">
            <h2 class="font-weight-light">SISTEM PAKAR</h2>
            <h1 class="display-4 font-weight-bold">DIAGNOSA KERUSAKAN LAPTOP</h1>
            <hr class="my-4 bg-white w-25">
            <p class="h5 font-weight-light mb-4"><i>let's check your laptop now</i></p>
            <a class="btn btn-light btn-md" href="<?= BASEURL;?>/diagnosis/index.php" role="button">MULAI KONSULTASI <i class="fas fa-angle-double-right"></i></a>
        </div>

        <!-- CARD -->
        <div class="row d-flex justify-content-center">
            <div class="card bg-primary ml-3 mr-3 mb-3" style="width: 14rem; height: 9rem;">
                <div class="card-body text-white">
                    <div class="card-body-icon">
                        <i class="fas fa-book-medical"></i>
                    </div>
                    <h5 class="card-title ml-2">Total Gejala</h5>
                    <div class="display-4 font-weight-bold ml-2"><?= $data['gejala'];?></div>
                    <a href="<?= BASEURL;?>/gejala/index.php" class="btn btn-primary btn-sm text-white">lihat detail <i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
        
            <div class="card bg-danger ml-3 mr-3 mb-3" style="width: 14rem; height: 9rem;">
                <div class="card-body text-white">
                    <div class="card-body-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h5 class="card-title ml-2">Total Kerusakan</h5>
                    <div class="display-4 font-weight-bold ml-2"><?= $data['kerusakan'];?></div>
                    <a href="<?= BASEURL;?>/kerusakan/index.php" class="btn btn-danger btn-sm">lihat detail <i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
        
            <div class="card bg-success ml-3 mr-3 mb-3" style="width: 14rem; height: 9rem;">
                <div class="card-body text-white">
                    <div class="card-body-icon">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <h5 class="card-title ml-2">Total Aturan</h5>
                    <div class="display-4 font-weight-bold ml-2"><?= $data['rule'];?></div>
                    <a href="<?= BASEURL;?>/aturan/index.php" class="btn btn-success btn-sm">lihat detail <i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>

            <div class="card bg-info ml-3 mr-3 mb-3" style="width: 14rem; height: 9rem;">
                <div class="card-body text-white">
                    <div class="card-body-icon">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <h5 class="card-title ml-2">Total Riwayat</h5>
                    <div class="display-4 font-weight-bold ml-2"><?= $data['riwayat'];?></div>
                    <a href="<?= BASEURL;?>/riwayat/index.php" class="btn btn-info btn-sm">lihat detail <i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
            
        <br><br><br><br> 
    </div>
</div>
