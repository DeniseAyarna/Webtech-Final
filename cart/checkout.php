<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="cart.css">
    <style>
         .snippet {
            margin: auto;
            vertical-align: middle;
            font-family: sans-serif;
            font-size: 10pt;
            min-height: 50%;
            padding: 2em;
            font-weight: bold;
            background-color: #fff;
            max-width: 950px;
            width: 60%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent
        }

        form{
            margin:auto;
            width: 80%;
        }

        h2{
            text-align: center;
            font-weight: 900;
            padding: 1em;
        }

       
    </style>
</head>
<body>


<div class='container snippet'>
 
        <form action="">
            <h2>Enter Your Details</h2>
            <div class="form-group">
              <label> Name </label>
                  <input class="form-control" type="text" name="" id="">
            </div>
            <div class="form-group">
             <label>Number </label>
                 <input class="form-control" type="text" name="" id="">
            </div>
            <div class="form-group">
               <label>Address</label>
                   <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
            </div>
            <div> 
                <button class="btn btn-primary" onclick="order()"><b>PLACE ORDER</b></button>
            </div>
            <div class="back">
                <a href="../cart/cart.php">&leftarrow;<span class="text-muted"> Back to checkout</span></a>
            </div>

        </form>
    
</div>   


</body>

<script>
    function order(){
        window.location='../original/product.php';
        alert('Order has been placed successfully');
    }
</script>

</html>