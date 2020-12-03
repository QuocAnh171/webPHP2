<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="danhsach">
    <td>
        <a href="index.php?controller=admin&action=add">New</a>
    </td>
    <h3>Danh sách sản phẩm - Quản lý sản phẩm</h3>
    <table id="id" border="1px">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Status</th>
                <th>Create_at</th>
                <th>Update_at</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $id = 1;
                foreach ($data as $value) 
                {
                    
            ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $value['title']; ?></td>
                <td><?php echo $value['description']; ?></td>
                <td><?php echo "<img  src='images/".$value['image']."' width='100' height='100'>"; ?>   </td>
                <td><?php echo $value['status']; ?></td>
                <td><?php echo $value['creat_at']; ?></td>
                <td><?php echo $value['update_at']; ?></td>
                <td>
                    <a onclick="return confirm('Bạn có chắc chắn muốn sửa ko?')" href="index.php?controller=admin&action=edit&id=<?php echo $value['id']; ?>">Edit</a>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa ko?')" href="index.php?controller=admin&action=delete&id=<?php echo $value['id']; ?>" title="Xóa">Delete</a>
                    <a href="index.php?controller=admin&action=details&id=<?php echo $value['id']; ?>">Details</a>
                </td>
            </tr>
            <?php
                $id++;
                }
             ?>
        </tbody>
    </table>
</div>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#id').dataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
        });
    });
</script>
  </body>
</html>