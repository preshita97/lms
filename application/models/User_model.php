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
    return true;
  }else{
    return false;
  }

}

public function update_forgot_pass_from_user($email,$newpass)
  {
    $this->load->helper('url');
       
    // $data = array(
        
    //     'cat_name' => $this->input->post('txt_cat_edit')
    // );
    // //echo " <script> alert ('".$id."'); </script>";        
    $this->db->set('u_password',$newpass);
    $this->db->where('u_email_id', $email);
    $this->db->update('user_tbl');
  }

function get_images(){
  $this->db->from('User_model');
  $this->db->order_by('date_uploaded', 'asc');
  $query = $this->db->get();
  
  return $query->result();		

}

public function book_search($title,$author,$catg){

  $this->db->like('book_title', $title);
  $this->db->or_like('book_author', $author);
  $this->db->or_like('fk_cat_id', $catg);
  $query = $this->db->get('book_tbl');
  return $query->result_array();
}


public function book_display()
    {
        $this->db->select('book_tbl.*,book_cat_tbl.*');
        $this->db->from('book_tbl');
        $this->db->join('book_cat_tbl', 'book_tbl.fk_cat_id = book_cat_tbl.cat_id');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_user_profile($user,$id)
    {
        $this->load->helper('url');
       
        // $data = array(
            
        //             'isbn_no' => $user['isbn_no']
        // );     
        //echo " <script> alert ('".$id."'); </script>";        
        $this->db->where('u_id', $id);
       // $this->db->set($admin);
        return $this->db->update('user_tbl',$user);
    }

    public function get_user_by_id($id)
    {
        $query = $this->db->get_where('user_tbl', array('u_id' => $id));
        return $query->row_array();
    }

    public function cat_display()
    {
        $query = $this->db->get('book_cat_tbl');
        return $query->result_array();
    }

    public function author_display()
    {
        $query = $this->db->get('author_tbl');
        return $query->result_array();
    }

    public function book_display_distinct()
    {


    //   $query=$this->db->query("select DISTINCT(book_author) from book_tbl");
    //  return $query->row_array();

      $this->db->select('DISTINCT(book_author),book_id');
        $this->db->from('book_tbl');
        $this->db->distinct();
        $query = $this->db->get();
        return $query->result_array();
    }

    public function book_author_display()
    {
        $this->db->select('book_tbl.*,book_cat_tbl.*,author_tbl.*');
        $this->db->from('book_tbl');
        $this->db->join('book_cat_tbl', 'book_tbl.fk_cat_id = book_cat_tbl.cat_id');
        $this->db->join('author_tbl', 'book_tbl.book_author = author_tbl.author_id');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function saveNewPass($new_pass){
      $array = array(
              'password'=>$new_pass
              );
      $this->db->where('username', $this->session->userdata('username'));
      $query = $this->db->update('users');
      if($query){
        return true;
      }else{
        return false;
      }
    }  
   
}




?>
