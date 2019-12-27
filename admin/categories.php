<?php
  require_once 'includes/session.php';
  require_once '../params/config.php';
  $title = 'Categories';
  $script = '<script src="js/categories.js"></script>';
  $formUrl = '/admin/includes/categoryResponse.php';
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
            <h1 class="h3 mb-0 text-gray-800">Categories</h1>
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newCategoryModal">
              <i class="fas fa-plus fa-sm text-white-50"></i> Add new category
            </button>
          </div>
          <?php if (isset($_SESSION['response'])): ?>
            <div class="alert alert-<?= $_SESSION['response']['status']; ?> alert-dismissible fade show" role="alert">
              <strong><?= $_SESSION['response']['message']; ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php unset($_SESSION['response']); ?>
          <?php endif ?>

          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="categoriesList" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name Ru</th>
                      <th>Name Uz</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  
<?php
  $sql ="SELECT * FROM categories";
  $query=mysqli_query($db,$sql);
  $totalData=mysqli_num_rows($query);
  while($row=mysqli_fetch_array($query)){
    echo "<tr>";
    echo "<td id='catId_".$row[0]."'>".$row[0]."</td>"; //id
    echo "<td>".$row[1]."</td>"; //name
    echo "<td>".$row[2]."</td>"; //name
    echo '<td>
      <button type="button" onclick="getData('.$row[0].')" class="btn btn-primary btn-xs">
        <i class="fas fa-pencil-alt">&nbsp;</i>Edit
      </button>&nbsp;
      <button type="button" onclick="getDelete('.$row[0].')" class="btn btn-danger btn-xs">
        <i class="fas fa-trash-alt">&nbsp;</i>Delete
      </button>
    </td>
  </tr>';
}
?>
                </tbody>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <form class="user" action="<?= $formUrl; ?>" method="post">
            <div class="form-group">
              <input type="text" class="form-control form-control-user" name="categoryNameRu" placeholder="Enter category name Ru" required>
              <input type="hidden" name="requestType" value="insert">
              <input type="hidden" name="catId" value="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" name="categoryNameUz" placeholder="Enter category name Uz" required>
            </div>
            <input type="submit" class="btn btn-primary btn-user btn-block" value="Save">
          </form>        
        </div>
      </div>
    </div>
  </div>

<?php include 'includes/footer.php';?>