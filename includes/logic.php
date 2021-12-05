<?php require_once "db.php"; ?>
<?php require_once "functions.php" ?>
<?php
//here the red line is not actually a red line it's just from the require
if (isset($_POST["register_submit"])) {
    $dataArr = getPostData($_POST, ['username', 'email', 'password', 'password_confirmation']);
    $username = $dataArr[0];
    $email = $dataArr[1];
    $password = $dataArr[2];
    $password_confirmation = $dataArr[3];
    validate_password($password);
    validate_email($email);
    confirm_password($password, $password_confirmation);
    $validate = validate_all_paramters(...$validation_array);
    if (!$validate) {
        $query = "";
        foreach ($errors as $error_type => $error) {
            $query .= "{$error_type}={$error} ";
        }
        //send all of the errors at the same time
        header("Location:../account-register.php?{$query}");
        exit;
    }
    //encrypt the password
    $password = md5($password);
    checkRepetition_and_showUsers($connection, true, "user", ['email', 'password'], [$email, $password], "../account-register.php");
    crud($connection, "INSERT", "user", ['username', 'email', 'password'], [$username, $email, $password]);
    header("Location:../account-login.php?register=success");
    exit();
}
//login logic
if (isset($_POST['login_submit']) || (isset($_POST['checkout_login']))) {
    $url = "";
    if (isset($_POST['checkout_login'])) {
        $url = "shop-checkout.php";
    }
    if (isset($_POST['login_submit'])) {
        $url = "account-login.php";
    }

    $returned_array = getPostData($_POST, ["username", 'password']);
    $password = $returned_array[1];
//check if the user inputs username or email
    if (validate_email($returned_array[0])) {
        $email = $returned_array[0];
        $validate = validate_password($password);
        if (!$validate) {
            //send all of the errors at the same time
            header("Location:../{$url}?password=password not valid");
            exit;
        }
        $statement = $connection->prepare("SELECT * FROM user WHERE email=:email");
        $statement->bindValue(':email', $email);
        $statement->execute();
        $user_data = $statement->fetch(PDO::FETCH_ASSOC);
        //return error that the email doesn't exist
        if (!$user_data) {
            header("Location:../{$url}?email=email doesn't exist");
            exit();
        }
        $password = md5($password);
        //return error if the password don't match
        if ($user_data['password'] !== $password) {
            header("Location:../{$url}?password=password is wrong");
            exit();
        }
        session_start();
        $_SESSION['user_loggedin'] = true;
        $_SESSION['user_name']=$user_data['name'];
        header("Location:../{$url}");
        exit();
    } elseif (validate_username($returned_array[0])) {
        $username = $returned_array[0];
        $validate = validate_password($password);
        if (!$validate) {
            //send all of the errors at the same time
            header("Location:../{$url}?password=password not valid");
            exit;
        }
        $statement = $connection->prepare("SELECT * FROM user WHERE username=:username");
        $statement->bindValue(':username', $username);
        $statement->execute();
        $user_data = $statement->fetch(PDO::FETCH_ASSOC);

        //return error that the email doesn't exist
        if (!$user_data) {
            header("Location:../{$url}?username=username doesn't exist");
            exit();
        }
        $password = md5($password);
        echo $user_data["password"];
        //return error if the password don't match
        if ($user_data['password'] !== $password) {
            header("Location:../account-login.php?password=password is wrong");
            exit();
        }
        //--------------------------------------------------------
        //LOGIN SUCCEEDED
        session_start();
        $_SESSION['user_loggedin'] = true;
        $_SESSION['user_name']=$user_data['username'];
        $_SESSION['user_id']=$user_data['id'];
        if (isset($_POST['login_submit'])) {
            $url = "index.php";
        }
        header("Location:../{$url}");
        exit();
        //------------------------------------------------------------------

    } else {
        header("Location:../{$url}?username=please enter valid username or email");
    }
}
//---------------------------------
if(isset($_POST['country'])){
    session_start();
    $user_id=$_POST['user_id'];
    $country=$_POST['country'];
    $city=$_POST['city'];
    $phone=$_POST['phone'];
    $address_line=$_POST['address_line'];
    $counter=0;
    $comma=",";
    foreach($_SESSION["shopping_cart"] as $product_arr):
        if($counter===$i-1){
            $comma=" ";
        }
        $cart_after_shopping.="id:{$product_arr['product_id']} name:{$product_arr['product_name']}
                  price:{$product_arr['product_price']} price_onsale:{$product_arr['product_sale_price']}{$comma}";
        $counter++;
    endforeach;

//insert to user_checkout
    crud($connection, "INSERT", "order_summary",
        ["checkout_street_address","checkout_city","checkout_country"
            ,"checkout_phone", "order_total_price","user_id","order_status","cart_after_shopping"],
        [$address_line,$city,$country,$phone,$_SESSION['order_total'],$user_id,"pending",$cart_after_shopping]
         );
    unset($_SESSION["shopping_cart"]);
    header("Location:../shop.php");

}