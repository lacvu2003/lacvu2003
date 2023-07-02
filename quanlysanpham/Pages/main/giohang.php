<?php
    session_start();
?>
<h3 class="title_danhmuc">Giỏ hàng</h3>
<?php
    if(isset($_SESSION['cart'])){
        
    }
?>

<table class="danhsachgiohang" border="1" style="border-collapse: collapse; width: 1000px; text-align: center;">
    <?php
        if(isset($_SESSION['cart'])){
            $tongtien = 0;
            foreach($_SESSION['cart'] as $cart_item){
                $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
                $tongtien += $thanhtien;
            
        
    ?>
    <tr>
        <td style="width: 300px;"><img class="hinhanh_chitiet" src="ADMIN/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']?>" alt=""></td>
        <td style="width: 200px;"><?php echo $cart_item['tensanpham']?></td>
        <td style="width: 170px;"><?php echo number_format($cart_item['giasp'],0,',','.')?></td>
        <td>
            <a href="Pages/main/themgiohang.php?cong=<?php echo $cart_item['id']?>"><i class="fa-solid fa-plus"></i></a>
            <?php echo $cart_item['soluong']?>
            <a href="Pages/main/themgiohang.php?tru=<?php echo $cart_item['id']?>"><i class="fa-solid fa-minus"></i></a>

        </td>
        <td><a href="Pages/main/themgiohang.php?xoa=<?php echo $cart_item['id']?>">Xóa</a></td>
    </tr>
    <?php
        }
    ?>
    <tr>
        <td colspan="4" style="float: left; border: none; padding: 15px; width: 300px;">
            <p style="float: left;">Tổng tiền: <?php echo number_format($tongtien,0,',','.')?></p>
            <p style="float: left; margin-left: 20px;"><a href="Pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a></p>
        </td>
    </tr>
    <?php
        }
        else{
    ?>
    <tr>
        <td style="padding: 30px;"><p>Giỏ hàng chưa có sản phẩm nào</p></td>
    </tr>
    <?php
        }
    ?>
    
</table>