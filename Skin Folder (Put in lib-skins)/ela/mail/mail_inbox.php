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
            <li class="breadcrumb-item active">Airmail</li>
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
                        <?php
                            $now = time();
                            $time = date('H:i:s', $now);
                        ?>
                        <div class="inbox-rightbar">
                            <?php 
                                if(isset($folder)) {
                                    echo '
                                    <div class="btn-group" style="margin-right: 5px;">
                                        <a href="'.SITE_URL.'/index.php/Mail/editfolder/'.$folder->id.'" class="btn btn-light waves-effect">
                                            <i class="mdi mdi-pencil font-18 vertical-middle"></i>
                                            Edit Folder Name
                                        </a>
                                    </div>';
                                }
                            ?>
                            
                            <?php 
                                if(!$mail) {
                                    echo '<div class="alert alert-warning" style="margin-top: 20px;">You have no messages, why not send one to your colleuges?</div>';
                                } else { 
                            ?>
                            <div class="btn-group">
                                <a href="<?php echo url('/mail/delete_all/').$data->reciever_folder; ?>" onclick="return confirm('Delete All Inbox Messages?')" class="btn btn-light waves-effect">
                                    <i class="mdi mdi-delete font-18 vertical-middle"></i>
                                    Delete All
                                </a>
                            </div>
                                
                            <div class="btn-group pull-right" style="margin-top: 15px;">
                                <span style="font-size: 12px;">Last Updated: 
                                    <span class="text-success"> <?php echo $time; ?>z</span>
                                </span>
                            </div>
                            
                            <div class="">
                                <div class="mt-4">
                                    <div class="">
                                        <ul class="message-list">
                                            <?php foreach($mail as $data) {
                                                if ($data->read_state=='0') {
                                                    $status = 'class="unread"';
                                                    $statul = '<span class="label label-warning pull-right">new</span>';
                                                } else {
                                                    $status = 'class=""';
                                                    $statul = '<span class="label label-success pull-right">read</span>';
                                                }
                                            ?>
                                            
                                            <?php 
                                                $user = PilotData::GetPilotData($data->who_from); 
                                                $pilot = PilotData::GetPilotCode($user->code, $data->who_from);
                                                $datamsg = MailData::time_ago($data->date);
                                            ?>
                                            
                                            <li <?php echo $status; ?>>
                                                <a href="<?php echo SITE_URL ?>/index.php/Mail/item/<?php echo $data->thread_id;?>">
                                                    <div class="col-mail col-mail-1">
                                                        <div class="checkbox-wrapper-mail">
                                                            <input type="checkbox" id="chk1">
                                                            <label class="toggle" for="chk1"></label>
                                                        </div>
                                                        <p class="title"><?php echo "$user->firstname $user->lastname"; ?></p>
                                                        <span class="star-toggle fa fa-star-o"></span>
                                                    </div>
                                                    <div class="col-mail col-mail-2">
                                                        <div class="subject"><?php echo $data->subject; ?> &nbsp;&ndash;&nbsp;
                                                            <span class="teaser"><?php echo $data->message; ?></span>
                                                        </div>
                                                        <div class="date"><?php echo date('F d', strtotime($data->date));?></div>
                                                    </div>
                                                </a>
                                            </li>
                                            
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            
            <?php Template::Show('mail/mail_message.php'); ?>
        </div>
    </div>
</div>
<!-- End Container fluid  -->