<!DOCTYPE HTML>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	 
	 <div class="container"> 
	 
	 <?php  
	 
	 include("baglan.php");
	 
	    if($_POST){
			 
			
			 $eposta = $_POST["eposta"]; 
			 
			 
			 if(!$eposta){
				 
				 echo '<div style="margin-top:20px;" class="alert alert-warning">eposta adresi bos bırakılamaz...</div>';
				 
			 }else {
				 
               
             $query = $db->prepare("select * from uye where uye_eposta=?");
			 $query->execute(array($eposta));
			 $row =  $query->fetch(PDO::FETCH_ASSOC);	  
             $kontrol = $query->rowCount();     
			 
			 if($kontrol){
			 
                  include("phpmailer/PHPMailerAutoload.php");
			
            $mail = new PHPMailer;            
 			
			$mail->IsSMTP();
			//$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'ssl'; // Güvenli baglanti icin ssl normal baglanti icin tls
			$mail->Host = "smtp.gmail.com"; // Mail sunucusuna ismi
			$mail->Port = 465; // Gucenli baglanti icin 465 Normal baglanti icin 587
			$mail->IsHTML(true);
			$mail->SetLanguage("tr", "phpmailer/language");
			$mail->CharSet  ="utf-8";
			$mail->Username = "ynskrc82@gmail.com"; // Mail adresimizin kullanicı adi
			$mail->Password = "Qwen220."; // Mail adresimizin sifresi
			$mail->SetFrom("ynskrc82@gmail.com",$row["uye_adsoyad"]); // Mail attigimizda gorulecek ismimiz
			$mail->AddAddress($eposta); // Maili gonderecegimiz kisi yani alici
			$mail->addReplyTo($eposta,$row["uye_adsoyad"]);
			$mail->Subject = "sifre degistirme kodu"; // Konu basligi
			$mail->Body = "<div style='background:#eee;padding:5px;margin:5px;width:300px;'> eposta : ".$eposta."</div> <br /> onaylama linki : <br /> 
			
			http://localhost:8080/sanal_market/sifre_duzenle.php?eposta=".$eposta."

			
			
			"; // Mailin icerigi
			if(!$mail->Send()){
			
                  echo '<div style="margin-top:20px;" class="alert alert-warning">mail gonderilemedi ama veritabanına kaydınız yapıldı..</div>';
			
			}else {
				
				echo '<div style="margin-top:20px;" class="alert alert-success">mail adresinize sifre onaylama maili gonderildi...</div>';
				
			}
				 
				  
			 }else {
				 
   echo '<div style="margin-top:20px;" class="alert alert-warning">boyle bir eposta veritabanında kayıtlı gozukmuyor...</div>';
 
				 
			 }	  

				  
				   
				   
			  

			
				 
			 }
			 
			 
			 
			
		}else {
			
			
			
			?>
			<form action="" method="post">
			<div class="col-md-5">
            <h3>sifrenizi almak için eposta adresinizi girin</h3>			
			<div class="form-group"> 
			<label for="eposta">eposta</label>
			<input type="text" name="eposta" class="form-control" id="eposta" />
			</div>
			
			<button type="submit" class="btn btn-primary">gonder</button>
			
			</div>
			</form>
			<?php
			
			
		}
	 
	 
	 ?>
	 
	 
	 
	 
	 </div>
	 
	 
</body>
</html>