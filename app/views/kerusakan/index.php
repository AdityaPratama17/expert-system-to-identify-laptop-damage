
    <!-- CONTENT -->
    <div class="col-lg-10 bg-white p-4 mt-1">
        <!-- JUDUL TABEL -->
        <?php if ($_SESSION['role']=='admin') { ?>
            <button type="button" class="btn btn-success tombolTambahKerusakan float-right" data-toggle="modal" data-target="#formModal">Tambah Jenis Kerusakan</button>
        <?php }?>
        <h3><i class="fas fa-exclamation-triangle"></i> KERUSAKAN</h3>
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
                        <th scope="col">Jenis Kerusakan</th>
                        <?php if ($_SESSION['role']=='admin') { ?>
                            <th scope="col" class="text-center">Aksi</th>
                        <?php }?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    <?php foreach ($data['kerusakan'] as $kerusakan) { ?>
                    <tr>
                        <th scope="row"><?= 'K'.$i;?></th>
                        <td><?= $kerusakan['jenis_kerusakan'];?></td>
                        <?php if ($_SESSION['role']=='admin') { ?>
                            <td class="text-center">
                                <button type="button" class="btn bg-primary btn-sm text-white rounded border-0 tombolUbahKerusakan" data-toggle="modal" data-target="#formModal" data-id='<?= $kerusakan['id_kerusakan']; ?>'>ubah</button>
                                <a href="<?= BASEURL; ?>/kerusakan/hapus/<?= $kerusakan['id_kerusakan']; ?>" class="btn bg-danger btn-sm text-white rounded border-0" onclick="return confirm('Ingin menghapus kerusakan tersebut?');">hapus</a>
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
                <h5 class="modal-title" id="formModalLabel">Tambah Jenis Kerusakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?= BASEURL; ?>/kerusakan/tambahKerusakan" method='post'>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="kerusakan">Jenis Kerusakan</label>
                        <input type="text" class="form-control" id="kerusakan" name="kerusakan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Kerusakan</button>
            </form>
            </div>
        </div>
	</div>
</div>