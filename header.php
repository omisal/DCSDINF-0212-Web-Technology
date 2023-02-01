<?php
if (!isset($_SESSION["user"])) {
	header("location:index.php");
}
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
<header class="navbar navbar-dark sticky-top bg-dark py-2 shadow">
	<div class="container-fluid">
		<div class="row w-100 d-flex justify-content-between align-items-center">
			<div class="col-6 text-white me-0 px-3">
				<strong class="d-none d-md-block">Course Allocation</strong>
				<button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<div class="col-6 text-right">
				<div class="dropdown text-end">
					<a href="#" class="link-dark text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
						<img src="<?php echo 'assets/profile/' . $res["profile"]; ?>" alt="mdo" width="35" height="32" class="rounded-circle">
					</a>
					<ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="dropdownUser1">
						<li><a class="dropdown-item" href="#">Settings</a></li>
						<li><a class="dropdown-item" href="profile.php">Profile</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item" href="handlers/logout.php">Log out</a></li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</header>