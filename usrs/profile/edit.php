<?php

    session_start();

    if(!isset($_SESSION["name"])) {
        header("Location: /");
    }

    include "../../inc/includables/pages/network/header.php";
    include "../../inc/includables/header.php";

    $toshowu = $_SESSION["name"];

    $stmt1 = $conn->prepare("SELECT name,bio,regdate,fname,lname,country,bday,occupation,mail,phonen FROM users WHERE name=?");
    $stmt1->bind_param("s", $toshowu);
    $stmt1->execute();
    $stmt1->bind_result($uname, $bio, $regdate, $fname, $lname, $country, $bday, $occupation, $mail, $phonen);
    $stmt1->fetch();
    $stmt1->close();

    $inabout = true;

?>

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-10 no-paddin-xs">

            <?php include "prof_left.php"; include "editAccount.php"; ?>

        </div>
    </div>
</div>