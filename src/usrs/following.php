<?php

    if(isset($_GET["user"])) {
        $toshowu = $_GET["user"];
    } else {
        header('Location: /');
    }

    include "../inc/includables/header.php";
    include "../inc/includables/pages/network/header.php";

    $stmt2 = $conn->prepare("SELECT name,bio FROM users WHERE name=?");
    $stmt2->bind_param("s", $toshowu);
    $stmt2->execute();
    $stmt2->bind_result($uname, $bio);
    $stmt2->fetch();
    $stmt2->close();

    if(!$uname) {
        die("The user you're lookin' for doesn't exist");
    }

?>