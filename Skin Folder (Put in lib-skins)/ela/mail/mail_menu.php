<?php
    $item = MailData::checkformail();
    $items = $item->total;
?>

<div class="mail-list mt-4">
    <a class="list-group-item border-0 text-danger" href="<?php echo SITE_URL ?>/index.php/Mail"><i class="mdi mdi-inbox font-18 align-middle mr-2"></i><b>Inbox</b><span class="label label-danger float-right ml-2"><?php echo $items; ?></span></a>
    <a class="list-group-item border-0" href="<?php echo SITE_URL ?>/index.php/Mail/sent"><i class="mdi mdi-send font-18 align-middle mr-2"></i>Sent Mail</a>
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