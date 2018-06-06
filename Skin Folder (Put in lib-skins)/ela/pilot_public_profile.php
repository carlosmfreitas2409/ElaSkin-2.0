<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Pilot - <?php echo $pilot->firstname; ?></h3> 
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL?>">Home</a></li>
            <li class="breadcrumb-item active">Pilot Info</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->

<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-two">
                        <header>
                            <div class="avatar">
                                <?php $pilotcode2 = PilotData::getPilotCode(Auth::$userinfo->code, Auth::$userinfo->pilotid); ?>
						        <img src="<?php echo PilotData::getPilotAvatar($pilotcode2); ?>" alt="user"/>
						        
						        <?php
                            		$pilotcode = PilotData::GetPilotCode($pilotinfo->code, $pilotinfo->pilotid);
                            
                            		if(!file_exists(SITE_ROOT.AVATAR_PATH.'/'.$pilotcode.'.png')) {
                                ?>
                            		<img src="<?php echo SITE_URL?>/lib/skins/ela/images/pilot_profile_pic.jpg" />
                            	<?php } else { ?>
                            		<img src="<?php	echo SITE_URL.AVATAR_PATH.'/'.$pilotcode.'.png';?>" />
                            	<?php } ?>
                            </div>
                        </header>

                        <h3><?php echo $pilot->firstname.' '.$pilot->lastname?></h3>
                        <div class="desc">
                            Joined on :  <?php $newdate = date('dS F Y', strtotime($pilot->joindate)); echo $newdate;  ?>
                            <br />
                            <span class="label label-primary"><?php echo $pilot->code;?><?php echo $pilot->pilotid;?></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Widget -->
	        <a href="<?php echo SITE_URL?>/index.php/Mail/newmail">
	            <div class="card p-30">
	                <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-envelope-open f-s-40 color-success"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2 class="color-primary">Send <strong>Mail</strong></h2>
                        </div>
                    </div>
	            </div>
	        </a>
	        <!-- END Widget -->
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-title">
                    <h4>Pilot Details</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                				    <td class="text-right"><strong>Airline Rank</strong></td>
                				    <td class="text-left"><?php echo $pilot->rank ?></td>
                				</tr>
                				
                				<tr>
                				    <td class="text-right"><strong>Base Airport</strong></td>
				                    <td class="text-left"><?php echo $pilot->hub ?></td>
                				</tr>
                				
                				<tr>
                				    <td class="text-right"><strong>IVAO VID</strong></td>
                    				<td class="text-left">
                    				    <?php 
                        				    $ivao = PilotData::GetFieldValue($pilot->pilotid, 'IVAO'); 
                        					if ($ivao > "0") {
                        						echo '<a target="_blank" class="text-success" href="https://www.ivao.aero/Member.aspx?Id='.$ivao.'">'.$ivao.'</a>';
                        					} else {
                        						echo '<span class="text-muted">Not Provided</span>';
                        					}
                    					?>
                    				</td>
                				</tr>
                				
                				<tr>
                				    <td class="text-right"><strong>VATSIM CID</strong></td>
                    				<td class="text-left">
                    				    <?php 
                        				    $vatsim = PilotData::GetFieldValue($pilot->pilotid, 'VATSIM'); 
                        					if ($vatsim > "0") {
                        						echo $vatsim;
                        					} else {
                        						echo '<span class="text-muted">Not Provided</span>';
                        					}
                    				    ?>
                    				</td>
                				</tr>
                				
                				<tr>
                				    <td class="text-right"><strong>Pilot Origin </strong></td>
				                    <td class="text-left"><?php echo '<img src="'.Countries::getCountryImage($pilot->location).'" alt="'.Countries::getCountryName($pilot->location).'" />'?> (<?php echo $pilot->location; ?>)</td>
                				</tr>
                				
                				<tr>
                    				<td class="text-right"><strong>Total Pay </strong></td>
                    				<td class="text-left"><i class="fa fa-inr"></i> <?php $number = $pilot->totalpay; echo number_format($number, 0, '.', ','); ?> /-</td>
                    			</tr>
                    			<tr>
                    				<td class="text-right"><strong>Status</strong></td>
                    				<td class="text-left">
                    					<?php 
                        					$status = $pilot->retired;
                        					if ($status < 1) {
                        					 	echo'<span class="label label-success"><i class="fa fa-check"></i> Active </span>';
                        					} else {
                        						echo '<span class="label label-danger"><i class="gi gi-power"></i> Retired </span>';
                        					}
                    					?>
                    				</td>
                    			</tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
            			<div class="col-sm-3">
            				<!-- Widget -->
            	        	<div class="widget-simple">
            	                <h3 class="widget-content text-center">
            	                    <strong class="color-warning"><?php echo $pilot->totalhours; ?></strong>
            	                    <br>
            	                    <small>Total Hours</small>
            	                </h3>
            	            </div>
            	        	<!-- END Widget -->
            			</div>
            			
            			<div class="col-sm-3">
            				<!-- Widget -->
            	        	<div class="widget-simple">
                        		<h3 class="widget-content text-center">
            	        		    <strong class="color-primary"><?php echo $pilot->totalflights; ?></strong>
            	                    <br>
            	                    <small>Total Flights</small>
            	        		</h3>
            	       		</div>
            	        	<!-- END Widget -->
            			</div>
            			
            			<div class="col-sm-3">
            				<!-- Widget -->
            				<?php 
            				    $last_location = PIREPData::getLastReports($pilot->pilotid, 1, PIREP_ACCEPTED);
            					$icao = $last_location->arricao; 
            				?>
            	        	<div class="widget-simple">
            	                <h3 class="widget-content text-center">
            	                    <strong class="color-danger">
            	                        <?php 
                	                        $last_location = PIREPData::getLastReports($pilot->pilotid, 1, PIREP_ACCEPTED);
                							$icao = $last_location->arricao; 
                							if(!$last_location) {
                								echo $pilot->hub;
                							} else { 
                							    echo $icao; ?><?php
                							}
            							?>
            						</strong>
            	                    <br>
            	                    <small>Current Location </small>
            	                </h3>
            	            </div>
            	        	<!-- END Widget -->
            			</div>
            			
            			<div class="col-sm-3">
            				<!-- Widget -->
            	            <div class="widget-simple">
            	           	    <h3 class="widget-content text-center">
            	                    <strong class="color-success"><?php $newdate = date(DATE_FORMAT, strtotime($pilot->lastlogin)); echo $newdate;  ?></strong>
            	            		<br>
            	            		<small>Last Active</small>
            	                </h3>
            	            </div>
            	        	<!-- END Widget -->
            			</div>
        		    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container fluid  -->