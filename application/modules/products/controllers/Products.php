<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of products
 *
 * @author Sunil
 *
 */

class Products extends MY_Controller {

    function __construct(){
        parent::__construct();
        if (!$this->session->userdata('logged_in')){
            redirect(base_url('users/auth'));
        }
       // error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model('product');
        $this->load->model('category');
        $this->load->model('brand');
        $this->output->section('header','welcome/header');
        $this->output->section('sidebar','welcome/sidebar');
        $this->output->section('footer','welcome/footer');
        $this->output->set_template('admin');
        $this->output->js('assets/themes/admin/bower_components/ckeditor/ckeditor.js');
    }

    function index() {
        //For Listing
    	$data['products'] = $this->product->get_products();
        $this->output->set_title('Product Management');
        $this->output->css('assets/themes/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');
        $this->output->js('assets/themes/admin/bower_components/datatables.net/js/jquery.dataTables.min.js');
        $this->output->js('assets/themes/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');
        $this->load->view('listing',$data);
    }

    function add(){
        $this->output->css('assets/themes/admin/bower_components/select2/dist/css/select2.min.css');
        $this->output->js('assets/themes/admin/bower_components/select2/dist/js/select2.full.min.js');
        $this->output->css('assets/themes/resources/dropzone.css');
       // $this->output->js('assets/themes/resources/dropzone.js');
         
        if($this->product->verify_validation()) {
            
            $p_tag = $this->input->post('tags');
            $image1 = $this->product->upload_image('image','products');
            $data1['image'] = $image1['file_name'];
            //If it has post Request
            $params = array(
                'status' => $this->input->post('status'),
                'name' => $this->input->post('name'),
                'details' => $this->input->post('details'),
                'full_description' => $this->input->post('full_description'),
                'price' => $this->input->post('price'),
                'category_id' => $this->input->post('category_id'),
                'brand_id' => $this->input->post('brand_id'),
                'tags_id' => implode(",", $p_tag),
                'image' => $data1['image'],
                'gallery' => $this->input->post('gallery')
            );

            $this->product->add_product($params);
            redirect('products/index');
        }
        else {
            //Show Add Page
            $this->output->set_title('New Product');
            $data['category_names'] = $this->category->get_category_names();
            $data['brand_names'] = $this->brand->get_brand_names();
            $data['p_tags']=$this->product->fetch_p_tags();
            $this->load->view('add',$data);
        }
    }

    /* Upload Image Gallery*/
    public function galleryupload() {
        $this->output->unset_template();
        if (!empty($_FILES)) {
        $tempFile = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $targetPath = getcwd() . '/uploads/';
        $targetFile = $targetPath . $fileName ;
        move_uploaded_file($tempFile, $targetFile);
       
       
         $this->load->database();       
         $this->db->insert('product_gallery',$data=array('gallery' => $fileName));
         $insert_id = $this->db->insert_id();
            
        //$this->product->addgallery();
        echo $insert_id;
        }
    
    }

    

   
    



    function edit($id=0){
        $this->output->css('assets/themes/admin/bower_components/select2/dist/css/select2.min.css');
        $this->output->js('assets/themes/admin/bower_components/select2/dist/js/select2.full.min.js');
        $this->output->css('assets/themes/resources/dropzone.css');
        $this->output->js('assets/themes/resources/dropzone.js');
        // check if the row exists before trying to edit it
        $data['p_tags']=$this->product->fetch_p_tags();
        $data['product'] = $this->product->get_product($id);
        
        if(isset($data['product']->id)) {
            if($this->product->verify_validation()) {
                $p_tag = $this->input->post('tags');
                
                $image1 = $this->product->upload_image('image','products');
                $data['image'] = $image1['file_name']; 
                
               $params = array(
                   'status' => $this->input->post('status'),
                   'name' => $this->input->post('name'),
                   'details' => $this->input->post('details'),
                   'full_description' => $this->input->post('full_description'),
                   'price' => $this->input->post('price'),
                   'category_id' => $this->input->post('category_id'),
                   'brand_id' => $this->input->post('brand_id'),
                   'tags_id' => implode(",", $p_tag),
                   'image' => $data['image'],
                   'gallery' => $this->input->post('gallery')
                );

                $this->product->update_product($id,$params);
                redirect('products/index');
            }
            else
            {
                $this->output->set_title('Edit Product');
                $data['category_names'] = $this->category->get_category_names();
                $data['brand_names'] = $this->brand->get_brand_names();
                $this->load->view('edit',$data);
            }
        }
        else{
            show_error('The Content you are trying to edit does not exist.');
        }
    }


    function delete($id=0){
        $data['product'] = $this->product->get_product($id);

        // check if the product exists before trying to delete it
        if(isset($data['product']->id)) {
            $this->product->delete_product($id);
            redirect('products/index');
        }
        else {
            show_error('The content you are trying to delete does not exist.');
        }
    }

    function togglestatus($id=0){
        $data['product'] = $this->Product->get_product($id);
        if(isset($data['product']->id)) {
            $this->product->toggle_status($id);
            redirect('products/index');
        }
        else {
            show_error('The content you are trying to delete does not exist.');
        }

    }

}

/* End of file products.php */
/* Location: ./application/modules/Products/controllers/Products.php */