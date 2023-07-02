<p>Liệt kê danh mục sản phẩm</p>
<?php
    $sql_lietke_sp = "SELECT * FROM tblsanpham,tbldanhmucsp WHERE tblsanpham.ID = tbldanhmucsp.ID ORDER BY id_sp asc";
    $query_lietke_sp = mysqli_query($conn,$sql_lietke_sp);
?>
<table border="1" style="border-collapse: collapse;">
  <tr>
    <td>ID</td>
    <td>Tên sản phẩm</td>
    <td>Mã sản phẩm</td>
    <td>Giá sản phẩm</td>
    <td>Số lượng</td>
    <td>Hình ảnh</td>
    <td>Tóm tắt</td>
    <td>Trạng thái</td>
    <td>Danh Mục</td>
    <td>Quản lý</td>
  </tr>
  <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_sp)){
        $i++;
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row['tensanpham']?></td>
    <td><?php echo $row['masp']?></td>
    <td><?php echo $row['giasp']?></td>
    <td><?php echo $row['soluong']?></td>
    <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh']?>" alt="" style="width: 50px; height: 50px;"></td>
    <td><?php echo $row['tomtat']?></td>
    <td><?php if ($row['tinhtrang']=='Còn hàng'){
        echo 'Còn hàng';
      }
      else{
        echo 'Hết';
      }?>
    </td>
    <td><?php echo $row['tendanhmuc']?></td>
    <td>
      <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sp']?>">Xóa</a> | <a href="index.php?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sp']?>">Sửa</a> 
    </td>
  </tr>
  <?php
    }
  ?>
</table>