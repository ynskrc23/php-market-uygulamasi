<?php require_once("../baglan.php"); ?>
<?php
if (!isset($id)) {
		$id = $_GET['id'];
	}
?>
<!--PHP bildirim okundu say İŞLMEİ -->
<?php                  
    $guncelle = $db->prepare("UPDATE mesaj SET mesaj_okundu=? WHERE mesaj_id =".$id."");
    $guncelle->execute([1]);
    $hata = $guncelle->errorInfo(); 
    header("Location:firma_bildirim.php");	                                                     
?>  
<!--PHP bildirim okundu say İŞLMEİ -->