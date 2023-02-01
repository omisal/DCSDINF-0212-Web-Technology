<?php
require_once("handlers/connection.php");
try {
	$query = $conn->prepare("SELECT * FROM users u,staffs s,roles r WHERE u.userID=s.userID AND u.roleID=r.roleID AND u.userName=:name");
	$user = $_SESSION["user"];
	$query->execute(array(":name" => $user));
	$res = $query->fetch();
} catch (PDOException $e) {
	//throw $th;
}
?>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
	<img src="<?php echo 'assets/profile/' . $res["profile"]; ?>" alt="" class="img rounded-circle img-thumbnail d-block mx-auto mt-2" style="width: 120px;height: 120px;">
	<div class="d-block text-center">
		<strong class="font-weight-bold">
			<?php echo $res["firstName"] . " " . $res["middleName"] . " " . $res["lastName"]; ?>
		</strong>
		<p><?php echo $res["roleDescription"]; ?></p>
	</div>
	<div class="position-sticky border-top">
		<ul class="nav flex-column">
			<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="dashboard.php">
					<span data-feather="home"></span>
					Dashboard
				</a>
			</li>
			<?php
			if ($_SESSION["role"] == "Admin") {
			?>
				<li class="nav-item">
					<a class="nav-link" href="users.php">
						<span data-feather="file"></span>
						Manage Users
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="staffs.php">
						<span data-feather="shopping-cart"></span>
						Manage Staffs
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="semesters.php">
						<span data-feather="shopping-cart"></span>
						Manage Semester
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="academic_year.php">
						<span data-feather="shopping-cart"></span>
						Manage Academic Years
					</a>
				</li>
			<?php
			}
			?>


			<li class="nav-item">
				<a class="nav-link" href="courses.php">
					<span data-feather="shopping-cart"></span>
					Manage Courses
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="#">
					<span data-feather="shopping-cart"></span>
					Manage Schedules
				</a>
			</li>

		</ul>
	</div>
</nav>