<?php if(!isset($inabout)) : ?>
<!-- Left content -->
<div class="col-md-4">

    <!-- Profile nav -->
    <div class="profile-nav">
        <div class="panel">
            <ul class="nav nav-pills nav-stacked">
                
                <li>
                    <a href="/p/<?php echo $uname; ?>"><i class="fa fa-user"></i> <?php echo $lang["Profile"]; ?></a>
                </li>
                <li>
                    <a href="/a/<?php echo $uname; ?>"><i class="fa fa-info-circle"></i> <?php echo $lang["About"]; ?></a>
                </li>
                <li>
                    <a href="/l/<?php echo $uname; ?>"><i class="fa fa-heart"></i> <?php echo $lang["Liked"]; ?></a>
                </li>
                <li>
                    <a href="/followers/<?php echo $uname; ?>"><i class="fa fa-user"></i> <?php echo $lang["Followers"]; ?></a>
                </li>
                <li>
                    <a href="/following/<?php echo $uname; ?>"><i class="fa fa-user"></i> <?php echo $lang["Following"]; ?></a>
                </li>
                <?php if(isset($_SESSION["name"]) && $_SESSION["name"] == $uname) : ?>
                <li>
                    <a href="/editAccount"><i class="fa fa-edit"></i> <?php echo $lang["Edit profile"]; ?></a>
                </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
    <!-- End profile nav -->

</div>
<!-- End left content -->
<?php else: ?>
<div class="col-md-10 no-paddin-xs">

    <div class="profile-nav col-md-4">
        <div class="panel">

            <div class="user-heading round">
                <a href="/p/<?php echo $uname; ?>">
                    <img src="/img/pp.jpg" alt="">
                </a>
                <h1><?php echo $uname; ?></h1>
                <p><?php echo $bio; ?></p>
            </div>

            <ul class="nav nav-pills nav-stacked">
                <li><a href="/p/<?php echo $uname; ?>"><i class="fa fa-user"></i> <?php echo $lang["Profile"]; ?></a></li></li>
                <li><a href="/a/<?php echo $uname; ?>"><i class="fa fa-info-circle"></i> <?php echo $lang["About"]; ?></a></li>
                <li><a href="/l/<?php echo $uname; ?>"><i class="fa fa-heart"></i> <?php echo $lang["Liked"]; ?></a></li>
                <?php if(isset($_SESSION["name"]) && $_SESSION["name"] == $uname) : ?>
                <li>
                    <a href="/editAccount"><i class="fa fa-edit"></i> <?php echo $lang["Edit profile"]; ?></a>
                </li>
                <?php endif; ?>
            </ul>
        
        </div>

    <div class="profile-info col-md-8">

    </div>

</div>
<?php endif; ?>