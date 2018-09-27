<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Product class.
 *
 * @extends CI_Model
 */
class Coupon extends CI_Model {
    private $table = 'coupons';
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;
    }

    /**
     * @param null $id
     * @return mixed
     */

    public function get_coupons($id=NULL){
        
        $this->db->select('*');
        if ($id){
            $this->db->where('id',$id);
        }
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * @param $id
     * @return bool
     */

    public function get_coupon($id){
        $condition['id'] = $id;
        $query = $this->db->get_where($this->table,$condition);
        $result = $query->row();
        if ($result){
            return $result;
        }
        return false;
    }

    /**
     * @param $params
     * Add Product
     */
    public function add_coupon($params){
        
        $params = array_filter($params,'strlen');
        $params['created'] = date('Y-m-d H:i:s');
        $params['created_by'] = $this->session->userdata('logged_in')->id;
        $this->db->insert($this->table,$params);
    }


    /*
     
     * Get All Coupons Name
     */

    public function get_coupon_names()
    {   
        
        $this->db->select('*');
        $this->db->from('coupons');
        //$this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }


    /**
     * @param $id
     * @param $params
     * @return mixed
     * Update Product
     */

    public function update_coupon($id,$params){
        
        $params = array_filter($params,'strlen');
        $params['modified'] = date('Y-m-d H:i:s');
        $params['modified_by'] = $this->session->userdata('logged_in')->id;
        $this->db->where('id',$id);
        return $this->db->update($this->table,$params);
    }

    /**
     * @param $id
     * @return mixed
     * Delete Product
     */
    public function delete_coupon($id){
        return $this->db->delete($this->table,array('id'=>$id));
    }

    
    public function toggle_status($id){
        $this->db->set('status', '1-status', FALSE);
        $this->db->where('id',$id);
        return $this->db->update($this->table);
    }


    /**
     * @return bool
     * Validation function
     */
    public function verify_validation(){
        $action =  $this->router->method;
        if ($action == 'add'){
            $this->form_validation->set_rules('coupon_value', 'Discount Value', 'trim|required');
            $this->form_validation->set_rules('coupon_code', 'coupon Code', 'trim|required');
            $this->form_validation->set_rules('coupon_details', 'coupon Description', 'trim|required');
            
        }
        if ($action == 'edit'){
            $this->form_validation->set_rules('coupon_value', 'Discount Value', 'trim|required');           
            $this->form_validation->set_rules('coupon_code', 'coupon Code', 'trim|required');
            $this->form_validation->set_rules('coupon_details', 'coupon Description', 'trim|required');
           
        }
        if ($this->form_validation->run() == FALSE) {
            return FALSE ;
        } else {
            return TRUE;
        }
    }


}