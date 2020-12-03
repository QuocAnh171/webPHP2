<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa sản phẩm - Quản lý sản phẩm</title>
</head>
<body>
	<dir class="content">
		<div class="dangkysanpham">
			<a href="index.php?controller=admin&action=list">Danh sách</a>
			<h3>Cập nhật sản phẩm</h3>
			<form action="" method="POST" enctype="multipart/form-data">
				<table>
					<tr>
						<td>Title : </td>
						<td><input type="varchar" name="title" value="<?php echo $dataID['title']; ?>" placeholder="Title"></td>
					</tr>
					<tr>
						<td>Description : </td>
						<td><input type="text" name="description" value="<?php echo $dataID['description']; ?>" placeholder="Description"></td>
					</tr>
					<tr>
						<td>Image : </td>
						<td><input type="file" name="image"></td>
						<td><?php echo "<img src='images/".$dataID['image']."' width='100' height='100'>"; ?> </td>
					</tr>
					<tr>
						<td>Status : </td>
						<td><input type="int" name="status" value="<?php echo $dataID['status']; ?>" placeholder="Status"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" name="update_user" value="Cập nhật"></td>
					</tr>
				</table>
			</form>
		</div>
	</dir>
	
</body>
</html>