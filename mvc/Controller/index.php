<?php
if(isset($_GET['controller']))
	{
		$controller = $_GET['controller'];
	}
	else{
		$controller = '';
	}
	
	switch ($controller) {
		case 'admin':{
			if(isset($_GET['action']))
		{
			$action = $_GET['action'];
		}
		else{
			$action = '';
		}

	// $action = $app->find_action();


		switch ($action) {
			case 'add':{
				if (isset($_POST['upload'])) {
    			// Get image name
    					
  					}
				if (isset($_POST['add_user'])){
					$title = $_POST['title'];
					$description = $_POST['description'];
					$status = $_POST['status'];
    			// Get image name
    				$image = $_FILES['image']['name'];
    			// image file directory
    				$target = "images/".basename($image);
    				$msg = '';
    				if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      						$msg = "Image uploaded successfully";
      						echo $msg;
    				}else{
      						$msg = "Failed to upload image";
      						echo $msg;
    					}

				if ($db->InsertData($title, $description, $image, $status)){
					echo "<p style= 'color:green'>Thêm mới thành công.</p>";
				}
			}
			require_once('View/add_user.php');
			break;
		}
		case 'edit':{
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$tblTable = 'myguests';
				$dataID = $db->getDataID($tblTable,$id);

				if(isset($_POST['update_user'])){

					// Lấy dữ liệu từ view:
					$title = $_POST['title'];
					$description = $_POST['description'];
					$status = $_POST['status'];
					// Get image name
    				$image = $_FILES['image']['name'];
    				// image file directory
    				$target = "images/".basename($image);
    				$msg = '';
    				if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      						$msg = "Image uploaded successfully";
      						echo $msg;
    				}else{
      						$msg = "Failed to upload image";
      						echo $msg;
    					}

					// Truyền dữ liệu lấy từ view sang Model:
					if($db->UpdateData($id,$title, $description, $image, $status)){
						header('location: index.php?controller=admin&action=list');
					}
				}
				require_once('View/edit_user.php');
			}
			else{
				header('location: index.php?controller=admin&action=list');
			}

			break;
		}
		case 'delete':{
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$tblTable = 'myguests';

				if ($db->Delete($id, $tblTable)){
					header('location: index.php?controller=admin&action=list');
				}
				else{
					header('location: index.php?controller=admin&action=list');
				}

			}
			else{
				header('location: index.php?controller=admin&action=list');
			}
			// require_once('View/delete_user.php');
			break;
		}
		case 'list':
		{
			$tblTable = "myguests";
			$data = $db->getAllData($tblTable);
			require_once('View/list.php');
			break;
		}
		case 'details':{
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$tblTable = 'myguests';
				$dataID = $db->getDataID($tblTable,$id);
				require_once('View/details_user.php');
			}
			else{
				header('location: index.php?controller=admin&action=list');
			}

			break;
		}
		default:{
		}
	}
			break;
		}
		case 'customer':
			$tblTable = "myguests";
			$data = $db->getAllData($tblTable);
			require_once('View/list_customer.php');
			break;
	}
?>