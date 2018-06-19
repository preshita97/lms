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

    public function set_book_category()
    {
        $data = array(
            
            'cat_name' => $this->input->post('txt_cat_add')
        );

        return $this->db->insert('book_cat_tbl', $data);
    }

    public function get_cat_by_id($id)
    {
        $query = $this->db->get_where('book_cat_tbl', array('cat_id' => $id));
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
}
?>