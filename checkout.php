<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name = "author" content = "Prachi Bansal" />
<meta name = "keywords" content = "It services provider, WebTree, Web services Provider, It company">
<meta name = "description" content = "WebTree is an IT company which pledges to provide the best IT services which will help you to expand your business and target your customers. ">
<link rel="icon" href="images/main-logo.jpg" type="image/x-icon"> 
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<!-- FontAwesome CSS -->
<link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="css/style.css">
<title>Blue Bird Books</title>
</head>
<body>
<div class="container-fluid px-0 bg-grey">
<!-- Header -->
  <header class="theme-bg-black" role="banner">
    <div class="container py-3">
      <div class="row top-header">
        <div class="col-6 social-icons"> 
            <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f mr-2" style="color: white;"></i></a>
            <a href="https://mail.google.com/" target="_blank"><i class="fab fa-google mr-2" style="color: white;"></i></a>		 
		    <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter mr-2" style="color: white;"></i></a>
			</div>
        <div class="col-6"><a href="contact.html"><span class="float-right">Contact Us</span></a></div>
      </div>
    </div>
  </header>
<!-- Main Nav -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white" id="main_nav" role="navigation">
    <div class="container"> 
		<a class="navbar-brand" href="index.html">
			<img src="images/logo.png" class="img-fluid" alt="Logo" width="80px" height="80px"/>
		</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
		  <span class="navbar-toggler-icon"></span> 
	  </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
			<li class="nav-item active"> <a class="nav-link" href="index.html">HOME</a><div class="underline"></div> </li>
            <li class="nav-item"> <a class="nav-link" href="books.php">BOOKS</a><div class="underline"></div> </li>
            <li class="nav-item"> <a class="nav-link" href="checkout.php">CHECK OUT</a><div class="underline"></div> </li>
		</ul>
      </div>
    </div>
  </nav>
  <main role="main">
    <div class="container-fluid">
 <div class="row">
    <div class="card bg-dark text-white align-items-center d-none d-md-block">
    
     
   </div>
   
 </div>
</div>
 <div class="container-fluid contact pt-3">
     <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <h1 style="text-decoration: underline">ORDER SUMMARY</h1>
   
    <?php
    require("mysqli_connect.php");
    if(!isset($_POST['bookname']))
    {
      echo "Your cart is empty, select item first....!!!!!";
    }
    else
    {
    $book_id = $_POST['bookname'] ;
    //echo $book_id;
    $query = "select * from inventory where book_id = '$book_id'";
    $result = @mysqli_query($dbc,$query);
    //echo $query;
    while($row = mysqli_fetch_array($result))
      {
        ?>
        <div class="row mt-5">
          <div class="col-sm-3 col-md-3 col-xs-3">
          <img src ='images/<?php echo $row['image'] ?>' width = '200px' height='200px' alt='Book images'></img>
        </div>
        
          <div class="col-sm-4 col-md-4 col-xs-4">
            
            <h5><?php echo "Book name: ". $row['book_name']; ?></h5>
            <p><?php echo "Price: ". "$ ". $row['price']; ?></p>
      </div>
      <div class="col-sm-5 col-md-5 col-xs-5"></div>
      </div>
      
      <?php
      }
    
    ?>
    
      <form action="placeorder.php" method="post">
      <div class="row mt-5">
      <div class="col">
      <input type="text" class="form-control" name="cust_name" id="cust_name" value="<?php if (isset($_POST['cust_name'])) echo $_POST['cust_name']; ?>" placeholder="NAME*" >
      <div class="name"></div>  
    </div>
      </div><br>
      <div class="row">
      <div class="col">
      <input type="text" class="form-control" name="phone" id="phone" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>" placeholder="PHONE NUMBER*" >
      <div class="phone"></div>  
    </div>
      </div><br>
      <div class="row">
      <div class="col">
      <input type="text" class="form-control" name="address" id="address" value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>" placeholder="ADDRESS*" >
      <div class="address"></div>  
    </div>
      </div><br>
      <div class="row">
      <div class="col">
      <input type="hidden" name="bookname" value=<?php echo "$book_id"?>>
      <p>Please select your payment type:</p>
      <input type="radio" id="debit" name="p_type" value="debit" <?php if(isset($_POST['p_type']) && ($_POST['p_type'] == "debit")) echo 'checked="true" '; ?>>
      <label for="debit">Debit</label><br>
      <input type="radio" id="visa" name="p_type" value="visa" <?php if(isset($_POST['p_type']) && ($_POST['p_type'] == "visa")) echo 'checked="true" '; ?>>
      <label for="visa">Visa</label><br>
      <input type="radio" id="wallet" name="p_type" value="wallet" <?php if(isset($_POST['p_type']) && ($_POST['p_type'] == "wallet")) echo 'checked="true" '; ?>>
      <label for="wallet">Wallet</label>
      <div class="payment"></div>
    </div>
<br>
</div>
<div class="row">
<div class="col">
       <input type="number" class="form-control" name="quantity" id="quantity" value="<?php if (isset($_POST['quantity'])) echo $_POST['quantity']; ?>" placeholder="QUANTITY*">
       <div class="quantity"></div> 
      </div>
       </div><br>
       <button type="submit" id="submit" class="btn btn-dark-green" style="margin-bottom: 1%;">PLACE ORDER</button>
       </form>
      <?php } ?>        
 </div>
 </div>
 </div>
   
 </div>
 
</main>
	  
	  
<!-- Footer -->	
  <footer class="bg-dark text-white" role="contentinfo">
    
	
	  <div class="container py-md-4 text-center">
		  <div class="row">
          <div class="col-md-12 grey-font">
          <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f mr-2" style="color: white;"></i></a>
          <a href="https://mail.google.com/" target="_blank"><i class="fab fa-google mr-2" style="color: white;"></i></a>		 
		  <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter mr-2" style="color: white;"></i></a>
		    </div>
			  <div class="col-md-12">
		<h6>&copy; 2021 | All Rights Reserved.</h6>
				  </div>
			  </div>
	  </div>
  </footer>
</div>

<!-- Optional JavaScript --> 
<script src="js/jquery-3.4.1.slim.min.js"></script> 
<script src="bootstrap/js/bootstrap.min.js"></script> 
<script src="https://kit.fontawesome.com/2b63d8a8a8.js" crossorigin="anonymous"></script>
</body>
</html>

