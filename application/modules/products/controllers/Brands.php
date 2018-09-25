<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of brands
 *
 * @author Sunil
 *
 */

class Brands extends MY_Controller {

    function __construct(){
        parent::__construct();
        if (!$this->session->userdata('logged_in')){
            redirect(base_url('users/auth'));
        }
       // error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model('products/product');
        $this->load->model('products/brand');
        $this->output->section('header','welcome/header');
        $this->output->section('sidebar','welcome/sidebar');
        $this->output->section('footer','welcome/footer');
        $this->output->set_template('admin');
        $this->output->js('assets/themes/admin/bower_components/ckeditor/ckeditor.js');
    }

    function index() {
        //For Listing
    	$data['brands'] = $this->brand->get_brands();
        $this->output->set_title('Brand Management');
        $this->output->css('assets/themes/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');
        $this->output->js('assets/themes/admin/bower_components/datatables.net/js/jquery.dataTables.min.js');
        $this->output->js('assets/themes/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');
        $this->load->view('brands/listing',$data);
    }

    function add(){
        
        
        if($this->brand->verify_validation()) {

           
            //If it has post Request
            $params = array(
                   'status' => $this->input->post('status'),
                   'brand_name' => $this->input->post('brand_name'),
                   'brand_details' => $this->input->post('brand_details'),
                   'brand_code'=> $this->input->post('brand_code'),
                   'product_id'=> $this->input->post('product_id')
               
            );
            $this->brand->add_brand($params);
            redirect('products/brands/index');
        }
        else {
            //Show Add Page
            $this->output->set_title('New Brand');
            $data['product_names'] = $this->product->get_product_names();          
            $this->load->view('brands/add',$data);
        }
    }


    function edit($id=0){
       
        // check if the row exists before trying to edit it
        $data['brand'] = $this->brand->get_brand($id);
       
        if(isset($data['brand']->id)) {
            if($this->brand->verify_validation()) {

              
                
               $params = array(
                   'status' => $this->input->post('status'),
                   'brand_name' => $this->input->post('brand_name'),
                   'brand_details' => $this->input->post('brand_details'),
                   'brand_code'=> $this->input->post('brand_code'),
                   'product_id'=> $this->input->post('product_id')
                );

                

                $this->brand->update_brand($id,$params);
                redirect('products/brands/index');
            }
            else
            {
                $this->output->set_title('Edit Brand');
                $data['product_names'] = $this->product->get_product_names();
                $this->load->view('brands/edit',$data);
            }
        }
        else{
            show_error('The Content you are trying to edit does not exist.');
        }
    }


    function delete($id=0){
        $data['brand'] = $this->brand->get_brand($id);

        // check if the brand exists before trying to delete it
        if(isset($data['brand']->id)) {
            $this->brand->delete_brand($id);
            redirect('products/brands/index');
        }
        else {
            show_error('The content you are trying to delete does not exist.');
        }
    }

    function togglestatus($id=0){
        $data['brand'] = $this->Brand->get_brand($id);
        if(isset($data['brand']->id)) {
            $this->brand->toggle_status($id);
            redirect('products/brands/index');
        }
        else {
            show_error('The content you are trying to delete does not exist.');
        }

    }

}

/* End of file brands.php */
/* Location: ./application/modules/Brands/controllers/Brands.php */