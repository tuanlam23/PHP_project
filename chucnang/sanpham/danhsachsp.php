﻿<?php
$id_dm=$_GET['id_dm'];
$sql1="SELECT * FROM dmsanpham WHERE id_dm=$id_dm";
$query1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($query1);

if (isset($_GET['page'])) {
   $page=$_GET['page'];
}
else{
    $page=1;
}
$rowsPerPage=4;
$perRow=$page*$rowsPerPage-$rowsPerPage;
$sql="SELECT * FROM sanpham WHERE id_dm=$id_dm ORDER BY id_sp DESC LIMIT $perRow,$rowsPerPage";
$query=mysqli_query($conn,$sql);
// $row=mysqli_fetch_array($query);
// tong so ban ghi
$totalRows=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM sanpham WHERE id_dm=$id_dm"));
//tong so trang
$totalPage=ceil($totalRows/$rowsPerPage);
//xay dung thanh phan trang
$listPage="";
for($i=1;$i<=$totalPage;$i++)
{
    if ($page==$i) {
        $listPage.='<li class="active"><a href="index.php?page_layout=danhsachsp&id_dm='.$id_dm.'&page='.$i.'">'.$i.'</a></li>';
    }
    else{
        $listPage.='<li><a href="index.php?page_layout=danhsachsp&id_dm='.$id_dm.'&page='.$i.'">'.$i.'</a></li>';
    }
}




?>
            <div class="products">
                <h2 class="h2-bar"><?php echo $row1['ten_dm'];?></h2>
                <div class="row">
                    <?php
                    while ($row=mysqli_fetch_array($query)) {
                    ?>
                    <div class="col-md-3 col-sm-6 product-item text-center">
                        <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'];?>"><img width="80" height="144" src="quantri/anh/<?php echo $row['anh_sp']; ?>"></a>
                        <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'];?>"><?php echo $row['ten_sp']; ?></a></h3>
                        <p>Bảo hành: <?php echo $row['bao_hanh']; ?></p>
                        <p>Tình trạng: <?php echo $row['tinh_trang']; ?></p>
                        <p class="price">Giá: <?php echo $row['gia_sp']; ?> VNĐ</p>
                    </div>
                    <?php
                     }
                    ?>
                    
                </div>
           <!-- Pagination -->
<div id="pagination">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php
            echo $listPage;

            ?>
        </ul>
    </nav>
</div>            
<!-- End Pagination -->    
