<?php
session_start();
//include connection file 
require_once '../../params/config.php';


if (isset($_POST['requestType']) ) {
	switch ($_POST['requestType']) {
		//INSERT new category
		case 'insert':
			$sql = "INSERT INTO categories (name_ru, name_uz) VALUES (?, ?)";

		    if($stmt = mysqli_prepare($db, $sql)){
				mysqli_stmt_bind_param($stmt, "ss", $param_name_ru, $param_name_uz);
				$param_name_ru = $_POST['categoryNameRu'];
				$param_name_uz = $_POST['categoryNameUz'];
				if(mysqli_stmt_execute($stmt))
					$_SESSION['response'] = ['status'=>'success', 'message'=>'Category added successfully'];
				else
					$_SESSION['response'] = ['status'=>'danger', 'message'=>'Something went wrong!'];
		    }else
		    	$_SESSION['response'] = ['status'=>'danger', 'message'=>'Something went wrong!'];
			break;
		//EDIT category by id
		case 'update':
			$sql = "UPDATE categories SET name_ru=?,name_uz=? WHERE id=?";

		    if($stmt = mysqli_prepare($db, $sql)){
				mysqli_stmt_bind_param($stmt, "ssi", $param_name_ru, $param_name_uz, $id);
				$param_name_ru = $_POST['categoryNameRu'];
				$param_name_uz = $_POST['categoryNameUz'];
				$id = $_POST['catId'];
				if(mysqli_stmt_execute($stmt))
					$_SESSION['response'] = ['status'=>'success', 'message'=>'Category updated successfully'];
				else
					$_SESSION['response'] = ['status'=>'danger', 'message'=>'Something went wrong!'];
		    }else
		    	$_SESSION['response'] = ['status'=>'danger', 'message'=>'Something went wrong!'];
		    break;
		//GET category by id
		case 'getCatById':
			$sql = "SELECT * FROM categories WHERE id = ".$_POST['editCatId'];
			$queryRecords = mysqli_query($db, $sql) or die("error to fetch data");
			while( $row = mysqli_fetch_row($queryRecords) ) { 
				$json_data = [
				"id"		=> $row[0],
				"nameRu"    => $row[1],
				"nameUz"	=> $row[2]
				];
			}
			echo json_encode($json_data);  // send data as json format
			exit();
			break;
		case 'delete':
			$sql = "DELETE FROM categories WHERE id=".$_POST['deleteCatId'];
			if (mysqli_query($db, $sql)) 
				$_SESSION['response'] = ['status'=>'success', 'message'=>'Category deleted successfully'];
			else
				$_SESSION['response'] = ['status'=>'danger', 'message'=>mysqli_error($db)];
			echo json_encode('');  // send data as json format
			exit();
			break;
		
		default:
			# code...
			break;
	}
    // Close statement
    mysqli_stmt_close($stmt);
    // Close connection
    mysqli_close($db);
}
header('Location: ' . $_SERVER['HTTP_REFERER'].''.$endpoint);
?>
