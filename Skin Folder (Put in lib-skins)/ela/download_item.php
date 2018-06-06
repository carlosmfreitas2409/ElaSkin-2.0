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
        <div class="col-lg-12">
            <div class="alert alert-success">
                <h4 class="alert-heading">Starting Download</h4>
                <p>Your download will start in a few seconds. Click <a href="<?php echo $download->link;?>">here</a> to manually start.</p>
            </div>
        </div>
    </div>
</div>
<!-- End Container fluid  -->

<script type="text/javascript">
    var delay=1000; //1 second

    setTimeout(function() {
        window.location = "<?php echo $download->link;?>";
    }, delay);
</script>