<?php
    $item = MailData::checkformail();
    $items = $item->total;
?>

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Airmail</h3> 
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL ?>/index.php/Mail">Airmail</a></li>
            <li class="breadcrumb-item active">Compose</li>
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
                            <a class="btn btn-danger btn-block waves-effect waves-light" href="<?php echo SITE_URL ?>/index.php/Mail">Inbox</a>

                            <?php Template::Show('mail/mail_menu.php'); ?>
                        </div>
                        <!-- End Left sidebar -->
                        
                        <div class="inbox-rightbar">
                            <div class="mt-4">
                                <form action="<?php echo url('/Mail');?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <select name="who_to" class="form-control">
                                            <option value="">Select a pilot</option>
                                            
                                            <?php if(PilotGroups::group_has_perm(Auth::$usergroups, ACCESS_ADMIN)) { ?>
                                                <option value="all">NOTAM (All Pilots)</option>
                                            <?php 
                                                } foreach($allpilots as $pilots) {
                                                    echo '<option value="'.$pilots->pilotid.'">'.$pilots->firstname.' '.$pilots->lastname.' - '.PilotData::GetPilotCode($pilots->code, $pilots->pilotid).'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject" placeholder="Subject">
                                    </div>
                                    
                                    <div class="form-group">
                                        <textarea name="message" rows="8" cols="80" class="form-control" style="height:300px"></textarea>
                                    </div>

                                    <div class="form-group m-b-0">
                                        <div class="text-right">
                                            <input type="hidden" name="who_from" value="<?php echo Auth::$userinfo->pilotid ?>" />
                                            <input type="hidden" name="action" value="send" />
                                            <input type="submit" class="btn btn-primary waves-effect waves-light" value="Send">
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container fluid  -->