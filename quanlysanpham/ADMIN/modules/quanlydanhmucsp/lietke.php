<p>Liệt kê danh mục sản phẩm</p>
<?php
    $sql_lietke = "SELECT * FROM tbldanhmucsp ORDER BY thutu asc";
    $query_lietke = mysqli_query($conn,$sql_lietke);
?>
<table border="1" style="border-collapse: collapse;">
  <tr>
    <td>ID</td>
    <td>Tên danh mục</td>
    <td>Quản lý</td>
  </tr>
  <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke)){
        $i++;
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row['tendanhmuc']?></td>
    <td>
    <a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['ID']?>">Xóa</a> | <a href="index.php?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['ID']?>">Sửa</a> 
    </td>
  </tr>
  <?php
    }
  ?>
</table>