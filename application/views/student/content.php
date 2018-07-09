<section class="category-filter section-padding">
            <div class="container">
                <div class="row">
                    <div class="center-content">
                        <h2 class="section-title">Check Out The New Releases</h2>
                        <span class="underline center"></span>
                        <p class="lead">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>
                    </div>
                    <div class="filter-buttons">
                        <div class="filter btn" data-filter="all">All Releases</div>
                        <div class="filter btn" data-filter=".adults">Adults</div>
                        <div class="filter btn" data-filter=".kids-teens">Kids &amp; Teens</div>
                        <div class="filter btn" data-filter=".video">Video</div>
                        <div class="filter btn" data-filter=".audio">Audio</div>
                        <div class="filter btn" data-filter=".books">Books</div>
                        <div class="filter btn" data-filter=".magazines">Magazines</div>
                    </div>
                    <div id="category-filter">
                    <?php foreach ($book_item as $tbl): ?>
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
                                            <span class="author"><strong>Author:</strong><?php echo $tbl['book_author']; ?></span>
                                            <span class="author"><strong>ISBN:</strong> <?php echo $tbl['isbn_no']; ?></span>
                                            <div class="rating">
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                            </div>
                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                            <ol>
                                                <li>
                                                    <a href="#" data-toggle="blog-tags" data-placement="top" title="Add To Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="blog-tags" data-placement="top" title="Add To List">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="blog-tags" data-placement="top" title="Send Email">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="blog-tags" data-placement="top" title="Share This">
                                                        <i class="fa fa-share-alt"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="blog-tags" data-placement="top" title="View Image">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                </li>
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