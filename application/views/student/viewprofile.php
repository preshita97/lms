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
                                                            <p class="form-row input-required">
                                                                
                                                                <img style="height: 160px;width: 160px;" src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('u_img'); ?>"
                                                                                                                                   
                                                                <input type="password" id="password1" name="uphoto" class="input-text">
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
                                                            <h2>Edit Profile</h2>
                                                            <span class="underline left"></span>
                                                            
                                                        </div>
                                                        <form class="login" method="post">
                                                            <p class="form-row form-row-first input-required">  Name : 
                                                                <label> 
                                                                    <span class="first-letter"> <?php echo $this->session->userdata('u_name'); ?></span>  
                                                                    
                                                                </label>
                                                                
                                                                <input type="text" id="username1" name="username" class="input-text">
                                                            </p>
                                                            <p class="form-row input-required">Mobile No :
                                                                <label>
                                                                    <span class="first-letter"> <?php echo $this->session->userdata('u_mno'); ?> </span>  
                                                                    
                                                                </label>
                                                                <input type="password" id="password1" name="password" class="input-text">
                                                            </p>    

                                                            <p class="form-row input-required">
                                                                
                                                                <img style="height: 50px;width: 50px;" src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('u_img'); ?>">
                                                                
                                                                <input type="file"  class="input-text" name="book_photo_upload" id="exampleInputFile" aria-describedby="fileHelp">
                                                            </p>

                                                            <div class="clear"></div>
                                                            <input type="submit" value="Edit" name="signup" class="button btn btn-default">
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