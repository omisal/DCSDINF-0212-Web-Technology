<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard Template · Bootstrap v5.0</title>

   
    <!-- Bootstrap core CSS -->
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets\css\dashboard.css" rel="stylesheet">
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
            <th scope="col">Course Code</th>
            <th scope="col">Course Name</th>
            <th scope="col">Unit</th>
            <th scope="col">Edit/Delete</th>
          </tr>
          </thead>
          <tbody>
            <?php
try {
  $query=$conn->prepare("SELECT * FROM courses");
  $query->execute();
  while($res=$query->fetch()){
    ?>
   <tr>
            <th scope="row">1</th>
            <td><?php echo $res["courseCode"]; ?></td>
            <td><?php echo $res["courseName"]; ?></td>
            <td><?php echo $res["courseUnit"]; ?></td>
            <td>
              <button class="btn btn-sm btn-outline-success">Edit</button>
              <a class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure want to delete?');" href="handlers/deleteCourse.php?cId=<?php echo $res["courseID"]; ?>">Delete</a>
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
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newCouseModalLabel">New Course</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="handlers/addCourse.php" method="POST">
    <div class="form-floating mb-3">
      <input type="text" class="form-control" required id="courseCode" name="courseCode" placeholder="Course Code">
      <label for="courseCode">Course Code</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" required id="courseName" name="courseName" placeholder="Course Name">
      <label for="courseName">Course Name</label>
    </div>
    <div class="form-floating mb-3">
      <input type="number" min="1" max="20" class="form-control" required id="courseUnit" name="courseUnit" placeholder="Course Unit">
      <label for="courseUnit">Course Unit</label>
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
