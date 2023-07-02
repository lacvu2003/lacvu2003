<p class="title_danhmuc">Chi tiết sản phẩm</p>
<?php
    $sql_chitiet = "SELECT * FROM tblsanpham,tbldanhmucsp WHERE tblsanpham.ID = tbldanhmucsp.ID and tblsanpham.id_sp = $_GET[id]";
    $query_chitiet = mysqli_query($conn,$sql_chitiet);
    while($row = mysqli_fetch_array($query_chitiet)){
?>
<div class="chitietsanpham">
    <div class="hinhanh_sanpham">
        <img class="hinhanh_chitiet" src="ADMIN/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>" alt="">
    </div>
    <form action="Pages/main/themgiohang.php?idsanpham=<?php echo $row['id_sp']?>" method="post">
        <div class="chitiet_sanpham">
                <h3 class="title_chitiet"><?php echo $row['tensanpham']?></h3>
                <p class="masp_chitiet"><?php echo $row['masp']?></p>
                <p class="price_chitiet"><?php echo number_format($row['giasp'],0,',','.').'vnd'?></p>
                <input class="addtocart" type="submit" name="themgiohang" value="Thêm giỏ hàng">
                <p class="tinhtrang_chitiet"><?php echo $row['tinhtrang']?></p>
        </div>
    </form>
</div>
<?php
    }
?>