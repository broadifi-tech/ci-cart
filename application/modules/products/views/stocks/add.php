<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Stock
        <small>Fill up the form bellow</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Products</a></li>
        <li><a href="#">Stocks</a></li>
        <li class="active">Add</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="box box-info">


            <div class="box-header with-border">
                <h3 class="box-title">Stock Add</h3>
            </div>
            <?php echo form_open_multipart(current_url()); ?>
            <div class="box-body">
                <div class="row clearfix">

                    <div class="col-md-6">
                        <label for="quantity_in_stocks" class="control-label"><span class="text-danger">*</span> Quantity</label>
                        <div class="form-group">
                            <input type="text" name="quantity_in_stocks" value="<?php echo $this->input->post('quantity_in_stocks'); ?>" class="form-control" id="name" />
                            <span class="text-danger"><?php echo form_error('quantity_in_stocks');?></span>
                        </div>
                    </div>

                   <div class="col-md-6">
                        <label for="stock_details" class="control-label"><span class="text-danger">*</span> Stock Details</label>
                        <div class="form-group">
                            <textarea rows="4" name="stock_details" class="form-control" id="details" ><?php echo $this->input->post('stock_details'); ?></textarea>
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
                    <input type="text" name="stock_date" class="form-control pull-right" id="datepicker">
                   </div>                  
                   </div>
                   </div>

                   <div class="col-md-6">
					<label for="product_id" class="control-label">Choose Product</label>
			        	<select class="form-control" name="product_id" id="product_id">
			            	<option value="">Select Product</option>
								<?php
								foreach ($product_names as $product_name) { ?>
									<option value="<?php echo $product_name->id; ?>"> <?php echo $product_name->name; ?></option>
								<?php }
								?>
			            </select>
			        </div>




                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="checkbox" name="status" value="1"  id="status" />
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

 
  