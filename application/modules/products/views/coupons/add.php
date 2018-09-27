<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Coupon
        <small>Fill up the form bellow</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Products</a></li>
        <li><a href="#">Coupons</a></li>
        <li class="active">Add</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="box box-info">


            <div class="box-header with-border">
                <h3 class="box-title">Coupon Add</h3>
            </div>
            <?php echo form_open_multipart(current_url()); ?>
            <div class="box-body">
                <div class="row clearfix">

                    

                    <div class="col-md-6">
                        <label for="coupon_code" class="control-label"><span class="text-danger">*</span> Coupon code</label>
                        <div class="form-group">
                            <input type="text" name="coupon_code" value="<?php echo $this->input->post('coupon_code'); ?>" class="form-control" id="coupon_code" />
                            <span class="text-danger"><?php echo form_error('coupon_code');?></span>
                        </div>
                    </div>

                     <div class="col-md-6">
                        <label for="coupon_code" class="control-label"><span class="text-danger">*</span> Discount Value</label>
                        <div class="form-group">
                            <input type="text" name="coupon_value" value="<?php echo $this->input->post('coupon_value'); ?>" class="form-control" id="coupon_value" />
                            <span class="text-danger"><?php echo form_error('coupon_value');?></span>
                        </div>
                    </div>

                   <div class="col-md-12">
                        <label for="coupon_details" class="control-label"><span class="text-danger">*</span> Coupon Details</label>
                        <div class="form-group">
                            <textarea rows="4" name="coupon_details" class="form-control" id="details" ><?php echo $this->input->post('coupon_details'); ?></textarea>
                            <span class="text-danger"><?php echo form_error('coupon_details');?></span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="coupon_discount" class="control-label">Discount Type </label>
                        <div class="form-group">
                        <input type="radio" name="coupon_discount" class="minimal" value="0" id="coupon_discount">Flat
                        <input type="radio" name="coupon_discount" class="minimal" value="1" id="coupon_discount" checked>Percent
                            
                            <span class="text-danger"><?php echo form_error('coupon_discount');?></span>
                        </div>
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
    $("input").blur(function(){
    var $total=$coupon->coupon_code;
    alert($total);
    $total = $total - ($total * ($discount_amount/100));
    });
</script>
 
  