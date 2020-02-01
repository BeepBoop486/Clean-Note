<?php

    if(isset($_GET["user"])) {
        $toshowu = $_GET["user"];
    } else {
        header('Location: /');
    }

    include "../inc/includables/header.php";
    include "../inc/includables/pages/network/header.php";

    $stmt1 = $conn->prepare("SELECT id,name,bio FROM users WHERE name=?");
    $stmt1->bind_param("s", $toshowu);
    $stmt1->execute();
    $stmt1->bind_result($uid, $uname, $bio);
    $stmt1->fetch();
    $stmt1->close();

    if(!$uname) {
        //TODO: Change this for an error page
        die("The user you entered doesn't exist");
    }

?>

<div class="row text-center cover-container">
    <a><img src="/img/pp.jpg"></a>
    <h1 class="profile-name"><?php echo $uname; ?></h1>
    <p class="user-text">
        <?php echo $bio; ?>
    </p>
    <?php if($uname != $_SESSION["name"] && isset($_SESSION["uid"])) : ?>
        <button class="btn btn-primary" id="follow_btn_<?php echo $uid; ?>" onclick="HaveIFollowed(<?php echo $uid; ?>)">Follow</button>
    <?php endif ?>
</div>

<div class="container" style="margin-top: 2px;">
    <div class="col-md-10 no-padding-xs">
        <div class="row">
            <?php

                include "profile/prof_left.php";
                include "profile/prof_right.php";

            ?>
        </div>
    </div>
</div>