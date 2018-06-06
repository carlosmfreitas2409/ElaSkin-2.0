<div class="unix-login">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="login-content card">
                    <div class="login-form">
                        <h4>Register</h4>
                        <form method="post" action="<?php echo url('/registration');?>">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="firstname" class="form-control" value="<?php echo Vars::POST('firstname');?>" placeholder="First Name">
                                <?php
                                    if($firstname_error == true)
                                    echo '<p class="error">Please enter your first name</p>';
                                ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lastname" class="form-control" value="<?php echo Vars::POST('lastname');?>" placeholder="Last Name">
                                <?php
                                    if($lastname_error == true)
                                    echo '<p class="error">Please enter your last name</p>';
                                ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="text" name="email" class="form-control" value="<?php echo Vars::POST('email');?>" placeholder="Email">
                                <?php
                                    if($email_error == true)
                                    echo '<p class="error">Please enter your email address</p>';
                                ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password1" id="password" class="form-control" placeholder="Password">
                            </div>
                            
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
                                <?php
                                    if($password_error == true)
                                    echo '<p class="error">'.$password_error.'</p>';
                                ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Location</label>
                                <select class="form-control" name="location">
								 <?php
                                    foreach($countries as $countryCode=>$countryName) {
                                        if(Vars::POST('location') == $countryCode)
                                            $sel = 'selected="selected"';
                                        else
                                            $sel = '';
                                            echo '<option value="'.$countryCode.'" '.$sel.'>'.$countryName.'</option>';
                                    }
                                ?>
                                </select>
                                <?php
								    if($location_error == true)
								    echo '<p class="error">Please enter your location</p>';
                                ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Airline</label>
                                <select name="code" id="code" class="form-control">
    						        <?php
    						            foreach($allairlines as $airline) {
                                            echo '<option value="'.$airline->code.'">'.$airline->code.' - '.$airline->name.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Hub</label>
                                <select name="hub" id="hub" class="form-control">
                                <?php
                                    foreach($allhubs as $hub) {
                                        echo '<option value="'.$hub->icao.'">'.$hub->icao.' - ' . $hub->name .'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            
                            <?php
                                //Put this in a seperate template. Shows the Custom Fields for registration
                                Template::Show('registration_customfields.tpl');
                            ?>
                            
                            <div class="form-group">
                                <?php if(isset($captcha_error)){echo '<p class="error">'.$captcha_error.'</p>';} ?>
                                <div class="g-recaptcha" data-sitekey="<?php echo $sitekey;?>"></div>
                                <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>"></script>
                            </div>
                            
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Agree the terms and policy
                                </label>
                            </div>
                            
                            <input type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="submit" value="Register" />
                            
                            <div class="register-link m-t-15 text-center">
                                <p>Already have account ? <a href="<?php echo url('/login'); ?>"> Sign in</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>