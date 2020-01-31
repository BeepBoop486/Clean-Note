<?php

    include "../../inc/db.php";

    if(isset($_POST["post_id"]) && isset($_POST["liker_id"])) {
        
        $post_id = $_POST["post_id"];
        $like_id = $_POST["liker_id"];

        $like_exists = 0;
        
        $stmt1 = $conn->prepare("SELECT * FROM likes WHERE post_id=? AND liker_id=?");
        $stmt1->bind_param("ii", $post_id, $like_id);
        $stmt1->execute();
        $stmt1->store_result();
        if($stmt1->num_rows > 0) {
            $like_exists = 1;
        }
        $stmt1->close();

        if($like_exists) {
            $stmt = $conn->prepare("DELETE FROM likes WHERE post_id=? AND liker_id=?");
            $stmt->bind_param("ii", $post_id, $like_id);
            if($stmt->execute()) {
                echo "1";
            }
            $stmt->close();
        }
    }

?>