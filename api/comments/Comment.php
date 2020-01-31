<?php

    include "../../inc/db.php";

    if(isset($_POST["post_id"]) && isset($_POST["comment_cnt"]) && isset($_SESSION["name"])) {
        $success = 0;
        $post_id = $_POST["post_id"];
        $comment_cnt = $_POST["comment_cnt"];
        $comment_date = date("d/m/Y");

        $stmt = $conn->prepare("INSERT INTO comments(comment_cnt, comment_maker, comment_date, post_id) VALUES(?,?,?,?)");
        $stmt->bind_param("sssi", $comment_cnt, $_SESSION["name"], $comment_date, $post_id);
        if($stmt->execute()) {
            $success = 1;
        } else {
            $success = 0;
        }
        $stmt->close();

        echo $success;
    }

?>