<?php require_once("baglan.php"); ?>
<?php 
        $ilid=$_POST['il'];
 		$ilcelist= $db->query("select * from muh_ilceler  where il_id='".$ilid."'")->fetchAll(PDO::FETCH_ASSOC);
 		foreach ($ilcelist as $key => $value) {
 			echo '<option value="'.$value['id'].'"> '.$value['baslik'].' </option>';
 		}
    
?>
<?php 
        $ilid=$_POST['il2'];
 		$ilcelist= $db->query("select * from muh_ilceler  where il_id='".$ilid."'")->fetchAll(PDO::FETCH_ASSOC);
 		foreach ($ilcelist as $key => $value) {
 			echo '<option value="'.$value['id'].'"> '.$value['baslik'].' </option>';
 		}
    
?>
 <?php 
        $ilid=$_POST['il3'];
 		$ilcelist= $db->query("select * from muh_ilceler  where il_id='".$ilid."'")->fetchAll(PDO::FETCH_ASSOC);
 		foreach ($ilcelist as $key => $value) {
 			echo '<option value="'.$value['id'].'"> '.$value['baslik'].' </option>';
 		}
    
?>
<?php
    	$kategoriid=$_POST['ustkategori'];
 		$kategorilist= $db->query("select * from kategori  where kategori_ust='".$kategoriid."'")->fetchAll(PDO::FETCH_ASSOC);
 		foreach ($kategorilist as $keys => $values) {
 			echo '<option value="'.$values['kategori_id'].'"> '.$values['kategori_isim'].' </option>';
 		}

?>

<?php
    	$kategoriid=$_POST['ust-kategori'];
 		$kategorilist= $db->query("select * from kategori  where kategori_ust='".$kategoriid."'")->fetchAll(PDO::FETCH_ASSOC);
 		foreach ($kategorilist as $keys => $values) {
 			echo '<option value="'.$values['kategori_id'].'"> '.$values['kategori_isim'].' </option>';
 		}

?>
