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
        $query = $this->db->get('book_tbl');
        return $query->result_array();
    }

    public function book_circulation_display()
    {
        $query = $this->db->get('book_circulation_tbl');
        return $query->result_array();
    }
    public function book_cat_display()
    {
        $query = $this->db->get('book_cat_tbl');
        return $query->result_array();
    }
}
?>