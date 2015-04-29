<!-- Peter Bahng, Alexander Kim, Max Serpe
Course Project Part 4
index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="favicon.ico">

	<title>Books4Hoos - Home</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/button.css" rel="stylesheet">
  <link href="css/navbar.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body>

     <!--Navigation Bar-->
     <nav class="navbar navbar-default navbar-fixed-top">

       <div class="navbar-header">

        <!--Search Bar goes here-->
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-md-offset-3">
              <form action="search.php" method="post" class="search-form">
                <div class="form-group has-feedback">
                  <label for="search" class="sr-only">Search</label>
                  <input type="text" class="form-control" name="searchingOperation" id="searching" placeholder="Search for books or contact email and press enter">

                </div>
              </form>
            </div>
          </div>
        </div>

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>

       <a class="navbar-brand" href="index.php"><img id="brand-image" alt="Website Logo" style = "margin-right:720px" src="navbarlogo.png">Home</>
       </a>

       <a class="navbar-brand navbar" href="about.html">About</a>
       <a class="navbar-brand" href="register.html">Register</a>
       <a class="navbar-brand" href="buy.html">Buy Books</a>
       <a class="navbar-brand" href="sell.html">Sell Books</a>
       <a class="navbar-brand" href="export.html">Export Data</a>
     </div>
   </nav>
   <!--End Navigation-->

   <!-- Wrapper for slides -->

   <div id = "myCarousel" class ="carousel slide"
   <ol class = "carousel-indicators">
     <li data target = "myCarousel" data-slide-to = "0" "active"></li>
     <li data target = "myCarousel" data-slide-to = "1"></li>
   </ol>

   <div class="carousel-inner">

     <div class="item active">
      <a href="index.php"><img src="books4hoosbanner.jpg" alt = "Home Page" class = "img-responsive"></a>
      <div class="container">
       <div class="carousel-caption">            
       </div>  
     </div>  
   </div>

   <div class="item">
    <a href="about.html"><img src="Slide2.jpg"></a>
    <div class="container">
     <div class="carousel-caption">            
     </div>  
   </div>  
 </div>

 <a class = "carousel-control left" href= "#myCarousel" data-slide = "prev">
   <span class = "icon-prev"></span>
 </a>

 <a class = "carousel-control right" href= "#myCarousel" data-slide = "next">
   <span class = "icon-next"></span>
 </a>



</div>
<!--Carousel End-->


<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">
   <h2>A service by students, for students.</h2>
   <p><small>Our aim is to help current UVA students get the most bang for their buck. We, too, are current UVA students and know how difficult it can be to find affordable textbooks. Books4Hoos is the solution. Got a book to sell? Make a listing to our site and we'll help you find buyers that match your desired price. Got a book to buy? Search for the book you need and find the best deals on high-demand used textbooks!</small></p>
   <p><a class="btn btn-sky btn-lg" href="register.html" role="button">Sign me up! </a></p>
 </div>
</div>

<div id="footer">
  <div class="container">
   <div class="row">
    <div class="col-md-6">
     <center>
      <img src="http://icons.iconarchive.com/icons/aha-soft/3d-social/128/Social-network-icon.png" class="img-circle" alt="...">
      <br>
      <h4 class="footertext">Total number of registered users</h4>

      <h2 class="footertext">


       <?php

       include_once("./library.php");
       $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
       if (mysqli_connect_errno())
       {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

                              // Searchbar Query
      $search_query=mysqli_query($con, "SELECT COUNT(*) FROM user;");
      $f1 = mysqli_fetch_array($search_query);
      echo  $f1['COUNT(*)'];
      ?> Users<br>




    </center>
  </div>
  <div class="col-md-6">
    <center>
     <img src="http://icons.iconarchive.com/icons/martz90/circle/128/books-icon.png" class="img-circle" alt="the-brains">
     <br>
     <h4 class="footertext">Total number of books currently listed for sale</h4>
     <h2 class="footertext">

      <?php

      include_once("./library.php");
      $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
      if (mysqli_connect_errno())
      {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }

                              // Searchbar Query
     $search_query=mysqli_query($con, "SELECT COUNT(*) FROM inventory;");
     $f1 = mysqli_fetch_array($search_query);
     echo  $f1['COUNT(*)'];
     ?> Books<br>


     <br>
   </center>
 </div>
</div>
</div>
</div>
</div>

<hr>
<footer>
 <p><center>&copy; Books4Hoos 2015</center></p>
</footer>
</div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  </html>
