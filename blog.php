<!DOCTYPE html>
<?php require_once("baglan.php"); ?>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SANAL | MARKET</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<!--header kısmını çagırıyoruz-->
	<?php require_once("header.php"); ?>
	
	<section>
		<div class="container">
			<div class="row">
				<!--header kısmını çagırıyoruz-->
				<?php require_once("sidebar.php"); ?>	
				
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">FİRMALARIMIZ</h2>
						<?php                               
                            $veri= $db->query("SELECT * FROM firma", PDO::FETCH_ASSOC);            
                                foreach($veri as $row){  
                                    $row['firma_id'];
                                    $a=$row['firma_id'];                                 
                        ?>
						<div class="single-blog-post">
							<h3><?php echo $row['firma_isim']; ?></h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> <?php echo $row['firma_yetkili'] ?></li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<img src="admin_firma/<?php echo $row['firma_resim'];?>" style="width:100%; height: 300px;">		
							<?php echo "<a href='blog-single.php?id=".$a."' class='btn btn-primary'>";?>Devamını Oku</a>
						</div>
						<?php
                        }
                        ?> 
									
						<div class="pagination-area">
							<ul class="pagination">
								<li><a href="" class="active">1</a></li>
								<li><a href="">2</a></li>
								<li><a href="">3</a></li>
								<li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!--footer kısmını çagırıyoruz-->
	<?php require_once("footer.php"); ?>

    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>