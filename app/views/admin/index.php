

    <!-- CONTENT -->
    <div class="col-lg-10 bg-white p-4 mt-1">
        <!-- JUDUL TABEL -->
        <button type="button" class="btn btn-success tombolTambahAdmin float-right" data-toggle="modal" data-target="#formModal">Tambah Admin</button>
        <h3><i class="fas fa-user-cog"></i> ADMIN</h3>
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
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                    <?php foreach ($data['admin'] as $admin) { ?>
                    <tr>
                        <th scope="row"><?= $i;?></th>
                        <td><?= $admin['nama_user'];?></td>
                        <td><?= $admin['username'];?></td>
                        <td><?= $admin['email'];?></td>
                        <td class="text-center">
                            <a href="<?= BASEURL; ?>/admin/hapus/<?= $admin['id_user']; ?>" class="btn bg-danger btn-sm text-white " onclick="return confirm('Ingin menghapus admin tersebut?');">hapus</a>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>     
        </div>
            
        <br><br><br><br><br><br><br><br>  
    </div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="formModalLabel">Tambah Admin</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<form action="<?= BASEURL; ?>/admin/tambahAdmin" method='post'>
			<input type="hidden" name="id" id="id">
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" class="form-control" id="nama" name="nama">
			</div>
			<div class="form-group">
				<label for="uname">Username</label>
				<input type="text" class="form-control" id="uname" name="uname">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email">
			</div>
			<div class="form-group">
				<label for="pw">Password</label>
				<input type="text" class="form-control" id="pw" name="pw">
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Tambah Admin</button>
		</div>
		</div>
		</form>
	</div>
</div>
