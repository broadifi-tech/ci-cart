<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Product class.
 *
 * @extends CI_Model
 */
class Brand extends CI_Model {
    private $table = 'brands';
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;
    }

    /**
     * @param null $id
     * @return mixed
     */

    public function get_brands($id=NULL){
        
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

    public function get_brand($id){
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
    public function add_brand($params){
        
        $params = array_filter($params,'strlen');
        $params['created'] = date('Y-m-d H:i:s');
        $params['created_by'] = $this->session->userdata('logged_in')->id;
        $this->db->insert($this->table,$params);
    }


    /*
     
     * Get All Brands Name
     */

    public function get_brand_names()
    {   
        
        $this->db->select('*');
        $this->db->from('brands');
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

    public function update_brand($id,$params){
        
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
    public function delete_brand($id){
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
            $this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required');
            $this->form_validation->set_rules('brand_code', 'brand Code', 'trim|required');
            
        }
        if ($action == 'edit'){
            $this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required');
            $this->form_validation->set_rules('brand_code', 'brand Code', 'trim|required');
           
        }
        if ($this->form_validation->run() == FALSE) {
            return FALSE ;
        } else {
            return TRUE;
        }
    }


}