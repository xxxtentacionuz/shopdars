<?php
include ("dbmysql.php");



function nomi($id){
    global $conn;
    $sql = "SELECT * from category WHERE  id = $id";
    $result  =$conn->query($sql);
    $result =$result->fetch_assoc();
    return isset($result['name']) ? $result['name'] : '';
}

function getSlideList(){
global $conn;
$slide = "SELECT * FROM slide ORDER BY level DESC";
$slides = $conn->query($slide);
return $slides->fetch_all(MYSQLI_ASSOC);
}

function getPartnerList(){
    global $conn;
    $hamkor = "SELECT * FROM hamkor ORDER BY level DESC";
    $hamkors = $conn->query($hamkor);
    return $hamkors->fetch_all(MYSQLI_ASSOC);
}

function getproductCart($cart_products){
    global $conn;
    $ids = array_column($cart_products, 'product_id');
    if (count($ids) > 0){
        $ids = implode(',', $ids);
        $product = "SELECT * FROM product WHERE id IN ($ids)";
        $products = $conn->query($product);
        $products = $products->fetch_all(MYSQLI_ASSOC);

        foreach ($products as $key => $value){
            foreach ($cart_products as $key2 => $value2){
                if ($value2['product_id'] == $value['id']){
                    $products[$key]['count'] = $cart_products[$key2]['count'];
                }
            }
        }

        return $products;

    }else{
        return [];
    }
}

function BuyStep(){
    global $conn;
    $BuyStep = "SELECT * FROM buystep ORDER BY level DESC";
    $BuySteps = $conn->query($BuyStep);
    return $BuySteps->fetch_all(MYSQLI_ASSOC);
}

function signup($username,$email,$password){
    global $conn;
    try {

        if (chekUsername($username)){
            return "'$username' logini ishlatilgan";
        }

        if (chekEmail($email)){
            return "'$email' email ishlatilgan";
        }
        $password = md5(md5($password));

        $inset_sql = "INSERT INTO user (username,email, password) VALUES ('$username','$email', '$password')";
        if ($conn->query($inset_sql)){
            return true;
        }else{
            return false;
        }



    }catch (Exception $e){
        return $e->getMessage();;
    }
}

function loginn($login,$password){
    global $conn;
    try {
        $password = md5(md5($password));

        $inset_sql = "INSERT INTO user (login,password) VALUES ('$login','$password')";
        if ($conn->query($inset_sql)){
            return true;
        }else{
            return false;
        }


    }catch (Exception $e){
        return $e->getMessage();;
    }
}

function signupp($username,$email,$password){
    global  $conn;

    try {
        $password =md5(md5($password));
        $inset_sql = "INSERT INTO user (username,email, password) VALUES ( '$username','$email', '$password')";
        if ($conn->query($inset_sql)){
            redirect('signup');
            return true;
        }else{
            return false;
        }
    }catch (Exception $e){
return $e -> getMessage();
    }
}

function chekUsername($username){
    global $conn;
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if($user !== null){
        return true;
    }else{
        return false;
    }

}

function chekEmail($email){
    global $conn;
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if($user !== null){
        return true;
    }else{
        return false;
    }

}

function login($username, $password){
    global $conn;
    $password = md5(md5($password));
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if($user === null){
        return false;
    }else{
        $_SESSION['user']['username'] = $user['username'];
        $_SESSION['user']['id'] = $user['id'];
        redirect('index');
    }

}

function creatOrder(){
    global $_SESSION , $conn;


    $user_id = $_SESSION['user']['id'];

    $sql = "INSERT INTO orders (user_id, required_date) VALUES ($user_id, NOW() + INTERVAL 2 DAY) ";

    if ($conn->query($sql)){
        CreatOrderDetail( $_SESSION['cart']['product'],$conn->insert_id);
        redirect('cart');
    }
}

function CreatOrderDetail($products,$order_id){
    global $conn;
    foreach ($products as $product){
        $id = $product['product_id'];
        $count = $product['count'];
        $price = getPrice($id);
        $sql = "INSERT INTO order_detail (order_id, product_id,quantity,priceEach) VALUES ($order_id,$id,$count,$price);";
    $conn->query($sql);

    }
unset($_SESSION['cart']);
}

function getPrice($id){
    global $conn;
    $sql = "SELECT price FROM product WHERE id = $id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
    return $product['price'];
}

function getOrders($id){
    global $conn;
    $sql = "SELECT * FROM orders WHERE user_id = {$id}";
    $users = $conn->query($sql);
    $orders = $users->fetch_all(MYSQLI_ASSOC);
    return $orders;
}
function resetPasswort($id,$password){
    global $conn;
    $inser_sql = "UPDATE user SET password = '$password' WHERE id == $id";
    $conn->query($inser_sql);
    if ($conn->query($inser_sql)){
        return true;
    }else{
        return false;
    }

}

function getUser($id){
    global $conn;
    $sql = "SELECT * FROM user where id = {$id}";
    $user = $conn->query($sql);
    return $user->fetch_assoc();
}

function getOrder($user_id){
    global $conn;
    $sql = "SELECT * FROM orders WHERE user_id = $user_id";
    $orders = $conn->query($sql);
    $orders = $orders->fetch_all(MYSQLI_ASSOC);
    return $orders;
}


function getDetail($id){
    global $conn;
    $sql = "SELECT
 od.id, p.image, p.name, od.quantity, od.priceEach
FROM order_detail as od LEFT JOIN  product as p ON od.product_id = p.id WHERE od.order_id = $id";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
function userGet($id){
    global $conn;
    $sql = "SELECT * FROM user WHERE id = $id";
    $orders = $conn->query($sql);
    $orders = $orders->fetch_all(MYSQLI_ASSOC);
    return $orders;
}

function  getUsers($id){
    global $conn;
    $product_sql = "SELECT * FROM user WHERE id = {$id}";
    $get_pro = $conn->query($product_sql);
    return $get_pro->fetch_assoc();
}

function GetUserr($id){
    global $conn;
    $sql = "SELECT * FROM user where id = {$id}";
    $user = $conn->query($sql);
    return $user->fetch_assoc();
}
function editUser($data){
    global $conn;
    $id = $data['id'];
    $image_name = $data['image'];
    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $phone = $data['phone'];
    $email = $data['email'];
    $gender = $data['gender'];
if ($image_name != ''){
    $user_sql = "UPDATE user SET firstname = '$firstname',image = ' $image_name', lastname = '$lastname',
                phone = '$phone', email = '$email', gender = '$gender' WHERE id = {$id}";
}else{
    $user_sql = "UPDATE user SET firstname = '$firstname', lastname = '$lastname',
                phone = '$phone', email = '$email', gender = '$gender' WHERE id = {$id}";
}

    if ($conn->query($user_sql)){
        return true;
    }
}

function emailAdd($email){
    global $conn;
    $inset_sql = "INSERT INTO email(email) 
                        VALUES ('$email')";
    if ($conn->query($inset_sql)){
    }

}

function GetEmail($id){
    global $conn;
    $sql = "SELECT * FROM email where id = {$id}";
    $user = $conn->query($sql);
    return $user->fetch_assoc();
}






function redirect($par){
    header("Location: " .$par . '.php');
}
