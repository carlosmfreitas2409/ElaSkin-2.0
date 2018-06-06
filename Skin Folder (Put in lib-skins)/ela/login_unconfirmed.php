<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<div class="unix-login">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="login-content card">
                    <div class="alert alert-danger">
                        <h4><i class="fa fa-exclamation-triangle"></i> Pending Approval</h4>
                        Your registration has not yet been accepted by an administrator. Please try again later. You will receive an email when your registration has been accepted.
                    </div>
                    
                    <div class="login-form">
                        <h4>Login</h4>
                        <form name="loginform" action="<?php echo url('/login');?>" method="post">
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="text" name="email" class="form-control" placeholder="Email">
                            </div>
                            
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                                <label class="pull-right">
                                    <a href="<?php echo url('login/forgotpassword'); ?>">Forgotten Password?</a>
                                </label>
                            </div>
                            
                            <input type="hidden" name="redir" value="index.php/profile" />
                            <input type="hidden" name="action" value="login" />
                            <input type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="submit" value="Sign In" />
                            
                            <div class="register-link m-t-15 text-center">
                                <p>Don't have account ? <a href="<?php echo SITE_URL?>/index.php/registration"> Sign Up Here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>