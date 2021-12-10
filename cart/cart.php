<?php
	require("../original/database-connection.php");
	session_start();

	$cartCount = 0;
	$id = $_SESSION['userID'];
	$sql = "select * from cart inner join product on cart.product_id = product.productID where userID='$id'";
    
	$result = mysqli_query($connect,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="cart.css">
    <style>
         .snippet {
            margin-top: 3em;
            min-height: 50%;
            vertical-align: middle;
            display: flex;
            font-family: sans-serif;
            font-size: 10pt;
            font-weight: bold
        }

        .title {
            margin-bottom: 5vh
        }

        .card {
            margin: auto;
            max-width: 950px;
            width: 100%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent
        }

        @media(max-width:767px) {
            .card {
                margin: 3vh auto
            }
        }

        .cart {
            background-color: #fff;
            padding: 4vh 5vh;
            border-bottom-left-radius: 1rem;
            border-top-left-radius: 1rem
        }

        @media(max-width:767px) {
            .cart {
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem
            }
        }

        .summary {
            background-color: pink;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 4vh;
            color: rgb(65, 65, 65)
        }

        @media(max-width:767px) {
            .summary {
                border-top-right-radius: unset;
                border-bottom-left-radius: 1rem
            }
        }

        .summary .col-2 {
            padding: 0
        }

        .summary .col-10 {
            padding: 0
        }

        .row {
            margin: 0
        }

        .title b {
            font-size: 1.5rem
        }

        .main {
            margin: 0;
            padding: 2vh 0;
            width: 100%
        }

        .col-2,
        .col {
            padding: 0 1vh
        }

        .col a {
            padding: 0 1vh
        }

        .close {
            margin-left: auto;
            color: darkred;
            font-size: 1.5rem
        }

        img {
            width: 5.5rem
        }

        .back-to-shop {
            margin-top: 4.5rem
        }

        h3 {
            margin-top: 2vh
        }

        hr {
            margin-top: 1.25rem
        }

        select {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1.5vh 1vh;
            margin-bottom: 6vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247)
        }

        input {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247)
        }

        input:focus::-webkit-input-placeholder {
            color: transparent
        }

        .btn {
            background-color: #000;
            border-color: #000;
            color: white;
            width: 100%;
            font-size: 11pt;
            margin-top: 2vh;
            padding: 1vh;
            border-radius: 0
        }

        .btn:focus {
            box-shadow: none;
            outline: none;
            box-shadow: none;
            color: white;
            -webkit-box-shadow: none;
            -webkit-user-select: none;
            transition: none
        }

        .btn:hover {
            color: white
        }

        a {
            color: black
        }

        a:hover {
            color: black;
            text-decoration: none
        }

        #code {
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center
        }
    </style>
</head>
<body>

<!--banner-->
<?php $count = 0; ?>
<div class='container snippet'>
    <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted">Your items</div>
                    </div>
                </div>
                <?php
                    if (mysqli_num_rows($result) > 0){
                        // output data of each row
                        $total = 0;
                        while($row = mysqli_fetch_array($result)){
                            $cartCount = $cartCount + 1;
                            $total = $total + $row['Price'] * $row['quantity'];
                            $count = $count + 1;

                            echo'<div class="row border-top ">
                                    <div class="row main align-items-center">
                                        <div class="col-2"> <img class="img-fluid" src="../original/'. $row['Image'] . '"> </div>
                                        <div class="col">
                                            <div class="row">' . $row['product_name'] . '</div>
                                        </div>
                                        <div class="col"> <a href="../cart/cartAction.php?delID='.$row['product_id'].'" style="color:red"> - </a> <a href="#" class="border">' . $row['quantity'] . '<a href="../cart/cartAction.php?addID='.$row['product_id'].'" style="color:green">+</a> </div>
                                        <div class="col">
                                            GHC ' . number_format($row['Price'] * $row['quantity'], 2) .'
                                            <a href="../cart/cartAction.php?deleteID=' .$row['product_id'] .'">
                                            <span class="close"> &#10005; </span></a></div>
                                    </div>
                                </div>';
                            }
                        } else {
                            $total = 0;
                            echo "<h3 style='text-align: center; font-weight: bolder;'> No items in cart.</h3>";
                        }
                ?>
                <div class="back-to-shop"><a href="../original/product.php">&leftarrow;<span class="text-muted"> Continue Shopping</span></a></div>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h3><b>Summary</b></h3>
                </div>
                <hr>
                <div class="row" style="margin-bottom:2vh;">
                    <div class="col" style="padding-left:0;"><?= $count ?> items</div>
                    <div class="col text-right">GHC <?= number_format(
                        $total,
                        2
                    ) ?></div>
                </div>

                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); margin-top: 4em; padding: 1vh 0;">
                    <div>YOU PAY:</div>
                    <hr>
                    <div id="totalprice">
                        <input type="decimal" name="amount" id="amount" value="<?=$total?>" disabled>
                    </div>
                </div> 
                <a href="checkout.php" ><button class="btn" type="submit"><b>CHECKOUT</b></button></a>
            </div>
        </div>
    </div>
</div>
    

</body>

</html>