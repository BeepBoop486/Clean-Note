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

<div class="row text-center cover-container">
    <a><img src="/img/pp.jpg"></a>
    <h1 class="profile-name"><?php echo $uname; ?></h1>
    <p class="user-text">
        <?php echo $bio; ?>
    </p>
</div>

<div class="container" style="margin-top: 2px;">
    <div class="col-md-10 no-padding-xs">
        <div class="row">
            <?php

                include "profile/prof_left.php";

            ?>

            <div class="profile-info col-md-8 animated fadeInRight">
                <?php

                    $stmt = $conn->prepare("SELECT post_id FROM likes WHERE liker_id =? ORDER BY post_id DESC");
                    $stmt->bind_param("s", $_SESSION["uid"]);
                    $stmt->execute();
                    $stmt->bind_result($post_id);
                    while($stmt->fetch()) {
                        $posts[] = $post_id;
                    }
                    $stmt->close();

                    for($i = 0; $i < count($posts); $i++) {
                        $stmt1 = $conn->prepare("SELECT * FROM posts WHERE id=?");
                        $stmt1->bind_param("i", $posts[$i]);
                        $stmt1->execute();
                        $stmt1->bind_result($pid, $pcnt, $pupl, $pdate);
                        $stmt1->fetch();

                        echo '
                        
                            <!-- TODO: Full stats here -->

                            <div class="panel panel-white post panel-shadow">
                                
                                <div class="post-heading">
                                    <div class="pull-left image">
                                        <img class="avatar" src="/img/pp.jpg">
                                    </div>
                                    <div class="pull-left meta">
                                        <div class="title h5">
                                            <a class="post-user-name" href="/p/'.$pupl.'">'.$pupl.'</a> '.$lang["Posted"].'
                                        </div>
                                        <h6 class="text-muted time">'.$pdate.'</h6>
                                    </div>
                                </div>

                                <div class="post-description">
                                    <p>'.$pcnt.'</p>
                                </div>

                            </div>
                        
                        ';

                        $stmt1->close();
                    }

                ?>
            </div>

        </div>
    </div>
</div>