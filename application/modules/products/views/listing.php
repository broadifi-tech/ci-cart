<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Products Management
            <small><a href="<?php echo base_url().'products/add';?>" class="btn btn-primary btn-sm">Add New</a> </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#">Products</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Products management Listing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="product1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Details</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($products as $product) {
                        $status_class = 'danger';
                        $status_text = 'Inactive';
                        if ($product->status){
                            $status_class = 'success';
                            $status_text = 'Active';
                        }
                        ?>
                        <tr>
                            <td><?php echo $product->name; ?></td>
                            <td><?php echo $product->details; ?></td>
                            <td><?php echo $product->price;?></td>
                            <td><img src="<?php echo base_url().'uploads/products/'.$product->image; ?>" width="100"/></td>
                            <td><i class="fa fa-calendar"></i> <?php echo date("d M Y h:i A",strtotime($product->created)); ?>  <a href="javascript:show_profile_modal(<?php echo $product->created_by;?>);" ><i class="fa fa-user"></i></a> </td>
                            <td><a href="<?php echo base_url().'products/togglestatus/'.$product->id;?>"><span class="label label-<?php echo $status_class;?>"><?php echo $status_text?></span></a> </td>
                            <td><div class="btn-group btn-group-xs"><a href="<?php echo base_url().'products/edit/'.$product->id;?>" class="btn btn-info">Edit</a> <a href="<?php echo base_url().'products/delete/'.$product->id;?>" class="btn btn-danger del">Delete</a></div> </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Details</th>
                        <th>Price</th>
                        <th>Image</th>
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
    $('#product1').DataTable();

    $(document).ready(function(){
        $(".del").click(function(){
            if (!confirm("Do you want to delete")){
                return false;
            }
        });
    });


</script>