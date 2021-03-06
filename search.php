<!-- Peter Bahng, Alexander Kim, Max Serpe
Course Project Part 4
search.php -->

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

  <title>Books4Hoos - Buy Books</title>


  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Buy Books</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap2.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">
    <link href="css/buy.css" rel="stylesheet">
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


   <div class="carousel-inner">
    <div class="item active">
      <a href="#"><img src="books4hoosbanner.jpg"></a>
      <div class="container">
        <div class="carousel-caption">            
        </div>  
      </div>  
    </div>
    <!--Carousel End-->



    <div class="container">

     <div class="row row-offcanvas row-offcanvas-right">

      <div class="col-xs-12 col-sm-9">
       <p class="pull-right visible-xs">
       </p>
       <div class="jumbotron">
        <h1>Book Exchange!</h1>
        <p>Search for the book that you need, then contact the owner of the book! <br>
          It's that simple! Our services automatically populate the details of available books and the seller's contact information.</p>
        </div>

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
  </div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>


  <!--Table starts here-->

  <div class="container">
   <div class="row">


    <div class="col-md-12">
     <div class="table-responsive">


      <table id="mytable" class="table table-bordred table-striped">

       <thead>

        <th>Title</th>
        <th>Author</th>
        <th>Edition</th>
        <th>Price</th>
        <th>Version</th>
        <th>Condition</th>
        <th>Contact</th>
        <th>Edit Price</th>
        <th>Delete Entry</th>
      </thead>
      <tbody>

        <tr>
         <?php

         include_once("./library.php");
         $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
         if (mysqli_connect_errno())
         {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $search_query=mysqli_query($con, "SELECT title,author,edition,price,version,conditions,email FROM (book NATURAL JOIN ins NATURAL JOIN own NATURAL JOIN user NATURAL JOIN inventory) WHERE title
          LIKE '%$_POST[searchingOperation]%' OR author LIKE '%$_POST[searchingOperation]%' OR email LIKE '%$_POST[searchingOperation]%'");

        while ($row = mysqli_fetch_array($search_query)) {
          $f1 = $row['title'];
          $f2 = $row['author'];
          $f3 = $row['edition'];
          $f4 = $row['price'];
          $f5 = $row['version'];
          $f6 = $row['conditions'];
          $f7 = $row['email'];
          ?>
          <td><?php echo $f1 ?></td>
          <td><?php echo $f2 ?></td>
          <td><?php echo $f3 ?></td>
          <td>$<?php echo $f4 ?></td>
          <td><?php echo $f5 ?></td>
          <td><?php echo $f6 ?></td>
          <td><a href="mailto:<?php echo $f7; ?>"</td><?php echo $f7; ?></a>

          <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
          <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
        </tr>
        <?php
      } 
      mysqli_close($con);
      ?>  
    </tr>
  </tbody>

</table>



</div>
</div>
</div>

<form role="form"action="edit.php" method="post">
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">


      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>    

      <h4 class="modal-title custom_align" id="Heading">Edit Your Detail<br><small>Please confirm your username and password, fill out the details pertinent to your listing, and update the price as desired. </small></h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
       <input class="form-control " name = "usernameedit" type="text" placeholder="Please enter your username">
     </div>
     <div class="form-group">
       <input class="form-control " name = "passwordedit" type="password" placeholder="Please enter your password">
     </div>
     <div class="form-group">
       <input class="form-control " name = "titleedit" type="text" placeholder="Confirm Title of Book">
     </div>
     <div class="form-group">
       <input class="form-control " name = "authoredit" type="text" placeholder="Confirm Author of Book">
     </div>
     <div class="form-group">
       <input class="form-control " name = "editionedit" type="text" placeholder="Confirm Edition of Book">
     </div>
     <div class="form-group">
       <input class="form-control " name = "oldprice" type="text" placeholder="Old Price">
     </div>
     <div class="form-group">
       <input class="form-control " name = "newprice" type="text" placeholder="New Price">
     </div>
     <div class="form-group">
       <input class="form-control " name = "versionedit" type="text" placeholder="Confirm Version of Book">
     </div>
     <div class="form-group">
       <input class="form-control " name = "conditionedit" type="text" placeholder="Confirm Condition of Book">
     </div>
     <div class="form-group">
       <input class="form-control " name = "contactedit" type="text" placeholder="Confirm Email">
     </div>



   </div>
 </div>
 <div class="modal-footer ">
   <button type="submit" class="btn btn-sunny btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update Price</button>

 </div>
</div>
<!-- /.modal-content --> 
</div>
<!-- /.modal-dialog --> 
</div>

</form>

<form role="form"action="delete.php" method="post">
 <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
     <h4 class="modal-title custom_align" id="Heading">Delete Your Listing<br><small>In order to delete your listing, you must first confirm your username and password, fill out the details pertinent to your listing, and press the delete button. </small> </h4>
   </div>

   <div class="modal-body">
     <div class="form-group">
      <input class="form-control " name = "usernameedit" type="text" placeholder="Please enter your Username">
    </div>
    <div class="form-group">
      <input class="form-control " name = "passwordedit" type="password" placeholder="Please enter your password">
    </div>
    <div class="form-group">
      <input class="form-control " name = "titleedit" type="text" placeholder="Confirm Title of Book">
    </div>
    <div class="form-group">
      <input class="form-control " name = "authoredit" type="text" placeholder="Confirm Author of Book">
    </div>
    <div class="form-group">
      <input class="form-control " name = "editionedit" type="text" placeholder="Confirm Edition of Book">
    </div>
    <div class="form-group">
      <input class="form-control " name = "oldprice" type="text" placeholder="Confirm Price of Book">
    </div>
    <div class="form-group">
      <input class="form-control " name = "versionedit" type="text" placeholder="Confirm Version of Book">
    </div>
    <div class="form-group">
      <input class="form-control " name = "conditionedit" type="text" placeholder="Confirm Condition of Book">
    </div>
    <div class="form-group">
      <input class="form-control " name = "contactedit" type="text" placeholder="Confirm Email">
    </div>



  </div>
</div>
<div class="modal-footer ">

  <button type="submit" class="btn btn-hot btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-remove"></span>Delete your listing</button>
</div>
</div>
<!-- /.modal-content --> 
</div>
<!-- /.modal-dialog --> 
</div>
<hr>
<footer>
  <p><center>&copy; Books4Hoos 2015</center></p>
</footer>
</form>
<!--Table ends here-->

   <!-- Bootstrap core JavaScript
   ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>

   <script src="offcanvas.js"></script>
 </body>
 </html>