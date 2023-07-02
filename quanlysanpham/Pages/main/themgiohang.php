<?php
    session_start();
    include('../../ADMIN/config/config.php');
    //Thêm sản phẩm
    if(isset($_POST['themgiohang'])){   
        // session_destroy();
        $id = $_GET['idsanpham'];
        $soluong = 1;
        $sql = "SELECT * FROM tblsanpham WHERE id_sp = $id LIMIT 1";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);
        if($row){
            $new_product [] = array('tensanpham' => $row['tensanpham'],'id' => $id,'giasp' => $row['giasp'],'hinhanh' => $row['hinhanh'],'soluong' => $soluong);
            if(isset($_SESSION['cart'])){
                $found = false;
                foreach($_SESSION['cart'] as $cart_item){
                    // trùng dữ liệu
                    if($cart_item['id'] == $id){
                        $product [] = array('tensanpham' => $cart_item['tensanpham'],'id' => $cart_item['id'],'giasp' => $cart_item['giasp'],'hinhanh' => $cart_item['hinhanh'],'soluong' => $soluong+1);
                        $found = true;
                    }
                    //không trùng dữ liệu
                    else{
                        $product [] = array('tensanpham' => $cart_item['tensanpham'],'id' => $cart_item['id'],'giasp' => $cart_item['giasp'],'hinhanh' => $cart_item['hinhanh'],'soluong' => $cart_item['soluong']);
                    }
                }
                if($found == false){
                    $_SESSION['cart'] = array_merge($product,$new_product);
                }
                else{
                    $_SESSION['cart'] = $product;
                }
            }
            else{
                $_SESSION['cart'] = $new_product;
            }
        }
        header('Location: ../../index.php?quanly=giohang');
    }

    //Xóa tất cả sản phẩm
    if(isset($_GET['xoatatca'])){
        unset($_SESSION['cart']);
        header('Location: ../../index.php?quanly=giohang');
    }

    //Xóa từng sản phẩm
    if(isset($_SESSION['cart'])&&isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
                $product [] = array('tensanpham' => $cart_item['tensanpham'],'id' => $cart_item['id'],'giasp' => $cart_item['giasp'],'hinhanh' => $cart_item['hinhanh'],'soluong' => $cart_item['soluong']);
            }
            $_SESSION['cart'] = $product;
            header('Location: ../../index.php?quanly=giohang');
        }
    }

    //Cộng số lượng sản phẩm
    if(isset($_GET['cong'])){
        $id = $_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                $product [] = array('tensanpham' => $cart_item['tensanpham'],'id' => $cart_item['id'],'giasp' => $cart_item['giasp'],'hinhanh' => $cart_item['hinhanh'],'soluong' => $cart_item['soluong']);
                $_SESSION['cart'] = $product;
            }
            else{
                $tangsoluong = $cart_item['soluong'] + 1;
                if($cart_item['soluong']<=9){
                    $product [] = array('tensanpham' => $cart_item['tensanpham'],'id' => $cart_item['id'],'giasp' => $cart_item['giasp'],'hinhanh' => $cart_item['hinhanh'],'soluong' => $tangsoluong);
                }
                else{
                    $product [] = array('tensanpham' => $cart_item['tensanpham'],'id' => $cart_item['id'],'giasp' => $cart_item['giasp'],'hinhanh' => $cart_item['hinhanh'],'soluong' => $cart_item['soluong']);
                }
                $_SESSION['cart'] = $product;
            }
        }
        header('Location: ../../index.php?quanly=giohang');
    }

    //Trừ số lượng sản phẩm
    if(isset($_GET['tru'])){
        $id = $_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                $product [] = array('tensanpham' => $cart_item['tensanpham'],'id' => $cart_item['id'],'giasp' => $cart_item['giasp'],'hinhanh' => $cart_item['hinhanh'],'soluong' => $cart_item['soluong']);
                $_SESSION['cart'] = $product;
            }
            else{
                $trusoluong = $cart_item['soluong'] - 1;
                if($cart_item['soluong']>1){
                    $product [] = array('tensanpham' => $cart_item['tensanpham'],'id' => $cart_item['id'],'giasp' => $cart_item['giasp'],'hinhanh' => $cart_item['hinhanh'],'soluong' => $trusoluong);
                }
                else{
                    $product [] = array('tensanpham' => $cart_item['tensanpham'],'id' => $cart_item['id'],'giasp' => $cart_item['giasp'],'hinhanh' => $cart_item['hinhanh'],'soluong' => $cart_item['soluong']);
                }
                $_SESSION['cart'] = $product;
            }
        }
        header('Location: ../../index.php?quanly=giohang');
    }
?>