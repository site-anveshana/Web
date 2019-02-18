<?php
    session_start();
    $_SESSION["anveshana_username"] = "";
    session_destroy();
    echo "<script>sessionStorage.removeItem('anveshana_username');</script>";
    header("refresh:0;url=../index.html");
?>