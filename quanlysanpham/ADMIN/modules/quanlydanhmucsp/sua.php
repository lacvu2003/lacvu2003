<p>Sửa danh mục sản phẩm</p>
<?php
    $sql_sua = "SELECT * FROM tbldanhmucsp WHERE ID = '$_GET[iddanhmuc]' LIMIT 1";
    $query_sua = mysqli_query($conn,$sql_sua);
?>
<form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>">
<table border="1" style="border-collapse: collapse;">
    <?php
        while($dong = mysqli_fetch_array($query_sua))    {
    ?>
  <tr>
    <td>Tên danh mục:</td>
    <td><input type="text" name="tendanhmuc" autocomplete="off" value="<?php echo $dong['tendanhmuc']?>"></td>
  </tr>
  <tr>
    <td>Thứ tự:</td>
    <td><input type="text" name="thutu" autocomplete="off" value="<?php echo $dong['thutu']?>"></td>
  </tr>
  <tr>
    <td colspan="2" style="text-align: center;"><input type="submit" value="Sửa danh mục sản phẩm" name="suadanhmuc"></td>
  </tr>
  <?php
        }
  ?>
</table>
</form>