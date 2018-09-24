<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Product
        <small>Fill up the form bellow</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Products</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Product Edit</h3>
            </div>
            <?php echo form_open_multipart(current_url()); ?>
            <div class="box-body">
                <div class="row clearfix">

                    <div class="col-md-12">
                        <label for="name" class="control-label"><span class="text-danger">*</span> Name</label>
                        <div class="form-group">
                            <input type="text" name="name" value="<?php echo $product->name; ?>" class="form-control" id="name" />
                            <span class="text-danger"><?php echo form_error('name');?></span>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label for="details" class="control-label"><span class="text-danger">*</span>Short Description</label>
                        <div class="form-group">
                            <textarea rows="4" name="details" class="form-control" id="details" ><?php echo $product->details; ?></textarea>
                            <span class="text-danger"><?php echo form_error('details');?></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="full_description" class="control-label"><span class="text-danger">*</span>Full Description</label>
                        <div class="form-group">
                        <textarea id="editor1" name="full_description" rows="10" cols="80" style="visibility: hidden; display: none;"> <?php echo $product->full_description;?>                                            
                        </textarea>
                            <span class="text-danger"><?php echo form_error('full_description');?></span>
                        </div>
                    </div>


                    

                    <div class="col-md-6">
                        <label for="category_id" class="control-label"><span class="text-danger">*</span>Choose Category</label>
                        <div class="form-group">
                            <select class="form-control select2" style="width: 100%;" name="category_id">
                                <?php 
                                    $category=$product->category_id;
								
                                    foreach ($category_names as  $category_name) {
                                        if($category==$category_name->id){
                                            echo '<option value="'.$category_name->id.'" selected>'.$category_name->name.'</option>';  
                                        }else{
                                            echo '<option value="'.$category_name->id.'">'.$category_name->name.'</option>';
                                        }
                                    } 
                                ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('category_id');?></span>
                        </div>
                    </div>

                     <div class="col-md-6">
                        <label for="tags" class="control-label"><span class="text-danger"></span>Tags</label>
                        <div class="form-group">
                            
                            <select class="form-control select2" multiple="multiple" name="tags[]" data-placeholder="Select Tags"
                        style="width: 100%;">
                                <option value="Select Tags"></option>
                                 <?php
                                 $tags_id=$product->tags_id;
                                 
                                $arr=(explode(',',$tags_id));
                                foreach ($p_tags as $p_tag) {
                                    $tag_id=$p_tag->id;
                                if(in_array($tag_id,$arr))
                                 {echo '<option value="'.$p_tag->id.'" selected>'.$p_tag->name.'</option>' ;}
                                 else{
                                    echo'<option value="'.$p_tag->id.'">'.$p_tag->name.'</option>';
                                    } ?>
                                    <?php
                                        
                                         }
                                        ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('tags[]');?></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="price" class="control-label"><span class="text-danger">*</span> Price</label>
                        <div class="form-group">
                            <input type="number" name="price" value="<?php echo $product->price; ?>" class="form-control" id="price" />
                            <span class="text-danger"><?php echo form_error('price');?></span>
                        </div>
                    </div>


                     <div class="form-group col-lg-6">
                        <label>Upload Image</label>
                        <input  name="image" type="file" placeholder="image"><img name="image" src="<?php echo base_url().'uploads/products/'.$product->image; ?>" width="100"/>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="checkbox" name="status" <?php echo $product->status?'checked':'';?> value="1"  id="status" />
                            <label for="status" class="control-label">Status</label>
                        </div>
                    </div>

                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Save
                </button>
            </div>
            <input type="hidden" name="gallery" id="gallery" value="">
            <?php echo form_close(); ?>

            <div class="box-header with-border">
            <div class="col-md-12">
                    <label for="images" class="control-label">Upload Gallery</label>
                    
                    <form  method="post" action="<?php echo base_url('products/galleryupload');?>"  enctype="multipart/form-data" class="dropzone">
                    <img src="<?php echo base_url();?>uploads/" />
                    </form>
                   
            </div>
            </div>
            
        </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
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


