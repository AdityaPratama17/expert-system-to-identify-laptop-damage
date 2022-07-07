<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?= BASEURL; ?>/css/login.css">
	<script src="https://kit.fontawesome.com/fe118aecdc.js" crossorigin="anonymous"></script>
</head>
<body style="background-color: whitesmoke;">

<div class="container bg-white shadow text-center regis">
    <h5 class="mb-4">Create new account</h5>
    <form action="<?= BASEURL; ?>/login/registrasi" method='post'>
        <div class="form-group mb-4">
            <input type="text" class="form-control p-4" id="uname" name='uname' aria-describedby="emailHelp" placeholder="username">
        </div>
        <div class="form-group mb-4">
            <input type="text" class="form-control p-4" id="nama" name='nama' aria-describedby="emailHelp" placeholder="your name">
        </div>
        <div class="form-group mb-4">
            <input type="email" class="form-control p-4" id="email" name='email' aria-describedby="emailHelp" placeholder="your email">
        </div>
        <div class="form-group mb-4">
            <input type="password" class="form-control p-4" id="pw" name='pw' placeholder="password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-outline-dark p-2">REGISTER</button>
        </div>
    </form>
    <p>Already have an account? <a href="<?= BASEURL; ?>/login">Login here.</a></p>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
<script src="<?= BASEURL; ?>/js/scripts.js"></script>
</body>
</html>