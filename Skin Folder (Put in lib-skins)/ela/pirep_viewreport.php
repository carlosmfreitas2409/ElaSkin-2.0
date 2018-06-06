<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<style>
    .profile-user-img {
        margin: 0 auto;
        width: 100px;
        padding: 3px;
        border: 3px solid #d2d6de;
    }
    
    .img-circle {
        border-radius: 50%;
    }
    
    .img-responsive {
        display: block;
        max-width: 100%;
        height: auto;
    }
</style>

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Flight Report</h3> 
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL?>">Home</a></li>
            <li class="breadcrumb-item active">Flight Report</li>
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
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo SITE_URL?>/lib/skins/ela/images/airplane.png" alt="User profile picture">

                    <h3 class="profile-username text-center">Flight <?php echo $pirep->code . $pirep->flightnum; ?></h3>

                    <p class="text-muted text-center">Submitted by <?php echo $pirep->firstname.' '.$pirep->lastname?></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Departure Airport</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $pirep->depname?> (<?php echo $pirep->depicao; ?>)</p>
                        </li>
                        <li class="list-group-item">
                            <b>Arrival Airport</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $pirep->arrname?> (<?php echo $pirep->arricao; ?>)</p>
                        </li>
                        <li class="list-group-item">
                            <b>Aircraft</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $pirep->aircraft . " ($pirep->registration)"?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Flight Time</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $pirep->flighttime; ?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Date Submitted</b> <p class="pull-right" style="color: #3C8DBC"><?php echo date(DATE_FORMAT, $pirep->submitdate);?></p>
                        </li>
                        <?php
                            if($pirep->route != '')
                            {
                                echo '<li class="list-group-item"><b>Route</b> <p class="pull-right" style="color: #3C8DBC">'.$pirep->route.'</p></li>';
                            }
                        ?>
                        <li class="list-group-item"><b>Status</b>
                            <?php
                                if($pirep->accepted == PIREP_ACCEPTED)
                                    echo '<div class="label label-success pull-right">Accepted</div>';
                                elseif($pirep->accepted == PIREP_REJECTED)
                                    echo '<div class="label label-danger pull-right">Rejected</div>';
                                elseif($pirep->accepted == PIREP_PENDING)
                                    echo '<div class="label label-info pull-right">Approval Pending</div>';
                                elseif($pirep->accepted == PIREP_INPROGRESS)
                                    echo '<div class="label label-warning pull-right">Flight in Progress</div>';
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="card">
                <div class="card-title">
                    <h4>Flight Details</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Gross Revenue</b> <p class="pull-right" style="color: #3C8DBC"><?php echo FinanceData::FormatMoney($pirep->load * $pirep->price);?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Fuel Cost</b> <p class="pull-right" style="color: #3C8DBC"><?php echo FinanceData::FormatMoney($pirep->fuelused * $pirep->fuelunitcost);?></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-7">
            <div class="card" style="padding: 0px;">
                <div class="card-title" style="padding: 20px; margin-bottom: 0px;">
                    <h4>Route Map</h4>
                </div>
                <div class="card-body">
                    
                <!-- </div>
            </div>
        </div>
    </div>
</div> -->