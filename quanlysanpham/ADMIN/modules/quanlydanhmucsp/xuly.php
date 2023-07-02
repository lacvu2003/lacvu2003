<?php
    include("../../config/config.php");
    $tenloaisp = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];
    if(isset($_POST['themdanhmuc'])){
        $sql_them = "INSERT INTO `tbldanhmucsp`(`tendanhmuc`,`thutu`)VALUES('$tenloaisp','$thutu')";
        mysqli_query($conn,$sql_them);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }
    elseif(isset($_POST['suadanhmuc'])){
        $sql_update = "UPDATE tbldanhmucsp SET tendanhmuc = '$tenloaisp', thutu = '$thutu' WHERE ID ='$_GET[iddanhmuc]'";
        mysqli_query($conn,$sql_update);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }
    else{
        $id = $_GET['iddanhmuc'];
        $sql_xoa = "DELETE FROM tbldanhmucsp WHERE ID = '$id'";
        mysqli_query($conn,$sql_xoa);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }
?>