<?php

    include "../../inc/db.php";
    
    if(isset($_POST["post_id"]) && isset($_SESSION["uid"])) {
        $post_id = $_POST["post_id"];
        $liker_id= $_SESSION["uid"];

        $stmt = $conn->prepare("INSERT INTO likes(post_id, liker_id) VALUES(?,?)");
        $stmt->bind_param("ii", $post_id, $liker_id);
        if($stmt->execute()) {
            echo "1";
        } else {
            echo "-1";
        }
        $stmt->close();

    } else {
        echo "-1";
    }

?>