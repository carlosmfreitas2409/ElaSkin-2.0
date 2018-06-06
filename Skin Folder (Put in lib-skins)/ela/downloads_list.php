<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Downloads</h3> 
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL?>">Home</a></li>
            <li class="breadcrumb-item active">Downloads</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->

<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <?php 
            if(!$allcategories) {
			echo '<div class="col-lg-12">
			        <div class="alert alert-success">
			            <h4 class="alert-heading">No Downloads</h4>
			            <p>No downloads have been added yet.</p>
		            </div>
		          </div>';
		} else {
			foreach($allcategories as $category) {
        ?>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-title">
                    <h4><?php echo $category->name?></h4>
                </div>
                <div class="card-body">
                    <?php	
                        # This loops through every download available in the category
                        $alldownloads = DownloadData::GetDownloads($category->id);

                        if(!$alldownloads) {
                            echo '<p class="text-muted">There are no downloads in this category.</p>';
                            $alldownloads = array();
                        }

                        foreach($alldownloads as $download) {
                    ?>
                    
                    <strong><?php echo $download->name?></strong>
                    <p class="text-muted" style="margin-top: 5px;"><?php echo $download->description?></p>
                    <a class="btn-link" href="<?php echo url('/downloads/dl/'.$download->id);?>">Download</a>
                    <hr>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <?php } } ?>
    </div>
</div>
<!-- End Container fluid  -->