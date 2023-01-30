<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          
        <li class="nav-item">
            <p><?php echo $_SESSION["user"];?></p>
            <p><?php echo $_SESSION["role"];?></p>
</li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <?php
          if($_SESSION["role"]=="Admin"){
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