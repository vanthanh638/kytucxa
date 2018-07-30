<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Quản lý giờ tàu</span>
</a>
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if ( $_SESSION['infoAdmin']['avatar'] != '' ) { ?>
                    <img src="../images/avatar/<?php echo $_SESSION['infoAdmin']['avatar']; ?>" class="user-image" alt="User Image">
                <?php } else { ?>
                    <img src="img/user2-160x160.jpg" class="user-image" alt="User Image">
                <?php } ?>
                <span class="hidden-xs"><?php echo $_SESSION['infoAdmin']['fullname'] ?></span>
            </a>
            <ul class="dropdown-menu">
                <li class="user-header">
                    <?php if ( $_SESSION['infoAdmin']['avatar'] != '' ) { ?>
                        <img src="../images/avatar/<?php echo $_SESSION['infoAdmin']['avatar']; ?>" class="img-circle" alt="User Image">
                    <?php } else { ?>
                        <img src="img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <?php } ?>
                    <p>
                        <?php echo $_SESSION['infoAdmin']['fullname'];?>
                    </p>
                </li>
                <li class="user-footer">
                    
                    <div class="pull-right">
                        <a href="index.php?c=auth&a=logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                </li>
            </ul>
        </li> 
    </ul>
</div>