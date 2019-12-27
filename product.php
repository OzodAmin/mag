<?php 
include 'includes/header.php'; 
if (isset($_GET['id'])){ 
    $sql = "SELECT * FROM products WHERE id=".$_GET['id'];
    $result = mysqli_query($db,$sql);
    $product = mysqli_fetch_array($result); 
    $name = 'name_'.$lang;
    $des = 'description_'.$lang;
    // echo "<pre>"; print_r($product); die();                    
?>

    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides owl-carousel">
                <?php for ($i=0; $i < 3; $i++) { 
                    printf('<img src="admin/img/%s" alt="">',$product['image']);
                } ?>
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">

            <h2><?= $product[$name]; ?></h2>
            <p class="product-price"><?= number_format($product['price'], 2, '.', ' '); ?></p>
            <p class="product-desc"><?= $product[$des]; ?></p>

            <!-- Form -->
            <form class="cart-form clearfix" method="post">                
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <button type="submit" name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->

<?php 
}
include 'includes/footer.php';?>