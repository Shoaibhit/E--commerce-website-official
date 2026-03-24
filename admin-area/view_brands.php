<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>SIno.</th>
            <th>Brand title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <tr class="text-center">
            <?php
            $select_cate="select * from `brands`";
            $result=mysqli_query($con,$select_cate);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $brand_id=$row['brand_id'];
                $brand_title=$row['brand_name'];
                $number++;
?>
            <td><?php echo $number; ?></td>
            <td><?php echo $brand_title; ?></td>
            <td><a href='' class=''><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='' class=''><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
            }?>
    </tbody>
</table>