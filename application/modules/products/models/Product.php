<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Product class.
 *
 * @extends CI_Model
 */
class Product extends CI_Model {
    private $table = 'products';
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;
    }

    /**
     * @param null $id
     * @return mixed
     */

    public function get_products($id=NULL){
        
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

    public function get_product($id){
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
    public function add_product($params){
        
        $params = array_filter($params,'strlen');
        $params['created'] = date('Y-m-d H:i:s');
        $params['created_by'] = $this->session->userdata('logged_in')->id;
        $this->db->insert($this->table,$params);
    }

    public function fetch_p_tags(){
        $query = $this->db->get('tags');
        return $query->result();
    }


    /**
     * @param $id
     * @param $params
     * @return mixed
     * Update Product
     */

    public function update_product($id,$params){
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
    public function delete_product($id){
        return $this->db->delete($this->table,array('id'=>$id));
    }

    /* Upload Product Image*/ 
    public function upload_image($name,$type){
        $ret['status'] = false;
        $config['upload_path']          = './uploads/'.$type.'/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10240;
        $config['file_name']            = time();
        if(!is_writable($config['upload_path'])){
            chmod($config['upload_path'], 777);
        }

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($name)){
            $ret['status'] = 'error';
            $ret['error'] = $this->upload->display_errors();
        }
        else{
            $data =  $this->upload->data();
            $ret['status'] = 'success';
            $ret['file_name'] = $data['file_name'];
        }

        return $ret;
    }

    public function addgallery(){
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $fileName ;
            move_uploaded_file($tempFile, $targetFile);
        $this->db->insert('product_gallery',$data=array('gallery' => $fileName));
        return $data;
        }
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
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('details', 'Details', 'trim|required');
            $this->form_validation->set_rules('price', 'Price', 'trim|required');
        }
        if ($action == 'edit'){
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('details', 'Details', 'trim|required');
            $this->form_validation->set_rules('price', 'Price', 'trim|required');
        }
        if ($this->form_validation->run() == FALSE) {
            return FALSE ;
        } else {
            return TRUE;
        }
    }


}