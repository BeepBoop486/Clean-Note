<!-- Right content -->
<div class="profile-info col-md-8 animated fadeInRight">
    <?php if(isset($_SESSION["name"]) && $_SESSION["name"] == $uname) : ?>
        <!-- TODO: post from here too -->
    <?php endif; ?>

    <?php

        $stmt = $conn->prepare("SELECT * FROM posts WHERE post_uploader=? ORDER BY id DESC");
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $stmt->bind_result($post_id, $post_content, $post_uploader, $post_date);

        while($stmt->fetch()) {
            echo '
            
                <div class="panel panel-white post panel-shadow">

                    <div class="post-heading">
                        <div class="pull-left image">
                            <img class="avatar" src="/img/pp.jpg">
                        </div>
                        <div class="pull-left meta">
                            <div class="title h5">
                                <a class="post-user-name">'.$post_uploader.'</a> Ha posteado:
                            </div>
                            <h6 class="text-muted time">'.$post_date.'</h6>
                        </div>
                    </div>

                    <div class="post-description">
                        <p>'.$post_content.'</p>
                    </div>

                </div>

            ';
        }

    ?>
</div>
<!-- End right content -->