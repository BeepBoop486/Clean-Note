<?php if(!isset($inabout)) : ?>
<!-- Left content -->
<div class="col-md-4">

    <!-- Profile nav -->
    <div class="profile-nav">
        <div class="panel">
            <ul class="nav nav-pills nav-stacked">
                
                <li>
                    <a href="/p/<?php echo $uname; ?>"><i class="fa fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="/a/<?php echo $uname; ?>"><i class="fa fa-info-circle"></i> About</a>
                </li>
                <?php if(isset($_SESSION["name"]) && $_SESSION["name"] == $uname) : ?>
                <li>
                    <a href="#"><i class="fa fa-edit"></i> Edit profile</a>
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
                <li><a href="/p/<?php echo $uname; ?>"><i class="fa fa-user"></i>Profile</a></li></li>
                <li><a href="/a/<?php echo $uname; ?>"><i class="fa fa-info-circle"></i> About</a></li>
                <?php if(isset($_SESSION["name"]) && $_SESSION["name"] == $uname) : ?>
                <li>
                    <a href="#"><i class="fa fa-edit"></i> Edit profile</a>
                </li>
                <?php endif; ?>
            </ul>
        
        </div>

    <div class="profile-info col-md-8">

    </div>

</div>
<?php endif; ?>