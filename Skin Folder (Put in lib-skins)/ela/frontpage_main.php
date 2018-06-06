<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<?php if(Auth::LoggedIn()) {
	header('Location:'.SITE_URL.'/index.php/profile');
} else {
	header('Location:'.SITE_URL.'/index.php/login');
} ?>