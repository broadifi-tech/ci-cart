<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Brands Management
            <small><a href="<?php echo base_url().'products/brands/add';?>" class="btn btn-primary btn-sm">Add New</a> </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Products</a></li>
            <li class="active"><a href="#">Brands</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Brands management </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="brand1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Brand Name</th>
                        <th>Brand Code</th>
                        <th>Brand Details</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($brands as $brand) {
                        $status_class = 'danger';
                        $status_text = 'Inactive';
                        if ($brand->status){
                            $status_class = 'success';
                            $status_text = 'Active';
                        }
                        ?>
                        <tr>
                            <td><?php echo $brand->brand_name; ?></td>
                            <td><?php echo $brand->brand_code; ?></td>
                            <td><?php echo $brand->brand_details; ?></td>
                           
                            <td><i class="fa fa-calendar"></i> <?php echo date("d M Y h:i A",strtotime($brand->created)); ?>  <a href="javascript:show_profile_modal(<?php echo $brand->created_by;?>);" ><i class="fa fa-user"></i></a> </td>
                            <td><a href="<?php echo base_url().'products/brands/togglestatus/'.$brand->id;?>"><span class="label label-<?php echo $status_class;?>"><?php echo $status_text?></span></a> </td>
                            <td><div class="btn-group btn-group-xs"><a href="<?php echo base_url().'products/brands/edit/'.$brand->id;?>" class="btn btn-info">Edit</a> <a href="<?php echo base_url().'products/brands/delete/'.$brand->id;?>" class="btn btn-danger del">Delete</a></div> </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Quantity</th>
                        <th>Brand Details</th>
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
    $('#brand1').DataTable();

    $(document).ready(function(){
        $(".del").click(function(){
            if (!confirm("Do you want to delete")){
                return false;
            }
        });
    });


</script>