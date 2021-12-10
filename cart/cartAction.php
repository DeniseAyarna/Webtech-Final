<?php
require("../original/database-connection.php");
session_start();

if(!isset($_SESSION['userID'])){
    header('Location:../Login_v16/Login.php');
}
if (isset($_GET['productID'])) {
	$product_id = $_GET['productID'];
    $userID = $_SESSION['userID'];
    $qty = 1;

	$sql = "INSERT INTO `cart` (`userID`, `product_id`, `quantity`) VALUES ('$userID','$product_id','$qty');";
	$result = mysqli_query($connect, $sql);

	if ($result){
        echo "
        <script> 
            alert('Product added to cart!');
            window.location='../original/product.php';
        </script>";
	} else echo "
        <script> 
            alert('Product already in cart! Update quantity from your cart.');
            window.location='../cart/cart.php';
        </script>";
}

if (isset($_GET['delID'])) {
    $userID = $_SESSION['userID'];
    $product_id = $_GET['delID'];
    $sql = "select * from `cart` where userID = '$userID' and product_id = '$product_id'";
	$result = mysqli_query($connect, $sql);
    // loop through each cart item
    while($row = mysqli_fetch_array($result)){
        $old = $row['quantity'];
        $newQty = $old - 1;
        if ($old != 0 && $newQty != 0) {
            $sql = "update `cart` set quantity = '$newQty' where userID = '$userID' and product_id = '$product_id'";
            $result = mysqli_query($connect, $sql);
            if ($result) {
                header('location: ../cart/cart.php');
            } else {
                echo "failure";
            }
        } else {
            header('location: ../cart/cart.php');
        }
    }
}

if (isset($_GET['addID'])) {
    $userID = $_SESSION['userID'];
    $product_id = $_GET['addID'];
    $sql = "SELECT * from `cart` where userID = '$userID' and product_id = '$product_id'";
    echo $sql;
	$result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0){
		// output data of each row
		while($row = mysqli_fetch_array($result)){
            $old = $row['quantity'];
            $newQty = $old + 1;
            if ($old != 0 && $newQty != 0) {
                $sql = "update cart set quantity = '$newQty' where userID = '$userID' and product_id = '$product_id'";
                $results = mysqli_query($connect, $sql);
                if ($results) {
                    header('location: ../cart/cart.php');
                } else {
                    echo "failure";
                }
            } else {
                header('location: ../cart/cart.php');
            }
        }
	} else{
		header('location: ../cart/cart.php');
	}
    
}

if (isset($_GET['deleteID'])) {
    $userID = $_SESSION['userID'];
    $product_id = $_GET['deleteID'];
    $sql = "Delete from `cart` where userID = '$userID' and product_id = '$product_id'";
    echo $sql;
	$result = mysqli_query($connect, $sql);
    if($result){
        header('location: ../cart/cart.php');    
	} else {
		header('location: ../cart/cart.php');
    }
}


?>