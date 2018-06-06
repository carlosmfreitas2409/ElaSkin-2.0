<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Airmail</h3> 
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL ?>/index.php/Mail">Airmail</a></li>
            <li class="breadcrumb-item active">Edit Folder</li>
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
                                        <label>Current Folder Name</label>
                                        <input type="text" class="form-control" value="<?php echo $folder->folder_title; ?>" disabled>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>New Folder Name</label>
                                        <input type="text" class="form-control" name="folder_title" value="<?php echo $folder->folder_title; ?>" />
                                    </div>

                                    <div class="form-group m-b-0">
                                        <div class="text-right">
                                            <input type="hidden" name="folder_id" value="<?php echo $folder->id; ?>" />
                                            <input type="hidden" name="action" value="confirm_edit_folder" />
                                            <input type="submit" class="btn btn-primary waves-effect waves-light" value="Edit Folder" />
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