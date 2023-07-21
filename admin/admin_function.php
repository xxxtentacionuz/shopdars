<?php
require('../dbmysql.php');
function deleteBest($id){
    global $conn;
$delete_sql = "DELETE FROM buystep where id = {$id}";
$conn->query($delete_sql);
redirect('BuyStep');
}
function deleteCategory($id){
     global $conn;
    $delete_sql = "DELETE FROM category where id = {$id}";
    $conn->query($delete_sql);
   redirect('category');



}
function  getCategory($id){
    global $conn;
    $category_sql = "SELECT * FROM category WHERE id = {$id}";
    $get_pro = $conn->query($category_sql);
    return $get_pro->fetch_assoc();
}
function getCategoryList(){
    global $conn;
    $sql = "SELECT * FROM category";
    $cat_list = $conn->query($sql);
    return $cat_list->fetch_all(MYSQLI_ASSOC);
}
function getUserList($id){
    global $conn;
    $user_sql = "SELECT * FROM user WHERE id = {$id}";
    $get_user = $conn->query($user_sql);
    return $get_user->fetch_assoc();
}
function DleteHamkor($id){
    global $conn;
    $delete_sql = "DELETE FROM hamkor where id = {$id}";
    $conn->query($delete_sql);
    redirect('hamkor');
}
function DleteProduct($id){
    global $conn;
    $delete_sql = "DELETE FROM product where id = {$id}";
    $conn->query($delete_sql);
    redirect('product');
}
function DleteSlide($id){
    global $conn;
    $delete_sql = "DELETE FROM slide where id = {$id}";
    $conn->query($delete_sql);
    redirect("slide");
}
function DleteUser($id){
    global $conn;
    $delete_sql = "DELETE FROM user where id = {$id}";
    $conn->query($delete_sql);
    redirect("user");
}
function  getBuystep($id){
    global $conn;
    $product_sql = "SELECT * FROM buystep WHERE id = {$id}";
    $get_pro = $conn->query($product_sql);
    return $get_pro->fetch_assoc();
}
function  GetHamkor($id){
    global $conn;
    $product_sql = "SELECT * FROM hamkor WHERE id = {$id}";
    $get_pro = $conn->query($product_sql);
    return $get_pro->fetch_assoc();
}
function  GetPraduct($id){
    global $conn;
    $product_sql = "SELECT * FROM product WHERE id = {$id}";
    $get_pro = $conn->query($product_sql);
    return $get_pro->fetch_assoc();
}
function AddProductList(){
    global $conn;
    $cat_list = "SELECT * FROM category";
    $cat_list = $conn->query($cat_list);
    return $cat_list->fetch_all(MYSQLI_ASSOC);

}
function EditProductList(){
    global $conn;
    $cat_list = "SELECT * FROM category";
    $cat_list = $conn->query($cat_list);
    return $cat_list->fetch_all(MYSQLI_ASSOC);

}
function AddUserList(){
global  $conn;
    $cat_list = "SELECT * FROM user ORDER BY id DESC ";
    $cat_list = $conn->query($cat_list);
    return $cat_list->fetch_all(MYSQLI_ASSOC);

}
function AddUserCategory(){
global  $conn;
    $cat_list = "SELECT * FROM category ORDER BY id ";
    $cat_list = $conn->query($cat_list);
    return $cat_list->fetch_all(MYSQLI_ASSOC);

}
function AddUser($data){
    global $conn;
    $lastname = $data['lastname'];
    $firstname = $data['firstname'];
    $username = $data['username'];
    $phone = $data['phone'];
    $email = $data['email'];
    $password = md5(md5($data['password']));
    $gender = $data['gender'];
    $inset_sql = "INSERT INTO user (lastname,firstname,username, phone, email, password, gender) VALUES ('$lastname','$firstname', '$username', $phone, '$email', '$password', $gender)";
    if ($conn->query($inset_sql)){
        redirect('user');
    }
}
function addBuyStep($wat,$descriptin,$level,$image_name){
    global $conn;
    $inset_sql = "INSERT INTO buystep(wat,descriptin,level,image) 
                        VALUES ('$wat','$descriptin','$level','$image_name')";


    if ($conn->query($inset_sql)){
        redirect('BuyStep');
    }

}
function addSlide($name,$price,$description,$image_name,$level){
    global $conn;

    $inset_sql = "INSERT INTO slide(name, price,description,image,level) 
                        VALUES ('$name', '$price','$description', '$image_name',$level)";

    if ($conn->query($inset_sql)){
        redirect('slide');
    }
    return false;
}

function addOrders1($id){
    global $conn;
    $updat = "UPDATE orders SET status = '1' WHERE id = {$id}";
    if ($conn->query($updat)){
        redirect('orders');
    }

}
function addOrders2($id){
    global $conn;

    $updat = "UPDATE orders SET status = '2',shipped_date =  NOW()  WHERE id = {$id}";
    if ($conn->query($updat)){
        redirect('orders');
    }

}























function redirect($par){
    header("Location: " .$par . '.php');
}