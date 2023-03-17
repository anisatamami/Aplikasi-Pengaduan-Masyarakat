<!doctype html>
<html lang="en">
  <head>
  	<title>APM Desa Tundagan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="/css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(/images/ng.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Selamat datang Di Aplikasi Pengaduan Masyarakat Desa Tundagan</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<form class="form-signin" method="POST" action="/login">
				  <?php if(session()->getFlashdata('msg')):?>
				  <div class="alert alert-success" ><?= session()->getFlashdata('msg') ?></div>
				  <?php endif;?> 
		      		<div class="form-group">
		      			<input name="txtUsername" type="text" class="form-control" placeholder="Username" required>
		      		</div>
	            <div class="form-group">
	              <input name="txtPassword" id="password-field" type="password" class="form-control" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Masuk</button>
	            </div>
	            <div class="w-50">
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; Belum punya akun? &mdash;</p>
				  </br>
	          	<p class="w-99 text-center"><a href="/register" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Registrasi disini</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>
