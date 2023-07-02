<?php
    if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1){
        unset($_SESSION['dangnhap']);
        header('Location: login.php');
    }
?>
<ul class="admin_list">
    <li class="admin_list_li"><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục</a></li>
    <li class="admin_list_li"><a href="index.php?action=quanlysanpham&query=them">Quản lý sản phẩm</a></li>
    <li class="admin_list_li"><a href="index.php?dangxuat=1">Đăng xuất: <?php if(isset($_SESSION['dangnhap'])){echo $_SESSION['dangnhap'];}?></a></li>
</ul>