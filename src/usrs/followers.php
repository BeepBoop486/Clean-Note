<?php

    if(isset($_GET["user"])) {
        $toshowu = $_GET["user"];
    } else {
        header('Location: /');
    }

    include "../inc/includables/header.php";
    include "../inc/includables/pages/network/header.php";

    $stmt2 = $conn->prepare("SELECT id,name,bio FROM users WHERE name=?");
    $stmt2->bind_param("s", $toshowu);
    $stmt2->execute();
    $stmt2->bind_result($dbid, $uname, $bio);
    $stmt2->fetch();
    $stmt2->close();

?>

<link rel="stylesheet" href="/css/grid.css">

<div class="row text-center color-container">
    <h1 class="profile-name"><?php echo $lang["Followers of "] . $toshowu; ?></h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <section id="blog-landing">

                <?php

                    $stmt = $conn->prepare("SELECT follower_id FROM follows WHERE followed_id=?");
                    $stmt->bind_param("i", $dbid);
                    if($stmt->execute()) {
                        $stmt->bind_result($follower_id);
                        while($stmt->fetch()) {
                            $followers_id[] = $follower_id;
                        }
                    } else {
                        echo $conn->error;
                    }
                    $stmt->close();

                    $pi = 0;
                    $pleft = 0;
                    $ptop = 0;

                    for($i = 0; $i < count($followers_id); $i++) {
                        $stmt = $conn->prepare("SELECT name,bio FROM users WHERE id=? ORDER BY id DESC");
                        $stmt->bind_param("i", $followers_id[$i]);
                        $stmt->execute();
                        $stmt->bind_result($fname, $fbio);
                        $stmt->fetch();

                        echo '
                        
                            <article class="white-panel animated fadeInUp r1 c'.$pi.'" style="width: 226.25px; left: '.$pleft.'px; top: '.$ptop.'px;">
                                <a href="/p/'.$fname.'"><img src="/img/pp.jpg"></a>
                                <h1>
                                    <a href="/p/'.$fname.'">'.$fname.'</a>
                                </h1>
                                <p>
                                    '.$fbio.'
                                </p>
                            </article>
                        
                        ';

                        $stmt->close();

                        $pi += 1;
                        if($pi < 4) {
                            $pleft += 235.25;
                        } else {
                            $pleft = 0;
                            $ptop += 298;

                            $pi = 0;
                        }

                    }

                ?>

            </section>
        </div>
    </div>
</div>