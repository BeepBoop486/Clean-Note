<?php

    if(!isset($_GET["query"])) {
        echo '<script>window.location.href = "/"</script>';
    }

    include "../inc/includables/header.php";
    include "../inc/includables/pages/network/header.php";

?>

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
                    while($stmt->fetch()) {
                        echo '
                        
                            <article class="white-panel animated fadeInUp r1 c0" style="width: 226.25px; left: 0px; top: 0px;">
                                <a href="/p/'.$uname.'"><img src="/img/pp.jpg"></a>
                                <h1>
                                    <a href="/p/'.$uname.'">'.$uname.'</a>
                                </h1>
                                <p>
                                    '.$ubio.'
                                </p>
                            </article>
                        
                        ';
                    }
                }
                $stmt->close();

            ?>
            </section>
        </div>
    </div>
</div>