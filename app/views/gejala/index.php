
    <!-- CONTENT -->
    <div class="col-lg-10 bg-white p-4 mt-1">
        <!-- JUDUL TABEL -->
        <?php if ($_SESSION['role']=='admin') { ?>
            <button type="button" class="btn btn-success tombolTambahGejala float-right" data-toggle="modal" data-target="#formModal">Tambah Gejala</button>
        <?php }?>
        <h3><i class="fas fa-book-medical mr-2"></i> GEJALA</h3>
        <hr>

        <!-- FLASHER -->
        <div>
            <?php Flasher::flash(); ?>
        </div>
        
        <!-- TABEL -->
        <div class="continer shadow" style="background-color: whitesmoke;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gejala Kerusakan</th>
                        <th scope="col">Bobot Pakar</th>
                        <?php if ($_SESSION['role']=='admin') { ?>
                            <th scope="col" class="text-center">Aksi</th>
                        <?php }?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['gejala'] as $gejala) { ?>
                    <tr>
                        <th scope="row"><?= 'G'.$gejala['id_gejala'];?></th>
                        <td><?= $gejala['nama_gejala'];?></td>
                        <td><?= $gejala['keterangan'];?></td>
                        <?php if ($_SESSION['role']=='admin') { ?>
                            <td class="text-center">
                                <button type="button" class="btn bg-primary btn-sm text-white rounded border-0 tombolUbahGejala" data-toggle="modal" data-target="#formModal" data-id='<?= $gejala['id_gejala']; ?>'>ubah</button>
                                <!-- <button type="button" class="btn bg-danger btn-sm text-white rounded border-0">hapus</button> -->
                                <a href="<?= BASEURL; ?>/gejala/hapus/<?= $gejala['id_gejala']; ?>" class="btn bg-danger btn-sm text-white rounded border-0" onclick="return confirm('Ingin menghapus gejala tersebut?');">hapus</a>
                            </td>
                        <?php }?>
                    </tr>
                    <?php } ?>
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
			<h5 class="modal-title" id="formModalLabel">Tambah Gejala</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<form action="<?= BASEURL; ?>/gejala/tambahGejala" method='post'>
			<input type="hidden" name="id" id="id">
			<div class="form-group">
				<label for="gejala">Nama Gejala</label>
				<input type="text" class="form-control" id="gejala" name="gejala">
			</div>
            <div class="form-group">
                <label for="bobot">Bobot</label>
                <select class="form-control" id="bobot" name="bobot">
                <?php foreach ($data['bobot'] as $bobot) { ?>
                    <option value="<?= $bobot['id_bobot']; ?>"><?= $bobot['keterangan']; ?></option>
                <?php } ?>
                </select>
            </div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Tambah Gejala</button>
		</div>
		</div>
		</form>
	</div>
</div>