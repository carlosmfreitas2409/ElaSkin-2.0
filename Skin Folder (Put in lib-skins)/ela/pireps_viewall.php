<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">My Reports</h3> 
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL?>">Home</a></li>
            <li class="breadcrumb-item active">My Reports</li>
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
                    <div class="table-responsive">
                        <p><?php if(isset($descrip)) { echo $descrip; }?></p>
                        
                        <?php
                            if(!$pireps) {
                                echo '
                                    <div class="alert alert-info">
                                        <h4>No Reports Found</h4>
                                        <p>You have not filed any reports. File one through the ACARS software or manual report submission to see its details and status on this page.</p>
                                    </div>';
                            } else {
                        ?>
                        
                        <table id="tabledlist" class="tablesorter table table-hover">
                            <thead>
                                <tr>
                                        <th>Flight Number</th>
                                        <th>Departure</th>
                                        <th>Arrival</th>
                                        <th>Aircraft</th>
                                        <th>Flight Time</th>
                                        <th>Submitted</th>
                                        <th>Status</th>
                                        <?php
                                            // Only show this column if they're logged in, and the pilot viewing is the
                                            //	owner/submitter of the PIREPs
                                            if(Auth::LoggedIn() && Auth::$userinfo->pilotid == $userinfo->pilotid)
                                            {
                                                echo '<th>Options</th>';
                                            }
                                        ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($pireps as $report) { ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo url('/pireps/view/'.$report->pirepid);?>"><?php echo $report->code . $report->flightnum; ?></a>
                                    </td>
                                    
                                    <td>
                                        <?php echo $report->depicao; ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo $report->arricao; ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo $report->aircraft . " ($report->registration)"; ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo $report->flighttime; ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo date(DATE_FORMAT, $report->submitdate); ?>
                                    </td>
                                    
                                    <td>
                                        <?php
                                        if($report->accepted == PIREP_ACCEPTED)
                                            echo '<div id="success" class="badge badge-success">Accepted</div>';
                                        elseif($report->accepted == PIREP_REJECTED)
                                            echo '<div id="error" class="badge badge-danger">Rejected</div>';
                                        elseif($report->accepted == PIREP_PENDING)
                                            echo '<div id="error" class="badge badge-info">Approval Pending</div>';
                                        elseif($report->accepted == PIREP_INPROGRESS)
                                            echo '<div id="error" class="badge badge-warning">Flight in Progress</div>';
                                        ?>
                                    </td>
                                    
                                    <?php if(Auth::LoggedIn() && Auth::$userinfo->pilotid == $report->pilotid) { ?>
                                    <td align="right">
                                        <a href="<?php echo url('/pireps/addcomment?id='.$report->pirepid);?>">Add Comment</a>
                                        <span> | </span>
                                        <a href="<?php echo url('/pireps/editpirep?id='.$report->pirepid);?>">Edit PIREP</a>
                                    </td>
                                    <?php } ?>
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