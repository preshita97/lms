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
        
        
        'u_email_id'=>$this->input->post('u_email_id'),
        'u_password'=>$this->input->post('u_password'),
        'u_name'=>$this->input->post('u_name'),
        'u_img'=>$data['file_dir'],
  
        'u_type'=>"student",
        'u_mno'=>$this->input->post('u_mno'),
        'u_status'=>"active"
          );
          print_r($user);
  
			
          $email_check=$this->User_model->email_check($user['u_email_id']);
          echo " <script> alert ('".$email_check."'); </script>";    

          if($email_check){
            $this->User_model->register_user($user);
            $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
            //redirect(base_url().'Admin/index');
            redirect(base_url().'User/userdisplay');
          }
          else{
           // print_r($user);
            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            redirect(base_url().'Admin/signup');
          }

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


public function userhistory()
{

  $data['book_item'] = $this->User_model->book_req_display();

  $this->load->view('student/header1.php',$data);
  $this->load->view("student/userhistory.php",$data);
  $this->load->view('student/footer.php',$data);

}



public function book_cat_display()
{

  $id = $this->uri->segment(3);

  $data['book_cat_item'] = $this->User_model->book_cat_display_by_id1($id);
  $data['book_cat'] = $this->User_model->book_cat_display();
  $data['cat_item'] = $this->User_model->cat_display();
  $data['book_item'] = $this->User_model->book_author_display();
  $data['author_item'] = $this->User_model->author_display();
  
  $this->load->view('student/header.php',$data);
  $this->load->view("student/book_cat_display.php",$data);
  $this->load->view('student/footer.php',$data);

}


public function changepass()
{
  $this->load->helper('form');
  $this->load->library('form_validation');
                    
  $id = $this->session->userdata('u_id');


  $this->load->view('student/header1.php');
  $this->load->view('student/changepass.php');
  $this->load->view('student/footer.php');
  
}

public function header1()
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


}

public function change_password_user()
              {
                $this->load->helper('form');
                $this->load->library('form_validation');
                
                $id = $this->session->userdata('u_id');

                $user= array(
                    
                    'old_password' => $this->input->post('old_password'),
                    'new_password'=> $this->input->post('newpassword')
                
                    );
                 //   print_r ($user);

                 $change_pwd= $this->User_model->change_password_user($user,$id);


                if($change_pwd)
                {
                //  echo " <script> alert ('success'); </script>";
                  $this->load->view('student/header1'); 
                   $this->load->view('student/changepass');
                   $this->load->view('student/footer');
                }
                else
                {
                  //echo " <script> alert ('not success'); </script>";
                  $this->load->view('student/header1'); 
                   $this->load->view('student/changepass');
                   $this->load->view('student/footer');
                }
              }

public function viewprofile()
{
        $id = $this->session->userdata('u_id');

                //$data['user_header_item'] = $this->User_model->get_user_by_id($id);

                //$id = $this->session->userdata('u_id');
        
                // echo " <script> alert ('".$email_id."'); </script>";

                // $this->load->helper('form');
                // $this->load->library('form_validation');

                $data['user_item'] = $this->User_model->get_user_by_id($id);


  $this->load->view('student/header1.php',$data);
  $this->load->view('student/viewprofile.php',$data);
  $this->load->view('student/footer.php',$data);
  
}


public function book_request_from_user()
{
  $id = $this->uri->segment(3);
  
  date_default_timezone_set("Asia/Kolkata");
  $req_dt=date("Y-m-d");

  $user=array(

    'fk_u_email_id'=>$this->session->userdata('u_email_id'),
    'fk_book_id'=>$id,
    'req_date'=>$req_dt,
    'req_book_status'=>0,
    'start_date'=>"",
    'end_date'=>""

  );  

  $notification=array(
    'fk_u_email_id'=>$this->session->userdata('u_email_id'),
    'notification_time'=> date("h:i:sa"),
    'message_title'=>'requested book',
    'message_subject'=>'book has been requested',
    'notification_status'=>0
  );
  
  $data['book_details']=$this->User_model->get_book_by_id($id);

  //print_r($data['book_details']['book_title']);
  $title=$data['book_details']['book_title'];
   $this->User_model->set_request_user($user);
   $this->User_model->set_new_notification_user($notification);
   
   include "PHPMailer/class.phpmailer.php";

   $password=rand(0,999999);
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
$mail->Subject = 'Notification for Requested Book';

// Sender email address and name
$mail->SetFrom('librarymanagementsip@gmail.com', 'lms');

$email1=$this->session->userdata('u_email_id');
// reciever address, person you want to send
$mail->AddAddress($email1);

// if your send to multiple person add this line again
//$mail->AddAddress('tosend@domain.com');

// if you want to send a carbon copy
//$mail->AddCC('tosend@domain.com');


// if you want to send a blind carbon copy
//$mail->AddBCC('tosend@domain.com');

// add message body

$mail->MsgHTML('Your book name  '.'"'.$title.'"'.' has been requested to Admin on this '.$req_dt);


// add attachment if any
//$mail->AddAttachment('time.png');

try {
// send mail


$mail->Send();
$msg = "Mail send successfully";

// $this->User_model->update_forgot_pass_from_user($user_login['u_email_id'],$password);


 redirect(base_url().'User/bookdisplay1');
        

} catch (phpmailerException $e) {
$msg = $e->getMessage();
} catch (Exception $e) {
$msg = $e->getMessage();
}
   //echo " <script> alert ('Book'); </script>";

   
}

public function bookdisplay()
{
        //echo " <script> alert ('alsjdklasjdklasj'); </script>";
        //$data['book_author_item'] = $this->User_model->book_author_display();
        $id = $this->uri->segment(3);

        $data['book_cat_item'] = $this->User_model->book_cat_display($id);
        $data['book_item'] = $this->User_model->book_author_display();
        $data['cat_item'] = $this->User_model->cat_display(); 
        $data['author_item'] = $this->User_model->author_display();
        //   if (empty($data['request_item']))
        // {
        //     show_404();
        // }
 
        // //$data[''] = $data['news_item']['title'];
 
        $this->load->view('student/header.php',$data);
        //$this->load->view('student/sidebar.php');
        $this->load->view("student/bookdisplay.php",$data);
        $this->load->view('student/footer.php',$data);
      
}

public function bookdisplay1()
{
        //echo " <script> alert ('alsjdklasjdklasj'); </script>";
        //$data['book_author_item'] = $this->User_model->book_author_display();
        $id = $this->uri->segment(3);

        $data['book_cat_item'] = $this->User_model->book_cat_display($id);
        $data['book_item'] = $this->User_model->book_author_display();
        $data['cat_item'] = $this->User_model->cat_display(); 
        $data['author_item'] = $this->User_model->author_display();
        //   if (empty($data['request_item']))
        // {
        //     show_404();
        // }
 
        // //$data[''] = $data['news_item']['title'];
 
        $this->load->view('student/header1.php',$data);
        //$this->load->view('student/sidebar.php');
        $this->load->view("student/bookdisplay1.php",$data);
        $this->load->view('student/footer.php',$data);
      
}



public function content()
{
        echo " <script> alert ('alsjdklasjdklasj'); </script>";

        
        $data['book_item'] = $this->User_model->book_display();
        $data['cat_item'] = $this->User_model->cat_display(); 
       

        $this->load->view('student/header.php',$data);
        //$this->load->view('student/sidebar.php');
        $this->load->view("student/content.php",$data);
        $this->load->view('student/footer.php',$data);
      
        
}

public function book_table()
        {
         
          echo " <script> alert ('alsjdklasjdklasj'); </script>";
        $data['book_item'] = $this->User_model->book_display();
        
        //   if (empty($data['request_item']))
        // {
        //     show_404();
        // }
 
        // //$data[''] = $data['news_item']['title'];
 
        $this->load->view('student/header.php',$data);
        //$this->load->view('student/sidebar.php');
        $this->load->view("student/bookdisplay.php",$data);
        $this->load->view('student/footer.php',$data);
      
        //$this->load->view('admin/request_tbl', $data);
        //$this->load->view('templates/footer');
        }


public function forgotpass()
{
  //$this->load->library("PHPMailer");
  $user_login=array('u_email_id'=>$this->input->post('forgotmail'));
  
  print_r($user_login);


  $email_check=$this->User_model->email_check($user_login['u_email_id']);
echo $email_check;

  if($email_check){

//echo"<script>alert('if');</script>";
    include "PHPMailer/class.phpmailer.php";

    $password=rand(0,999999);
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
$mail->MsgHTML("Your New Password is :=  ".$password);


// add attachment if any
//$mail->AddAttachment('time.png');

try {
// send mail


$mail->Send();
$msg = "Mail send successfully";

$this->User_model->update_forgot_pass_from_user($user_login['u_email_id'],$password);

redirect(base_url().'Admin/home');

} catch (phpmailerException $e) {
$msg = $e->getMessage();
} catch (Exception $e) {
$msg = $e->getMessage();
}

   
  }
  else{

   // echo"<script>alert('else');</script>";
    //$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
    redirect(base_url().'Admin/signup');
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

public function book_search()
{

  $user_login=array(
    'book_title'=>$this->input->post('book_title'),
   );


      $data['search_item'] = $this->User_model->book_search($user_login['book_title']);

      $data['book_item'] = $this->User_model->book_display();
      $data['author_item'] = $this->User_model->author_display();
      $data['cat_item'] = $this->User_model->cat_display();

      $this->load->view('student/header.php',$data);
      $this->load->view('student/book_search.php',$data);
      $this->load->view('student/footer.php',$data);
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
                    $this->load->model('User_model');

                    $user = array(
                      'u_name' => $this->input->post('username'),
                      'u_mno'=> $this->input->post('mno'),
                      'u_img' => $data['file_dir']
                    
                        );
                        print_r($user);
                        $id=$this->input->post('id');
                        $this->User_model->update_user_profile($user,$id);
                       redirect(base_url().'User/viewprofile','refresh');
                    }
                      else
                          {

                            $user = array(
                              'u_name' => $this->input->post('username'),
                              'u_mno'=> $this->input->post('mno')
                            
                                );
                                print_r($user);
                                $id=$this->input->post('id');
                                $this->User_model->update_user_profile($user,$id);
                               redirect(base_url().'User/viewprofile','refresh');

                            echo " <script> alert ('Error Try Again'); </script>";
                          }
              }

            
public function login_check()
{
  // $id = $this->uri->segment(3);
  // $data['cat_item'] = $this->User_model->cat_display();
  // $data['author_item'] = $this->User_model->author_display();
  
  //       $data['book_item'] = $this->User_model->book_author_display();
  //       $data['book_cat_item'] = $this->User_model->book_cat_display($id);
        $data['book_item'] = $this->User_model->book_author_display();
        $data['cat_item'] = $this->User_model->cat_display(); 
        $data['author_item'] = $this->User_model->author_display();
        

  $user_login=array(

    'u_email_id'=>$this->input->post('u_email_id'),
    'u_password'=>$this->input->post('u_password')
  
      );
      
      $data1['book_item'] = $this->User_model->book_display();
      $data1['cat_item'] = $this->User_model->cat_display();
      $data1['author_item'] = $this->User_model->author_display();
      
      
      $data=$this->User_model->home($user_login['u_email_id'],$user_login['u_password']);
        if($data)
        {
          $this->session->set_userdata('u_id',$data['u_id']);
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
              redirect(base_url().'Admin/dashboard','refresh');
          }
        else
          {
             $this->load->view('student/header1.php',$data1);
             $this->load->view("student/bookdisplay1.php",$data1);
             $this->load->view('student/footer.php',$data1);
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

  $data['book_item'] = $this->User_model->book_display();
  $data['cat_item'] = $this->User_model->cat_display();
  $data['author_item'] = $this->User_model->author_display();
  $data['book_author_item'] = $this->User_model->book_author_display();
  $data['book_cat_item'] = $this->User_model->book_cat_display();

  $this->load->view('student/header.php',$data);
  $this->load->view('student/content.php',$data);
  $this->load->view('student/footer.php',$data);
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


  $this->session->sess_destroy();
  redirect(base_url().'User/userdisplay', 'refresh');
}


public function add_enquiry()
              {
                

                $this->load->helper('form');
                $this->load->library('form_validation');
                // $this->form_validation->set_rules('Book-Title', 'Book-Author','Book-Edition','Book Edition Year', 'required');
                //echo " <script> alert ('Successfully Deleted'); </script>";

                      $this->User_model->set_enquiry();

                      // $this->load->view('admin/header'); 
                      redirect(base_url().'User/contact_us','refresh');
                
              }


}

?>
