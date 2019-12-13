<?php
  session_start(); 
  include 'includes/header.php';
  include '../params/const.php';

  if (isset($_SESSION['loggedin'])) {header('Location: home.php');}

  if (isset($_POST['username'], $_POST['password']) ) {
    if ($_POST['username'] === $username && $_POST['password'] === $password) {
      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      header('location:home.php');
    } else {
      $error = 'Incorrect username or password!';
    }
  }
?>

<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                  </div>
                  <?php if (isset($error)) {
                    echo '<p class="bg-danger text-center">'.$error.'</p>';
                  }?>
                  
                  <form class="user" action="<?= $_SERVER['PHP_SELF'];?>" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" aria-describedby="emailHelp" placeholder="Enter username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                  </form>                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
