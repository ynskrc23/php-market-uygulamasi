<?php  
require_once("baglan.php");
  
session_start();

 $data = [];

    
	if($_POST){
		
		if($_SESSION){
			
			$id = $_POST["id"];
			$ben = $_SESSION["id"];
			  
			$query = $db->prepare("select * from begeni where begenen_id = ? and begenilen_id = ?"); 
            $query->execute([$ben,$id]);			
			$ok = $query->rowcount();  
			
			if($ok){
				
				$data["hata"] =  "Bu ürünü daha önce begendiniz..";
				
			}else {
				
				$ekle = $db->prepare("insert into begeni set 
				
				  begenen_id = ?,
				  begenilen_id = ?
				
				");
			$ekle->execute([$ben,$id]); 
			 
			 	$guncelle = $db->prepare("update urun set urun_favori = urun_favori +1 where urun_id = ?");
			 	$guncelle->execute([$id]);
				$ok = $guncelle->rowCount(); 
			
			  if($ok){
				  
				  $data["ok"] = "Ürünü begendiniz.."; 
				  
			  }else {
				  
				  $data["hata"] = "Bir sorun olustu";
				  
			  }
			 
			 
			}
			
		}else {
			
			$data["hata"] = "Üye girisi yapmanız gerekiyor..";
			
		}
		
		
	}
   
  


echo json_encode($data);

?>