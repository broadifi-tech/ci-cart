<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Stock
        <small>Fill up the form bellow</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Stocks</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Stock Edit</h3>
            </div>
            <?php echo form_open_multipart(current_url()); ?>
            <div class="box-body">
                <div class="row clearfix">

                    <div class="col-md-6">
                        <label for="quantity_in_stocks" class="control-label"><span class="text-danger">*</span> Quantity</label>
                        <div class="form-group">
                            <input type="text" name="quantity_in_stocks" value="<?php echo $stock->quantity_in_stocks; ?>" class="form-control" id="name" />
                            <span class="text-danger"><?php echo form_error('quantity_in_stocks');?></span>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label for="stock_details" class="control-label"><span class="text-danger">*</span> Stock Details</label>
                        <div class="form-group">
                            <textarea rows="4" name="stock_details" class="form-control" id="details" ><?php echo $stock->stock_details; ?></textarea>
                            <span class="text-danger"><?php echo form_error('stock_details');?></span>
                        </div>
                    </div>
 
                    <div class="col-md-6">
                    <div class="form-group">
                   <label>Date:</label>

                   <div class="input-group date">
                   <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="stock_date" value="<?php echo $stock->stock_date; ?>" class="form-control pull-right" id="datepicker">
                   </div>                  
                   </div>
                   </div>

                   <div class="col-md-6">
                        <label for="category_id" class="control-label">Choose Product</label>
                        <div class="form-group">
                            <select class="form-control select2" style="width: 100%;" name="product_id">
                                <?php 
                                    $productName=$stock->product_id;
								
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
                            <input type="checkbox" name="status" <?php echo $stock->status?'checked':'';?> value="1"  id="status" />
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