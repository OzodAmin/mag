<?php
  require_once 'includes/session.php';
  require_once '../params/config.php';
  $title = 'Products';
  $style = '<link href="css/checkbox.min.css" rel="stylesheet">';
  $script = '<script src="js/products.js"></script>';
  $formUrl = '/admin/includes/productResponse.php';
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
            <h1 class="h3 mb-0 text-gray-800">Products</h1>
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newCategoryModal">
              <i class="fas fa-plus fa-sm text-white-50"></i> Add new prouct
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
                      <th>Image</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Category</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
  $sql ="SELECT p.name_ru, p.price, c.name_ru, p.image, p.active, p.id FROM products p LEFT JOIN categories c ON p.category_id=c.id";
  $query=mysqli_query($db,$sql);
  $totalData=mysqli_num_rows($query);
  while($row=mysqli_fetch_array($query)){
    echo "<tr>";
    echo "<td><img src='img/".$row[3]."' alt='' class='img-responsive' style='width:100px'></td>";
    echo "<td>".$row[0]."</td>";
    echo "<td>".number_format($row[1], 2, '.', ' ')."</td>";
    echo "<td>".$row[2]."</td>";
    $activeCheckbox = $row[4]==1?'checked':'';
    echo "<td><label class='el-switch'>
          <input id='chbx_".$row[5]."' type='checkbox' ".$activeCheckbox." onchange='changeStatus(".$row[5].")'>
          <span class='el-switch-style'></span>
        </label></td>";
    echo '<td>
      <button type="button" onclick="getData('.$row[5].')" class="btn btn-primary btn-xs">
        <i class="fas fa-pencil-alt">&nbsp;</i>Edit
      </button>&nbsp;
      <button type="button" onclick="getDelete('.$row[5].')" class="btn btn-danger btn-xs">
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
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <form class="user" action="<?= $formUrl; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" class="form-control" name="nameRu" placeholder="Enter product name Ru" required>
              <input type="hidden" name="requestType" value="insert">
              <input type="hidden" name="productId" value="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="nameUz" placeholder="Enter product name Uz" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="3" name="descriptionRu" placeholder="Enter product description Ru" required></textarea>
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="3" name="descriptionUz" placeholder="Enter product description Uz" required></textarea>
            </div>
            <div class="form-group">
              <input name="price" pattern="^\d*(\.\d{0,2})?$" class="form-control" required/>
            </div>
            <div class="form-group">
              <select class="form-control" name="catId" required>
                <option>Select category</option>
                <?php
                  $sql ="SELECT * FROM categories";
                  $query=mysqli_query($db,$sql);
                  $totalData=mysqli_num_rows($query);
                  while($row=mysqli_fetch_array($query)){
                    echo "<option value='".$row[0]."'>".$row[1]."</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <input type="file" name="image[]" class="form-control" required/>
              <label id="isChangeImage" style="display: none;">
                <input type="checkbox" name="isChange"> change image
              </label>
            </div>
            <input type="submit" class="btn btn-primary btn-user btn-block" value="Save">
          </form>        
        </div>
      </div>
    </div>
  </div>

<?php include 'includes/footer.php';?>