  <?php require_once("../baglan.php"); ?>
  <?php
if (!isset($id)) {
		$id = $_GET['id'];
	}
?>
  <?php                  
 
            $guncelle = $db->prepare("UPDATE odeme SET odeme_durum=? WHERE sepet_id =".$id."");
                   $guncelle->execute(array('1'));
                   $hata = $guncelle->errorInfo();   
                   header("Location:firma_siparis.php");                                                 
                                                                                                    
                ?>      