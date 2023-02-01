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
					<div>Profile
					</div>
					<div>
						<button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<?php
						require_once("handlers/connection.php");

						?>
						<?php
						try {
							$query = $conn->prepare("SELECT * FROM users u,staffs s,roles r WHERE u.userID=s.userID AND u.roleID=r.roleID AND u.userName=:name");
							$user = $_SESSION["user"];
							$query->execute(array(":name" => $user));
							$res = $query->fetch();
						?>
							<div class="card">
								<img src="<?php echo 'assets/profile/' . $res["profile"]; ?>" alt="" class="img rounded-circle img-thumbnail d-block mx-auto my-2" style="width: 200px;height: 200px;">
								<button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#newProfileModal">Change Profile Picture</button>
							</div>
							<div class="row my-3">
								<div class="col-lg-6 col-12">
									<div class="card">
										<div class="card-header">
											<h5 class="card-title">Personal Details</h5>
										</div>
										<div class="card-body">
											<table class="table table-hover">
												<tr>
													<th>Full Name</th>
													<td><?php echo $res["firstName"] . " " . $res["middleName"] . " " . $res["lastName"]; ?></td>
												</tr>
												<tr>
													<th>Date of Birth</th>
													<td><?php echo date_format(date_create($res["DOB"]), " l, d F, Y") ?></td>
												</tr>
											</table>
											<button class="btn btn-outline-primary btn-sm w-25">Edit</button>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-12">
									<div class="card">
										<div class="card-header">
											<h5 class="card-title">Account Details</h5>
										</div>
										<div class="card-body">
											<table class="table table-hover">
												<tr>
													<th>Username</th>
													<td><?php echo $res["userName"]; ?></td>
												</tr>
												<tr>
													<th>Role</th>
													<td><?php echo $res["roleDescription"]; ?></td>
												</tr>
											</table>
											<button class="btn btn-outline-primary btn-sm w-25">Edit</button>
										</div>
									</div>
								</div>
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

	<div class="modal fade" id="newProfileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newProfileModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newProfileModalLabel">New Profile Picture</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="handlers/uploadProfile.php" method="POST" enctype="multipart/form-data">
						<div class="mb-3">
							<label for="profile">Upload Profile</label>
							<input type="file" class="form-control form-control-lg" accept="image/png,image/jpeg" required id="profile" name="profile" placeholder="asfas">
						</div>
						<button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Save</button>
					</form>
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="editProfileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="handlers/updateProfile.php" method="POST">
					<input type="hidden" value="<?php echo $res["staffID"]; ?>" class="form-control" id="staffID" name="staffID" placeholder="First Name" required>
						<div class="form-floating mb-3">
							<input type="text" value="<?php echo $res["firstName"]; ?>" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
							<label for="firstName">First Name</label>
						</div>
						<div class="form-floating mb-3">
							<input type="text" value="<?php echo $res["middleName"]; ?>" class="form-control" id="middleName" name="middleName" placeholder="Middle Name" required>
							<label for="middleName">Middle Name</label>
						</div>
						<div class="form-floating mb-3">
							<input type="text" value="<?php echo $res["lastName"]; ?>" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
							<label for="lastName">Last Name</label>
						</div>
						<div class="form-floating mb-3">
							<input type="date" value="<?php echo $res["DOB"]; ?>" class="form-control" id="dob" name="dob" placeholder="Date of Birth" required>
							<label for="dob">Date of Birth</label>
						</div>
						<button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Save</button>
					</form>
				</div>
				<div class="modal-footer">
				</div>
			</div>
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