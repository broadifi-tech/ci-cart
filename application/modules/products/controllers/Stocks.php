<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of stocks
 *
 * @author Sunil
 *
 */

class Stocks extends MY_Controller {

    function __construct(){
        parent::__construct();
        if (!$this->session->userdata('logged_in')){
            redirect(base_url('users/auth'));
        }
       // error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
       $this->load->model('products/product');
        $this->load->model('products/stock');
        $this->output->section('header','welcome/header');
        $this->output->section('sidebar','welcome/sidebar');
        $this->output->section('footer','welcome/footer');
        $this->output->set_template('admin');
        $this->output->js('assets/themes/admin/bower_components/ckeditor/ckeditor.js');
    }

    function index() {
        //For Listing
    	$data['stocks'] = $this->stock->get_stocks();
        $this->output->set_title('Stock Management');
        $this->output->css('assets/themes/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');
        $this->output->js('assets/themes/admin/bower_components/datatables.net/js/jquery.dataTables.min.js');
        $this->output->js('assets/themes/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');
        $this->load->view('stocks/listing',$data);
    }

    function add(){
        $this->output->css('assets/themes/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
        $this->output->js('assets/themes/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
        
        if($this->stock->verify_validation()) {

           
            //If it has post Request
            $params = array(
                'status' => $this->input->post('status'),
                'quantity_in_stocks' => $this->input->post('quantity_in_stocks'),
                'stock_details' => $this->input->post('stock_details'),
                'stock_date'=> $this->input->post('stock_date'),
                'product_id'=> $this->input->post('product_id')
               
            );
            $this->stock->add_stock($params);
            redirect('products/stocks/index');
        }
        else {
            //Show Add Page
            $this->output->set_title('New Stock');
            $data['product_names'] = $this->product->get_product_names();          
            $this->load->view('stocks/add',$data);
        }
    }


    function edit($id=0){
        $this->output->css('assets/themes/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
        $this->output->js('assets/themes/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
        // check if the row exists before trying to edit it
        $data['stock'] = $this->stock->get_stock($id);
       
        if(isset($data['stock']->id)) {
            if($this->stock->verify_validation()) {

              
                
               $params = array(
                   'status' => $this->input->post('status'),
                   'quantity_in_stocks' => $this->input->post('quantity_in_stocks'),
                   'stock_details' => $this->input->post('stock_details'),
                   'stock_date'=> $this->input->post('stock_date'),
                   'product_id'=> $this->input->post('product_id')
                );

                $this->stock->update_stock($id,$params);
                redirect('products/stocks/index');
            }
            else
            {
                $this->output->set_title('Edit Stock');
                $data['product_names'] = $this->product->get_product_names();
                $this->load->view('stocks/edit',$data);
            }
        }
        else{
            show_error('The Content you are trying to edit does not exist.');
        }
    }


    function delete($id=0){
        $data['stock'] = $this->stock->get_stock($id);

        // check if the stock exists before trying to delete it
        if(isset($data['stock']->id)) {
            $this->stock->delete_stock($id);
            redirect('products/stocks/index');
        }
        else {
            show_error('The content you are trying to delete does not exist.');
        }
    }

    function togglestatus($id=0){
        $data['stock'] = $this->Stock->get_stock($id);
        if(isset($data['stock']->id)) {
            $this->stock->toggle_status($id);
            redirect('products/stocks/index');
        }
        else {
            show_error('The content you are trying to delete does not exist.');
        }

    }

}

/* End of file stocks.php */
/* Location: ./application/modules/Stocks/controllers/Stocks.php */