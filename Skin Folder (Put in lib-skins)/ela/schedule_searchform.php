

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
        <div class="col-md-12">
            <form id="form" action="<?php echo url('/schedules/view');?>" method="post">
                <div class="card">
                    <div class="card-body p-b-0">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab_1" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Departure</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab_2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Arrival</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab_3" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Aircraft</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab_4" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Distance</span></a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1" role="tabpanel">
                                <div class="p-0" style="margin-top: 20px;">
                                    <p>Select your departure airport:</p>
                                    <div class="form-group">
                                        <select id="depicao" name="depicao" class="form-control">
                                            <option value="">Select All</option>
                                            <?php
                								if(!$depairports) $depairports = array();
                								foreach($depairports as $airport) {
                									echo '<option value="'.$airport->icao.'">'.$airport->icao.' ('.$airport->name.')</option>';
                								}
                                            ?>
                                        </select>
                                    </div>
                                    <input type="submit" name="submit" value="Search" class="btn btn-flat btn-primary" />
                                </div>
                            </div>
                            
                            <div class="tab-pane p-0" style="margin-top: 20px;" id="tab_2" role="tabpanel">
                                <p>Select your arrival airport:</p>
                                <div class="form-group">
                                    <select id="arricao" name="arricao" class="form-control">
                                        <option value="">Select All</option>
                                        <?php
        								    if(!$depairports) $depairports = array();
        								    foreach($depairports as $airport) {
        									    echo '<option value="'.$airport->icao.'">'.$airport->icao.' ('.$airport->name.')</option>';
        								    }
                                        ?>
                                    </select>
                                </div>
                                <input type="submit" name="submit" value="Search" class="btn btn-flat btn-primary" />
                            </div>
                            
                            <div class="tab-pane p-0" style="margin-top: 20px;" id="tab_3" role="tabpanel">
                                <p>Select aircraft:</p>
                                <div class="form-group">
                                    <select id="equipment" name="equipment" class="form-control">
                                        <option value="">Select equipment</option>
                                        <?php
        								    if(!$equipment) $equipment = array();
        								    foreach($equipment as $equip) {
        									    echo '<option value="'.$equip->name.'">'.$equip->name.'</option>';
        								    }
                                        ?>
                                    </select>
                                </div>
                                <input type="submit" name="submit" value="Search" class="btn btn-flat btn-primary" />
                            </div>
                            
                            <div class="tab-pane p-0" style="margin-top: 20px;" id="tab_4" role="tabpanel">
                                <p>Select Distance:</p>
                                <div class="form-group">
                                    <select id="type" name="type" class="form-control">
                                        <option value="greater">Greater Than</option>
                                        <option value="less">Less Than</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="distance" value="" class="form-control" />
                                </div>
                                
                                <input type="submit" name="submit" value="Search" class="btn btn-flat btn-primary" />
                            </div>
                        </div>
                    </div>
                </div>
                
                <p>
                    <input type="hidden" name="action" value="findflight" />
                </p>
            </form>
        </div>
    </div>
</div>
<!-- End Container fluid  -->