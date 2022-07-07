    <!-- CONTENT -->
    <div class="col-lg-10 bg-white p-4 mt-1">
        <!-- JUDUL TABEL -->
        <?php if ($_SESSION['role']=='admin') { ?>
            <button type="button" class="btn btn-success tombolTambahAturan float-right" data-toggle="modal" data-target="#formModal">Tambah Aturan</button>
        <?php }?>
        <h3><i class="fas fa-file-invoice"></i> BASIS ATURAN</h3>
        <hr>

        <!-- FLASHER -->
        <div>
            <?php Flasher::flash(); ?>
        </div>

        <!-- TABEL -->
        <div class="continer shadow " style="background-color: whitesmoke;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kerusakan</th>
                        <th scope="col">Gejala</th>
                        <?php if ($_SESSION['role']=='admin') { ?>
                            <th scope="col" class="text-center">Aksi</th>
                        <?php }?>
                    </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                    <?php foreach ($data['aturan'] as $aturan) { ?>
                    <tr>
                        <th scope="row"><?= 'R'.$i;?></th>
                        <td><?= $aturan['jenis_kerusakan'];?></td>
                        <td><?= $aturan['nama_gejala'];?></td>
                        <?php if ($_SESSION['role']=='admin') { ?>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                    <button type="button" class="btn bg-primary btn-sm text-white  tombolUbahAturan" data-toggle="modal" data-target="#formModal" data-id='<?= $aturan['id_rule']; ?>'>ubah</button>
                                    <a href="<?= BASEURL; ?>/aturan/hapus/<?= $aturan['id_rule']; ?>" class="btn bg-danger btn-sm text-white " onclick="return confirm('Ingin menghapus aturan tersebut?');">hapus</a>
                                </div>
                            </td>
                        <?php }?>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>     
        </div>
            
        <br><br><br><br><br><br><br><br>  
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Jenis Aturan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?= BASEURL; ?>/aturan/tambahAturan" method='post'>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="kerusakan">Kerusakan</label>
                        <select class="form-control" id="kerusakan" name="kerusakan">
                        <?php foreach ($data['kerusakan'] as $kerusakan) { ?>
                            <option value="<?= $kerusakan['id_kerusakan']; ?>"><?= $kerusakan['jenis_kerusakan']; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gejala">Gejala</label>
                        <select class="form-control" id="gejala" name="gejala">
                        <?php foreach ($data['gejala'] as $gejala) { ?>
                            <option value="<?= $gejala['id_gejala']; ?>"><?= $gejala['nama_gejala']; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Aturan</button>
            </form>
            </div>
        </div>
	</div>
</div>
