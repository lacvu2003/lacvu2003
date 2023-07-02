<?php
    $sql_pro = "SELECT * FROM tblsanpham ORDER BY tblsanpham.id_sp asc";
    $query_pro = mysqli_query($conn,$sql_pro);
?>
<h3 class="title_danhmuc">Sản phẩm bán chạy</h3>
<ul class="product_list">
    <?php
        while($row = mysqli_fetch_array($query_pro)){
    ?>
    <li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sp']?>" style="color:black; text-decoration: none;">
            <img class="img_product" src="ADMIN/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>" alt="">
            <p class="title_product"><?php echo $row['tensanpham']?></p>
            <p class="price_product"><?php echo number_format($row['giasp'],0,',','.').'vnd'?></p>
        </a>
    </li>
    <?php
        }
    ?>
</ul>