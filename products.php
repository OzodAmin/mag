<?php 
include 'includes/header.php'; 

$pageno = 1;
$url = '?';
$sort = 'p.id DESC';
$option = ['Newest'=>'p.id DESC','Price: $$ - $'=>'p.price DESC','Price: $ - $$'=>'p.price ASC'];
$catId = '';
$title = _ALLPRO;

if (isset($_GET['pageno'])) 
	$pageno = $_GET['pageno'];

if (isset($_POST['sort']) ){
	$sort = $_POST['sort'];
	$url .= 'sort='.$sort.'&';
}
elseif (isset($_GET['sort'])) {
	$sort = $_GET['sort'];
	$url .= 'sort='.$sort.'&';
}

$no_of_records_per_page = 6;
$offset = ($pageno-1) * $no_of_records_per_page;

if (isset($_GET['cat'])){
	$url .= 'cat='.$_GET['cat'].'&'; 
	$catId = ' AND p.category_id='.$_GET['cat'];   
	$sqlCatName = "SELECT name_$lang FROM categories WHERE id=".$_GET['cat'];
	$result = mysqli_query($db,$sqlCatName);
	$title = mysqli_fetch_array($result)[0];            		 
}

$total_pages_sql = "SELECT COUNT(*) FROM products p WHERE p.active=1".$catId;
$result = mysqli_query($db,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
?>
	<!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2><?= $title; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="shop_grid_product_area">
                    	<div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p>Page <span><?= $pageno; ?></span> of <span><?= $total_pages; ?></span></p>
                                    </div>
                                    <!-- Sorting -->
                                    <div class="product-sorting d-flex">
                                        <p>Sort by:</p>
                                        <form action="<?= $url; ?>" method="post">
                                            <select name="sort" id="sortByselect" onchange="this.form.submit()">
                                           <?php 
                                           foreach ($option as $key => $value) {
                                           	$selected = '';
                                           	if ($sort === $value) 
                                           		$selected = 'selected';
                                           	
                                           	echo '<option value="'.$value.'" '.$selected.'>'.$key.'</option>';
                                           }

                                           ?>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        	<?php
	                            $sql ="SELECT p.name_".$lang.", p.price, c.name_".$lang.", p.image, p.id FROM products p LEFT JOIN categories c ON p.category_id=c.id WHERE p.active=1".$catId." ORDER BY ".$sort." LIMIT $offset, $no_of_records_per_page";
	                            $query=mysqli_query($db,$sql);
	                            $totalData=mysqli_num_rows($query);
	                            while($row=mysqli_fetch_array($query)){
	                            echo '<div class="col-12 col-sm-6 col-lg-4">';
		                            echo '<div class="single-product-wrapper">';
		                                echo '<div class="product-img">';
		                                    printf('<img src="admin/img/%s" alt="">',$row[3]);
		                                echo "</div>";
		                                echo '<div class="product-description">';
		                                    printf('<a href="product.php?id=%s">', $row[4]);
		                                        printf('<h6>%s</h6>', $row[0]);
		                                    echo "</a>";
		                                    printf('<p class="product-price">%s</p>', number_format($row[1], 2, '.', ' '));
		                                    echo '<div class="hover-content">';
		                                        echo '<div class="add-to-cart-btn">';
		                                            printf('<a href="#" class="btn essence-btn">Add to Cart</a>');
		                                        echo "</div>";
		                                    echo "</div>";
		                                echo "</div>";
		                            echo "</div>";
		                        echo "</div>";
	                            }
	                        ?>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        <ul class="pagination mt-50 mb-40">
                            <li class="page-item">
                            	<a class="page-link" href="<?= $pageno <= 1?'#':$url."pageno=".($pageno - 1) ?>">
                            		<i class="fa fa-angle-left"></i>
                            	</a>
                            </li>
                            <li class="page-item">
                            	<a class="page-link" href="<?= $pageno >= $total_pages? '#':$url."pageno=".($pageno + 1) ?>">
                            		<i class="fa fa-angle-right"></i>
                            	</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
<?php include 'includes/footer.php';?>