<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Categories Management
            <small><a href="<?php echo base_url().'products/categories/add';?>" class="btn btn-primary btn-sm">Add New</a> </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Products</a></li>
            <li class="active"><a href="#">Categories</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Categories management Listing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="tag1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Details</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($categories as $category) {
                        $status_class = 'danger';
                        $status_text = 'Inactive';
                        if ($category->status){
                            $status_class = 'success';
                            $status_text = 'Active';
                        }
                        ?>
                        <tr>
                            <td><?php echo $category->name; ?></td>
                            <td><?php echo $category->details; ?></td>
                           
                            <td><i class="fa fa-calendar"></i> <?php echo date("d M Y h:i A",strtotime($category->created)); ?>  <a href="javascript:show_profile_modal(<?php echo $category->created_by;?>);" ><i class="fa fa-user"></i></a> </td>
                            <td><a href="<?php echo base_url().'products/categories/togglestatus/'.$category->id;?>"><span class="label label-<?php echo $status_class;?>"><?php echo $status_text?></span></a> </td>
                            <td><div class="btn-group btn-group-xs"><a href="<?php echo base_url().'products/categories/edit/'.$category->id;?>" class="btn btn-info">Edit</a> <a href="<?php echo base_url().'products/categories/delete/'.$category->id;?>" class="btn btn-danger del">Delete</a></div> </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Details</th>
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
    $('#tag1').DataTable();

    $(document).ready(function(){
        $(".del").click(function(){
            if (!confirm("Do you want to delete")){
                return false;
            }
        });
    });


</script>