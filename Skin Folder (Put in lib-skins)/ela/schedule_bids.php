<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">My Bids</h3> 
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL?>">Home</a></li>
            <li class="breadcrumb-item active">My Bids</li>
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
                <div class="card-body">
                    <?php
                        if(!$bids) {
                            echo '
                                <div class="alert alert-info">
                                    <h4>No Bids Found</h4>
                                    You have no bids. Add a bid through the flight schedules.
                                </div>';
                        } else {
                    ?>
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Flight Number</th>
                                <th>Route</th>
                                <th>Aircraft</th>
                                <th>Departure Time</th>
                                <th>Arrival Time</th>
                                <th>Distance</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($bids as $bid)
                                {
                            ?>
                            <tr id="bid<?php echo $bid->bidid ?>">
                                <td><?php echo $bid->code . $bid->flightnum; ?></td>
                                <td align="center"><?php echo $bid->depicao; ?> to <?php echo $bid->arricao; ?></td>
                                <td align="center"><?php echo $bid->aircraft; ?> (<?php echo $bid->registration?>)</td>
                                <td><?php echo $bid->deptime;?></td>
                                <td><?php echo $bid->arrtime;?></td>
                                <td><?php echo $bid->distance;?>nm</td>
                                <td>
                                    <a href="<?php echo url('/pireps/filepirep/'.$bid->bidid);?>">File Report</a><br />
                                    <a id="<?php echo $bid->bidid; ?>" class="deleteitem" href="<?php echo url('/schedules/removebid');?>">Remove Bid (Double click)</a><br />
                                    <a href="<?php echo url('/schedules/brief/'.$bid->id);?>">Pilot Brief</a><br />
                                    <a href="<?php echo url('/schedules/boardingpass/'.$bid->id);?>" />Boarding Pass</a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container fluid  -->