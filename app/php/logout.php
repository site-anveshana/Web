<?php
    session_start();
    $helper = array_keys($_SESSION);
	foreach ($helper as $key){
		unset($_SESSION[$key]);
	}
    session_destroy();
    echo "<script>sessionStorage.removeItem('anveshana_username');</script>";
    header("refresh:0;url=../index.html");
?>