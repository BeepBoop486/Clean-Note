<?php

    if(!isset($_GET["query"])) {
        echo '<script>window.location.href = "/"</script>';
    }

    include "../inc/includables/header.php";
    include "../inc/includables/pages/network/header.php";

?>

<link rel="stylesheet" href="/css/grid.css">

<div class="row text-center color-container">
    <h1 class="profile-name"><?php echo $lang["Showing results for: "] . $_GET["query"]; ?></h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <section id="blog-landing">
            <?php

                $param = "%{$_GET['query']}%";
                $stmt = $conn->prepare("SELECT name, bio FROM users WHERE name LIKE ?");
                $stmt->bind_param("s", $param);
                if($stmt->execute()) {
                    $stmt->bind_result($uname, $ubio);
                    $i = 0;
                    $left = 0;
                    $top = 0;
                    while($stmt->fetch()) {
                        echo '
                        
                            <article class="white-panel animated fadeInUp r1 c'.$i.'" style="width: 226.25px; left: '.$left.'px; top: '.$top.'px;">
                                <a href="/p/'.$uname.'"><img src="/img/pp.jpg"></a>
                                <h1>
                                    <a href="/p/'.$uname.'">'.$uname.'</a>
                                </h1>
                                <p>
                                    '.$ubio.'
                                </p>
                            </article>
                        
                        ';
                        $i += 1;
                        if($i < 4) {
                            $left += 235.25;
                        } else {
                            $left = 0;
                            $top += 298;

                            $i = 0;
                        }
                    }
                }
                $stmt->close();

            ?>
            </section>
        </div>
    </div>
</div>