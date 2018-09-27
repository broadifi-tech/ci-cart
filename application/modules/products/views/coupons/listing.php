<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Coupons Management
            <small><a href="<?php echo base_url().'products/coupons/add';?>" class="btn btn-primary btn-sm">Add New</a> </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Products</a></li>
            <li class="active"><a href="#">Coupons</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Coupons management </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="coupon1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                       
                        <th>Coupon Code</th>
                        <th>Coupon Details</th>
                        <th>Coupon Value</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($coupons as $coupon) {
                        $status_class = 'danger';
                        $status_text = 'Inactive';
                        if ($coupon->status){
                            $status_class = 'success';
                            $status_text = 'Active';
                        }
                        ?>
                        <tr>
                            
                            <td><?php echo $coupon->coupon_code; ?></td>
                            <td><?php echo $coupon->coupon_details; ?></td>
                            <td><?php echo $coupon->coupon_value; ?></td>
                           
                            <td><i class="fa fa-calendar"></i> <?php echo date("d M Y h:i A",strtotime($coupon->created)); ?>  <a href="javascript:show_profile_modal(<?php echo $coupon->created_by;?>);" ><i class="fa fa-user"></i></a> </td>
                            <td><a href="<?php echo base_url().'products/coupons/togglestatus/'.$coupon->id;?>"><span class="label label-<?php echo $status_class;?>"><?php echo $status_text?></span></a> </td>
                            <td><div class="btn-group btn-group-xs"><a href="<?php echo base_url().'products/coupons/edit/'.$coupon->id;?>" class="btn btn-info">Edit</a> <a href="<?php echo base_url().'products/coupons/delete/'.$coupon->id;?>" class="btn btn-danger del">Delete</a></div> </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        
                        <th>Coupon Code</th>
                        <th>Coupon Details</th>
                        <th>Coupon Value</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>



<script>
    $('#coupon1').DataTable();

    $(document).ready(function(){
        $(".del").click(function(){
            if (!confirm("Do you want to delete")){
                return false;
            }
        });
    });


</script>