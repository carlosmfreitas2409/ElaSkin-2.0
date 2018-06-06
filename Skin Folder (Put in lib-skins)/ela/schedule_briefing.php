<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Flight Briefing - <?php echo $schedule->code.$schedule->flightnum; ?></h3> 
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL?>">Home</a></li>
            <li class="breadcrumb-item active">Flight Briefing</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->

<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-md-12">
            <script src="http://skyvector.com/linkchart.js"></script>
            <table class="table">
                <!-- Flight ID -->
                <tr style="background-color: #333; color: #FFF;">
                    <td colspan="2">Flight</td>
                </tr>
                <tr>
                    <td colspan="2">
                    <?php echo $schedule->code.$schedule->flightnum; ?>
                    </td>
                </tr>
                
                <tr  style="background-color: #333; color: #FFF;">
                    <td>Departure</td>
                    <td>Arrival</td>
                </tr>
                
                <tr>
                    <td width="50%" ><?php echo "{$schedule->depname} ($schedule->depicao)"; ?><br />
                        <!-- <a href="https://pilotweb.nas.faa.gov/geo/icaoRadius.html?icao_id=<?php echo $schedule->depicao?>&radius=2"
                            target="_blank">Click to view NOTAMS</a> -->
                    </td>
                    <td width="50%" ><?php echo "{$schedule->arrname} ($schedule->arricao)"; ?><br />
                        <!-- <a href="https://pilotweb.nas.faa.gov/geo/icaoRadius.html?icao_id=<?php echo $schedule->arricao?>&radius=2"
                            target="_blank">Click to view NOTAMS</a> -->
                    </td>
                </tr>
                
                <!-- Times Row -->
                <tr style="background-color: #333; color: #FFF;">
                    <td>Departure Time</td>
                    <td>Arrival Time</td>
                </tr>
                <tr>
                    <td width="50%" ><?php echo "{$schedule->deptime}"; ?></td>
                    <td width="50%" ><?php echo "{$schedule->arrtime}"; ?></td>
                </tr>
                
                <!-- Aircraft and Distance Row -->
                <tr style="background-color: #333; color: #FFF;">
                    <td>Aircraft</td>
                    <td>Distance</td>
                </tr>
                <tr>
                    <td width="50%" ><?php echo "{$schedule->aircraft} {$schedule->registration}"; ?></td>
                    <td width="50%" ><?php echo "{$schedule->distance}"; ?>nm</td>
                </tr>
                
                <tr style="background-color: #333; color: #FFF;">
                    <td><?php echo $schedule->depicao; ?> METAR</td>
                    <td><?php echo $schedule->arricao; ?> METAR</td>
                </tr>
                <tr>
                    <td width="50%">
    					<?php
                        $metar = $_POST['metar'];
                        $url = 'http://metar.vatsim.net/'.$schedule->depicao.'';
                        $page = file_get_contents($url);
                        echo $page;
                        ?>
                    </td>
                    <td width="50%">
    					<?php
                        $metar = $_POST['metar'];
                        $url = 'http://metar.vatsim.net/'.$schedule->arricao.'';
                        $page = file_get_contents($url);
                        echo $page;
                        ?>
                    </td>
                </tr>
                
                <!-- Route -->
                <tr style="background-color: #333; color: #FFF;">
                    <td colspan="2">Route</td>
                </tr>
                <tr>
                    <td colspan="2">
                    <?php 
                    # If it's empty, insert some blank lines
                    if($schedule->route == '')
                    {
                        echo '<br /> <br /> <br />';
                    }
                    else
                    {
                        echo strtoupper($schedule->route); 
                    }
                    ?>
                    </td>
                </tr>
                
                <!-- Notes -->
                <tr style="background-color: #333; color: #FFF;">
                    <td colspan="2">Notes</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 6px;">
                    <?php 
                        # If it's empty, insert some blank lines
                        if($schedule->notes == '')
                        {
                            echo '<br /> <br /> <br />';
                        }
                        else
                        {
                            echo "{$schedule->notes}"; 
                        }
                    ?>
                    </td>
                </tr>
                <tr style="background-color: #333; color: #FFF; padding: 5px; width: 100%;">
                    <td>Additional Data</td>
                </tr>
                <tr style="width: 100%;">
                    <td><a href="http://flightaware.com/analysis/route.rvt?origin=<?php echo $schedule->depicao?>&destination=<?php echo $schedule->arricao?>" target="_blank">View recent IFR Routes data</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>