<?php

    if(isset($_GET["user"])) {
        $toshowu = $_GET["user"];
    } else {
        header('Location: /');
    }

    include "../inc/includables/pages/network/header.php";
    include "../inc/includables/header.php";

    $stmt1 = $conn->prepare("SELECT name,bio FROM users WHERE name=?");
    $stmt1->bind_param("s", $toshowu);
    $stmt1->execute();
    $stmt1->bind_result($uname, $bio);
    $stmt1->fetch();
    $stmt1->close();

    if(!$uname) {
        //TODO: Change this for an error page
        die("The user you entered doesn't exist");
    }

    $inabout = true;

?>

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <?php
        
            include "profile/prof_left.php";
        
        ?>
    </div>
</div>