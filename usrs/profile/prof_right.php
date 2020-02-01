<?php if(!isset($inabout)) : ?>
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

                    <!-- TODO: Full stats here -->
                
                    <div class="panel panel-white post panel-shadow">

                        <div class="post-heading">
                            <div class="pull-left image">
                                <img class="avatar" src="/img/pp.jpg">
                            </div>
                            <div class="pull-left meta">
                                <div class="title h5">
                                    <a class="post-user-name">'.$post_uploader.'</a> Posted:
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
<?php else: ?>
<div class="profile-info col-md-8">

    <div class="panel animated fadeInUp">
        <div class="panel-body bio-graph-info">
            <h1><?php echo $lang["Bio"]; ?></h1>
            <div class="row">

                <div class="bio-row">
                    <p><span><?php echo $lang["First name"]; ?></span> : <?php echo $fname; ?></p>
                </div>
                <div class="bio-row">
                    <p><span><?php echo $lang["Last name"]; ?></span> : <?php echo $lname; ?></p>
                </div>
                <div class="bio-row">
                    <p><span><?php echo $lang["Country"]; ?></span> : <?php echo $country; ?></p>
                </div>
                <div class="bio-row">
                    <p><span><?php echo $lang["Birthday"]; ?></span> : <?php echo $bday; ?></p>
                </div>
                <div class="bio-row">
                    <p><span><?php echo $lang["Occupation"]; ?></span> : <?php echo $occupation; ?></p>
                </div>
                <div class="bio-row">
                    <p><span><?php echo $lang["Phonen"]; ?></span> : <?php echo $phonen; ?></p>
                </div>
                <div class="bio-row">
                    <p><span><?php echo $lang["Registration Date"]; ?></span> : <?php echo $regdate; ?></p>
                </div>
                <div class="bio-row">
                    <p><span><?php echo $lang["Mail"]; ?></span> : <?php echo $mail; ?></p>
                </div>

            </div>
        </div>
    </div>

</div>
<?php endif; ?>