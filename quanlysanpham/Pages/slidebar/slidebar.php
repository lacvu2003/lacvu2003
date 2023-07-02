<div class="slidebar">
    <ul class="list_sidebar">
        <?php
            $sql_danhmuc = "SELECT * FROM tbldanhmucsp ORDER BY ID asc";
            $query_danhmuc = mysqli_query($conn,$sql_danhmuc);
            while($row = mysqli_fetch_array($query_danhmuc)){
        ?>
        <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['ID']?>"><?php echo $row['tendanhmuc']?></a></li>
        <?php
            }
        ?>
    </ul>
</div>