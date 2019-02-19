<?php
    session_start();
    $_SESSION["anveshana_username"] = "";
    session_destroy();
    session_abort();
    echo "<script>sessionStorage.removeItem('anveshana_username');</script>";
    header("refresh:0;url=../index.html");
?>