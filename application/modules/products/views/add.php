<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Product
        <small>Fill up the form bellow</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Products</a></li>
        <li class="active">Add</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="box box-info">


            <div class="box-header with-border">
                <h3 class="box-title">Product Add</h3>
            </div>
            <?php echo form_open_multipart(current_url()); ?>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Save
                </button>
            </div>

            <div class="box-body">
                <div class="row clearfix">

                    <div class="col-md-12">
                        <label for="name" class="control-label"><span class="text-danger">*</span> Name</label>
                        <div class="form-group">
                            <input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
                            <span class="text-danger"><?php echo form_error('name');?></span>
                        </div>
                    </div>

                   <div class="col-md-12">
                    <label for="details" class="control-label"><span class="text-danger">*</span> Short Description</label>
                    <div class="form-group">
                        <textarea rows="4" name="details" value="<?php echo $this->input->post('details'); ?>" class="form-control" id="details" ></textarea>
                        <span class="text-danger"><?php echo form_error('details');?></span>
                    </div>
                   </div>

                   <div class="col-md-12">
                    <label for="full_description" class="control-label"><span class="text-danger">*</span>Full Description</label>
                    <div class="form-group">
                   <textarea id="editor1" name="full_description" rows="10" cols="80" style="visibility: hidden; display: none;">
                    </textarea>
                    </div>
                   </div>

                   <div class="col-md-6">
                    <label for="price" class="control-label"><span class="text-danger"></span> Choose Category</label>
			        	<select class="form-control" name="category_id" id="category">
			            	<option value="">Select Category</option>
								<?php
								foreach ($category_names as $category_name) { ?>
									<option value="<?php echo $category_name->id; ?>"> <?php echo $category_name->name; ?></option>
								<?php }
								?>
			            </select>
			        </div>

                    <div class="col-md-6">
                        <label for="tags" class="control-label"><span class="text-danger"></span>Select Tags</label>
                        <div class="form-group">
                            <select class="form-control select2" multiple="multiple" name="tags[]" data-placeholder="Select Tags" style="width: 100%;">
                                <option value="Select Tag"></option>
                                <?php
                                    foreach ($p_tags as $p_tag) {
                                        echo '<option value="'.$p_tag->id.'">'.$p_tag->name.'</option>';
                                     }
                                ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('tags[]');?></span>
                        </div>
                    </div>
                
                   <div class="col-md-6">
                        <label for="price" class="control-label"><span class="text-danger">*</span> Price</label>
                        <div class="form-group">
                            <input type="text" name="price" value="<?php echo $this->input->post('price'); ?>" class="form-control" id="price" />
                            <span class="text-danger"><?php echo form_error('price');?></span>
                        </div>
                    </div>

                    



                   <div class="col-md-6">
                        <label for="image" class="control-label"><span class="text-danger">*</span>Upload Image</label>
                        <div class="form-group">
                            <input type="file" name="image" value="<?php echo $this->input->post('image'); ?>" id="image" />
                            <span class="text-danger"><?php echo form_error('image');?></span>
                        </div>
                    </div>
                    
                    
                    


                    <div class="col-md-6">
                    
                        <div class="form-group">
                        
                            <input type="checkbox" name="status" value="1"  id="status" />
                            <label for="status" class="control-label">Status</label>
                        </div>
                    </div>
                    

                    

                </div>
            </div>
            <input type="hidden" name="gallery" id="gallery" value="">

           
            <?php echo form_close(); ?>

            <div class="box-header with-border">
            <div class="col-md-12">
                    <label for="images" class="control-label">Upload Gallery</label>
                    
                    <form method="post"  action="<?php echo base_url('products/galleryupload');?>"  enctype="multipart/form-data" class="dropzone">
                    
                    </form>
                   
            </div>
            </div>

            
            
        </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  
</div>





  <script>
  $(function () {
    
    CKEDITOR.replace('full_description')
    //bootstrap WYSIHTML5 - text editor
   // $('.textarea').wysihtml5()
  })
</script>
<script>
  $('.select2').select2()
  </script>
  
  <script src="<?php echo base_url('assets/themes/resources/dropzone.js');?>"></script>

  <script>
  
  let galleryArray = [];
  Dropzone.autoDiscover = false;
  new Dropzone(".dropzone", { 
    maxFilesize: 2, // MB
    init: function() {
        this.on("success", function(file, responseText) {
            galleryArray.push(responseText);
            $('#gallery').val(galleryArray.join(","));
            
            
        });
    }
});
  </script>
  
  