<div class="profile-info col-md-8">

    <form method="POST">
        <!-- Update info -->
        <div class="panel panel-info post animated fadeInUp">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $lang["Edit info"]; ?></h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo $lang["UserName"]; ?></label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="uname" value="<?php echo $uname;?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo $lang["Bio"]; ?></label>
                    <div class="col-md-8">
                        <textarea name="bio" class="form-control" rows="4"><?php echo $bio; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo $lang["Registration Date"]; ?></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" disabled value="<?php echo $regdate; ?>">
                    </div>
                </div>

            </div>
        </div>
        <!-- End update info -->

        <!-- Personal info -->
        <div class="panel panel-info post animated fadeInUp">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $lang["Personal info"]; ?></h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-md-4 control-label"><?php echo $lang["First name"]; ?></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" value="<?php echo $fname; ?>" name="fname">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label"><?php echo $lang["Last name"]; ?></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" value="<?php echo $lname; ?>" name="lname">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label"><?php echo $lang["Country"]; ?></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" value="<?php echo $country; ?>" name="country">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label"><?php echo $lang["Birthday"]; ?></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" value="<?php echo $bday; ?>" name="bday">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label"><?php echo $lang["Occupation"]; ?></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" value="<?php echo $occupation; ?>" name="occupation">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label"><?php echo $lang["Mail"]; ?></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" value="<?php echo $mail; ?>" name="mail">
                    </div>
                </div>

            </div>
        </div>
        <!-- End personal info -->

        <input type="submit" name="submit" class="btn btn-info post animated fadeInUp" value="<?php echo $lang["Edit"]; ?>">
    </form>

</div>