<?php
class Admin_model extends CI_model{

    public function __construct()
    {
        $this->load->database();
    }

    public function user_display()
    {
        $query = $this->db->get('user_tbl');
        return $query->result_array();
    }

    public function request_display()
    {
        $this->db->select('user_tbl.*,request_tbl.*,book_cat_tbl.*');
        $this->db->from('request_tbl');
        $this->db->join('user_tbl', 'request_tbl.fk_u_email_id = user_tbl.u_email_id');
        $this->db->join('book_cat_tbl','book_cat_tbl.cat_id = request_tbl.fk_book_id');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    public function notification_display()
    {
        $this->db->select('user_tbl.*,notification_tbl.*');
        $this->db->from('notification_tbl');
        $this->db->join('user_tbl', 'notification_tbl.fk_u_email_id = user_tbl.u_email_id');
        
        $query = $this->db->get();
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

    public function book_circulation_display()
    {
        $this->db->select('user_tbl.*,book_tbl.*,book_circulation_tbl.*');
        $this->db->from('book_circulation_tbl');
        $this->db->join('user_tbl', 'book_circulation_tbl.fk_u_email_id = user_tbl.u_email_id');
        $this->db->join('book_tbl','book_tbl.book_id = book_circulation_tbl.fk_book_id');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    public function book_cat_display()
    {
        $query = $this->db->get('book_cat_tbl');
        return $query->result_array();
    }
    public function category_delete($id)
    {
        $this->db->where('cat_id', $id);
        return $this->db->delete('book_cat_tbl');
    }

    public function user_delete($id)
    {
        
        $this->db->select('*');
        $this->db->from('user_tbl');
        $this->db->where('u_id',$id);
        $query = $this->db->get();
        $result = $query->row_array();

        unlink('uploads/'.$result['u_img']);

        $this->db->where('u_id', $id);
        return $this->db->delete('user_tbl');
    }

    public function request_delete($id)
    {
        $this->db->where('request_id', $id);
        return $this->db->delete('request_tbl');
    }

    public function book_delete($id)
    {
        $this->db->where('book_id', $id);
        return $this->db->delete('book_tbl');
    }

    public function book_cir_delete($id)
    {
        $this->db->where('cir_id', $id);
        return $this->db->delete('book_circulation_tbl');
    }

    public function set_book_category()
    {
        $data = array(
            
            'cat_name' => $this->input->post('txt_cat_add')
        );

        return $this->db->insert('book_cat_tbl', $data);
    }

    public function set_request()
    {
        $data = array(
            'fk_u_email_id'=> $this->session->userdata('u_email_id'),
            'req_book_title' => $this->input->post('txt_reqbook_title'),
            'req_book_author' => $this->input->post('txt_reqbook_author'),
            'req_book_edition' => $this->input->post('txt_reqbook_edition'),
            'req_book_edition_year' => $this->input->post('txt_reqbook_editionyr'),
            'fk_book_id' => $this->input->post('reqbook_catg'),
            'req_date' => $this->input->post('txt_reqbook_date'),
            'req_book_status' => "not available",
            'user_status' => "admin"
            
        );

        return $this->db->insert('request_tbl', $data);
    }

    public function set_book($data)
    {

        return $this->db->insert('book_tbl', $data);
    }


    public function get_cat_by_id($id)
    {
        $query = $this->db->get_where('book_cat_tbl', array('cat_id' => $id));
        return $query->row_array();
    }

    public function get_user_by_id($id)
    {
        $query = $this->db->get_where('user_tbl', array('u_id' => $id));
        return $query->row_array();
    }

    public function edit_book_category($id)
    {
        $this->load->helper('url');
       
        $data = array(
            
            'cat_name' => $this->input->post('txt_cat_edit')
        );
        //echo " <script> alert ('".$id."'); </script>";        
        $this->db->where('cat_id', $id);
        return $this->db->update('book_cat_tbl', $data);

    }

    public function edit_book_rec($user,$id)
    {
        $this->load->helper('url');
       
        // $data = array(
            
        //             'isbn_no' => $user['isbn_no']
        // );     
        echo " <script> alert ('".$id."'); </script>";        
        $this->db->where('book_id', $id);
        return $this->db->update('book_tbl', $user);

    }

    public function notification_delete($id)
    {
        $this->db->where('notification_id', $id);
        return $this->db->delete('notification_tbl');
    }

    public function set_notification()
    {
        date_default_timezone_set("Asia/Kolkata");
        $dt=date("h:i:sa"); 
        $data = array(
            'fk_u_email_id'=> $this->session->userdata('u_email_id'),
            'notification_type' => $this->input->post('txt_notification_type'),
            'notification_time' => $dt,
            'message_title' => $this->input->post('txt_msg_title'),
            'message_subject' => $this->input->post('txtarea_message_subject')
            
        );

        return $this->db->insert('notification_tbl', $data);
    }

    public function get_book_by_id($id)
    {
        $query = $this->db->get_where('book_tbl', array('book_id' => $id));
        return $query->row_array();
    }
}
?>