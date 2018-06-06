<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Airmail</h3> 
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL ?>/index.php/Mail">Airmail</a></li>
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
                    <div class="card-content">
                        <!-- Left sidebar -->
                        <div class="inbox-leftbar">
                            <a class="btn btn-danger btn-block waves-effect waves-light" href="<?php echo SITE_URL ?>/index.php/Mail/newmail">Compose</a>

                            <?php Template::Show('mail/mail_menu.php'); ?>
                        </div>
                        <!-- End Left sidebar -->
                        
                        <div class="inbox-rightbar">
                            <?php
                                foreach ($mail as $data) {
                                    $user = PilotData::GetPilotData($data->who_from);								
                                    $pilot = PilotData::GetPilotCode($user->code, $data->who_from);
                            ?>
                            <div class="m-t-10 m-b-20" role="toolbar">
                                <div class="btn-group">
                                    <a href="<?php echo SITE_URL ?>/index.php/Mail/reply/<?php echo $data->thread_id;?>" class="btn btn-light waves-effect"><i class="mdi mdi-send font-18 vertical-middle"></i></a>
                                </div>
                                
                                <div class="btn-group">
                                    <a href="<?php echo SITE_URL ?>/index.php/Mail/move_message/<?php echo $data->id;?>" class="btn btn-light waves-effect"><i class="mdi mdi-folder font-18 vertical-middle"></i></a>
                                </div>
                                
                                <div class="btn-group">
                                    <a href="<?php echo SITE_URL ?>/index.php/Mail/delete/<?php echo $data->id;?>" class="btn btn-light waves-effect"><i class="mdi mdi-delete font-18 vertical-middle"></i></a>
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <h5><?php echo $data->subject; ?></h5>

                                <hr/>

                                <div class="media mb-4 mt-1">
                                    <?php $pilotcode2 = PilotData::getPilotCode(Auth::$userinfo->code, Auth::$userinfo->pilotid); ?>
                                    <img class="d-flex mr-3 rounded-circle thumb-sm" src="<?php echo PilotData::getPilotAvatar($pilotcode2); ?>" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <span class="pull-right"><?php echo date('h:ia', strtotime($data->date)); ?></span>
                                        <h6 class="m-0"><?php echo $user->firstname.' '.$user->lastname;?></h6>
                                        <small class="text-muted">To:
                                            <?php
                                                if($data->notam=="1") {
                                                    echo 'NOTAM (All Pilots)';
                                                } else {
                                                    echo $pilot->firstname.' '.$pilot->lastname;
                                                }
                                            ?>
                                        </small>
                                    </div>
                                </div>

                                <p><?php echo nl2br($data->message); ?></p>
                                
                                <hr/>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container fluid  -->