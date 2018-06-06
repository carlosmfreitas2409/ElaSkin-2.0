<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<style>
    @media (min-width: 992px) {
        .col-md-offset-1 {
            margin-left: 8.33333333%;
        }
    }
</style>

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">My Profile</h3> 
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL?>">Home</a></li>
            <li class="breadcrumb-item active">My Profile</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->

<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <div class="card">
                <div class="card-title">
                    <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo url('/profile');?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" disabled placeholder="<?php echo $userinfo->firstname . ' ' . $userinfo->lastname;?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Airline</label>
                            <input type="text" class="form-control" disabled placeholder="<?php echo $userinfo->code?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" value="<?php echo $userinfo->email;?>">
                            <?php
                                if(isset($email_error) && $email_error == true)
                                    echo '<p class="error">Please enter your email address</p>';
                            ?>
                        </div>
                        
                        <div class="form-group">
                            <label>Location</label>
                            <select name="location" class="form-control">
                                <?php
                                    foreach($countries as $countryCode=>$countryName)
                                    {
                                        if($userinfo->location == $countryCode)
                                            $sel = 'selected="selected"';
                                        else	
                                            $sel = '';
                                        echo '<option value="'.$countryCode.'" '.$sel.'>'.$countryName.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Signature Background</label>
                            <select name="bgimage" class="form-control">
                                <?php
                                    foreach($bgimages as $image)
                                    {
                                        if($userinfo->bgimage == $image)
                                            $sel = 'selected="selected"';
                                        else	
                                            $sel = '';
                                        echo '<option value="'.$image.'" '.$sel.'>'.$image.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <?php
                            if($customfields) {
                                foreach($customfields as $field) {
                                    echo '<div class="form-group"><label>'.$field->title.'</label>';
                                    if($field->type == 'dropdown') {
                                        $field_values = SettingsData::GetField($field->fieldid);				
                                        $values = explode(',', $field_values->value);
                                        echo '<select name="'.$field->fieldname.'" class="form-control">';
                                        if(is_array($values))
                                        {						
                                            foreach($values as $val)
                                            {
                                                $val = trim($val);
                                                if($val == $field->value)
                                                    $sel = " selected ";
                                                else
                                                    $sel = '';
                                                echo "<option value=\"{$val}\" {$sel}>{$val}</option>";
                                            }
                                        }
                                        echo '</select>';
                                    } elseif($field->type == 'textarea') {
                                        echo '<textarea class="customfield_textarea form-control"></textarea>';
                                    } else {
                                        echo '<input type="text" class="form-control" name="'.$field->fieldname.'" value="'.$field->value.'" />';
                                    }
                                    echo '</div>';
                                }
                            }
                        ?>
                        
                        <div class="form-group">
                            <label>Avatar</label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo Config::Get('AVATAR_FILE_SIZE');?>" />
                            <input type="file" name="avatar" size="40" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Current Avatar</label>
                            <?php	
                                if(!file_exists(SITE_ROOT.AVATAR_PATH.'/'.$pilotcode.'.png'))
                                {
                                    echo 'None selected';
                                }
                                else
                                {
                            ?>
                            <img src="<?php	echo SITE_URL.AVATAR_PATH.'/'.$pilotcode.'.png';?>" /></dd>
                            <?php
                                }
                            ?>
                        </div>
                        
                        <input type="hidden" name="action" value="saveprofile" />
		                <input type="submit" name="submit" class="btn btn-primary btn-flat pull-right" value="Save Changes" />
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-md-offset-1">
            <div class="card">
                <div class="card-title">
                    <h4>Change Password</h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo url('/profile');?>" method="post">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" name="oldpassword" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" id="password" name="password1" class="form-control" value="">
                        </div>
                        
                        <div class="form-group">
                            <label>Confirm New Password</label>
                            <input type="password" name="password2" class="form-control" value="">
                        </div>
                        
                        <input type="hidden" name="action" value="changepassword" />
		                <input type="submit" name="submit" class="btn btn-primary btn-flat pull-right" value="Save Password" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container fluid  -->