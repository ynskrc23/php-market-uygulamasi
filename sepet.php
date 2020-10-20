<?php require_once("baglan.php"); ?>

<?php
session_start();
if (!isset($id)) {
		$id = $_GET['id'];
		$uye_id=$_SESSION["id"];
	}	
	
	$urun_bilgi=$db->query("select  * from urun where urun_id='".$id."'")->fetchAll(PDO::FETCH_ASSOC);
		$a=1;
		$b=0;
		$c=" ";
	foreach ($urun_bilgi as $key => $value_urun){ }
	
	$ekle=$db->prepare("insert into sepet  set sepet_urunid=?,sepet_urunadet=?,sepet_uyeid=?,sepet_durum=?,sepet_urunfiyat=?,sepet_adres=?,sepet_urun_firma=?");
                        $ekle->execute(array($value_urun["urun_id"],$a,$uye_id,$b,$value_urun["urun_fiyat"],$c,$value_urun["urun_firma"]));
	header("location:index_kullanici.php");	


?>