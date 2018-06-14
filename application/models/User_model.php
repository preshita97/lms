<?php
class User_model extends CI_model{



public function register_user($user){


$this->db->insert('user_tbl', $user);

}

public function __construct()
    {
        $this->load->database();
    }

public function home($email,$pass){

  $this->db->select('*');
  $this->db->from('user_tbl');
  $this->db->where('u_email_id',$email);
  $this->db->where('u_password',$pass);

  if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else{
    return false;
  }


}
public function email_check($email){

  $this->db->select('*');
  $this->db->from('user_tbl');
  $this->db->where('u_email_id',$email);
  $query=$this->db->get();

  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }

}
function get_images(){
  $this->db->from('User_model');
  $this->db->order_by('date_uploaded', 'asc');
  $query = $this->db->get();
  
  return $query->result();		

}

}


?>
