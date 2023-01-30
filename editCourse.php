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
        <h1 class="h2">Manage Courses</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="courses.php" class="btn btn-sm btn-outline-success">Back</a>
          </div>
        </div>
      </div>
      <div class="row">
      <div class="col-12">
      <?php
      require_once("handlers/connection.php");
?>

<?php
try {
  if(isset($_GET["id"])){
		$id=$_GET["id"];
		$query=$conn->prepare("SELECT * FROM courses WHERE courseID=:cID");
  		$query->execute(array(":cID"=>$id));
      if($query->rowCount()!=1){
        header("location:courses.php");
      }

      $result=$query->fetch();
  ?>
    <form action="handlers/updateCourse.php" method="POST">
        <div class="row">
          <div class="mx-auto col col-12 col-md-9 col-lg-6">
            <input type="text" required id="courseID" value="<?php echo $result["courseID"];?>" hidden readonly="" name="courseID" placeholder="courseID">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" required id="courseCode" value="<?php echo $result["courseCode"];?>" name="courseCode" placeholder="Course Code">
              <label for="courseCode">Course Code</label>
            </div>    
            <div class="form-floating mb-3">
              <input type="text" class="form-control" required id="courseName" value="<?php echo $result["courseName"];?>" name="courseName" placeholder="Course Name">
              <label for="courseName">Course Name</label>
            </div>    
            <div class="form-floating mb-3">
              <input type="number" class="form-control" min="1" max="20" required id="courseUnit" value="<?php echo $result["courseUnit"];?>" name="courseUnit" placeholder="Course Unit">
              <label for="courseUnit">Course Unit</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Save</button>
          </div>
        </div>
    </form>
  <?php
		// echo $query->rowCount();
	}

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
      </script><script src=assets\js\dashboard.js"></script>
    
    </body>
</html>
