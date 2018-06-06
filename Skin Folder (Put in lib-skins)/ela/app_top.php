<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<?php
# Bit Hacky, but this will allow universal redirection to the login page if not logged in
if (!isset($_SERVER['REQUEST_URI']) || ltrim($_SERVER['REQUEST_URI'],'/') !== SITE_URL.'/index.php/login') {
	if(!Auth::LoggedIn()) {
		header('Location:'.SITE_URL.'/index.php/login');
	}
}
?>
    
        <!-- Preloader - style you can find in spinners.css -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
    			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        
        <!-- Main wrapper  -->
        <div id="main-wrapper">
            <!-- header header  -->
            <div class="header">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <!-- Logo -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?php echo SITE_URL?>">
                            <!-- Logo icon -->
                            <b><img src="<?php echo SITE_URL?>/lib/skins/ela/images/logo.png" alt="homepage" class="dark-logo" /></b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span><img src="<?php echo SITE_URL?>/lib/skins/ela/images/logo-text.png" alt="homepage" class="dark-logo" /></span>
                        </a>
                    </div>
                    <!-- End Logo -->
                    <div class="navbar-collapse">
                        <!-- toggle and nav items -->
                        <ul class="navbar-nav mr-auto mt-md-0">
                            <!-- This is  -->
                            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                            <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        </ul>
                        <!-- User profile and search -->
                        <ul class="navbar-nav my-lg-0">
                            <?php if(PilotGroups::group_has_perm(Auth::$usergroups, ACCESS_ADMIN)) { ?>
                            <!-- Admin Notifications -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                                    <?php
                                        $pendingpireps = count(PIREPData::findPIREPS(array('p.accepted' => PIREP_PENDING)));
                                        $pendingpilots = count(PilotData::findPilots(array('p.confirmed' => PILOT_PENDING)));
                                        
                                        $count = ($pendingpireps + $pendingpilots);
                                        
                                        if(!$count) {
                                            echo '';
                                        } else {
                                            echo '
                                            <div class="notify"> 
            								    <span class="heartbit"></span> 
            								    <span class="point"></span> 
            								</div>';
                                        }
                                    ?>
    							</a>
                                <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                    <ul>
                                        <li>
                                            <div class="drop-title">Admin Notifications</div>
                                        </li>
                                        <li>
                                            <div class="message-center">
                                                <!-- Pilots -->
                                                <a href="<?php echo SITE_URL?>/admin/index.php/pilotadmin/pendingpilots">
                                                    <div class="btn btn-danger btn-circle m-r-10">
                                                        <i class="ti-user"></i>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h5>Pending Registrations</h5> 
                                                        <span class="mail-desc">You have <strong><?php echo count(PilotData::GetPendingPilots()); ?></strong> new Pending Registrations.</span>
                                                    </div>
                                                </a>
                                                <!-- PIREPs -->
                                                <a href="<?php echo SITE_URL?>/admin/index.php/pirepadmin/viewpending">
                                                    <div class="btn btn-success btn-circle m-r-10">
                                                        <i class="ti-location-arrow"></i>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h5>Pending PIREPs</h5> 
                                                        <span class="mail-desc">You have <strong><?php echo count(PIREPData::GetAllReportsByAccept(PIREP_PENDING)); ?></strong> new Pending PIREPs.</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="nav-link text-center" href="<?php echo SITE_URL?>/admin"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- End Admin Notifications -->
                            <?php } ?>
                            
                            <!-- Airmail -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted  " href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i>
    								<?php MainController::Run('Mail', 'GetNotificationMail');?>
    							</a>
                                <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                                    <ul>
                                        <li>
                                            <div class="drop-title"><?php MainController::Run('Mail', 'checkmail'); ?></div>
                                        </li>
                                        <li>
                                            <div class="message-center">
                                                <?php MainController::Run('Mail', 'GetProfileMail', 4);?>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="nav-link text-center" href="<?php echo url('/Mail'); ?>"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- End Airmail -->
                            
                            <!-- Profile -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php $pilotcode2 = PilotData::getPilotCode(Auth::$userinfo->code, Auth::$userinfo->pilotid); ?>
						            <img src="<?php echo PilotData::getPilotAvatar($pilotcode2); ?>" alt="user" class="profile-pic"/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                    <ul class="dropdown-user">
                                        <li><a href="<?php echo url('/profile/editprofile'); ?>"><i class="ti-user"></i> Profile</a></li>
                                        <li><a href="<?php echo url('/mail'); ?>"><i class="ti-email"></i> Inbox</a></li>
                                        <li role="separator" class="divider"></li>
                                        <?php if(PilotGroups::group_has_perm(Auth::$usergroups, ACCESS_ADMIN)) { echo '
                                        <li><a href="'.SITE_URL.'/admin"><i class="fa fa-cog"></i> Administration</a></li>
                                        '; } ?>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="<?php echo url('/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- End Profile -->
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- End header header -->
            <!-- Left Sidebar  -->
            <div class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="nav-devider"></li>
                            
                            <!-- Pilot Administration -->
                            <li class="nav-label">Pilot Administration</li>
                            <li>
                                <a href="<?php echo SITE_URL?>" aria-expanded="false">
                                    <i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?php echo url('/mail'); ?>" aria-expanded="false">
                                    <i class="fa fa-envelope"></i><span class="hide-menu">Pilot Mail</span>
                                </a>
                            </li>
                            
                            <!-- Flight Operations -->
                            <li class="nav-label">Flight Operations</li>
                            <li>
                                <a href="<?php echo url('/schedules/view'); ?>" aria-expanded="false">
                                    <i class="fa fa-search"></i><span class="hide-menu">Schedule Search</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?php echo url('/pireps/filepirep'); ?>" aria-expanded="false">
                                    <i class="fa fa-file-text"></i><span class="hide-menu">File Manual Report</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?php echo url('/pireps/mine'); ?>" aria-expanded="false">
                                    <i class="fa fa-list"></i><span class="hide-menu">My Reports</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?php echo url('/schedules/bids'); ?>" aria-expanded="false">
                                    <i class="fa fa-list"></i><span class="hide-menu">My Bids</span>
                                </a>
                            </li>
                            
                            <!-- OTHES -->
                            <li class="nav-label">Others</li>
                            <li>
                                <a href="<?php echo url('/downloads'); ?>" aria-expanded="false">
                                    <i class="fa fa-cloud-download"></i><span class="hide-menu">Downloads</span>
                                </a>
                            </li>
                            
                            <?php if(PilotGroups::group_has_perm(Auth::$usergroups, ACCESS_ADMIN)) { echo '
                            <li class="nav-label">Administration</li>
                            <li>
                                <a href=" '.SITE_URL.'/admin" aria-expanded="false">
                                    <i class="fa fa-cog"></i><span class="hide-menu">Administration Center</span>
                                </a>
                            </li>
                            '; } ?>
                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </div>
            <!-- End Left Sidebar  -->
            
            <!-- Page wrapper  -->
            <div class="page-wrapper">