<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<?php
    $pilotid = Auth::$userinfo->pilotid;
    $touchstats = TouchdownStatsData::pilot_average($userinfo->pilotid);
                    
    $hrs = intval($userinfo->totalhours);
    $min = ($userinfo->totalhours - $hrs) * 100;
?>

<style>
    .alertdn {
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        -ms-border-radius: 2px;
        -o-border-radius: 2px;
        border-radius: 2px;
        border-width: 0;
        box-shadow: 0 1px 3px rgba(0,0,0,.1), 0 1px 2px rgba(0,0,0,.18);
        border: 1px solid transparent;
        padding: 15px;
        margin-bottom: 20px;
    }
                
    .alert-bluecl {
        background-color: #e0ebf9;
        border-color: #e0ebf9;
        color: #327ad5;
    }
</style> 

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Dashboard</h3> 
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->

<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-book f-s-40 color-primary"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2><?php echo $userinfo->totalflights?></h2>
                        <p class="m-b-0">PIREPS FILED</p>
                    </div>
                </div>
            </div>
        </div>
                    
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-star-o f-s-40 color-success"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2><?php echo StatsData::TotalPilotMiles($pilot->pilotid); ?></h2>
                        <p class="m-b-0">MILES EARNED</p>
                    </div>
                </div>
            </div>
        </div>
                    
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-hourglass-o f-s-40 color-warning"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2><?php echo $hrs.'h' ;?></h2>
                        <p class="m-b-0">TIME FLOWN</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-plane f-s-40 color-danger"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2><?php echo substr($touchstats, 0, 4); ?>FPM</h2>
                        <p class="m-b-0">LANDING AVERAGE</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
		<div class="col-lg-8">
            <div class="card" style="padding: 0px;">
                <div class="card-title" style="padding: 20px; margin-bottom: 0px;">
                    <h4>Live Map</h4>
                </div>
                <div class="card-body">
                    <?php require 'acarsmap.php'; ?>
                </div>
            </div>
		</div>
		
		<div class="col-lg-4">
		    <div class="card">
                <div class="card-title">
                    <h4>Latest News</h4>
                </div>
                <div class="card-body">
                    <?php MainController::Run('News', 'ShowNewsFront', 1); ?>
                </div>
            </div>
            
            <div class="card">
                <div class="card-title">
                    <h4>Newest Pilots</h4>
                </div>
                <div class="card-body">
                    <?php MainController::Run('Pilots', 'RecentFrontPage', 5); ?>
                </div>
            </div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-3">
            <div class="card bg-dark">
                <div class="testimonial-widget-one p-17">
                    <div class="testimonial-widget-one owl-carousel owl-theme">
                        <div class="item">
                            <div class="testimonial-content">
                                <img class="testimonial-author-img" src="<?php echo SITE_URL?>/lib/skins/ela/images/avatar/2.jpg" alt="" />
                                <div class="testimonial-author">John</div>
                                <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                <div class="testimonial-text">
                                    <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                    <i class="fa fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="testimonial-content">
                                <img class="testimonial-author-img" src="<?php echo SITE_URL?>/lib/skins/ela/images/avatar/3.jpg" alt="" />
                                <div class="testimonial-author">Abraham</div>
                                <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                <div class="testimonial-text">
                                    <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                    <i class="fa fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="testimonial-content">
                                <img class="testimonial-author-img" src="<?php echo SITE_URL?>/lib/skins/ela/images/avatar/1.jpg" alt="" />
                                <div class="testimonial-author">Lincoln</div>
                                <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                <div class="testimonial-text">
                                    <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                    <i class="fa fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-9">
            <div class="card">
                <div class="card-title">
                    <h4>Upcoming Departures</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php
                            $lastbids = SchedulesData::GetAllBids();
                            $redirectbid = 'schedules/view';
                            if (!$lastbids) {
                                echo '<div class="alert alert-danger alert-dismissable">
                                        <strong>Oops</strong><br>
                                        Looks like there are no upcoming departures at the moment, do you feel like flying? Click <strong><a href="'.$redirectbid.'" style="color: #fc6180;">here</a></strong> to bid a flight!
                                      </div>';
                            } else {
                        ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Flight #</th>
                                    <th>Pilot</th>
                                    <th>Slot added on</th>
                                    <th>Slot Expires on</th>
                                    <th>Departure</th>
                                    <th>Arrival</th>
                                    <th>Registration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($lastbids as $lastbid) {
                                        $flightid = $lastbid->id; 
                                ?>
                                <tr>
                                    <td>
                                        <span><?php echo $lastbid->code; ?><?php echo $lastbid->flightnum; ?></span>
                                    </td>
                            						    
                                    <?php
                                        $params = $lastbid->pilotid;
                                
                                        $pilot = PilotData::GetPilotData($params);
                                        $pname = $pilot->firstname;
                                        $psurname = $pilot->lastname;
                                        $now = strtotime(date('d-m-Y',strtotime($lastbid->dateadded)));
                                        $date = date("d-m-Y", strtotime('+48 hours', $now));
                                    ?>
                            						        
                                    <td>
                                        <span><?php echo $pname; ?> <?php echo $psurname; ?></span>
                                    </td>
                            						        
                                    <td>
                                        <span class="text-success"><?php echo date('d-m-Y',strtotime($lastbid->dateadded)); ?></span>
                                    </td>
                                                            
                                    <td>
                                        <span class="text-danger"><?php echo $date; ?></span>
                                    </td>
                            						        
                                    <td>
                                        <span><?php echo $lastbid->depicao; ?></span>
                                    </td>
                                                            
                                    <td>
                                        <span><?php echo $lastbid->arricao; ?></span>
                                    </td>
                                                            
                                    <td>
                                        <span><?php echo $lastbid->registration; ?></span>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container fluid  -->