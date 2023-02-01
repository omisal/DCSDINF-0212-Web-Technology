<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
	<?php require_once("page_title.php"); ?>
</head>

<body>

	<?php
	include_once("header.php");
	?>

	<div class="container-fluid">
		<div class="row">
			<?php
			include_once("nav.php");
			?>

			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<div>Dashboard
					</div>
					<div></div>
				</div>
				<div class="row">
					<div class="col-12">
						<?php
						try {
							$query = $conn->prepare("SELECT * FROM users u,staffs s,roles r WHERE u.userID=s.userID AND u.roleID=r.roleID AND u.userName=:name");
							$user = $_SESSION["user"];
							$query->execute(array(":name" => $user));
							$res = $query->fetch();
						?>
							<div class="alert alert-success" role="alert">
								<h1 class="alert-heading">Hello <?php echo $res["firstName"]; ?>!</h1>
								<p>Welcome back to <strong>Course Allocation Portal</strong>.</p>
								<hr>
								<p class="mb-0">You were last logged in as <strong><?php echo $res["roleDescription"]; ?></strong> on 
								<strong><?php echo date_format(date_create($res["lastLogin"])," l, d F, Y H:i:s"); ?></strong>.</p>
							</div>
						<?php

						} catch (PDOException $e) {
							//throw $th;
						}
						?>
					</div>
				</div>
			</main>
		</div>
	</div>


	<script src="assets\js\bootstrap.bundle.min.js"></script>

	<!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
         -->
	</script>
	<script src=assets\js\dashboard.js"></script>
	</script>
	<script src=assets\js\jquery-3.6.3.min.js"></script>
</body>

</html>