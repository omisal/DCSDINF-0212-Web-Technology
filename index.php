<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Omar S. Suleiman">
  <meta name="generator" content="Omar S">
  <link rel="icon" href="assets/img/SUZA.png" />
  <link href="assets\css\bootstrap.min.css" rel="stylesheet">
  <link href="assets\css\bootstrap.min.css" rel="stylesheet">
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: flex;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    .form-signin {
      width: 100%;
      max-width: 400px;
      padding: 15px;
      margin: auto;
    }
  </style>
</head>

<body class="alert-success">
  <div class="container-fluid">
    <div class="row my-5">
      <div class="col-lg-6 col-md-6 col-12">
        <strong></strong>
        <h1><?php
            //  session_start();
            //  echo $_SESSION["role"];
            ?></h1>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 bg-white py-5">
        <main class="form-signin text-center">
          <form method="POST" action="handlers/login.php">
            <img class="mb-4 mx-auto" src="assets/img/SUZA.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
              <input type="text" class="form-control" required id="username" name="username" placeholder="Your username">
              <label for="username">Username</label>
            </div>
            <div class="form-floating mt-3">
              <input type="password" class="form-control" required id="password" name="password" placeholder="Password">
              <label for="password">Password</label>
            </div>

            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022–2022</p>
          </form>
        </main>
      </div>
    </div>
  </div>

  <script src="assets\js\bootstrap.bundle.min.js"></script>
</body>

</html>