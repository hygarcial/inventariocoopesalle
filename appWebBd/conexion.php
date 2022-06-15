<?php
	try{
	$conn=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=1234");
	}catch (Exception $e){
		die('chao'.$e);

	}
	
?>
