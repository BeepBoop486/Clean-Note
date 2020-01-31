<?php

    include "../../inc/db.php";

    if(isset($_GET["post_id"]) && isset($_GET["liker_id"])) {
        $post_id = $_GET["post_id"];
        $liker_id= $_GET["liker_id"];
        $HaveILiked = 0;

        $stmt = $conn->prepare("SELECT * FROM likes WHERE post_id=? AND liker_id=?");
        $stmt->bind_param("ii", $post_id, $liker_id);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows > 0) {
            $HaveILiked = 1;
        } else {
            $HaveILiked = 0;
        }
        $stmt->close();

        echo $HaveILiked;
    }

?>