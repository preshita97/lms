<div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="signin-main">
                        <div class="container">
                            <div class="woocommerce">
                                <div class="woocommerce-login">
                                    <div class="company-info signin-register">
                                        <div class="col-md-12" style="margin-left: 220px;">
                                            <div class="row">
                                               <center> <div class="col-md-6">
                                                    <div class="company-detail new-account bg-light margin-right">
                                                        <div class="new-user-head">
                                                            <h2>Change Password</h2>
                                                            <span class="underline left"></span>
                                                            
                                                        </div>
                                                        <form class="login" action="<?php echo base_url().'student/changepass'?>" method="post">
                                                            <p class="form-row form-row-first input-required">
                                                                <label>
                                                                    <span class="first-letter">Old Password</span>  
                                                                    
                                                                </label>
                                                                <input type="password" id="username1" name="old_password" class="input-text">
                                                            </p>
                                                            <p class="form-row input-required">
                                                                <label>
                                                                    <span class="first-letter">New Password</span>  
                                                                    
                                                                </label>
                                                                <input type="password" id="password1" name="newpassword"  class="input-text">
                                                            </p>                               
                                                            <p class="form-row input-required">
                                                                <label>
                                                                    <span class="first-letter">Confirm Password</span>  
                                                                    
                                                                </label>
                                                                <input type="password" id="password1" name="re_password" class="input-text">
                                                            </p>                                                                                
                                                            <div class="clear"></div>
                                                            <input type="submit" value="Change" name="Change" class="button btn btn-default">
                                                            <div class="clear"></div>
                                                        </form> 
                                                    </div></center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                            </div>  
                        </div>
                    </div>
                </main>
            </div>
        </div>