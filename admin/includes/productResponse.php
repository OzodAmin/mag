<?php
session_start();
//include connection file 
require_once '../../params/config.php';

$extensions= array("jpeg","jpg","png");
$imagePath = "../img/";
$uniquesavename=time();
if (isset($_POST['requestType']) ) {
	switch ($_POST['requestType']) {
		//INSERT new product
		case 'insert':
			$image = $_FILES['image']['name'];// Get image name
			$ext = strtolower(end(explode('.',$_FILES['image']['name'][0])));
			if(in_array($ext,$extensions)){
				$destFile = $imagePath . $uniquesavename .'.'. $ext;
				$filename = $_FILES["image"]["tmp_name"];
				// echo "<pre>"; print_r($filename[0]);die();
				if (move_uploaded_file($filename[0], $destFile)) {
					$sql = "INSERT INTO `products`(`name_ru`, `name_uz`, `description_ru`, `description_uz`, `price`, `category_id`, `image`) VALUES (?,?,?,?,?,?,?)";

				    if($stmt = mysqli_prepare($db, $sql)){
						mysqli_stmt_bind_param($stmt, "ssssdis", $param_name_ru, $param_name_uz, $param_des_ru, $param_des_uz, $param_price, $param_cat, $param_image);
						$param_name_ru = $_POST['nameRu'];
						$param_name_uz = $_POST['nameUz'];
						$param_des_ru = $_POST['descriptionRu'];
						$param_des_uz = $_POST['descriptionUz'];
						$param_price = $_POST['price'];
						$param_cat = $_POST['catId'];
						$param_image = $uniquesavename.'.'.$ext;
						if(mysqli_stmt_execute($stmt))
							$_SESSION['response'] = ['status'=>'success', 'message'=>'Product added successfully'];
						else
							$_SESSION['response'] = ['status'=>'danger', 'message'=>'Something went wrong!'];
				    }else
				    	$_SESSION['response'] = ['status'=>'danger', 'message'=>'Something went wrong!'];
			  	}else 
			  		$_SESSION['response'] = ['status'=>'danger', 'message'=>'Failed to upload image'];
		  	}else
			  	$_SESSION['response'] = ['status'=>'danger', 'message'=>'Choose an image'];
			break;
		//EDIT product by id
		case 'update':
			$sql = "UPDATE products SET name_ru=?,name_uz=?,description_ru=?,description_uz=?,price=?,category_id=? WHERE id=?";

		    if($stmt = mysqli_prepare($db, $sql)){
				mysqli_stmt_bind_param($stmt, "ssssdii", $param_name_ru, $param_name_uz, $param_des_ru, $param_des_uz, $param_price, $param_cat_id, $id);
				$param_name_ru = $_POST['nameRu'];
				$param_name_uz = $_POST['nameUz'];
				$param_des_ru = $_POST['descriptionRu'];
				$param_des_uz = $_POST['descriptionUz'];
				$param_price = $_POST['price'];
				$param_cat_id = $_POST['catId'];
				$id = $_POST['productId'];
				if(mysqli_stmt_execute($stmt)){
					if (!empty($_POST['isChange'])) {
						$sql = "SELECT image FROM products WHERE id = ".$id;
						$queryRecords = mysqli_query($db, $sql) or die("error to fetch data");
						while( $row = mysqli_fetch_row($queryRecords) ) { 
							unlink("../img/".$row[0]);
							$image = $_FILES['image']['name'];// Get image name
							$ext = strtolower(end(explode('.',$_FILES['image']['name'][0])));
							if(in_array($ext,$extensions)){
								$destFile = $imagePath . $uniquesavename .'.'. $ext;
								$filename = $_FILES["image"]["tmp_name"];
								if (move_uploaded_file($filename[0], $destFile)) {
									$sql = "UPDATE products SET image=?";

								    if($stmt = mysqli_prepare($db, $sql)){
										mysqli_stmt_bind_param($stmt, "s", $param_image);
										$param_image = $uniquesavename.'.'.$ext;
										if(mysqli_stmt_execute($stmt))
											$_SESSION['response'] = ['status'=>'success', 'message'=>'Product added successfully'];
										else
											$_SESSION['response'] = ['status'=>'danger', 'message'=>'Something went wrong!'];
								    }else
								    	$_SESSION['response'] = ['status'=>'danger', 'message'=>'Something went wrong!'];
							  	}else 
							  		$_SESSION['response'] = ['status'=>'danger', 'message'=>'Failed to upload image'];
							}
						}
					}
					$_SESSION['response'] = ['status'=>'success', 'message'=>'Product updated successfully'];
				}
				else
					$_SESSION['response'] = ['status'=>'danger', 'message'=>'Something went wrong!'];
		    }else
		    	$_SESSION['response'] = ['status'=>'danger', 'message'=>'Something went wrong!'];
		    break;
		//GET product by id
		case 'getProById':
			$sql = "SELECT * FROM products WHERE id = ".$_POST['editProId'];
			$queryRecords = mysqli_query($db, $sql) or die("error to fetch data");
			while( $row = mysqli_fetch_row($queryRecords) ) { 
				$json_data = [
				"id"		=> $row[0],
				"nameRu"    => $row[1],
				"nameUz"	=> $row[2],
				"desRu"		=> $row[3],
				"desUz"		=> $row[4],
				"price"		=> $row[5],
				"catId"		=> $row[6],
				"image"		=> $row[7]	
				];
			}
			echo json_encode($json_data);  // send data as json format
			exit();
			break;
		case 'delete':
			$sql = "SELECT image FROM products WHERE id = ".$_POST['deleteProId'];
			$queryRecords = mysqli_query($db, $sql) or die("error to fetch data");
			while( $row = mysqli_fetch_row($queryRecords) ) { 
				unlink("../img/".$row[0]);
			}
			$sql = "DELETE FROM products WHERE id=".$_POST['deleteProId'];
			if (mysqli_query($db, $sql)) 
				$_SESSION['response'] = ['status'=>'success', 'message'=>'Product deleted successfully'];
			else
				$_SESSION['response'] = ['status'=>'danger', 'message'=>mysqli_error($db)];
			echo json_encode('');  // send data as json format
			exit();
			break;
		//change product status
		case 'statusChange':
			$sql = "UPDATE products SET active=? WHERE id=?";

		    $stmt = mysqli_prepare($db, $sql);
			mysqli_stmt_bind_param($stmt, "ii", $param_active, $param_id);
			$param_active = $_POST['status'];
			$param_id = $_POST['statusProId'];
			mysqli_stmt_execute($stmt);
			echo json_encode('');  // send data as json format
			exit();
			break;
	}
    // Close statement
    mysqli_stmt_close($stmt);
    // Close connection
    mysqli_close($db);
}
header('Location: ' . $_SERVER['HTTP_REFERER'].''.$endpoint);
?>
