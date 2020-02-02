<?php

    include "../../inc/db.php";

    if(isset($_GET["id"])) {

        $user_name = $_GET["id"];

        $stmt = $conn->prepare("SELECT * FROM follows WHERE followed_id=?");
        $stmt->bind_param("i", $user_name);
        $stmt->execute();
        $stmt->store_result();
        echo $stmt->num_rows;
        $stmt->close();

    }

?>