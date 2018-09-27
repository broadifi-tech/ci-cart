<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of coupons
 *
 * @author Sunil
 *
 */

class Coupons extends MY_Controller {

    function __construct(){
        parent::__construct();
        if (!$this->session->userdata('logged_in')){
            redirect(base_url('users/auth'));
        }
       // error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model('products/product');
        $this->load->model('products/coupon');
        $this->output->section('header','welcome/header');
        $this->output->section('sidebar','welcome/sidebar');
        $this->output->section('footer','welcome/footer');
        $this->output->set_template('admin');
        $this->output->js('assets/themes/admin/bower_components/ckeditor/ckeditor.js');
    }

    function index() {
        //For Listing
    	$data['coupons'] = $this->coupon->get_coupons();
        $this->output->set_title('Coupon Management');
        $this->output->css('assets/themes/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');
        $this->output->js('assets/themes/admin/bower_components/datatables.net/js/jquery.dataTables.min.js');
        $this->output->js('assets/themes/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');
        $this->load->view('coupons/listing',$data);
    }

    function add(){
        
        
        if($this->coupon->verify_validation()) {

           
            //If it has post Request
            $params = array(
                   'status' => $this->input->post('status'),
                   'coupon_discount' => $this->input->post('coupon_discount'),
                   'coupon_value' => $this->input->post('coupon_value'),
                   'coupon_details' => $this->input->post('coupon_details'),
                   'coupon_code'=> $this->input->post('coupon_code')
                   
               
            );
            
            $this->coupon->add_coupon($params);
            redirect('products/coupons/index');
        }
        else {
            //Show Add Page
            $this->output->set_title('New Coupon');
            $data['product_names'] = $this->product->get_product_names();          
            $this->load->view('coupons/add',$data);
        }
    }


    function edit($id=0){
       
        // check if the row exists before trying to edit it
        $data['coupon'] = $this->coupon->get_coupon($id);
        
        if(isset($data['coupon']->id)) {
            if($this->coupon->verify_validation()) {

              
                
               $params = array(
                   'status' => $this->input->post('status'),
                   'coupon_discount' => $this->input->post('coupon_discount'),
                   'coupon_value' => $this->input->post('coupon_value'),
                   'coupon_details' => $this->input->post('coupon_details'),
                   'coupon_code'=> $this->input->post('coupon_code')
                   
                );

                

                $this->coupon->update_coupon($id,$params);
                redirect('products/coupons/index');
            }
            else
            {
                $this->output->set_title('Edit Coupon');
                
                $this->load->view('coupons/edit',$data);
            }
        }
        else{
            show_error('The Content you are trying to edit does not exist.');
        }
    }


    function delete($id=0){
        $data['coupon'] = $this->coupon->get_coupon($id);

        // check if the coupon exists before trying to delete it
        if(isset($data['coupon']->id)) {
            $this->coupon->delete_coupon($id);
            redirect('products/coupons/index');
        }
        else {
            show_error('The content you are trying to delete does not exist.');
        }
    }

    function togglestatus($id=0){
        $data['coupon'] = $this->Coupon->get_coupon($id);
        if(isset($data['coupon']->id)) {
            $this->coupon->toggle_status($id);
            redirect('products/coupons/index');
        }
        else {
            show_error('The content you are trying to delete does not exist.');
        }

    }

}

/* End of file coupons.php */
/* Location: ./application/modules/Coupons/controllers/Coupons.php */