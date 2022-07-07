
    <!-- CONTENT -->
    <div class="col-lg-10 bg-white p-4 mt-1">
        <!-- JUDUL TABEL -->
        <h3><i class="fas fa-file-medical mr-2"></i> DETAIL RIWAYAT</h3><hr>

        <div class="container shadow" style="background-color: whitesmoke;">
            <div class="row">
                <div class="col-md-6 p-4">
                    <table class="table table-borderless table-sm">
                        <tr>
                            <th scope="col">Nama</th>
                            <td>:</td>
                            <td scope="col"><?= $data['nama'];?></td>
                        </tr>
                        <tr>
                            <th scope="col">Jenis Kerusakan</th>
                            <td>:</td>
                            <td scope="col"><?= $data['detail'][0]['jenis_kerusakan'];?></td>
                        </tr>
                        <tr>
                            <th scope="col">Nilai Kepastian (CF)</th>
                            <td>:</td>
                            <td scope="col"><?= round($data['detail'][0]['nilai_cf'],2)*100;?>%</td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div class="card shadow">
                <div class="card-header">
                    Gejala Kerusakan
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id Gejala</th>
                                <th scope="col">Gejala Kerusakan</th>
                                <th scope="col" >Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['detail'] as $d) { ?>
                            <tr>
                                <th scope="row"><?= 'G'.$d['id_gejala'];?></th>
                                <td><?= $d['nama_gejala'];?></td>
                                <td><?= $d['keterangan'];?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <br>
        </div>            
        <br><br><br><br><br><br><br><br>  
    </div>
</div>
