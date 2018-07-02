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
        //redirect(base_url().'Admin/index');
        redirect(base_url().'User/userdisplay');
      }
      else{

        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        redirect(base_url().'Admin/signup');
      }

      }

public function login_view()
{

$this->load->view("login.php");

}

public function about_us()
{

  $this->load->view('student/header.php');
  $this->load->view("student/about_us.php");
  $this->load->view('student/footer.php');


}

public function forgotpass()
{
  //$this->load->library("PHPMailer");
  $user_login=array('u_email_id'=>$this->input->post('forgotmail'));
  print_r($user_login);

   include "PHPMailer/class.phpmailer.php";

				$password="ahsdgah";
    //$message = $captcha_code;

// creating the phpmailer object
$mail = new PHPMailer(true);

// telling the class to use SMTP
$mail->IsSMTP();

// enables SMTP debug information (for testing) set 0 turn off debugging mode, 1 to show debug result
$mail->SMTPDebug = 0;

// enable SMTP authentication
$mail->SMTPAuth = true;

// sets the prefix to the server
$mail->SMTPSecure = 'ssl';

// sets GMAIL as the SMTP server
$mail->Host = 'smtp.gmail.com';

// set the SMTP port for the GMAIL server
$mail->Port = 465;

// your gmail address
$mail->Username = 'librarymanagementsip@gmail.com';

// your password must be enclosed in single quotes
$mail->Password = 'lms@1234';

// add a subject line
$mail->Subject = 'New Password for the User ';

// Sender email address and name
$mail->SetFrom('librarymanagementsip@gmail.com', 'lms');

$email1=$user_login['u_email_id'];
// reciever address, person you want to send
$mail->AddAddress($email1);

// if your send to multiple person add this line again
//$mail->AddAddress('tosend@domain.com');

// if you want to send a carbon copy
//$mail->AddCC('tosend@domain.com');


// if you want to send a blind carbon copy
//$mail->AddBCC('tosend@domain.com');

// add message body
$mail->MsgHTML("Your New Password is ".$password);


// add attachment if any
//$mail->AddAttachment('time.png');

try {
    // send mail
    
    
    $mail->Send();
    $msg = "Mail send successfully";
} catch (phpmailerException $e) {
    $msg = $e->getMessage();
} catch (Exception $e) {
    $msg = $e->getMessage();
}
//echo '<script>';
	//	echo "alert('Password sent Succesfully');";
		//echo "</script>";	
    // $this->session->set_flashdata('forgot_Password','Check the mail');
    // redirect(base_url().'User/home', 'refresh');
		
//echo $id+":==adasd";

  // $this->load->view('student/header.php');
  // $this->load->view("student/about_us.php");
  // $this->load->view('student/footer.php');


}

public function contact_us()
{

  $this->load->view('student/header.php');
  $this->load->view("student/contact_us.php");
  $this->load->view('student/footer.php');


}

public function login_check()
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
          // echo " <script type='text/javascript'>  alert('Login successfull'); </script>";
          if($data['u_type']=="admin")
          {
              $this->load->view('admin/header.php');
             
          }
        else
          {
             $this->load->view('student/header.php');
             
             $this->load->view('student/footer.php');
          }
  
          }
        else{
          $this->session->set_flashdata('error_msg','Error occured,Try again.');
          $this->load->view("admin/login.php");
         
  
        }
  
}

public function home(){

  $this->load->view('Admin/login');

}

public function signup()
{

  $this->load->view('Admin/signup');

}


public function userdisplay(){

  $this->load->view('student/header.php');
  $this->load->view('student/content.php');
  $this->load->view('student/footer.php');
}


public function user_logout(){

  $this->session->unset_userdata('u_email_id');
  $this->session->unset_userdata('u_password');
  $this->session->unset_userdata('u_name');
  $this->session->unset_userdata('u_img');
  $this->session->unset_userdata('u_type');
  $this->session->unset_userdata('u_mno');
  $this->session->unset_userdata('u_status');


  $this->session->unset_userdata('success_msg');
  $this->session->unset_userdata('error_msg');


  //$this->session->sess_destroy();
  redirect(base_url().'User/userdisplay', 'refresh');
}

}

?>
