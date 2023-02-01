<?php
session_start();
if (!isset($_SESSION["role"]) || $_SESSION["role"] != "Admin") {
	header("location:index.php");
}
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
					<h1 class="h2">Manage Staffs</h1>
					<div class="btn-toolbar mb-2 mb-md-0">
						<div class="btn-group me-2">
							<button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#newCouseModal">New</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<?php
						require_once("handlers/connection.php");

						?>
						<div class="table-responsive">
							<table id="example" class="table table-striped table-hover">
								<thead>
									<tr>
										<th scope="col">S/N</th>
										<th scope="col">First Name</th>
										<th scope="col">Middle Name</th>
										<th scope="col">Last Name</th>
										<th scope="col">Date of Birth</th>
										<th scope="col">Username</th>
										<th scope="col">Edit/Delete</th>
									</tr>
								</thead>
								<tbody>
									<?php
									try {
										$roleQry = $conn->prepare("SELECT * FROM roles");
										$staffQry = $conn->prepare("SELECT * FROM users u,staffs s,roles r WHERE u.roleID=r.roleID AND u.userID=s.userID");
										$roleQry->execute();
										$staffQry->execute();
										$n = 0;
										while ($res = $staffQry->fetch()) {
									?>
											<tr>
												<th scope="row"><?php echo ++$n; ?></th>
												<td><?php echo $res["firstName"]; ?></td>
												<td><?php echo $res["middleName"]; ?></td>
												<td><?php echo $res["lastName"]; ?></td>
												<td><?php echo date_format(date_create($res["DOB"]), "d F, Y") ?></td>
												<td><?php echo $res["userName"]; ?></td>
												<td>
													<button class="btn btn-sm btn-outline-success">Edit</button>
													<a class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure want to delete?');" href="handlers/deleteCourse.php?cId=<?php echo $res["userID"]; ?>">Delete</a>
												</td>
											</tr>
									<?php
											// echo $res["courseName"];
										}
									} catch (PDOException $e) {
										//throw $th;
									}
									?>

								</tbody>
							</table>
						</div>
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
	<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>

</body>

</html>