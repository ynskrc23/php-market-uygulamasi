<!DOCTYPE HTML>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
	  <div class="container"> 
	  <?php  
	  
	  include("baglan.php");
	  
	    $eposta = $_GET["eposta"];
		
	    if(!$eposta){
			
 echo '<div style="margin-top:20px;" class="alert alert-warning">gerekli kodlar bos gozukuyor ..</div>';
	
			
		}else {
			
		  
          $query = $db->prepare("select * from uye where uye_eposta=?");
		  $query->execute(array($eposta));
		  $query->fetch(PDO::FETCH_ASSOC);
		  $kontrol = $query->rowCount(); 
		  
		  if($kontrol){
			  
			 
			 if($_POST){
				 
                $sifre = $_POST["sifre"];

              if(!$sifre){
				  
		 echo '<div style="margin-top:20px;" class="alert alert-warning">sifre bos bırakılamaz kardes..</div>';		  
				  
			  }else {
				  
				$update = $db->prepare("update uye set uye_sifre=? where uye_eposta=?");
				$ok = $update->execute(array($sifre,$eposta));
        
				if($ok == true){
					
				echo '<div style="margin-top:20px;" class="alert alert-success">yeni sifreniz basarıyla degistirildi giris yapabilirsiniz..</div>';	
				header ("Location:index.php");
					
				}else {
					
		 echo '<div style="margin-top:20px;" class="alert alert-warning">yeni sifreniz degistirilirken bir hata olustu..</div>';	
	
					
					
				}
				  
				  
			  }		

				
				 
			 }else {
				 
				?>
			<form action="" method="post">
			<div class="col-md-5">
            <h3>yeni sifrenizi girin</h3>			
			<div class="form-group"> 
			<label for="eposta">yeni sifre</label>
			<input type="text" name="sifre" class="form-control" id="eposta" />
			</div>
			
			<button type="submit" class="btn btn-primary">gonder</button>
			
			</div>
			</form>
				 <?php
				 
			 }
			 
			 
			  
			  
		  }else {
			  
			 echo '<div style="margin-top:20px;" class="alert alert-warning">onay kodu yanlıs yada daha once onaylanmıs...</div>'; 
			  
		  }
			
			
		}
	    
		
	  
	  ?>
	 
	 
	 
	 
	 </div>
</body>
</html>