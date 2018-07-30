<?php
class Admin extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
                $this->load->model('User_model');
                $this->load->model('Admin_model');
                $this->load->library('session');
        }

        public function dashboard()
        {
          $data['total_users'] = $this->Admin_model->total_users_dashboard();
          
          $data['total_inactive_users']=$this->Admin_model->total_inactive_users_dashboard();
          
          $data['total_all_users']=$this->Admin_model->total_allusers_dashboard();
          
          $data['total_available_books']=$this->Admin_model->total_available_books_dashboard();

          $data['total_unavailable_books']=$this->Admin_model->total_unavailable_books_dashboard();

          $data['total_category']=$this->Admin_model->total_category_dashboard();

          $data['total_books']=$this->Admin_model->total_books_dashboard();

          $data['pending_reqst']=$this->Admin_model->total_pending_request_dashboard();
          

          $this->load->view('admin/dashboard',$data);
        }

        public function book_cat_add()
        {
          $id = $this->session->userdata('u_id');

 $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id);

          $this->load->helper('form');
          $this->load->library('form_validation');

          $this->load->view('admin/header',$data);
          $this->load->view('admin/book_cat_add');
 
        }

        public function book_add()
        {
          $id = $this->session->userdata('u_id');

 $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id);

          $this->load->helper('form');
          $this->load->library('form_validation');
          $data['book_cat_item'] = $this->Admin_model->book_cat_display();
          $data['author_display'] = $this->Admin_model->author_display();
          $this->load->view('admin/header',$data);
          $this->load->view('admin/book_add',$data);
 
        }
        

        public function request_add()
        {
          $id = $this->session->userdata('u_id');

 $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id);

          $this->load->helper('form');
          $this->load->library('form_validation');
          $data['book_cat_item'] = $this->Admin_model->book_cat_display();
          $this->load->view('admin/header',$data);
          $this->load->view('admin/request_add',$data);
 
        }

        public function index()
        {
          $id = $this->session->userdata('u_id');

        $data['title'] = '';
        $data['book_item'] = $this->User_model->book_display();
        $data['cat_item'] = $this->User_model->cat_display();
        $data['author_item'] = $this->User_model->author_display();
        $data['book_author_item'] = $this->User_model->book_author_display();
        $data['book_cat_item'] = $this->User_model->book_cat_display();

        $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id);

        // $this->load->view('User/home', $data);
        $this->load->view('student/header.php',$data);
       $this->load->view('student/content.php',$data);
          $this->load->view('student/footer.php',$data);
       
        }

        public function signup()
        {
        $data['title'] = '';
		
        $this->load->view('admin/signup', $data);
        
        }

        public function login()
        {
        $data['title'] = '';
		
        $this->load->view('admin/login', $data);
       
        }

        public function users_table()
        {
          $id = $this->session->userdata('u_id');

          $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id);

         $data['user_item'] = $this->Admin_model->user_display();
        
        // if (empty($data['user_item']))
        // {
        //     show_404();
        // }
 
        $this->load->view('admin/header', $data);
        $this->load->view('admin/user_tbl', $data);
       
        }

        public function user_delete()
              {
                $id = $this->uri->segment(3);
              
              if (empty($id))
              {
                  show_404();
              }
            //  $image_path=$this->Admin_model->get_user_by_id($id);
             // $u_img=$image_path['u_img'];
              //unlink(base_url().'uploads/'.$u_img);
              //echo "<script> alert ('".$u_img."'); </script>";
              $this->Admin_model->user_delete($id);
              $this->session->set_flashdata('success_message', 'Successfully Deleted.');
              //echo " <script> alert ('Successfully Deleted'); </script>";        
              //redirect(base_url().'admin/users_table','refresh');
              }

              public function approve_requests_by_admin()
              {

                $id1 = $this->session->userdata('u_id');

                  $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id1);

                $id = $this->uri->segment(3);
                
             //   echo $id;
             $data['fine_amt_user'] = $this->Admin_model->calculate_fine_amt($id);

                $this->load->view('admin/header', $data);
                $this->load->view('admin/user_amt', $data);
              }

              public function fine_ammount_user()
              {
                $id=$this->input->post('id');
                $user = array(
                  'fine_amt' => $this->input->post('txt_fine_amt')
                );
                print_r($user);

                $this->Admin_model->update_fine_amt($id);
                
                redirect(base_url().'admin/approve_requests_table','refresh');
              }

          public function approve_requests_table()
            {
                  $id = $this->session->userdata('u_id');

                  $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id);
           
                     //echo " <script> alert ('alsjdklasjdklasj'); </script>";
                     $data['request_item'] = $this->Admin_model->request_display_approve();
                   
                   //   if (empty($data['request_item']))
                   // {
                   //     show_404();
                   // }
            
                   //$data[''] = $data['news_item']['title'];
            
                   $this->load->view('admin/header', $data);
                   $this->load->view('admin/approve_requests_table', $data);
          }
        public function request_table()
        {
         
          $id = $this->session->userdata('u_id');

 $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id);

          //echo " <script> alert ('alsjdklasjdklasj'); </script>";
          $data['request_item'] = $this->Admin_model->request_display();
        
        //   if (empty($data['request_item']))
        // {
        //     show_404();
        // }
 
        //$data[''] = $data['news_item']['title'];
 
        $this->load->view('admin/header', $data);
        $this->load->view('admin/request_tbl', $data);
        //$this->load->view('admin/request_tbl', $data);
        //$this->load->view('templates/footer');
        }

        public function request_delete()
              {
                $id = $this->uri->segment(3);
              
              if (empty($id))
              {
                  show_404();
              }
            //  $image_path=$this->Admin_model->get_user_by_id($id);
             // $u_img=$image_path['u_img'];
              //unlink(base_url().'uploads/'.$u_img);
              //echo "<script> alert ('".$u_img."'); </script>";
              $this->Admin_model->request_delete($id);
              $this->session->set_flashdata('success_message', 'Successfully Deleted.');
              //echo " <script> alert ('Successfully Deleted'); </script>";        
              redirect(base_url().'admin/request_table','refresh');
              }


        public function notification_table()
        {
         $id = $this->session->userdata('u_id');

 $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id);
          //echo " <script> alert ('alsjdklasjdklasj'); </script>";
        $data['notification_item'] = $this->Admin_model->notification_display();
        
        //   if (empty($data['request_item']))
        // {
        //     show_404();
        // }
 
        // //$data[''] = $data['news_item']['title'];
 
        $this->load->view('admin/header', $data);
        $this->load->view('admin/notification_tbl', $data);
        //$this->load->view('admin/request_tbl', $data);
        //$this->load->view('templates/footer');
        }

        public function book_table()
        {
          $id = $this->session->userdata('u_id');

          $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id);
          //echo " <script> alert ('alsjdklasjdklasj'); </script>";
        $data['book_item'] = $this->Admin_model->book_display();
        
        //   if (empty($data['request_item']))
        // {
        //     show_404();
        // }
 
        // //$data[''] = $data['news_item']['title'];
 
        $this->load->view('admin/header', $data);
        $this->load->view('admin/book_tbl', $data);
        //$this->load->view('admin/request_tbl', $data);
        //$this->load->view('templates/footer');
        }

        public function book_delete()
        {
          $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
      //  $image_path=$this->Admin_model->get_user_by_id($id);
       // $u_img=$image_path['u_img'];
        //unlink(base_url().'uploads/'.$u_img);
        //echo "<script> alert ('".$u_img."'); </script>";
        $this->Admin_model->book_delete($id);
        $this->session->set_flashdata('success_message', 'Successfully Deleted.');
        //echo " <script> alert ('Successfully Deleted'); </script>";        
        redirect(base_url().'admin/book_table','refresh');
        }


        public function book_circulation_table()
        {
          $id = $this->session->userdata('u_id');

          $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id);
          //echo " <script> alert ('alsjdklasjdklasj'); </script>";
        $data['book_circulation_item'] = $this->Admin_model->book_circulation_display();
        
        //   if (empty($data['request_item']))
        // {
        //     show_404();
        // }
 
        // //$data[''] = $data['news_item']['title'];
 
        $this->load->view('admin/header', $data);
        $this->load->view('admin/book_circulation_tbl', $data);
        //$this->load->view('admin/request_tbl', $data);
        //$this->load->view('templates/footer');
        }

        public function book_cir_delete()
        {
          $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
      //  $image_path=$this->Admin_model->get_user_by_id($id);
       // $u_img=$image_path['u_img'];
        //unlink(base_url().'uploads/'.$u_img);
        //echo "<script> alert ('".$u_img."'); </script>";
        $this->Admin_model->book_cir_delete($id);
        $this->session->set_flashdata('success_message', 'Successfully Deleted.');
        //echo " <script> alert ('Successfully Deleted'); </script>";        
        redirect(base_url().'admin/book_circulation_table','refresh');
        }

        public function book_cat_table()
        {
          $id = $this->session->userdata('u_id');

          $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id);
          //echo " <script> alert ('alsjdklasjdklasj'); </script>";
        $data['book_cat_item'] = $this->Admin_model->book_cat_display();
        
        //   if (empty($data['request_item']))
        // {
        //     show_404();
        // }
 
        // //$data[''] = $data['news_item']['title'];
 
        $this->load->view('admin/header', $data);
        $this->load->view('admin/book_cat_tbl', $data);
        //$this->load->view('admin/request_tbl', $data);
        //$this->load->view('templates/footer');
        }

        public function home()
        {
                $user_login=array(
              
                'u_email_id'=>$this->input->post('u_email_id'),
                'u_password'=>$this->input->post('u_password')
              
                  );
              
                  $data=$this->User_model->home($user_login['u_email_id'],$user_login['u_password']);
                    if($data)
                    {
                      
                      $this->session->set_userdata('u_email_id',$data['u_email_id']);
                      $this->session->set_userdata('u_password',$data['u_password']);
                      $this->session->set_userdata('u_name',$data['u_name']);
                      $this->session->set_userdata('u_img',$data['u_img']);
                      $this->session->set_userdata('u_type',$data['u_type']);
                      $this->session->set_userdata('u_mno',$data['u_mno']);
                      $this->session->set_userdata('u_status',$data['u_status']);
                      
                      if($data['u_type']=="admin")
                      {
                          $this->load->view('admin/header.php');
                          $this->session->set_flashdata('success_msg','Success');
                      }
                    else
                      {
                        $this->load->view('student/success.php');
                      }
              
                      }
                    else{
                      $this->session->set_flashdata('error_msg','Error occured,Try again.');
                      $this->load->view("admin/login.php");
              
                    }
              }

              public function request_edit()
              {
              //   $id1= $this->session->userdata('u_id');

              //   $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id1);

              //   $id = $this->uri->segment(3);
        
              //   $this->load->helper('form');
              //   $this->load->library('form_validation');
                
              //   $data['req_avail_item'] = $this->Admin_model->request_availability_by_id($id);

              //   $this->form_validation->set_rules('reqbook_avail', 'Book Category Name', 'required');

              //   if($this->form_validation->run() == FALSE)
              //   {
              //    //echo " <script> alert ('if ma gyu'); </script>";
              //        $this->load->view('admin/header',$data); 
              //        $this->load->view('admin/request_edit',$data);
                     
              //    }
              //    else
              //    {
              //     //echo " <script> alert ('".$id."'); </script>"; 
              //        $this->Admin_model->edit_request_avail($id);
              //        // $this->load->view('admin/header'); 
              //        redirect(base_url().'admin/request_table','refresh');   
                 
                
              // }

              $this->load->helper('form');
              $this->load->library('form_validation');
              $id = $this->uri->segment(3);
              
              $id1= $this->session->userdata('u_id');

                $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id1);
              
               // $data['req_avail_item_by_id'] = $this->Admin_model->request_availability_by_id($id);
                
                $this->Admin_model->request_update_book_avail($id);

                $this->load->view('admin/header',$data); 
                redirect(base_url().'admin/request_table','refresh'); 
                
            }
              public function book_cat_edit()
              {
                $id = $this->uri->segment(3);

                $id1= $this->session->userdata('u_id');

                $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id1);
        
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['book_cat_item'] = $this->Admin_model->get_cat_by_id($id);

                $this->form_validation->set_rules('txt_cat_edit', 'Book Category Name', 'required');

                if($this->form_validation->run() == FALSE)
                {
                 //echo " <script> alert ('if ma gyu'); </script>";
                     $this->load->view('admin/header',$data); 
                     $this->load->view('admin/book_cat_edit',$data);
                     
                 }
                 else
                 {
                  //echo " <script> alert ('".$id."'); </script>"; 
                     $this->Admin_model->edit_book_category($id);
                     // $this->load->view('admin/header'); 
                     redirect(base_url().'admin/book_cat_table','refresh');   
                 }
              }
              public function book_cat_delete()
              {
                $id = $this->uri->segment(3);
              
              if (empty($id))
              {
                  show_404();
              }
              $this->Admin_model->category_delete($id);
              //$this->session->set_flashdata('success_message', 'Successfully Deleted.');
              //echo " <script> alert ('Successfully Deleted'); </script>";        
              redirect(base_url().'admin/book_cat_table','refresh');
              }

              public function add_book_Category()
              {
                $id = $this->session->userdata('u_id');

                $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id);

                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->form_validation->set_rules('txt_cat_add', 'Book Category Name', 'required');
                //echo " <script> alert ('Successfully Deleted'); </script>";

                if ($this->form_validation->run() == FALSE)
                 {
                  //echo " <script> alert ('if ma gyu'); </script>";
                      $this->load->view('admin/header',$data); 
                      $this->load->view('admin/book_cat_add');
                  }
                  else
                  {
                      $this->Admin_model->set_book_category();

                      // $this->load->view('admin/header'); 
                      redirect(base_url().'admin/book_cat_table','refresh');
                      
                  }
                
              }

              public function add_book()
              {
                $this->load->helper('form');
                $this->load->library('form_validation');
 
                // echo " <script> alert ('Successfully Deleted'); </script>";

                $filename = md5(uniqid(rand(), true));
		            $config = array(
                'upload_path' => 'uploads',
                'allowed_types' => "gif|jpg|png|jpeg",
                'file_name' => $filename
                );

                $this->load->library('upload', $config);
                global $user;
                if($this->upload->do_upload('book_photo_upload'))
                {
                  

                    $file_data = $this->upload->data();
                
    
                    $data['file_dir'] = $file_data['file_name'];
                    $data['date_uploaded'] = date('Y-m-d H:i:s');
                    $this->load->model('Admin_model');

                    $user = array(
                      'isbn_no' => $this->input->post('txt_isbnno'),
                      'book_availability'=> $this->input->post('radio_book_availability'),
                      'book_title' => $this->input->post('txt_book_title'),
                      'book_publisher' => $this->input->post('txt_book_publisher'),
                      'fk_cat_id' => $this->input->post('reqbook_catg'),
                      'book_photo' => $data['file_dir'],
                      'book_author' => $this->input->post('txt_book_author'),
                      'book_edition' => $this->input->post('txt_book_edition'),
                      'book_edition_year' => $this->input->post('txt_book_editionyr'),
                      'book_add_date' => $this->input->post('txt_book_date'),
                    
                        );
                      //  print_r($user);
                        
                        $this->Admin_model->set_book($user);
                        redirect(base_url().'admin/book_table','refresh');
                    }
                      else
                          {
                            echo " <script> alert ('Successfully Deleted'); </script>";
                          }
         }

              public function add_request()
              {
               
                $this->load->helper('form');
                $this->load->library('form_validation');



                $this->form_validation->set_rules('txt_reqbook_title', 'Requested Book Title', 'required');
                $this->form_validation->set_rules('txt_reqbook_author', 'Requested Author name', 'required');
                $this->form_validation->set_rules('txt_reqbook_edition', 'Requested Book Edition', 'required');
                $this->form_validation->set_rules('txt_reqbook_editionyr', 'Requested Book Edition year', 'required');
                $this->form_validation->set_rules('reqbook_catg', 'Requested Book Category', 'required');
                $this->form_validation->set_rules('txt_reqbook_date', 'Requested Book date', 'required');

                //echo " <script> alert ('Successfully Deleted'); </script>";

                if ($this->form_validation->run() == FALSE)
                 {               

                  
                 // echo " <script> alert ('if ma gyu'); </script>";
                      $this->load->view('admin/header'); 
                      $this->load->view('admin/request_add');
                  }
                  else
                  {
                      $this->Admin_model->set_request();

                      // $this->load->view('admin/header'); 
                      redirect(base_url().'admin/request_table','refresh');
    
                  }
                
              }

              public function notification_delete()
              {
                $id = $this->uri->segment(3);
                if (empty($id))
                {
                  show_404();
                }
                $this->Admin_model->notification_delete($id);
                redirect(base_url().'admin/notification_table','refresh');
              }

              public function notification_add()
              {
                $id = $this->session->userdata('u_id');

 $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id);

                $this->load->helper('form');
                $this->load->library('form_validation');

                $this->load->view('admin/header',$data);
                $this->load->view('admin/notification_add');
 
              }

              public function add_notification()
              {
                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->form_validation->set_rules('txt_notification_type', 'Notification Type', 'required');
                $this->form_validation->set_rules('txt_msg_title', 'Message Title', 'required');
                $this->form_validation->set_rules('txtarea_message_subject', 'Message Subject', 'required');

                if ($this->form_validation->run() == FALSE)
                 {               

                  
               //   echo " <script> alert ('if ma gyu'); </script>";
                      $this->load->view('admin/header'); 
                      $this->load->view('admin/notification_add');
                  }
                  else
                  {
                      $this->Admin_model->set_notification();

                      // $this->load->view('admin/header'); 
                      redirect(base_url().'admin/notification_table','refresh');
    
                  }

              }
              public function book_update()
              {

                $id1= $this->session->userdata('u_id');

                $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id1);

                $id = $this->uri->segment(3);
        
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['book_cat_item'] = $this->Admin_model->book_cat_display();

                $data['book_item'] = $this->Admin_model->get_book_by_id($id);

                $data['author_item'] = $this->Admin_model->author_display();

                 //echo " <script> alert ('if ma gyu'); </script>";
                     $this->load->view('admin/header',$data); 
                     $this->load->view('admin/book_update',$data);
                   
              }

              public function edit_book()
              {
                $this->load->helper('form');
                $this->load->library('form_validation');

               
                // echo " <script> alert ('Successfully Deleted'); </script>";
                     
                $filename = md5(uniqid(rand(), true));
		            $config = array(
                'upload_path' => 'uploads',
                'allowed_types' => "gif|jpg|png|jpeg",
                'file_name' => $filename
                );

                $this->load->library('upload', $config);
                global $user;
                if($this->upload->do_upload('book_photo_upload'))
                {
                  

                    $file_data = $this->upload->data();
                
    
                    $data['file_dir'] = $file_data['file_name'];
                    $data['date_uploaded'] = date('Y-m-d H:i:s');
                    $this->load->model('Admin_model');

                    $user = array(
                      'isbn_no' => $this->input->post('txt_isbnno'),
                      'book_availability'=> $this->input->post('radio_book_availability'),
                      'book_title' => $this->input->post('txt_book_title'),
                      'book_publisher' => $this->input->post('txt_book_publisher'),
                      'fk_cat_id' => $this->input->post('reqbook_catg'),
                      'book_photo' => $data['file_dir'],
                      'book_author' => $this->input->post('txt_book_author'),
                      'book_edition' => $this->input->post('txt_book_edition'),
                      'book_edition_year' => $this->input->post('txt_book_editionyr'),
                      'book_add_date' => $this->input->post('txt_book_date'),
                    
                        );
                        //print_r($user);
                        $id=$this->input->post('id');
                        $this->Admin_model->edit_book_rec($user,$id);
                       redirect(base_url().'admin/book_table','refresh');
                    }
                      else
                          {

                            $user = array(
                              'isbn_no' => $this->input->post('txt_isbnno'),
                              'book_availability'=> $this->input->post('radio_book_availability'),
                              'book_title' => $this->input->post('txt_book_title'),
                              'book_publisher' => $this->input->post('txt_book_publisher'),
                              'fk_cat_id' => $this->input->post('reqbook_catg'),
                              
                              'book_author' => $this->input->post('txt_book_author'),
                              'book_edition' => $this->input->post('txt_book_edition'),
                              'book_edition_year' => $this->input->post('txt_book_editionyr'),
                              'book_add_date' => $this->input->post('txt_book_date'),
                            
                                );
                                //print_r($user);
                                $id=$this->input->post('id');
                                $this->Admin_model->edit_book_rec($user,$id);
                               redirect(base_url().'admin/book_table','refresh');

                            echo " <script> alert ('Error Try Again'); </script>";
                          }
               
              }

              public function view_profile()
              {
                $id = $this->session->userdata('u_id');

                $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id);

                $id = $this->session->userdata('u_id');
        
                // echo " <script> alert ('".$email_id."'); </script>";

                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['user_item'] = $this->Admin_model->get_user_by_id_dashboard($id);

                    $this->load->view('admin/header',$data); 
                    $this->load->view('admin/view_profile',$data);
              }

              public function edit_profile()
              {
                $this->load->helper('form');
                $this->load->library('form_validation');

               
                // echo " <script> alert ('Successfully Deleted'); </script>";
                     
                $filename = md5(uniqid(rand(), true));
		            $config = array(
                'upload_path' => 'uploads',
                'allowed_types' => "gif|jpg|png|jpeg",
                'file_name' => $filename
                );

                $this->load->library('upload', $config);
                global $user;
                if($this->upload->do_upload('user_photo_upload'))
                {
                  

                    $file_data = $this->upload->data();
                
    
                    $data['file_dir'] = $file_data['file_name'];
                    $data['date_uploaded'] = date('Y-m-d H:i:s');
                    $this->load->model('Admin_model');

                    $user = array(
                      'u_name' => $this->input->post('admin_full_name'),
                      'u_mno'=> $this->input->post('admin_mobile_no'),
                      'u_img' => $data['file_dir']
                    
                        );
                      //  print_r($user);
                        $id=$this->input->post('id');
                        $this->Admin_model->update_admin_profile($user,$id);
                       redirect(base_url().'admin/view_profile','refresh');
                    }
                      else
                          {

                            $user = array(
                              'u_name' => $this->input->post('admin_full_name'),
                              'u_mno'=> $this->input->post('admin_mobile_no')
                            
                                );
                                print_r($user);
                                $id=$this->input->post('id');
                                $this->Admin_model->update_admin_profile($user,$id);
                               redirect(base_url().'admin/view_profile','refresh');

                            echo " <script> alert ('Error Try Again'); </script>";
                          }
              }

              public function change_password()
              {

                $this->load->helper('form');
                $this->load->library('form_validation');
                
                $id = $this->session->userdata('u_id');

                $id1= $this->session->userdata('u_id');

                $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id1);

                $this->load->view('admin/header',$data);
                $this->load->view('admin/change_password',$data);
                
                // $user= array(
                //   'email_id'=>$this->input->post('u_emailid'),
                //   'old_password' => $this->input->post('old_admin_password'),
                //   'new_password'=> $this->input->post('u_password')
                //   );
                
                // $data['user_item'] =$this->Admin_model->get_user_by_id_dashboard($id);

                //  print_r($user_item);
                // //  global $old_pwd;

                //  $old_pwd=$user_item['u_password'];

                // if($old_pwd==$user['old_password'])
                // {
                  // $this->Admin_model->change_password_admin($user_header_item['u_email_id'],$user['new_password']);
               // }
                // else{
                  
                //   echo "you entered wrong old password  ";
                  
                //   $this->load->view('admin/header',$data); 
                //   $this->load->view('admin/change_password',$data);

                // }

              }

              public function change_password_admin()
              {
                $this->load->helper('form');
                $this->load->library('form_validation');
                
                $id = $this->session->userdata('u_id');

                $id1= $this->session->userdata('u_id');

                $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id1);


               // $id1= $this->session->userdata('u_id');
                
                $user= array(
                    'email_id'=>$this->input->post('u_emailid'),
                    'old_password' => $this->input->post('old_admin_password'),
                    'new_password'=> $this->input->post('u_password'),
                    '$id' => $this->session->userdata('u_id')
                    );

                $change_pwd= $this->Admin_model->change_password_admin($user,$id);


                if($change_pwd)
                {
                  //echo " <script> alert ('success'); </script>";
                  $this->load->view('admin/header',$data); 
                   $this->load->view('admin/change_password',$data);
                }
                else
                {
                  //echo " <script> alert ('not success'); </script>";
                  $this->load->view('admin/header',$data); 
                   $this->load->view('admin/change_password',$data);
                }
              }

         public function author_table()
        {
          $id = $this->session->userdata('u_id');

          $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id);
          //echo " <script> alert ('alsjdklasjdklasj'); </script>";
        $data['author_item'] = $this->Admin_model->author_display();
        
        //   if (empty($data['request_item']))
        // {
        //     show_404();
        // }
 
        // //$data[''] = $data['news_item']['title'];
 
        $this->load->view('admin/header', $data);
        $this->load->view('admin/author_table', $data);
        //$this->load->view('admin/request_tbl', $data);
        //$this->load->view('templates/footer');
        }

        public function author_delete()
        {
          $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
      
        $this->Admin_model->author_delete($id);
        $this->session->set_flashdata('success_message', 'Successfully Deleted.');
      
        redirect(base_url().'admin/author_table','refresh');
        }


              public function author_update()
              {

                $id = $this->uri->segment(3);

                $id1= $this->session->userdata('u_id');

                $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id1);
        
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['author_item'] = $this->Admin_model->get_author_by_id($id);

                $this->form_validation->set_rules('txt_author_edit', 'Book Category Name', 'required');

                if($this->form_validation->run() == FALSE)
                {
                 //echo " <script> alert ('if ma gyu'); </script>";
                     $this->load->view('admin/header',$data); 
                     $this->load->view('admin/author_update',$data);
                     
                 }
                 else
                 {
                  //echo " <script> alert ('".$id."'); </script>"; 
                     $this->Admin_model->edit_author_name($id);
                     // $this->load->view('admin/header'); 
                     redirect(base_url().'admin/author_table','refresh');   
                 }
                   
              }

              public function add_author()
              {
                $id = $this->session->userdata('u_id');

                $data['user_header_item'] = $this->Admin_model->get_user_by_id_dashboard($id);

                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->form_validation->set_rules('txt_author_add', 'Author Name', 'required');
                //echo " <script> alert ('Successfully Deleted'); </script>";

                if ($this->form_validation->run() == FALSE)
                 {
                  //echo " <script> alert ('if ma gyu'); </script>";
                      $this->load->view('admin/header',$data); 
                      $this->load->view('admin/author_add');
                  }
                  else
                  {
                      $this->Admin_model->set_author_name();

                      // $this->load->view('admin/header'); 
                      redirect(base_url().'admin/author_table','refresh');
                      
                  }
                
              }

}