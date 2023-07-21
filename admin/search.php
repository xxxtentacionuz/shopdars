<?php require('sections/head.php'); ?>
<?php require('../dbmysql.php'); ?>

<div class="container my-5" >
    <form method="post">
        <input type="text" placeholder="Search data" name="search">
        <button class="btn btn-dark btn-sm" name="submit">Search</button>

    </form>
    <div class="container my-5">
        <table class="table">
            <?php
            if (isset($_POST['submit'])){
                $search = $_POST['search'];
                $sql= "select * from product where id = '$search' or name = '$search' or category_id = '$search'";
                $result = mysqli_query($conn,$sql);
                if ($result){
                    if(mysqli_num_rows($result)>0){
                        echo '<theat>
                     <tr>
                     <th>id</th>   
                     <th>Name</th>
                     <th>Pric</th>
                     <th>Pric</th>
                     </tr>
                     </theat>
                        ';
                        $row = mysqli_fetch_assoc($result);
                        echo '<tbody>
                    <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['price'].'</td>
                    <td>'.$row['category_id'].'</td>
                    </tr>
                    ';
                    }else{
                        echo "<h2 class=':text-danger'>Data not fount</h2>";
                    }
                }
            }
            ?>

        </table>
    </div>
</div>

