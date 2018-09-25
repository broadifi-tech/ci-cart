<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Brand
        <small>Fill up the form bellow</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Brands</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Brand Edit</h3>
            </div>
            <?php echo form_open_multipart(current_url()); ?>
            <div class="box-body">
                <div class="row clearfix">

                    <div class="col-md-6">
                        <label for="brand_name" class="control-label"><span class="text-danger">*</span> Brand Name</label>
                        <div class="form-group">
                            <input type="text" name="brand_name" value="<?php echo $brand->brand_name; ?>" class="form-control" id="name" />
                            <span class="text-danger"><?php echo form_error('brand_name');?></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="brand_code" class="control-label"><span class="text-danger">*</span> Brand Code</label>
                        <div class="form-group">
                            <input type="text" name="brand_code" value="<?php echo $brand->brand_code; ?>" class="form-control" id="name" />
                            <span class="text-danger"><?php echo form_error('brand_code');?></span>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label for="brand_details" class="control-label"><span class="text-danger">*</span> Brand Details</label>
                        <div class="form-group">
                            <textarea rows="4" name="brand_details" class="form-control" id="details" ><?php echo $brand->brand_details; ?></textarea>
                            <span class="text-danger"><?php echo form_error('brand_details');?></span>
                        </div>
                    </div>
 
                  

                   <div class="col-md-6">
                        <label for="category_id" class="control-label">Choose Product</label>
                        <div class="form-group">
                            <select class="form-control select2" style="width: 100%;" name="product_id">
                                <?php 
                                    $productName=$brand->product_id;
								
                                    foreach ($product_names as  $product_name) {
                                        if($productName==$product_name->id){
                                            echo '<option value="'.$product_name->id.'" selected>'.$product_name->name.'</option>';  
                                        }else{
                                            echo '<option value="'.$product_name->id.'">'.$product_name->name.'</option>';
                                        }
                                    } 
                                ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('category_id');?></span>
                        </div>
                    </div>
                    

                    

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="checkbox" name="status" <?php echo $brand->status?'checked':'';?> value="1"  id="status" />
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
            <?php echo form_close(); ?>
        </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

 <script>
   //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: "yyyy/mm/dd"
    });
    </script>