<?php

    if(isset($_GET["user"])) {
        $toshowu = $_GET["user"];
    } else {
        header('Location: /');
    }

    echo $toshowu;

    include "../inc/includables/header.php";
    include "../inc/includables/pages/network/header.php";

?>