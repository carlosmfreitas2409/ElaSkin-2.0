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
            <li class="breadcrumb-item active">Delete Folder</li>
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
                                <a class="list-group-item border-0" href="<?php echo SITE_URL ?>/index.php/Mail/sent"><i class="mdi mdi-send font-18 align-middle mr-2"></i>Sent Mail</a>
                                <a class="list-group-item border-0" href="<?php echo SITE_URL ?>/index.php/Mail/newfolder"><i class="mdi mdi-folder-plus font-18 align-middle mr-2"></i>Create Folder</a>
                                <a class="list-group-item border-0 text-danger" href="<?php echo SITE_URL ?>/index.php/Mail/deletefolder"><i class="mdi mdi-delete font-18 align-middle mr-2"></i>Delete Folder</a>
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
                            <div class="mt-4">
                                <form action="<?php echo url('/Mail');?>" method="post" enctype="multipart/form-data">
                                    <?php if(count($folders)==0) {
                                            echo '<p class="alert alert-info"> There are no folders </p>';
                                        } else { 
                                    ?>
                                    <div class="form-group">
                                        <label>Select your folder</label>
                                        <select name="folder_id" class="form-control">
                                            <?php foreach ($folders as $folder) {echo '<option value="'.$folder->id.'">'.$folder->folder_title.'</option>';}?>
                                        </select>
                                        <span class="help-block">
                                            <small>The Mail's contained in the folders which are going to be deleted, will be moved to inbox.</small>
										</span>
                                    </div>

                                    <div class="form-group m-b-0">
                                        <div class="text-right">
                                            <input type="hidden" name="action" value="confirm_delete_folder" />
                                            <input type="submit" class="btn btn-primary waves-effect waves-light" value="Delete" />
                                        </div>
                                    </div>
                                    <?php } ?>
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