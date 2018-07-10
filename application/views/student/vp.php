<div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="signin-main">
                        <div class="container">
                            <div class="woocommerce">
                                <div class="woocommerce-login">
                                    <div class="company-info signin-register">
                                        <div class="col-md-5 col-md-offset-1 border-dark-left">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="company-detail bg-dark margin-left">
                                                        <div class="signin-head">
                                                            <h2>Your Profile</h2>
                                                            <span class="underline left"></span>
                                                        </div>
                                                        <form class="login" method="get">
                                                            <p class="form-row form-row-first input-required">
                                                                <label >
                                                                    <span class="first-letter" style="color: white;">Name : <?php echo $this->session->userdata('u_name'); ?></span>  
                                                                    
                                                                    
                                                                </label>
                                                                
                                                             </p>
                                                             </br>
                                                             </br>
                                                            <p class="form-row form-row-last input-required">
                                                                <label>
                                                                    <span class="first-letter" style="color: white;">Mobile no : <?php echo $this->session->userdata('u_mno'); ?></span>  
                                                                    
                                                                </label>
                                                            
                                                            </p>
                                                            <div class="clear"></div>
                                                           
                                                           
                                                            <div class="clear"></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 border-dark new-user">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="company-detail new-account bg-light margin-right">
                                                        <div class="new-user-head">
                                                            <h2>Create New Account</h2>
                                                            <span class="underline left"></span>
                                                            <p>If no barcode has been assigned for your account, please contact the library.</p>
                                                        </div>
                                                        <form class="login" method="post">
                                                            <p class="form-row form-row-first input-required">
                                                                <label>
                                                                    <span class="first-letter">Barcode</span>  
                                                                    <span class="second-letter">*</span>
                                                                </label>
                                                                <input type="text" id="username1" name="username" class="input-text">
                                                            </p>
                                                            <p class="form-row input-required">
                                                                <label>
                                                                    <span class="first-letter">Password</span>  
                                                                    <span class="second-letter">*</span>
                                                                </label>
                                                                <input type="password" id="password1" name="password" class="input-text">
                                                            </p>                                                                                
                                                            <div class="clear"></div>
                                                            <input type="submit" value="Signup" name="signup" class="button btn btn-default">
                                                            <div class="clear"></div>
                                                        </form> 
                                                    </div>
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