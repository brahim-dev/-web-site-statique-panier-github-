<?php 
if(isset($_GET['file'])){
	$filename=basename($_GET['file']);
	$filepath='rapport/'.$filename;
	if(!empty($filename)&&file_exists($filepath)){
	//define headers
	header("Cache-Control: public");
	header("Content-Description: File Transfer");
	header("Content-Disposition: attachement; filename=$filename");
	header("Content-Type: application/pdf");
	header("Content-Transfer-Emcoding: binary");
	readfile($filepath);
exit;
}else{
	echo "the rapport does not exist";
}
}
?>