<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Schedule Details - <?php echo $schedule->code.$schedule->flightnum; ?></h3> 
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL?>">Home</a></li>
            <li class="breadcrumb-item active">Schedule Details</li>
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
                    <table class="table table-bordered" style="border-color: #000;">
                    	<tr>
                        	<td>Flight Number</td>
                            <td><?php echo $schedule->code.$schedule->flightnum; ?></td>
                        </tr>
                    	<tr>
                        	<td>Departure</td>
                            <td><?php echo $schedule->depname.' ('.$schedule->depicao.') at '. $schedule->deptime; ?></td>
                        </tr>
                    	<tr>
                        	<td>Arrival</td>
                            <td><?php echo $schedule->arrname.' ('.$schedule->arricao.') at '. $schedule->arrtime; ?></td>
                        </tr>
                    	<tr>
                        	<td>Route</td>
                            <td>
                            <?php
        					if($schedule->route !== '') {
        						echo $schedule->route;
        					} else {
        						echo 'N/A';
        					}
        					?>
                            </td>
                        </tr>
                    	<tr>
                        	<td>METAR For <?php echo $schedule->depicao; ?></td>
                            <td>
        					<?php
                            $metar = $_POST['metar'];
                            $url = 'http://metar.vatsim.net/'.$schedule->depicao.'';
                            $page = file_get_contents($url);
                            echo $page;
                            ?>
                            </td>
                        </tr>
                    	<tr>
                        	<td>METAR For <?php echo $schedule->arricao; ?></td>
                            <td>
        					<?php
                            $metar = $_POST['metar'];
                            $url = 'http://metar.vatsim.net/'.$schedule->arricao.'';
                            $page = file_get_contents($url);
                            echo $page;
                            ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">