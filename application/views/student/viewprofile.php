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
                                                            <h2>View Profile</h2>
                                                            <span class="underline left"></span>
                                                            
                                                        </div>
                                                        <form class="login" method="post">
                                                            <p class="form-row form-row-first">
                                                            
                                                                <label>
                                                                    <span class="first-letter"><b>Name :</b> <?php echo $this->session->userdata('u_name'); ?> </span>  
                                                                    
                                                                </label>

                                                                

                                                                
                                                            </p>
                                                            <p class="form-row input-required">
                                                                
                                                                <img style="height: 200px;width: 200px;" src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('u_img'); ?>"
                                                                                                                                   
                                                                <input type="password" id="password1" name="uphoto" class="input-text">
                                                            </p>                               
                                                            <p class="form-row input-required">
                                                                <label>
                                                                  <b>  <span class="first-letter">Mobile Number</span>  </b>
                                                                    <?php echo $this->session->userdata('u_mno'); ?>
                                                                </label>
                                                               
                                                            </p>                                                                                
                                                            <div class="clear"></div>
                                                            <input type="submit" value="Edit" name="Change" class="button btn btn-default">
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