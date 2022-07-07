<!DOCTYPE html>
<html>
<head>
	<title><?= $data['judul']; ?></title>
	<link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?= BASEURL; ?>/css/styles.css">
	<script src="https://kit.fontawesome.com/fe118aecdc.js" crossorigin="anonymous"></script>
</head>
<body style="background-color: whitesmoke;">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="<?= BASEURL;?>/dashboard/index.php"><b>SISTEM PAKAR</b> | DIAGNOSA KERUSAKAN LAPTOP</a>

		<!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
			<div class="icon ml-auto mt-2">
				<h6><a href="<?= BASEURL; ?>/login/logout" class="text-white" style="text-decoration: none;">SIGN OUT <i class="fas fa-sign-out-alt" data-toggle="tooltip" title="Sign Out"></i></a></h6>
			</div>

		<!-- </div> -->
	</nav>

	<div class="row no-gutters mt-5">
    <!-- SIDEBAR -->
    <div class="col-lg-2 p-3" style="background-color: whitesmoke;">
        <ul class="nav flex-column mt-2 font-weight-bold">
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?= BASEURL;?>/dashboard/index.php"><i class="fas fa-home mr-2"></i> Dashboard</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?= BASEURL;?>/gejala/index.php"><i class="fas fa-book-medical mr-2"></i> Gejala</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?= BASEURL;?>/kerusakan/index.php"><i class="fas fa-exclamation-triangle mr-2"></i> Kerusakan</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?= BASEURL;?>/aturan/index.php"><i class="fas fa-file-invoice mr-2"></i> Basis Aturan</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?= BASEURL;?>/riwayat/index.php"><i class="fas fa-file-signature mr-2"></i> Riwayat</a><hr>
            </li>
            <?php if ($_SESSION['role']=='admin') { ?>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="<?= BASEURL;?>/admin/index.php"><i class="fas fa-user-cog mr-2"></i> Daftar Admin</a><hr>
                </li>
            <?php }?>
            
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?= BASEURL; ?>/login/logout"><i class="fas fa-sign-out-alt mr-2"></i> Sign Out</a><hr>
            </li>
        </ul>
    </div>