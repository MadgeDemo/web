<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url('assets/images/silverstone.png'); ?>" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?= @$username;?></strong>
                            <!-- </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> -->
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <!-- <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li> -->
                        </ul>
                    </div>
                <div class="logo-element">
                    SS
                </div>
            </li>
            <li class="<?= @$invent;?>">
                <a href="<?= @base_url('items'); ?>"><i class="fa fa-dashboard"></i> <span class="nav-label">Inventory</span>
            </li>
            <li class="<?= @$usr;?>">
                <a href="#"><i class="fa fa-group"></i> <span class="nav-label">Users</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="<?= @$manage;?>"><a href="<?= @base_url('users'); ?>">Manage Users</a></li>
                        <li class="<?= @$add;?>"><a href="<?= @base_url('users/administrators'); ?>">Administrators</a></li>
                    </ul>
            </li>
        </ul>
    </div>
</nav>