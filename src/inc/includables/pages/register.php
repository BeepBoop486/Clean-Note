<?php

    if(isset($_POST["submit"])) {
        $pname = $_POST["pname"];
        $pmail = $_POST["pmail"];
        $ppass = $_POST["ppass"];
        $pphonen = $_POST["pphonen"];

        if($pname && $pmail && $ppass && $pphonen) {
            $finalpass = password_hash($ppass, PASSWORD_BCRYPT);
            $canregister = 0;

            $stmt = $conn->prepare("SELECT * FROM users WHERE mail=?");
            $stmt->bind_param("s", $pmail);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0) {
                $canregister = 0;
            } else {
                $canregister = 1;
            }
            $stmt->close();

            if($canregister == 1) {
                $defbio = "¡Hi there!. I'm using CleanNote";
                $regdate = date("d/m/Y");

                $ss = "";
                $si = "";
                $stmt = $conn->prepare("INSERT INTO users(name, pass, bio, regdate, fname, lname, country, bday, occupation, mail, phonen, isadmin) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->bind_param("sssssssssssi", $pname, $finalpass, $defbio, $regdate, $ss, $ss, $ss, $ss, $ss, $pmail, $pphonen, $si);
                if($stmt->execute()) {
                    echo '<script>window.location.href = "/"</script>';
                } else {
                    echo "There's been an error " . $conn->errno . " " . $conn->error;
                }
                $stmt->close();
            }
        }
    }

?>

<div class="row welcome">
    <div class="login-page">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                <img src="/img/prism.png">
                <h1><?php echo $globals["SITE_NAME"]; ?> -  Register</h1>
                <form action="/register" class="frm animated fadeInRight" method="POST" role="form">
                    <div class="form-content">

                        <div class="form-group">
                            <input type="text" class="form-control input-underline input-lg" placeholder="<?php echo $lang['Username...']; ?>" name="pname" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="pmail" class="form-control input-underline input-lg" placeholder="<?php echo $lang['Mail']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="ppass" class="form-control input-underline input-lg" placeholder="<?php echo $lang['Password...']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="number" name="pphonen" class="form-control input-underline input-lg" placeholder="<?php echo $lang['Phonen'] ?>" required>
                        </div>

                    </div>
                    <input type="submit" name="submit" value="<?php echo $lang["Signup"]; ?>" class="btn btn-info btn-lg">
                </form>

            </div>
        </div>
    </div>
</div>