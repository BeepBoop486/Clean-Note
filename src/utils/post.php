<?php

    if(!isset($_GET["post_id"])) {
        header("Location: /");
    }

    include "../inc/includables/header.php";
    include "../inc/includables/pages/network/header.php";

    $stmt1 = $conn->prepare("SELECT * FROM posts WHERE id=?");
    $stmt1->bind_param("i", $_GET["post_id"]);
    $stmt1->execute();
    $stmt1->store_result();
    if(!$stmt1->num_rows>0) {
        die("This post doesn't exist");
    }
    $stmt1->close();

?>
<div class="container" style="margin-top: 100px;">
		<div class="row">
            <?php

                $stmt1 = $conn->prepare("SELECT * FROM posts WHERE id=? ORDER BY id DESC"); //For now i'll just select all posts
                $stmt1->bind_param("i", $_GET["post_id"]);
                if($stmt1->execute()) {
                    $stmt1->bind_result($post_id, $post_content, $post_uploader, $post_date);

                    while($stmt1->fetch()) {
                        echo '

                            <!-- TODO: Full stats here -->

                            <script>CheckIfILiked('.$post_id.', '.$_SESSION["uid"].', 1)</script>

                            <div class="panel panel-white post panel-shadow">

                                <div class="post-heading">
                                    <div class="pull-left image">
                                        <img class="avatar" src="/img/pp.jpg">
                                    </div>
                                    <div class="pull-left meta">
                                        <div class="title h5">
                                                    <a href="/p/'.$post_uploader.'" class="post-user-name">'.$post_uploader.'</a>
                                                    '.$lang["Posted"].'
                                            </div>
                                        <h6 class="text-muted time">'.$post_date.'</h6>
                                    </div>
                                </div>

                                <div class="post-description">
                                    <p>'.nl2br($post_content).'</p>
                                    <div class="stats">
                                        <a class="stat-item" id="like_button_'.$post_id.'" onclick="CheckIfILiked('.$post_id.', '.$_SESSION["uid"].', 0)"><i class="fa fa-thumbs-up icon"></i> <k id="likes_value_'.$post_id.'"> 0</k></a>
                                        <a class="stat-item" id="retweet_button_'.$post_id.'"><i class="fa fa-retweet icon"></i></a>
                                        <a class="stat-item" id="comment_button_'.$post_id.'"><i class="fa fa-comments icon"></i> </a>
                                    </div>
                                </div>

                                <div class="post-footer">
                                    <div class="form-group mx-sm-3 mb-2">
                                        <input class="form-control add-comment-input" id="comment_box_'.$post_id.'" placeholder="'.$lang["Add a comment"].'">
                                        <button class="btn btn-primary mb-2" onclick="Comment('.$post_id.')">'.$lang["Comment"].'</button>
                                    </div>
                                    <ul class="comments-list">
                                        ';
                    }

                }
                $stmt1->close();

                $stmt = $conn->prepare("SELECT * FROM comments WHERE post_id=? ORDER BY id DESC");
                $stmt->bind_param("i", $_GET["post_id"]);
                $stmt->execute();
                $stmt->bind_result($id, $comment_cnt, $comment_maker, $comment_date, $post_id);
                while($stmt->fetch()) {
                    echo '
                    
                        <li class="comment">
                            <a href="/p/'.$comment_maker.'" class="pull-left"><img src="/img/pp.jpg" class="avatar"></a>
                            <div class="comment-body">
                                <div class="comment-heading">
                                    <h4 class="comment-user-name"><a href="/p/'.$comment_maker.'">'.$comment_maker.'</a></h4>
                                    <h5 class="time">
                                        '.$comment_date.'
                                    </h5>
                                </div>
                                <p>'.$comment_cnt.'</p>
                            </div>
                        </li>
                    
                    ';
                }
                $stmt->close();

                echo '
                            </ul>
                        </div>
                    </div>
                    ';

            ?>
        </div>
</div>