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
            <li class="breadcrumb-item active">Sent Mail</li>
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

                            <div class="mail-list mt-4">
                                <a class="list-group-item border-0" href="<?php echo SITE_URL ?>/index.php/Mail"><i class="mdi mdi-inbox font-18 align-middle mr-2"></i><b>Inbox</b><span class="label label-danger float-right ml-2"><?php echo $items; ?></span></a>
                                <a class="list-group-item border-0 text-danger" href="<?php echo SITE_URL ?>/index.php/Mail/sent"><i class="mdi mdi-send font-18 align-middle mr-2"></i>Sent Mail</a>
                                <a class="list-group-item border-0" href="<?php echo SITE_URL ?>/index.php/Mail/newfolder"><i class="mdi mdi-folder-plus font-18 align-middle mr-2"></i>Create Folder</a>
                                <a class="list-group-item border-0" href="<?php echo SITE_URL ?>/index.php/Mail/deletefolder"><i class="mdi mdi-delete font-18 align-middle mr-2"></i>Delete Folder</a>
                                <a class="list-group-item border-0" href="<?php echo SITE_URL ?>/index.php/Mail/settings"><i class="mdi mdi-settings font-18 align-middle mr-2"></i>Settings</a>
                            </div>
                                                        
                            <h6 class="mt-5 m-b-15">Folders</h6>
                            <?php 
                                if (isset($folders)) {  
                                    foreach ($folders as $folder) { 
                            ?>
                            <div class="list-group b-0 mail-list">
                                <a class="list-group-item border-0" href="<?php echo SITE_URL?>/index.php/Mail/getfolder/<?php echo $folder->id?>"><span class="fa fa-stop text-info mr-2"></span><?php echo $folder->folder_title; ?></a>
                            </div>
                            <?php } } ?>
                        </div>
                        <!-- End Left sidebar -->
                        
                        <div class="inbox-rightbar">
                            <div class="">
                                <div class="mt-4">
                                    <div class="">
                                        <ul class="message-list">
                                            <?php
                                                if(!$mail) {
                                                    echo '<div class="alert alert-warning">You have no sent messages.</div>';
                                                } else {
                                            ?>
                                            
                                            <?php
                                                foreach($mail as $thread) {
                                                    if($thread->read_state=='0'){
                                                        if($thread->deleted_state == '0'){
                                                            $status = 'env_closed.gif" alt="The recipiant has not read your message.';
                                                            $statusli = 'class="unread"';
                                                        }else{
                                                            $status = 'env_closed_deleted.gif" alt="The recipiant did not read this message before deleting it.';
                                                        }
                                                    } else {
                                                        if($thread->deleted_state == '0'){
                                                            $status = 'env_open.gif" alt="The recipiant has read your message.';
                                                            $statusli = 'class=""';
                                                        } else {
                                                            $status = 'env_open_deleted.gif" alt="The recipiant has read and discarded your message.';
                                                        }
                                                    }
                                                    $user = PilotData::GetPilotData($thread->who_to); 
                                                    $pilot = PilotData::GetPilotCode($user->code, $thread->who_to);
                                            ?>
                                            
                                            <li <?php echo $statusli; ?>>
                                                <a href="<?php echo SITE_URL ?>/index.php/Mail/item/<?php echo $thread->thread_id.'/'.$thread->who_to;?>">
                                                    <div class="col-mail col-mail-1">
                                                        <div style="float: left; margin: 15px 10px 0 20px; height: 30px; width: 30px;">
                                                            <img src="<?php echo SITE_URL?>/core/modules/Mail/mailimages/<?php echo $status;?>" border="0" style="margin-bottom: 35px; margin-left: 20px;" />
                                                        </div>
                                                        <p class="title">
                                                            <?php
                                                                if ($thread->notam=='1') {
                                                                    echo 'NOTAM (All Pilots)';
                                                                } else {
                                                                    echo $user->firstname.' '.$user->lastname;
                                                                }
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-mail col-mail-2">
                                                        <div class="subject"><?php echo $thread->subject; ?> &nbsp;&ndash;&nbsp; 
                                                            <span class="teaser"><?php echo $thread->message; ?>.</span>
                                                        </div>
                                                        <div class="date"><?php echo date('h:ia', strtotime($thread->date)); ?></div>
                                                    </div>
                                                </a>
                                            </li>
                                            
                                            <?php } } ?>
                                        </ul>
                                    </div>
                                </div>
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