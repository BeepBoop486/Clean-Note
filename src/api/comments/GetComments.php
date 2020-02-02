<?php

    include "../../inc/db.php";

    if(isset($_GET["post_id"])) {
        $post_id = $_GET["post_id"];
        
        $likes = 0;

        $stmt = $conn->prepare("SELECT * FROM comments WHERE post_id=?");
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $stmt->store_result();
        $likes = $stmt->num_rows;
        $stmt->close();

        echo $likes;

    }

?>