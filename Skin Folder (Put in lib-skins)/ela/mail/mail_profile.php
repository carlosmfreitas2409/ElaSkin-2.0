<?php 
if(!$mail) {
       
    } else {
	    foreach($mail as $data) {
	        if ($items > 0) {
?>
    <?php
        $pilotavatar = PilotData::GetPilotAvatar($user->pilotid);
        $user = PilotData::GetPilotData($data->who_from);
    ?>
    
    <a href="<?php echo SITE_URL?>/index.php/Mail/item/<?php echo $data->thread_id;?>">
        <div class="user-img">
            <?php $pilotavatar = PilotData::GetPilotAvatar($user->pilotid); ?>
            <img class="img-circle" src="<?php echo $pilotavatar ?>" alt="user"/>
            
            <?php
                $shown = array();
                if(in_array($user->pilotid, $shown))
                continue;
                    
                else
                        
                $shown[] = $user->pilotid;
                echo '<span class="profile-status online pull-right"></span>';
            ?>
        </div>
        <div class="mail-contnet">
            <h5><?php echo $user->firstname.' '.$user->lastname;?></h5> 
            <span class="mail-desc"><?php echo $data->message; ?></span> 
            <span class="time"><?php echo date('h:ia', strtotime($data->date)); ?></span>
            </h5>
        </div>
    </a>
<?php } else { ?>
    <?php
        $pilotavatar = PilotData::GetPilotAvatar($user->pilotid);
        $user = PilotData::GetPilotData($data->who_from);
    ?>
    <a href="<?php echo SITE_URL?>/index.php/Mail/item/<?php echo $data->thread_id;?>">
        <div class="user-img">
            <?php $pilotavatar = PilotData::GetPilotAvatar($user->pilotid); ?>
            <img class="img-circle" src="<?php echo $pilotavatar ?>" alt="user"/>
            
            <?php
                $usersonline = StatsData::UsersOnline();
                $guestsonline = StatsData::GuestsOnline();
            ?>
            
            <?php
                $shown = array();
                if(in_array($user->pilotid, $shown))
                continue;
                    
                else
                        
                $shown[] = $user->pilotid;
                echo '<span class="profile-status online pull-right"></span>';
            ?>
        </div>
        <div class="mail-contnet">
            <h5><?php echo $user->firstname.' '.$user->lastname;?></h5> 
            <span class="mail-desc"><?php echo $data->message; ?></span> 
            <span class="time"><?php echo date('h:ia', strtotime($data->date)); ?></span>
        </div>
    </a>
<?php } } } ?>