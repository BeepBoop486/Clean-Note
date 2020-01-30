<?php

    session_start();

    if(!isset($_SESSION["name"])) {
        header("Location: /");
    }

    include "../../inc/includables/pages/network/header.php";
    include "../../inc/includables/header.php";

?>