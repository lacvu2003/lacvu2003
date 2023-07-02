<p>Sửa sản phẩm</p>
<?php
    $sql_sua = "SELECT * FROM tblsanpham WHERE id_sp = '$_GET[idsanpham]' LIMIT 1";
    $query_sua = mysqli_query($conn,$sql_sua);
?>
<form method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $_GET['idsanpham']?>" enctype="multipart/form-data">
<table border="1" style="border-collapse: collapse;">
    <?php
        while($dong = mysqli_fetch_array($query_sua))    {
    ?>
  <tr>
    <td>Tên sản phẩm</td>
    <td><input type="text" name="tensanpham" autocomplete="off" value="<?php echo $dong['tensanpham']?>"></td>
  </tr>
  <tr>
    <td>Mã sản phẩm</td>
    <td><input type="text" name="masp" autocomplete="off" value="<?php echo $dong['masp']?>"></td>
  </tr>
  <tr>
    <td>Giá sản phẩm</td>
    <td><input type="text" name="giasp" autocomplete="off" value="<?php echo $dong['giasp']?>"></td>
  </tr>
  <tr>
    <td>Số lượng</td>
    <td><input type="text" name="soluong" autocomplete="off" value="<?php echo $dong['soluong']?>"></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh" autocomplete="off" value="<?php echo $dong['hinhanh']?>"></td>
  </tr>
  <tr>
    <td>Tóm tắt</td>
    <td><input type="text" name="tomtat" autocomplete="off" value="<?php echo $dong['tomtat']?>"></td>
  </tr>
  <tr>
    <td>Nội dung</td>
    <td><input type="text" name="noidung" autocomplete="off" value="<?php echo $dong['noidung']?>"></td>
  </tr>
  <tr>
    <td>Tình trạng:</td>
    <td>
      <select name="tinhtrang">
        <option value="Còn hàng">Còn hàng</option>
        <option value="Hết hàng">Hết</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>Danh mục:</td>
    <td>
      <select name="danhmuc">
        <?php
          $sql_danhmuc = "SELECT * FROM tbldanhmucsp ORDER BY ID asc";
          $query_danhmuc = mysqli_query($conn,$sql_danhmuc);
          while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
            if($row_danhmuc['ID'] == $dong['ID']){
        ?>
            <option selected value="<?php echo $row_danhmuc['ID']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
            <?php
                }
                else{
            ?>
            <option value="<?php echo $row_danhmuc['ID']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
        <?php
            }
          }
        ?>
      </select>
    </td>
  </tr>
  <tr>
    <td colspan="2" style="text-align: center;"><input type="submit" value="Sửa sản phẩm" name="suasanpham"></td>
  </tr>
  <?php
        }
  ?>
</table>
</form>