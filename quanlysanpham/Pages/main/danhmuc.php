<?php
    $sql_title = "SELECT tendanhmuc FROM tbldanhmucsp,tblsanpham WHERE tblsanpham.ID = tbldanhmucsp.ID and tblsanpham.ID = '$_GET[id]'";
    $query_title = mysqli_query($conn,$sql_title);
    $row_title = mysqli_fetch_array($query_title);
?>
<?php
    $sql_pro = "SELECT * FROM tbldanhmucsp,tblsanpham WHERE tblsanpham.ID = tbldanhmucsp.ID and tblsanpham.ID = '$_GET[id]' ORDER BY tblsanpham.id_sp asc";
    $query_pro = mysqli_query($conn,$sql_pro);
?>
<h3 class="title_danhmuc">Danh mục sản phẩm: <?php echo $row_title['tendanhmuc']?></h3>
<ul class="product_list">
    <?php
        while($row_pro = mysqli_fetch_array($query_pro)){
    ?>
    <li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sp']?>" style="color:black; text-decoration: none;">
            <img class="img_product" src="ADMIN/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh']?>" alt="">
            <p class="title_product"><?php echo $row_pro['tensanpham']?></p>
            <p class="price_product"><?php echo number_format($row_pro['giasp'],0,',','.').'vnd'?></p>
        </a>
    </li>
    <?php
    }
    ?>
</ul>