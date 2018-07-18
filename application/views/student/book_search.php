<div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="books-media-list">
                        <div class="container">
                            <div class="row">
                                
                            </div>
                            <div class="row">
                                <div class="col-md-9 col-md-push-3">
                                    <div class="filter-options margin-list">
                                        <div class="row">                                            
                                            <div class="col-md-4 col-sm-4">
                                                <select name="orderby">
                                                    <option selected="selected">Default sorting</option>
                                                    <option>Sort by popularity</option>
                                                    <option>Sort by rating</option>
                                                    <option>Sort by newness</option>
                                                    <option>Sort by price</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="filter-result">Showing items 1 to 9 of 19 total</div>
                                            </div>
                                            <!-- <div class="col-md-3 col-sm-3 pull-right">
                                                <div class="filter-toggle">
                                                    <a href="books-media-gird-view-v1.html"><i class="glyphicon glyphicon-th-large"></i></a>
                                                    <a href="books-media-list-view.html" class="active"><i class="glyphicon glyphicon-th-list"></i></a>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="books-list">

                                    
                                        <article> 
                                        <?php foreach ($search_item as $tbl): ?>

                                            <div class="single-book-box">                                                
                                                <div class="post-thumbnail">
                                                    <!-- <div class="book-list-icon yellow-icon"></div> -->
                                                    <a href="books-media-detail-v1.html"><img style="height: 300px;width: 300px;" alt="Book" src="<?php echo base_url();?>uploads/<?php echo $tbl['book_photo']; ?>" /></a>                                                                 </div>
                                                <div class="post-detail">
                                                    
                                                    <header class="entry-header">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <!-- <h3 class="entry-title">
                                                                <li><strong>Book Title :</strong><?php echo $tbl['book_title']; ?></li>
                                                                </h3> -->
                                                                <ul>
                                                                    <!-- <li><strong>Author:</strong> F. Scott Fitzgerald</li> -->
                                                                    <li><strong>Book Title :</strong><?php echo $tbl['book_title']; ?></li>
                                                                    <li><strong>Author Name:</strong> <?php echo $tbl['book_author']; ?> </li>
                                                                    <li><strong>ISBN:</strong><?php echo $tbl['isbn_no']; ?></li>
                                                                   
                                                                </ul>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <ul>
                                                                    <li><strong>Edition:</strong> <?php echo $tbl['book_edition']; ?> </li>
                                                                    <li><strong>Book Edition Year:</strong> <?php echo $tbl['book_edition_year']; ?> </li>
                                                                    <li><strong>Availability:</strong> <?php echo $tbl['book_availability']; ?> </li>
                                                                    
                                                                    <!-- <li>
                                                                        <div class="rating">
                                                                            <strong>Rating: </strong>
                                                                            <span>☆</span>
                                                                            <span>☆</span>
                                                                            <span>☆</span>
                                                                            <span>☆</span>
                                                                            <span>☆</span>
                                                                        </div>
                                                                    </li> -->
                                                                </ul>                                                                
                                                            </div>
                                                        </div>
                                                    </header>
                                                    
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <?php endforeach; ?>   
                                        </article>
                                        
                                    </div>

                                    <nav class="navigation pagination text-center">
                                        <h2 class="screen-reader-text">Posts navigation</h2>
                                        <div class="nav-links">
                                            <a class="prev page-numbers" href="#."><i class="fa fa-long-arrow-left"></i> Previous</a>
                                            <a class="page-numbers" href="#.">1</a>
                                            <span class="page-numbers current">2</span>
                                            <a class="page-numbers" href="#.">3</a>
                                            <a class="page-numbers" href="#.">4</a>
                                            <a class="next page-numbers" href="#.">Next <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </nav>
                                </div>
                                <div class="col-md-3 col-md-pull-9">
                                    <aside id="secondary" class="sidebar widget-area" data-accordion-group>
                                        <div class="widget widget_related_search open" data-accordion>
                                            <h4 class="widget-title" data-control>Related Searches</h4>
                                            <div data-content>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Categories</h5>
                                                    <?php foreach ($cat_item as $tbl): ?>
                                                    <div class="widget_categories" data-content>
                                                        <ul>
                                                            <li><a href="#"><?php echo $tbl['cat_name']; ?><span>(18)</span></a></li>
                                                            </ul>
                                                    </div>
                                                    <?php endforeach; ?>   
                                                </div>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Authors</h5>
                                                    <?php foreach ($book_item as $tbl): ?>
                                                    <div class="widget_categories" data-content>
                                                        <ul>
                                                            <li><a href="#"><?php echo $tbl['book_author']; ?><span>(18)</span></a></li>
                                                            </ul>
                                                    </div>
                                                    <?php endforeach; ?>   

                                                    <div class="clearfix"></div>
                                                </div>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Edition Year</h5>
                                                    <?php foreach ($book_item as $tbl): ?>
                                                    <div class="widget_categories" data-content>
                                                        <ul>
                                                            <li><a href="#"><?php echo $tbl['book_edition_year']; ?></span></a></li>
                                                          </ul>
                                                    </div>
                                                    <?php endforeach; ?>   
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Other Searches</h5>
                                                    <div class="widget_categories" data-content>
                                                        <ul>
                                                            <li><a href="#">Love stories <span>(18)</span></a></li>
                                                            <li><a href="#">Texas <span>(04)</span></a></li>
                                                            <li><a href="#">Rich people <span>(03)</span></a></li>
                                                            <li><a href="#">Humorous stories <span>(02)</span></a></li>
                                                            <li><a href="#">Widows <span>(02)</span></a></li>
                                                            <li><a href="#">Women <span>(11)</span></a></li>
                                                            <li><a href="#">Babysitters <span>(25)</span></a></li>
                                                            <li><a href="#">Law firms <span>(09)</span></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="widget widget_narrow_search" data-accordion>
                                            <h4 class="widget-title" data-control>Narrow your search</h4>
                                            <div data-content>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Type of Material</h5>
                                                    <div class="widget_material" data-content>
                                                        <form action="#">
                                                            <label><input type="checkbox" name="material" value="books"> Books</label>
                                                            <label><input type="checkbox" name="material" value="electronic" checked> Electronic Resources</label>
                                                            <label><input type="checkbox" name="material" value="ebooks"> ebooks</label>
                                                            <label><input type="checkbox" name="material" value="soundrecording" checked> Sound Recording</label>
                                                            <label><input type="checkbox" name="material" value="largeprint"> Large Print</label>
                                                            <label><input type="checkbox" name="material" value="audioebooks" checked> Audio eBooks</label>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Publishing Date </h5>
                                                    <div class="widget widget_material" data-content>
                                                        <form action="#">
                                                            <label><input type="checkbox" name="material" value="books"> Books</label>
                                                            <label><input type="checkbox" name="material" value="electronic" checked> Electronic Resources</label>
                                                            <label><input type="checkbox" name="material" value="ebooks"> ebooks</label>
                                                            <label><input type="checkbox" name="material" value="soundrecording" checked> Sound Recording</label>
                                                            <label><input type="checkbox" name="material" value="largeprint"> Large Print</label>
                                                            <label><input type="checkbox" name="material" value="audioebooks" checked> Audio eBooks</label>
                                                        </form>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Popularity </h5>
                                                    <div class="widget widget_material" data-content>
                                                        <form action="#">
                                                            <label><input type="checkbox" name="material" value="books"> Books</label>
                                                            <label><input type="checkbox" name="material" value="electronic" checked> Electronic Resources</label>
                                                            <label><input type="checkbox" name="material" value="ebooks"> ebooks</label>
                                                            <label><input type="checkbox" name="material" value="soundrecording" checked> Sound Recording</label>
                                                            <label><input type="checkbox" name="material" value="largeprint"> Large Print</label>
                                                            <label><input type="checkbox" name="material" value="audioebooks" checked> Audio eBooks</label>
                                                        </form>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Language </h5>
                                                    <div class="widget widget_material" data-content>
                                                        <form action="#">
                                                            <label><input type="checkbox" name="material" value="books"> Books</label>
                                                            <label><input type="checkbox" name="material" value="electronic" checked> Electronic Resources</label>
                                                            <label><input type="checkbox" name="material" value="ebooks"> ebooks</label>
                                                            <label><input type="checkbox" name="material" value="soundrecording" checked> Sound Recording</label>
                                                            <label><input type="checkbox" name="material" value="largeprint"> Large Print</label>
                                                            <label><input type="checkbox" name="material" value="audioebooks" checked> Audio eBooks</label>
                                                        </form>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="widget widget_recent_releases">
                                            <h4 class="widget-title">New Releases</h4>
                                            <ul>
                                                <li><a href="#">Books</a></li>
                                                
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        
                                    </aside>
                                </div> 
                            </div>
                        </div> 