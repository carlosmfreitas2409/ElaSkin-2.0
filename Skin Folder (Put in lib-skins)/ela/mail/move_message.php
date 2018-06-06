<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Airmail</h3> 
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL ?>/index.php/Mail">Airmail</a></li>
            <li class="breadcrumb-item active">Move Message</li>
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
                                        <label>Move Message To:</label>
                                        <select name="folder" class="form-control">
                                            <option value="0">AIRMail Inbox</option>
                                            <?php 
                                                if(isset($folders)) {
                                                    foreach ($folders as $folder) {
                                                        echo '<option value="'.$folder->id.'">'.$folder->folder_title.'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group m-b-0">
                                        <div class="text-right">
                                            <input type="hidden" name="mail_id" value="<?php echo $mail_id ?>" />
                                            <input type="hidden" name="cur_folder" value="<?php echo $data->reciever_folder ?>" />
                                            <input type="hidden" name="action" value="move" />
                                            <input type="submit" class="btn btn-primary waves-effect waves-light" value="Move" />
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