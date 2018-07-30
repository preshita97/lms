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

public function book_search($title){

    $this->db->select('book_tbl.*,book_cat_tbl.*,author_tbl.*');
    $this->db->from('book_tbl');
    $this->db->where('book_title',$title);
    $this->db->join('book_cat_tbl', 'book_tbl.fk_cat_id = book_cat_tbl.cat_id');
    $this->db->join('author_tbl', 'book_tbl.book_author = author_tbl.author_id');
    
    $query = $this->db->get();
    return $query->result_array();
    }

public function book_search1($book){

    $this->db->select('book_tbl.*,book_cat_tbl.*,author_tbl.*');
        $this->db->from('book_tbl');
        $this->db->where('book_title', $book);
        $this->db->join('book_cat_tbl', 'book_tbl.fk_cat_id = book_cat_tbl.cat_id');
        $this->db->join('author_tbl','book_tbl.book_author = author_tbl.author_id');

        $query = $this->db->get();
        
       return $query->row_array();

  }

public function book_search_where($title,$author,$catg){


    
  $this->db->select('*');
  $this->db->from('book_tbl');
  $this->db->where('book_title', $title);
  $this->db->where('book_author', $author);
  $this->db->where('fk_cat_id', $catg);
  $query=$this->db->get();
  return $query->result_array(); 
  }

public function book_display()
    {
        $this->db->select('book_tbl.*,book_cat_tbl.*,author_tbl.*');
        $this->db->from('book_tbl');
        $this->db->join('book_cat_tbl', 'book_tbl.fk_cat_id = book_cat_tbl.cat_id');
        $this->db->join('author_tbl','book_tbl.book_author = author_tbl.author_id');

        $query = $this->db->get();
        return $query->result_array();
    }


    public function book_cat_display()
    {
        $this->db->select('*');
        $this->db->from('book_cat_tbl');
        

        $query = $this->db->get();
        return $query->result_array();
    }

    public function book_cat_display_by_id($id)
    {
        $this->db->select('book_tbl.*,book_cat_tbl.*');
        $this->db->from('book_tbl');
        $this->db->where('cat_id',$id);
        $this->db->join('book_cat_tbl', 'book_tbl.fk_cat_id = book_cat_tbl.cat_id');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function book_cat_display_by_id1($id)
    {
        // $this->db->select('book_tbl.*,book_cat_tbl.*');
        // $this->db->from('book_tbl');
        // $this->db->where('cat_id',$id);
        // $this->db->join('book_cat_tbl', 'book_tbl.fk_cat_id = book_cat_tbl.cat_id');


        $this->db->select('book_tbl.*,book_cat_tbl.*,author_tbl.*');
        $this->db->from('book_tbl');
        $this->db->where('cat_id',$id);
        $this->db->join('book_cat_tbl', 'book_tbl.fk_cat_id = book_cat_tbl.cat_id');
        $this->db->join('author_tbl','book_tbl.book_author = author_tbl.author_id');


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

    public function userhistory()
    {
        $query = $this->db->get_where('request_tbl', array('fk_u_email_id' => $this->session->userdata('u_email_id')));
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

    public function book_req_display()
    {
        // SELECT b.*,r.*,a.* FROM book_tbl AS b, request_tbl AS r, author_tbl AS a 
        // WHERE fk_u_email_id='preshitachoksi97@gmail.com' AND request_id=4 AND fk_book_id=3

        $this->db->select('book_tbl.*,request_tbl.*,author_tbl.*');
        $this->db->from('request_tbl');
        $this->db->where('fk_u_email_id',$this->session->userdata('u_email_id'));
        $this->db->join('book_tbl', 'request_tbl.fk_book_id = book_tbl.book_id');
        $this->db->join('author_tbl', 'author_tbl.author_id = book_tbl.book_author');

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
   

    public function change_password_user($user,$id)
    {
        $this->load->helper('url');

        $user= array(
          
            'old_password' => $this->input->post('old_password'),
            'new_password'=> $this->input->post('newpassword'),
            '$id' => $this->session->userdata('u_id')
            );

            //print_r($user);

        $this->db->select('*');
        $this->db->from('user_tbl');
        $this->db->where('u_password',$user['old_password']);
        $this->db->where('u_id',$id);
        $query=$this->db->get();

        if($query->num_rows()>0){
            
            $data = array(
            
                'u_password' => $this->input->post('newpassword')
            );
            //print_r($data);
            //echo " <script> alert ('".$id."'); </script>";        
            $this->db->where('u_id', $id);
            return $this->db->update('user_tbl', $data);
            
        }else{
            return false;
        }
       
        //echo " <script> alert ('".$id."'); </script>";        
     
        // $this->db->where('u_email_id', $admin);
        // $this->db->set($new_password);
        // return $this->db->update('user_tbl',$admin);

    }

    public function set_request_user($user)
     {
    //     $data = array(
            
    //         'cat_name' => $this->input->post('txt_cat_add')
    //     );

     $this->db->insert('request_tbl', $user);
    }

    public function set_new_notification_user($user)
    {
        $this->db->insert('notification_tbl', $user);  
    }
}




?>
