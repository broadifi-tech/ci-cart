<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of tags
 *
 * @author Sunil
 *
 */

class Tags extends MY_Controller {

    function __construct(){
        parent::__construct();
        if (!$this->session->userdata('logged_in')){
            redirect(base_url('users/auth'));
        }
       // error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model('products/tag');
        $this->output->section('header','welcome/header');
        $this->output->section('sidebar','welcome/sidebar');
        $this->output->section('footer','welcome/footer');
        $this->output->set_template('admin');
        $this->output->js('assets/themes/admin/bower_components/ckeditor/ckeditor.js');
    }

    function index() {
        //For Listing
    	$data['tags'] = $this->tag->get_tags();
        $this->output->set_title('Tag Management');
        $this->output->css('assets/themes/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');
        $this->output->js('assets/themes/admin/bower_components/datatables.net/js/jquery.dataTables.min.js');
        $this->output->js('assets/themes/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');
        $this->load->view('tags/listing',$data);
    }

    function add(){
        if($this->tag->verify_validation()) {

           
            //If it has post Request
            $params = array(
                'status' => $this->input->post('status'),
                'name' => $this->input->post('name'),
                'details' => $this->input->post('details')
               
            );
            $this->tag->add_tag($params);
            redirect('products/tags/index');
        }
        else {
            //Show Add Page
            $this->output->set_title('New Tag');
            $this->load->view('tags/add');
        }
    }


    function edit($id=0){
        // check if the row exists before trying to edit it
        $data['tag'] = $this->tag->get_tag($id);
        if(isset($data['tag']->id)) {
            if($this->tag->verify_validation()) {

              
                
               $params = array(
                   'status' => $this->input->post('status'),
                   'name' => $this->input->post('name'),
                   'details' => $this->input->post('details')
                   
                );

                $this->tag->update_tag($id,$params);
                redirect('products/tags/index');
            }
            else
            {
                $this->output->set_title('Edit Tag');
                $this->load->view('tags/edit',$data);
            }
        }
        else{
            show_error('The Content you are trying to edit does not exist.');
        }
    }


    function delete($id=0){
        $data['tag'] = $this->tag->get_tag($id);

        // check if the tag exists before trying to delete it
        if(isset($data['tag']->id)) {
            $this->tag->delete_tag($id);
            redirect('products/tags/index');
        }
        else {
            show_error('The content you are trying to delete does not exist.');
        }
    }

    function togglestatus($id=0){
        $data['tag'] = $this->Tag->get_tag($id);
        if(isset($data['tag']->id)) {
            $this->tag->toggle_status($id);
            redirect('products/tags/index');
        }
        else {
            show_error('The content you are trying to delete does not exist.');
        }

    }

}

/* End of file tags.php */
/* Location: ./application/modules/Tags/controllers/Tags.php */