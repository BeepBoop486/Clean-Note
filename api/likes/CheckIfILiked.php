<?php

    include "../../inc/db.php";

    if(isset($_GET["post_id"]) && isset($_GET["liker_id"])) {
        $post_id = $_GET["post_id"];
        $liker_id= $_GET["liker_id"];

        echo "post: " . $post_id . " liker: " . $liker_id;
    }

?>