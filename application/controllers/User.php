<?php

class User extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('User_model');
            $this->load->library('session');

}

public function index()
{
$this->load->view("register.php");
}

public function register_user()
{

  $filename = md5(uniqid(rand(), true));
		$config = array(
			'upload_path' => 'uploads',
			'allowed_types' => "gif|jpg|png|jpeg",
			'file_name' => $filename
    );
    
    $this->load->library('upload', $config);

global $user;

    if($this->upload->do_upload())
			{
			$file_data = $this->upload->data();
			
    
      $data['file_dir'] = $file_data['file_name'];
			$data['date_uploaded'] = date('Y-m-d H:i:s');
			$this->load->model('User_model');
      //$this->upload_images->register_user($data);
      
      $user=array(
        
        'u_id'=>$this->input->post('u_id'),
        'u_email_id'=>$this->input->post('u_email_id'),
        'u_password'=>$this->input->post('u_password'),
        'u_name'=>$this->input->post('u_name'),
        'u_img'=>$data['file_dir'],
  
        'u_type'=>"student",
        'u_mno'=>$this->input->post('u_mno'),
        'u_status'=>"active"
          );
          print_r($user);
  
			
			// $data['message'] = "Image uploaded";
		
			// $this->load->model('upload_images');
			// $data['uploaded_images'] = $this->User_model->get_images();
			// $this->load->view('header', $data);
			}
			else
			{
			// $data = array();	
			// $this->load->model('upload_images');			
			// $data['uploaded_images'] = $this->upload_images->get_images();
			
    
      // $error = $this->upload->display_errors();
			// $data['errors'] = $error;

			// $this->load->view('home', $data);
      }
      

      
        

$email_check=$this->User_model->email_check($user['u_email_id']);

if($email_check){
  $this->User_model->register_user($user);
  $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
  redirect('Admin/index');

}
else{

  $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
  redirect('Admin/signup');
}

}

public function login_view(){

$this->load->view("login.php");

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

function user_profile(){

$this->load->view('user_profile.php');

}
public function user_logout(){

  $this->session->sess_destroy();
  redirect('user/login_view', 'refresh');
}

}

?>
