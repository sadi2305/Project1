<?php
	session_start();
	$database_name = "product_detail";
	$con = mysqli_connect("localhost", "root","",$database_name);
	
	if(isset($_POST["add"])){
		if(isset($_SESSION["cart"])){
			$item_array_id = array_column($_SESSION["cart"],"product_id");
			if(!in_array($_GET["id"],$item_array_id)){
				$count = count($_SESSION["cart"]);
				$item_array = array(
				'product_id' => $_GET["id"],
				'item_name' => $_POST["hidden_name"],
				'product_proce' => $_POST["hidden_price"],
				'item_quantity' => $_POST["quantity"],
				);
				$_SESSION["cart"][$count] = $item_array;
				echo '<script>window.location="cart.php"</script>';
			}else{
				echo '<script>alert("Product is already added to cart")</script>';
				echo '<script>window.location="cart.php"</script>';
			}
		}else{
			$item_array = array(
				'product_id' => $_GET["id"],
				'item_name' => $_POST["hidden_name"],
				'product_proce' => $_POST["hidden_price"],
				'item_quantity' => $_POST["quantity"],
			);
			$_SESSION["cart"][0] = $item_array;
		}
	}
	
	if(isset($_GET["action"])){
		if($_GET["action"] == "delete"){
			foreach($_SESSION["cart"] as $keys => $value){
				if($value["product_id"] == $_GET["id"]){
					unset($_SESSION["cart"][$keys]);
					echo '<script>alert("Products has been removed...")</script>';
					echo '<script>window.location="cart.php"</script>';
				}
			}
		}
	}
	
?>

<html>
<head>
<title>Smart Choice</title>
<link rel="stylesheet" href="style.css"/>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<style>
		@import url('https://fonts.googleapis.com/css?family=Titillium+Web');
		
		*{
			font-family: 'Titillium Web', sans-serif;
		}
		.product{
			border: 1px solid meaeaec;
			margin: -1px 19px 3px -1px;
			padding: 10px;
			text-align: center;
			background-color: #efefef;
		}
		table, th,tr{
			text-align: center;
		}
		.title2{
			text-align: center;
			color: #66afe9;
			background-color:#efefef;
			padding: 2%;
		}
		h2{
			text-align: center;
			color: #66afe9;
			background-color:#efefef;
			padding: 2%;
		}
		table th{
			background-color:#efefef;
		}

	</style>


</head>
<body>

<div class="header">

	<div class="header_top">
		<div class="container">
			<ul>
			<li><i class="fa fa-user"></i>
				<a href="#">My Account</a></li>
			<li><i class="fa fa-shopping-cart"></i>
			<a href="cart.php">Shopping Chart</a></li>
			<li><i class="fa fa-sign-out"></i>
			<a href="#">CheckOut</a></li>
			<li><i class="fa fa-sign-out"></i>
			<a href="login.php">Sign in</a></li>
			<li><i class="fa fa-sign-out"></i>
			<a href="index.php">signOut</a></li>
			<li><a href="signup.php">Create Account</a></li>
			</ul>
		
		</div>
	</div>
	
	<div class="header_bottom">
	<div class="container">
	<img src="logo.png" height="100px" width="160px" alt=""/>
	
	</div>
	</div>
	<!--start menu section-->
	<div class="menu">
		<div class="container">
			<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="">About Us</a></li>
			<li><a href="">Product</a>
				<ul>
				<li><a href="gents.php">Gents</a></li>
				<li><a href="ladis.php">Ladis</a></li>
				</ul>
			</li>
			<li><a href="signup.php">Sign up</a></li>
			<li><a href="">Contact Us</a></li>
			</ul>
		</div>
	</div>
	
	
	
</div>



<div class="slider">
	<div class="container">
	
		<div class="left_slider">
		<img src="a1.png" alt="" width="100%" height="365"/>
		
		</div>
		
	
	
	
		<div class="ads">
			<div class="ads_top">
			<img src="a2.png" alt="" width="100%"/>
			</div>
			
			<div class="ads_bottom">
			<img src="a3.png" alt="" width="100%"/>
			</div>
		
		</div>
	<!--end Ads section-->
	</div>
</div>



<div class="content" >
	<div class="container" style="width: 100%">
	<div class="product_title">
	<h1>Featured products</h1>
	
	
	
	<?php
//session_start();
$product_ids = array();
//session_destroy();


if(filter_input(INPUT_POST, 'add_to_cart')){
    if(isset($_SESSION['shopping_cart'])){
        
        
        $count = count($_SESSION['shopping_cart']);
        
        
        $product_ids = array_column($_SESSION['shopping_cart'], 'id');
        
        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
        $_SESSION['shopping_cart'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );   
        }
        else { //product already exists, increase quantity
            //match array key to id of the product being added to the cart
            for ($i = 0; $i < count($product_ids); $i++){
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                    //add item quantity to the existing product in the array
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
        
    }
    else { //if shopping cart doesn't exist, create first product with array key 0
        //create array using submitted form data, start from key 0 and fill it with values
        $_SESSION['shopping_cart'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
}

if(filter_input(INPUT_GET, 'action') == 'delete'){
    //loop through all products in the shopping cart until it matches with GET id variable
    foreach($_SESSION['shopping_cart'] as $key => $product){
        if ($product['id'] == filter_input(INPUT_GET, 'id')){
            //remove product from the shopping cart when it matches with the GET id
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    //reset session array keys so they match with $product_ids numeric array
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}

//pre_r($_SESSION);

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Shopping Cart (working)</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="cart.css" />
    </head>
    <body>
        <div class="container">
        <?php

        $connect = mysqli_connect('localhost', 'root', '', 'cart1');
        $query = 'SELECT * FROM products ORDER by id ASC';
        $result = mysqli_query($connect, $query);

        if ($result):
            if(mysqli_num_rows($result)>0):
                while($product = mysqli_fetch_assoc($result)):
                //print_r($product);
                ?>
                <div class="col-sm-4 col-md-3" >
                    <form method="post" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                        <div class="products">
                            <img height="" src="<?php echo $product['image']; ?>" class="img-responsive" />
                            <h4 class="text-info"><?php echo $product['name']; ?></h4>
                            <h4>$ <?php echo $product['price']; ?></h4>
                            <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
                            <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info"
                                   value="Add to Cart" />
                        </div>
                    </form>
                </div>
                <?php
                endwhile;
            endif;
        endif;   
        ?>
        <div style="clear:both"></div>  
        <br />  
        <div class="table-responsive">  
        <table class="table">  
            <tr><th colspan="5"><h3>Order Details</h3></th></tr>   
        <tr>  
             <th width="40%">Product Name</th>  
             <th width="10%">Quantity</th>  
             <th width="20%">Price</th>  
             <th width="15%">Total</th>  
             <th width="5%">Action</th>  
        </tr>  
        <?php   
        if(!empty($_SESSION['shopping_cart'])):  
            
             $total = 0;  
        
             foreach($_SESSION['shopping_cart'] as $key => $product): 
        ?>  
        <tr>  
           <td><?php echo $product['name']; ?></td>  
           <td><?php echo $product['quantity']; ?></td>  
           <td>$ <?php echo $product['price']; ?></td>  
           <td>$ <?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>  
           <td>
               <a href="cart.php?action=delete&id=<?php echo $product['id']; ?>">
                    <div class="btn-danger">Remove</div>
               </a>
           </td>  
        </tr>  
        <?php  
                  $total = $total + ($product['quantity'] * $product['price']);  
             endforeach;  
        ?>  
        <tr>  
             <td colspan="3" align="right">Total</td>  
             <td align="right">$ <?php echo number_format($total, 2); ?></td>  
             <td></td>  
        </tr>  
        <tr>
            
            <td colspan="5">
             <?php 
                if (isset($_SESSION['shopping_cart'])):
                if (count($_SESSION['shopping_cart']) > 0):
             ?>
                <a href="#" class="button">Checkout</a>
             <?php endif; endif; ?>
            </td>
        </tr>
        <?php  
        endif;
        ?>  
        </table>  
         </div>
        </div>
    </body>
</html>

	
	
	
	
	</div>


</div>


<div class="footer">
	<div class="container">
	<p>@2305</p>
	
	</div>

</div>


</body>
</html>

