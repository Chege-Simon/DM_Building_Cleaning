<?php
	//starting the session
	session_start();
	
	if(!isset($_SESSION['user'])){
		header('location: ../login.php');
	}
?>
<?php
	//include our connection
	include 'dbconfig.php';

	//get the row of selected id
	$sql = "SELECT review_id, * FROM reviews WHERE review_id = '".$_GET['id']."'";
	$query = $db->query($sql);
	$row = $query->fetchArray();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dm Gebäudereinigung</title>
  <meta content="Home and Office Cleaning Services" name="description">
  <meta content="Home and Office Cleaning Services" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logo.png" rel="icon">
  <link href="../assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex flex-wrap gap-2 align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:dmgebaudereinigung1@gmail.com">dmgebaudereinigung1@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center"><a href="tel:+49 1708 990200">+49 1708 990200</a></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </section>
	<!-- As a heading -->
	<nav class="navbar navbar-light bg-light py-2 px-1">
		<div class="container">
			<a href="../index.html">
			<img src="../assets/img/logo.png" alt="logo" width="60" height="48">
			</a>
			<span class="navbar-brand mb-0 h1">DM Building Cleaning Reviews Admin</span>
		</div>
	</nav>
	<div style="height: 55vh">
		<form method="POST" class="container mt-3">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4 card">
					<div class="card-header">
						Edit Review:
					</div>
					<div class="card-body">
						<h5 class="card-title">
							<a href="index.php">Back</a>
						</h5>
						<div class="mb-3">
							<label for="firstname" class="form-label">Firstname:</label>
							<input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $row['firstname']; ?>">
						</div>
						<div class="mb-3">
							<label for="lastname" class="form-label">Lastname:</label>
							<input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $row['lastname']; ?>">
						</div>
						<div class="mb-3">
							<label for="location" class="form-label">location:</label>
							<input type="text" class="form-control" name="location" id="location" value="<?php echo $row['location']; ?>">
						</div>
						<div class="mb-3">
							<label for="review_message" class="form-label">Review Message:</label>
							<textarea type="text" class="form-control" name="review_message" id="review_message" row="3"><?php echo $row['review_message']; ?></textarea>
						</div>
						<button type="submit" name="save" value="Save" class="btn btn-primary">Submit</button>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</form>
	</div>
	<?php
		if(isset($_POST['save'])){
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$location = $_POST['location'];
			$review_message = $_POST['review_message'];
			
			//update our table
			$sql = "UPDATE reviews SET firstname = '$firstname', lastname = '$lastname', location = '$location', review_message = '$review_message' WHERE review_id = '".$_GET['id']."'";
			$db->exec($sql);

			header('location: index.php');
		}
	?>
	<hr>

	<!-- ======= Footer ======= -->
	<footer id="footer">
		
		<div class="footer-top">
		<div class="container">
			<div class="row">

			<div class="col-lg-3 col-md-6 footer-contact">
				<h3>Dm Gebäudereinigung<span>.</span></h3>
				<p>
				Germany <br>
				Hanhover<br>
				Kassel <br><br>
				<strong>Phone:</strong> <a href="tel:+49 1708 990200">+49 1708 990200</a><br>
				<strong>Email:</strong>dmgebaudereinigung1@gmail.com<br>
				</p>
			</div>

			<div class="col-lg-3 col-md-6 footer-links">
				<h4>Useful Links</h4>
				<ul>
				<li><i class="bx bx-chevron-right"></i> <a class="navlink scrollto" href="#hero">Heim</a></li>
				<li><i class="bx bx-chevron-right"></i> <a class="navlink scrollto" href="#about">Über uns</a></li>
				<li><i class="bx bx-chevron-right"></i> <a class="navlink scrollto" href="#services">Dienstleistungen</a></li>
				<li><i class="bx bx-chevron-right"></i> <a class="navlink scrollto" href="#">Nutzungsbedingungen</a></li>
				<!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li> -->
				</ul>
			</div>

			<div class="col-lg-3 col-md-6 footer-links">
				<h4>Unsere Dienstleistungen</h4>
				<ul>
				<li><i class="bx bx-chevron-right"></i> <a href="#">Wohnungsreinigung</a></li>
				<li><i class="bx bx-chevron-right"></i> <a href="#">Gewerbliche Reinigung</a></li>
				<li><i class="bx bx-chevron-right"></i> <a href="#">Spezialisierte Dienstleistungen</a></li>
				</ul>
			</div>

			<div class="col-lg-3 col-md-6 footer-links">
				<h4>Unsere sozialen Netzwerke</h4>
				<p>Kontaktieren Sie uns gerne unter Unsere sozialen Netzwerke</p>
				<div class="social-links mt-3">
				<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
				<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
				<a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
				<a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
				<a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
				</div>
			</div>

			</div>
		</div>
		</div>

		<div class="container py-4">
		<div class="copyright">
			&copy; Urheberrechte <strong><span>Dm Gebäudereinigung</span></strong>. Alle Rechte vorbehalten
		</div>
		<div class="credits">
			Entworfen von <a href="https://bootstrapmade.com/">Dev Kim</a>
		</div>
		</div>
	</footer><!-- End Footer -->
	
		

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>
</html>