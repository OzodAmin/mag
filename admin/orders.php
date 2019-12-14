<?php
  session_start();
  // If the user is not logged in redirect to the login page...
  if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit();
  }

  include 'includes/header.php';
?>

<body id="page-top" class="sidebar-toggled">
  <div id="wrapper">
  <?php include 'includes/navbar.php';?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <div class="container-fluid">

          
          <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
            <h1 class="h3 mb-0 text-gray-800">Orders</h1>
          </div>

        </div>
      </div>
    </div>
  </div>
<?php include 'includes/footer.php';?>