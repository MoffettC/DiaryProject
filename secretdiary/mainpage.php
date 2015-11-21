<?php
	session_start();
	
	include("connection.php");
	
	$query="SELECT diary FROM users WHERE id='".$_SESSION['id']."' LIMIT 1";
	
	$result = mysqli_query($link,$query);
	
	$row = mysqli_fetch_array($result);
	
	$diary=$row['diary'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secret Diary</title>
	
	 <link rel="stylesheet" type="text/css" href="css/style.css"> 

    <!-- Bootstrap 
    <link href="css/bootstrap.min.css" rel="stylesheet"> -->
	
	<!-- Include all compiled plugins (below), or include individual files as needed -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		
		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>

    
  </head>
  
<body data-spy="scroll" data-target=".navbar-collapse">

  <div class="navbar navbar-default navbar-fixed-top"> 
  	<div class="container">
  	
  		<div class="navbar-header pull-left">		
  			<a class="navbar-brand">Secret Diary</a> 			
  		</div>
  		
  		<div class="pull-right">
  			<ul class= "navbar-nav nav">
  				<li><a href="index.php?logout=1">Log Out</a></li>
  			 			
  		</div> 		
  	</div>	  	
  </div>
  
 <div class="container contentContainer" id="topContainer">
  		<div class="row">
  		
  			<div class="col-md-6 col-md-offset-3" id="topRow">			 
 			 <textarea class="form-control"><?php echo $diary; ?></textarea>
 			 </div>		
			 
		</div>		
  </div>
  
	
    <script>    
	$(".contentContainer").css("min-height",$(window).height());   
    $("textarea").css("height",$(window).height()-110);   	
	
    $("textarea").keyup(function() {  	
		$.post("updatediary.php", {diary:$("textarea").val()} );
   	});
     	
    </script>
    
  </body>
</html>