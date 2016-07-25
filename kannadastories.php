<?php
         $dbhost = 'localhost';
         $dbuser = 'estorypi_pavan';
         $dbpass = 'udupikrishna123';
         
         $rec_limit = 10;
         $conn = mysql_connect($dbhost, $dbuser, $dbpass);
         
         if(! $conn )
         {
            die('Could not connect: ' . mysql_error());
         }
         mysql_select_db('estorypi_web');
         
         
         /* Get total number of records */
         $sql = "SELECT count(Story_ID) FROM Story".
          " Where Story_Lan='kan'";
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval )
         {
            die('Could not get data: ' . mysql_error());
         }
         $row = mysql_fetch_array($retval, MYSQL_NUM );
         $rec_count = $row[0];
         
         if( isset($_GET{'page'} ) )
         {
            $page = $_GET{'page'} + 1;
            $offset = $rec_limit * $page ;
         }
         else
         {
            $page = 0;
            $offset = 0;
         }
         
         $left_rec = $rec_count - ($page * $rec_limit);
         $sql = "SELECT Story_ID, Story_Title, Story_Lan ".
            "FROM Story".
            " Where Story_Lan='kan'".
            " LIMIT $offset, $rec_limit";
            
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval )
         {
            die('Could not get data: ' . mysql_error());
         }
?>
<!doctype html>
<html>
<head>
<title>Kannada Stories</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Stunning Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--flexslider-css-->
<!--bootstrap-->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<!--coustom css-->
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,800italic,800,700italic,700,600,600italic' rel='stylesheet' type='text/css'>
<!--/fonts-->
<!--script-->
<script src="js/jquery.min.js"> </script>
<!-- js -->
	<!-- js -->
		 <script src="js/bootstrap.js"></script>
	<!-- js -->
		<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<!--/script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<!--/script-->
	</head>
	<body>
	


		<div class="header" id="home">
			<nav class="navbar navbar-default">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"> </span>
						<span class="icon-bar"> </span>
						<span class="icon-bar"> </span>
					</button>
					<a class="navbar-brand" href="index.html"><h1>Stunning</h1><br /><span>Traveling</span></a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right margin-top cl-effect-2">
								<li><a href="index.html"><span data-hover="Home">Home</span></a></li>
								<li><a href="about.html"><span data-hover="About">About</span></a></li>
								<li><a href="typography.html"><span data-hover="Shortcodes">Shortcodes</span></a></li>
								<li><a href="gallery.html"><span data-hover="Gallery">Gallery</span></a></li>
								<li><a href="contact.html"><span data-hover="Contact">Contact</span></a></li>
							</ul>
							<div class="clearfix"> </div>
						</div><!-- /.navbar-collapse -->
						<div class="clearfix"> </div>
				</div><!-- /.container-fluid -->
			</nav>
			
			<div class="header-banner">
					<!-- Top Navigation -->
					<section class="bgi banner5"><h2>Stories</h2> </section>
		<div class="typrography">
	 <div class="container">
		 <div class="grid_3 grid_4">
		
	      </div>
	      
	      
	       <div class="grid_3 grid_4">
            
            
    			<h3 class="first"><a href="englishstories.php">English</u></a></h3>
    			<h3 class="first"><u>Kannada</u></a></h3>
	     
             <div class="bs-example">
                 <table class="table">
                  <tbody>
                  
	              <? while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
			         {  ?>			          
			                <tr>
	                      		<td><a href=<? echo "chapters.php?storyId=".$row['Story_ID'];  ?>><h1><? echo $row['Story_Title'];  ?></a></h1></td>
	                    	</tr>
			      <? } ?>
                  </tbody>
                 </table>
             </div>
          </div>
          
          <?
           if( $page > 0 )
         	{
	            $last = $page - 2;
	            echo "<a href=\"$_PHP_SELF?page=$last\">Last 10 Stories</a> ";
	            if( $rec_count>$rec_limit * ($page + 2) )
	            echo "| <a href=\"$_PHP_SELF?page=$page\">Next 10 Stories</a>";
         	}
         
         else if( $page == 0 && $rec_count>$rec_limit )
         	{
            	echo "<a href=\"$_PHP_SELF?page=$page\">Next 10 Stories</a>";
			}			
         else if( $left_rec < $rec_limit && $rec_count >$rec_limit )
         	{
	            $last = $page - 2;
	            echo "<a href=\"$_PHP_SELF?page=$last\">Last 10 Stories</a>";
         	}
          ?>
          
		  
<!--footer-starts-->
	<div class="footer">
		<div class="container">
			<div class="footer-main">
				<div class="col-md-3 footet-left">
					<h3>INFORMATION</h3>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="gallery.html">Gallery</a></li>
						<li><a href="typography.html">Shortcodes</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
				<div class="col-md-3 footet-left">
					<h3>CATEGORIES</h3>
					<ul>
						<li><a href="#">Travlio</a></li>
						<li><a href="#">Whizz</a></li>
						<li><a href="#">Sayohat</a></li>
						<li><a href="#">Turistik</a></li>
						<li><a href="#">Excursion </a></li>
					</ul>
				</div>
				<div class="col-md-3 footet-left">
					<h3>MY ACCOUNT</h3>
					<ul>
						<li><a href="#">My account</a></li>
						<li><a href="#">My addresses</a></li>
					</ul>
				</div>
				<div class="col-md-3 footet-left">
					<h3>NEWSLETTER</h3>
					<div class="sub-text">
						<input type="text" value="Enter Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email';}"/>
						<input type="submit" value="" >
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="copy-rights">
				<p>&copy; 2015 Stunning. All Rights Reserved | Design by <a href="http://w3layouts.com/">W3layouts</a> </p>
			</div>
		</div>
<!---->
</div>
			<!---->
<script type="text/javascript">
		$(document).ready(function() {
				/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/
		$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!----> 
	</body>
</html>