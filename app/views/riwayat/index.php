
    <!-- CONTENT -->
    <div class="col-lg-10 bg-white p-4 mt-1">
        <!-- JUDUL TABEL -->
        <h3><i class="fas fa-file-signature"></i> RIWAYAT</h3><hr>

        <!-- FLASHER -->
        <div>
            <?php Flasher::flash(); ?>
        </div>

        <!-- TABEL -->
        <div class="continer shadow " style="background-color: whitesmoke;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Jumlah Gejala</th>
                        <th scope="col">Jenis Kerusakan</th>
                        <th scope="col" class="text-center">Nilai CF</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    <?php foreach ($data['riwayat'] as $riwayat) { ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $i;?></th>
                        <th class="text-center"><?= $riwayat['jum'];?></th>
                        <th><?= $riwayat['jenis_kerusakan'];?></th>
                        <td class="text-center"><?= round($riwayat['nilai_cf'],2)*100;?>%</td>
                        <td class="text-center">
                            <a href="<?= BASEURL;?>/riwayat/detail/<?= $riwayat['id_riwayat'];?>" class=" bg-primary btn-sm text-white rounded border-0">detail</a>
			    		    <a href="<?= BASEURL; ?>/riwayat/hapus/<?= $riwayat['id_riwayat']; ?>" class="btn bg-danger btn-sm text-white rounded border-0" onclick="return confirm('Ingin menghapus riwayat tersebut?');">hapus</a>

                        </td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>     
        </div>
            
        <br><br><br><br><br><br><br><br>  
    </div>
</div>
