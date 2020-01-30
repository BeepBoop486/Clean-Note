<?php

    session_start();

    if(!isset($_SESSION["name"])) {
        header("Location: /");
    }

    include "../../inc/includables/pages/network/header.php";
    include "../../inc/includables/header.php";

    if(isset($_POST["submit"])) {
        $puname = $_POST["uname"];
        $pbio = $_POST["bio"];
        $pfname = $_POST["fname"];
        $plname = $_POST["lname"];
        $pcountry = $_POST["country"];
        $pbday = $_POST["bday"];
        $poccupation = $_POST["occupation"];
        $pmail = $_POST["mail"];

        if($puname && $pbio) {
            //If neither the name nor bio are empty
            $stmt = $conn->prepare('UPDATE users SET
                                           bio=?,
                                           fname=?,
                                           lname=?,
                                           country=?,
                                           bday=?,
                                           occupation=?,
                                           mail=? WHERE name=?');
            $stmt->bind_param("ssssssss", $pbio, $pfname, $plname, $pcountry, $pbday, $poccupation, $pmail, $_SESSION["name"]);
            if($stmt->execute()) {

            } else {
                echo $conn->errno;
            }
        }

        echo $puname . $pbio . $pfname . $plname.$pcountry.$pbday.$poccupation.$pmail;
    }

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