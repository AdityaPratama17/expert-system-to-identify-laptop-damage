<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?= BASEURL; ?>/css/login.css">
	<script src="https://kit.fontawesome.com/fe118aecdc.js" crossorigin="anonymous"></script>
</head>
<body style="background-color: whitesmoke;">

<div class="container bg-white shadow text-center">
    <h5 class="mb-4">Sign into your account</h5>
    <form action="<?= BASEURL; ?>/login/cekLogin" method='post'>
        <div class="form-group mb-4">
            <input type="text" class="form-control p-4" id="uname" name='uname' aria-describedby="emailHelp" placeholder="username">
        </div>
        <div class="form-group mb-4">
            <input type="password" class="form-control p-4" id="pw" name='pw' placeholder="*******">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-outline-dark p-2">LOGIN</button>
        </div>
    </form>
    <p>Don't have an account? <a href="<?= BASEURL; ?>/login/regis">Register here.</a></p>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
<script src="<?= BASEURL; ?>/js/scripts.js"></script>
</body>
</html>