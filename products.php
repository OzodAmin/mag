<?php include 'includes/header.php';?>
	<!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2><?= _ALLPRO; ?></h2>
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
                        	<?php
                        		if (isset($_GET['pageno'])) 
						            $pageno = $_GET['pageno'];
						        else 
						            $pageno = 1;
						        
						        $no_of_records_per_page = 6;
						        $offset = ($pageno-1) * $no_of_records_per_page;

						        $total_pages_sql = "SELECT COUNT(*) FROM products WHERE active=1";
						        $result = mysqli_query($db,$total_pages_sql);
						        $total_rows = mysqli_fetch_array($result)[0];
						        $total_pages = ceil($total_rows / $no_of_records_per_page);

	                            $sql ="SELECT p.name_".$lang.", p.price, c.name_".$lang.", p.image, p.id FROM products p LEFT JOIN categories c ON p.category_id=c.id WHERE p.active=1 ORDER BY p.id DESC LIMIT $offset, $no_of_records_per_page";
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
                            <li class="page-item"><a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
<?php include 'includes/footer.php';?>