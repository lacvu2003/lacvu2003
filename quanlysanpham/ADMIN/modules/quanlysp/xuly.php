<?php
    include("../../config/config.php");
    if(isset($_POST['themsanpham'])){
        $tensanpham = $_POST['tensanpham'];
        $masp = $_POST['masp'];
        $giasp = $_POST['giasp'];
        $soluong = $_POST['soluong'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $hinhanh_time = time().'_'.$hinhanh;
        $tomtat = $_POST['tomtat'];
        $noidung = $_POST['noidung'];
        $tinhtrang = $_POST['tinhtrang'];
        $danhmuc = $_POST['danhmuc'];
        $sql_them = "INSERT INTO tblsanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang,ID)VALUES('$tensanpham','$masp','$giasp','$soluong','$hinhanh_time','$tomtat','$noidung','$tinhtrang','$danhmuc')";
        mysqli_query($conn,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_time);
        header('Location:../../index.php?action=quanlysanpham&query=them');
    }
    elseif(isset($_POST['suasanpham'])){
        $tensanpham = $_POST['tensanpham'];
        $masp = $_POST['masp'];
        $giasp = $_POST['giasp'];
        $soluong = $_POST['soluong'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $hinhanh_time = time().'_'.$hinhanh;
        $tomtat = $_POST['tomtat'];
        $noidung = $_POST['noidung'];
        $tinhtrang = $_POST['tinhtrang'];
        $danhmuc = $_POST['danhmuc'];
        if($hinhanh != ''){
            $sql = "SELECT * FROM tblsanpham WHERE id_sp = '$_GET[idsanpham]' LIMIT 1";
            $query = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($query)){
                unlink('uploads/'.$row['hinhanh']);
            }
            $sql_update = "UPDATE tblsanpham SET tensanpham = '$tensanpham', masp = '$masp', giasp = '$giasp', soluong = '$soluong', hinhanh = '$hinhanh_time', 
            tomtat = '$tomtat', noidung = '$noidung', tinhtrang = '$tinhtrang', ID = '$danhmuc' WHERE id_sp ='$_GET[idsanpham]'";
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_time);
        }
        else{
            $sql_update = "UPDATE tblsanpham SET tensanpham = '$tensanpham', masp = '$masp', giasp = '$giasp', soluong = '$soluong', 
            tomtat = '$tomtat', noidung = '$noidung', tinhtrang = '$tinhtrang', ID = '$danhmuc' WHERE id_sp ='$_GET[idsanpham]'";
        }
        mysqli_query($conn,$sql_update);
        header('Location:../../index.php?action=quanlysanpham&query=them');
        
    }
    else{
        $id = $_GET['idsanpham'];
        $sql = "SELECT * FROM tblsanpham WHERE id_sp = '$id' LIMIT 1";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
        }
        $sql_xoa = "DELETE FROM tblsanpham WHERE id_sp = '$id'";
        mysqli_query($conn,$sql_xoa);
        header('Location:../../index.php?action=quanlysanpham&query=them');
    }
?>