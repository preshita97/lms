<section class="category-filter section-padding">
            <div class="container">
                <div class="row">
                    <div class="center-content">
                        <h2 class="section-title" style="color:black;">Check Out The New Releases</h2>
                        <span class="underline center"></span>
                        
                    </div>
                    
                    <div class="filter-buttons">
                        <div class="filter btn" data-filter="all">All Releases</div>
                    <?php foreach ($book_cat_item as $tbl): ?>
                        <div class="filter btn" data-filter=".adults"  ><a href="<?php echo base_url('User/book_cat_display/'.$tbl['cat_id']); ?>"><?php echo $tbl['cat_name']; ?></a></div>
                        
                    <?php endforeach; ?>
                    </div>
                    <div id="category-filter">
                    <?php foreach ($book_author_item as $tbl): ?>
                        <ul class="category-list">
                            <li class="category-item adults">
                                <figure>
                               
                                    <img style="height: 300px;width: 300px;" src="<?php echo base_url();?>uploads/<?php echo $tbl['book_photo']; ?>" alt="New Releaase" />
                                    <figcaption class="bg-yellow">
                                        <div class="diamond">
                                            <i class="book"></i>
                                        </div>
                                        <div class="info-block">
                                        <h4><li><strong>Book Title :</strong><?php echo $tbl['book_title']; ?></li></h4>    
                                            <span class="author"><strong>Author:</strong><?php echo $tbl['author_name']; ?></span>
                                            <span class="author"><strong>ISBN:</strong> <?php echo $tbl['isbn_no']; ?></span>
                                            <span class="author"><strong>Book Edition:</strong> <?php echo $tbl['book_edition']; ?></span>
                                            <span class="author"><strong>Book Publisher:</strong> <?php echo $tbl['book_publisher']; ?></span>
                                            <span class="author"><strong>Book Edition Year:</strong> <?php echo $tbl['book_edition_year']; ?></span>
                                            <div class="rating">
                                                
                                            </div>
                                            
                                            <!-- <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a> -->
                                            <ol>
                                                <!-- <li>
                                                    <a href="#" data-toggle="blog-tags" data-placement="top" title="Add To Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="blog-tags" data-placement="top" title="Add To List">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </li> -->
                                                <li>
                                                <?php
                                                    if($this->session->userdata('u_id')=="")
                                                    {

                                                        

                                                ?>
                                                     <button href="" onclick="demo()" data-toggle="blog-tags" data-placement="top" title="Request">
                                                        <i class="fa fa-heart"></i>
                                                    </button>

 
                                                 <?php   }
                                                    else{
                                                        // $id=$this->session->userdata('u_id');
                                                        // echo "<script type='text/javascript'> alert('".$id."'); </script>";
                                                ?>
                                                    <a href="<?php echo base_url('User/book_request_from_user/'.$tbl['book_id']);?>" data-toggle="blog-tags" data-placement="top" title="Request">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <?php } ?>
                                                </li>
                                                <!-- <li>
                                                    <a href="#" data-toggle="blog-tags" data-placement="top" title="Share This">
                                                        <i class="fa fa-share-alt"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="blog-tags" data-placement="top" title="View Image">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                </li> -->
                                            </ol>
                                        </div>
                                    </figcaption>
                                       
                                </figure>
                            </li>
                            
                        </ul>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
        function demo()
        {
            alert("You must have to login first for Requesting book");
        }
        </script>