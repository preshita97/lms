<script type="text/javascript">
  
     function del()
      {
        return confirm("Are you sure you want to Delete this Category ?");
      }
      function edit()
      {
        return confirm("Are you sure you want to Edit this Category ?");
      }
  </script>
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Table basic</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">pages</li>
                        <li class="breadcrumb-item active">Table basic</li>
                    </ol>
                </div>
                
            </div>
<?php 
$success_message=$this->session->flashdata('success_message');
if($success_message)
{

}
?>

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Book Edit Form </h4>
                            </div>
                            <div class="card-body">
                                <form enctype="multipart/form-data" method="POST" action="<?php echo base_url('Admin/edit_book'); ?>">
                                    <div class="form-body">
                                        <!-- <h3 class="card-title">Person Info</h3>
                                        <hr> -->
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">ISBN NO</label>
                                                    <input type="text" id="isbnno" name="txt_isbnno" class="form-control" value="<?php echo $book_item['isbn_no']; ?>">
                                                    <!-- <small class="form-control-feedback"> This is inline help </small> -->
                                                </div>
                                            </div>

                                            
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" style="margin-top: 14px;" >Book Availability</label>
                                                    <!-- <input type="radio" id="bookavailability" name="txt_book_availability" class="form-control" value="Male" placeholder=""> -->
                                                    </br>
                                                    <input name="radio_book_availability" type="radio" id="radio_49" class="with-gap radio-col-black" <?php if($book_item['book_availability']=="yes") echo "checked='checked'"  ?> value="yes"/>
                                                    <label for="radio_49">Yes</label>
                                                    
                                                    <input name="radio_book_availability" type="radio" id="radio_48" class="with-gap radio-col-black" <?php if($book_item['book_availability']=="no") echo "checked='checked'"  ?> value="no"/>
                                                    <label for="radio_48">No</label>
                                                    <!-- <small class="form-control-feedback"> This field has error. </small>  -->
                                                    </div> 
                                            </div>

                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label class="control-label">Book Title</label>
                                                    <input type="text" id="booktitle" name="txt_book_title" class="form-control" value="<?php echo $book_item['book_title']; ?>" >
                                                    <input type="hidden"  name="id" class="form-control" value="<?php echo $id = $this->uri->segment(3); ?>" >
                                                    <!-- <small class="form-control-feedback"> This field has error. </small>  -->
                                                    </div> 
                                            </div>

                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Book Publisher</label>
                                                    <input type="text" id="bookpublisher" name="txt_book_publisher" class="form-control" value="<?php echo $book_item['book_publisher']; ?>" >
                                                    <!-- <small class="form-control-feedback"> This field has error. </small>  -->
                                                    </div> 
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                
                                                    <label class="control-label">Book Category</label>

                                                    <select class="form-control custom-select" data-placeholder="Choose a Category" name="reqbook_catg" tabindex="1">
                                                    <?php foreach ($book_cat_item as $tbl): ?>
                                                        <option value="<?php echo $tbl['cat_id']; ?>" <?php if($tbl['cat_id']==$book_item['fk_cat_id']) echo "selected='selected'"; ?> ><?php echo $tbl['cat_name']; ?></option>
                                                        
                                                        <?php endforeach; ?>
                                                    </select>
                                                    
                                                </div>
                                            </div>

                                             <div class="col-md-6">
                                                <div class="form-group">
                                                
                                                    <label class="control-label">Book Author</label>

                                                    <select class="form-control custom-select" data-placeholder="Choose a Category" name="txt_book_author"  tabindex="1">
                                                    <?php foreach ($author_item as $tbl): ?>
                                                        <option value="<?php echo $tbl['author_id']; ?>" <?php if($tbl['author_id']==$book_item['book_author']) echo "selected='selected'"; ?> ><?php echo $tbl['author_name']; ?></option>
                                                        
                                                        <?php endforeach; ?>
                                                    </select>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                            <div class="col-md-6">
                                                    <div class="u-img">
                                                    <img style="height: 50px;width: 50px;" src="<?php echo base_url(); ?>uploads/<?php echo $book_item['book_photo']; ?>" alt="user image">
                                                    </div>
                                            </div>
                                           
                                                <div class="form-group">
                                                    <label>Upload New Book Photo</label>
                                                    <input type="file" value="<?php echo $book_item['book_photo']; ?>" class="form-control" name="book_photo_upload" id="exampleInputFile" aria-describedby="fileHelp">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Book Edition</label>
                                                    <input type="text" id=" Book Edition" name="txt_book_edition" class="form-control" value="<?php echo $book_item['book_edition']; ?>">
                                                    <!-- <small class="form-control-feedback"> This field has error. </small>  -->
                                                    </div> 
                                            </div>

                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Book Edition Year</label>
                                                    <input type="number" min="1900" max="2020" step="1" value="2016"  id="Requested Book Edition Year" name="txt_book_editionyr" class="form-control" value="<?php echo $book_item['book_edition_year']; ?>">
                                                    <!-- <small class="form-control-feedback"> This field has error. </small>  -->
                                                    </div> 
                                            </div>

                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-date-input" class="col-md-2 col-form-label">Date</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="date" name="txt_book_date" value="<?php echo $book_item['book_add_date']; ?>" id="example-date-input">
                                                 </div>
                                            </div>
                                            </div>


                                            <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-date-input" class="col-md-2 col-form-label">Date</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="date" name="txt_reqbook_date" value="2011-08-19" id="example-date-input">
                                                 </div>
                                            </div>
                                            </div> -->
                                            
                                            <!--/span-->
                                        <!-- </div> -->
                                        <!--/row-->
                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Gender</label>
                                                    <select class="form-control custom-select">
                                                        <option value="">Male</option>
                                                        <option value="">Female</option>
                                                    </select>
                                                    <small class="form-control-feedback"> Select your gender </small> </div>
                                            </div> -->
                                            <!--/span-->
                                            <!-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input type="date" class="form-control" placeholder="dd/mm/yyyy">
                                                </div>
                                            </div> -->
                                            <!--/span-->
                                        <!-- </div> -->
                                        <!--/row-->
                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Category</label>
                                                    <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                        <option value="Category 1">Category 1</option>
                                                        <option value="Category 2">Category 2</option>
                                                        <option value="Category 3">Category 5</option>
                                                        <option value="Category 4">Category 4</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                            <!--/span-->
                                            <!-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Membership</label>
                                                    <div class="form-check">
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio1" name="radio" type="radio" checked class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Free</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio2" name="radio" type="radio" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Paid</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!--/span-->
                                        <!-- </div> -->
                                        <!--/row-->
                                        <!-- <h3 class="box-title m-t-40">Address</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Street</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div> -->
                                            <!--/span-->
                                            <!-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div> -->
                                            <!--/span-->
                                        <!-- </div> -->
                                        <!--/row-->
                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Post Code</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div> -->
                                            <!--/span-->
                                            <!-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-control custom-select">
                                                        <option>--Select your Country--</option>
                                                        <option>India</option>
                                                        <option>Sri Lanka</option>
                                                        <option>USA</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                       <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <!-- <button type="button" class="btn btn-inverse">Cancel</button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                        </div>
                        


                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2017 Admin Press Admin by themedesigner.in </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--morris JavaScript -->
    <script src="<?php echo base_url(); ?>assets/plugins/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/morrisjs/morris.min.js"></script>
    <!-- Chart JS -->
    <script src="<?php echo base_url(); ?>js/dashboard1.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <!-- This is data table -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    


    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/popper.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>js/custom.min.js"></script>
    <!-- This is data table -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
