<?php
  session_start(); 
  if(!isset($_SESSION["role"]) || $_SESSION["role"]!="Admin" ){header("location:index.php");}
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
        <h1 class="h2">Manage Users</h1>
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
  <table class="table table-striped table-hover">
          <thead>
          <tr>
            <th scope="col">S/N</th>
            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Edit/Delete</th>
          </tr>
          </thead>
          <tbody>
            <?php
try {
  $roleQry=$conn->prepare("SELECT * FROM roles");
  $staffQry=$conn->prepare("SELECT * FROM staffs");
  $roleQry->execute();
  $staffQry->execute();
  $n=0;
  while($res=$staffQry->fetch()){
    ?>
   <tr>
            <th scope="row"><?php echo ++$n; ?></th>
            <td><?php echo $res["firstName"]; ?></td>
            <td><?php echo $res["middleName"]; ?></td>
            <td><?php echo $res["lastName"]; ?></td>
            <td><?php echo $res["DOB"]; ?></td>
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
    </main>
  </div>
</div>


<script src="assets\js\bootstrap.bundle.min.js"></script>

      <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
         -->
      </script><script src=assets\js\dashboard.js"></script>
    <div class="modal fade" id="newCouseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newCouseModalLabel" aria-hidden="true">
  		<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="newCouseModalLabel">New User</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="handlers/addUser.php" method="POST">
						<div class="row">
							<div class="col-lg-4 col-md-6 col-12">
								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
									<label for="firstName">First Name</label>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-12">
								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="middleName" name="middleName" placeholder="Middle Name" required>
									<label for="middleName">Middle Name</label>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-12">
								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
									<label for="lastName">Last Name</label>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-12">
								<div class="form-floating mb-3">
									<input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" required>
									<label for="dob">Date of Birth</label>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-12">
								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="userName" name="userName" placeholder="Username" required>
									<label for="userName">Username</label>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-12">
								<div class="form-floating mb-3">
									<select class="form-control" id="role" name="role" required>
                  <option value="">--Select User Role--</option>
                 <?php
                  while($role=$roleQry->fetch()){
                  ?>
                   <option value="<?php echo $role["roleID"];?>"><?php echo $role["roleDescription"];?></option>
                  <?php
                  }
                 ?>
                </select>
									<label for="role">Role</label>
								</div>
							</div>
						</div>	
						<button class="w-100 btn btn-lg btn-primary" type="submit">Save</button>
					</form>
    			</div>
    			<div class="modal-footer">
    			</div>
    		</div>
  		</div>
	</div>
    </body>
</html>
