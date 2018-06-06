<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>

<?php
    if(!$pilot_list) {
        echo '
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Pilots List</h3> 
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL?>">Home</a></li>
                    <li class="breadcrumb-item active">Pilots List</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb -->
        
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-title">
                            <h4>'.$title.'</h4>
                        </div>
                        <div class="card-body">
                            <div class="callout callout-info">
                                <h4>No Pilots Found</h4>
                                <p>This may be an error, contact our staff for more info.</p>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <!-- End Container fluid  -->
        ';
        return;
    }
?>

<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-title">
                    <h4><?php echo $title; ?></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabledlist" class="table">
                            <thead>
                                <tr>
                                    <th>Pilot ID</th>
                                    <th>Name</th>
                                    <th>Rank</th>
                                    <th>Flights</th>
                                    <th>Hours</th>
                                    <th>Hub</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                    foreach($pilot_list as $pilot) {
                                ?>
                                <tr>
                                    <td width="1%" nowrap><a href="<?php echo url('/profile/view/'.$pilot->pilotid);?>">
                                        <?php echo PilotData::GetPilotCode($pilot->code, $pilot->pilotid)?></a>
                                    </td>
                                    <td>
                                        <img src="<?php echo Countries::getCountryImage($pilot->location);?>" alt="<?php echo Countries::getCountryName($pilot->location);?>" />
                                            
                                        <?php echo $pilot->firstname.' '.$pilot->lastname?>
                                    </td>
                                    <td><img src="<?php echo $pilot->rankimage?>" alt="<?php echo $pilot->rank;?>" /></td>
                                    <td><?php echo $pilot->totalflights?></td>
                                    <td><?php echo Util::AddTime($pilot->totalhours, $pilot->transferhours); ?></td>
                                    <td><?php echo $pilot->hub; ?></td>
                                    <td>
                                        <?php
                        					if($pilot->retired == 0) {
                        						echo '<span class="badge badge-success">Active</span>';
                        					} elseif($pilot->retired == 1) {
                        						echo '<span class="badge badge-danger">Inactive</span>';
                        					} else {
                        						echo '<span class="badge badge-primary">On Leave</span>';
                        					}
                    					?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container fluid  -->