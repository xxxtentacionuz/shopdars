<?php session_start();
if (!isset($_SESSION['user']['username']) AND !isset($_SESSION['user']['id'])){
    header('Location: login.php');
}
?>



<?php require('dbmysql.php'); ?>

<?php
$user_sql = "SELECT * FROM User ORDER BY id DESC ";
$users = $conn->query($user_sql);
$users = $users->fetch_all(MYSQLI_ASSOC);
?>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>User</h1>
        <a href="add-user.php" class="btn btn-success">Yangi qo'shish</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">firstname</th>
                <th scope="col">lastname</th>
                <th scope="col">username</th>
                <th scope="col">phone</th>
                <th scope="col">password</th>
                <th scope="col">email</th>
                <th scope="col">gender</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Amallar</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <th scope="row"><?=$user['id'];?></th>
                    <td><?=$user['firstname'];?></td>
                    <td><?=$user['lastname'];?></td>
                    <td><?=$user['username'];?></td>
                    <td><?=$user['password'];?></td>
                    <td><?=$user['phone'];?></td>
                    <td><?=$user['email'];?></td>
                    <td><?=$user['gender'];?></td>
                    <td><?=$user['created_at'];?></td>
                    <td><?=$user['updated_at'];?></td>
                    <td>
                        <a href="edit-user.php?id=<?= $user['id'];?>" class="btn btn-warning">O'zgartirish</a>
                        <a href="delete-user.php?id=<?= $user['id'];?>" class="btn btn-danger">O'chirish</a>
                    </td>

                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</section>
<!-- Footer-->
<?php require('sections/footer.php'); ?>
