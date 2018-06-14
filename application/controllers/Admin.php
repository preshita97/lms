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

        public function index()
        {
        $data['title'] = '';
		
        $this->load->view('admin/login', $data);
       
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
          
          // $data=$this->Admin_model->user_display();
          // $this->load->view('admin/header.php');

          // if($data)
          // {
          //   $this->load->view('admin/user_tbl');
          // }
          // else{

          // }

          $data['user_item'] = $this->Admin_model->user_display();
        
        if (empty($data['user_item']))
        {
            show_404();
        }
 
        //$data[''] = $data['news_item']['title'];
 
        $this->load->view('admin/header', $data);
        $this->load->view('admin/user_tbl', $data);
        //$this->load->view('templates/footer');
        }

        public function request_table()
        {
         
          //echo " <script> alert ('alsjdklasjdklasj'); </script>";
          $data['request_item'] = $this->Admin_model->request_display();
        
          if (empty($data['request_item']))
        {
            show_404();
        }
 
        //$data[''] = $data['news_item']['title'];
 
        $this->load->view('admin/header', $data);
        $this->load->view('admin/request_tbl', $data);
        //$this->load->view('admin/request_tbl', $data);
        //$this->load->view('templates/footer');
        }

        public function notification_table()
        {
         
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

        public function book_circulation_table()
        {
         
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

        public function book_cat_table()
        {
         
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

        public function home(){

    

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
}