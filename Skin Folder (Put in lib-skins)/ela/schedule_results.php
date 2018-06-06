<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Schedule Search</h3> 
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL?>">Home</a></li>
            <li class="breadcrumb-item active">Schedule Search</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->

<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <p>Click the button below to return to the search page.</p>
                    <a href="<?php echo url('/schedules/view'); ?>" class="btn btn-primary btn-flat">Return to Search</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <div class="card">
                <div class="card-title">
                    <h4>Search Results</h4>
                </div>
                <?php if(!$allroutes) { ?>
                <div class="card-body" style="padding: 0px;">
                    <div class="callout callout-info" style="padding: 20px; margin-bottom: 0px;">
                        <h4>No Results</h4>
                        Your search returned no results.
                    </div>
                </div>
                <?php } else { ?>
                <div class="card-body table-responsive no-padding" style="padding: 0px;">
                    <table id="tabledlist" class="tablesorter table table-hover">
                        <thead>
                            <tr>
                                <th>Flight Information</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($allroutes as $route) {
                                    
                                $route->daysofweek = str_replace('7', '0', $route->daysofweek);
                                if(strpos($route->daysofweek, date('w')) === false)
                                    continue;
                                
                                if(Config::Get('DISABLE_SCHED_ON_BID') == true && $route->bidid != 0) {
                                    continue;
                                }
                                
                                if(Config::Get('RESTRICT_AIRCRAFT_RANKS') === true && Auth::LoggedIn()) {
                                    if($route->aircraftlevel > Auth::$userinfo->ranklevel)
                                    {
                                        continue;
                                    }
                                }
                            ?>
                            <tr>
                                <td>
                                    <a href="<?php echo url('/schedules/details/'.$route->id);?>">
                                        <?php echo $route->code.' '.$route->flightnum.' '.$route->depicao.' - '.$route->arricao; ?>
                                    </a>
                                    
                                    <br />
                                    
                                    <strong>Departure: </strong> <?php echo $route->deptime;?> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                    <strong>Arrival: </strong> <?php echo $route->arrtime;?>
                                    
                                    <br />
                                    
                                    <strong>Equipment: </strong> <?php echo $route->aircraft; ?> (<?php echo $route->registration;?>) 
                                    <strong>Distance: </strong> <?php echo $route->distance . Config::Get('UNITS');?>
                                        
                                    <br />
                                    
                                    <strong>Days Flown: </strong> <?php echo Util::GetDaysCompact($route->daysofweek); ?>
                                     
                                    <br />
                                    
        						    <?php echo ($route->route=='') ? '' : '<strong>Route: </strong>'.$route->route.'<br />' ?>
                                    <?php echo ($route->notes=='') ? '' : '<strong>Notes: </strong>'.html_entity_decode($route->notes).'<br />' ?>
                                    <?php if($route->bidid != 0) { echo 'This route has been bid on'; } ?>
                                </td>
                                
                                <td nowrap>
                                    <a href="<?php echo url('/schedules/details/'.$route->id);?>" target="_blank">View Details</a>
                                    <br />
                                    <a href="<?php echo url('/schedules/brief/'.$route->id);?>" target="_blank">Pilot Brief</a>
                                    <br />
        
        							<?php
            							if(Config::Get('DISABLE_SCHED_ON_BID') == true && $route->bidid != 0) {
            								echo '<a id="'.$route->id.'" class="addbid" href="'.actionurl('/schedules/addbid').'">Add to Bid</a>';
            							} else {
            								if(Auth::LoggedIn()) {
            									echo '<a id="'.$route->id.'" class="addbid" href="'.url('/schedules/addbid').'">Add to Bid</a>';
            								}
            							}
        							?>	
                                </td>
                            </tr>
					        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- End Container fluid  -->