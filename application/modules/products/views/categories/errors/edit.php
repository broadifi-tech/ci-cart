<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Tag
        <small>Fill up the form bellow</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tags</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Tag Edit</h3>
            </div>
            <?php echo form_open_multipart(current_url()); ?>
            <div class="box-body">
                <div class="row clearfix">

                    <div class="col-md-6">
                        <label for="name" class="control-label"><span class="text-danger">*</span> Name</label>
                        <div class="form-group">
                            <input type="text" name="name" value="<?php echo $tag->name; ?>" class="form-control" id="name" />
                            <span class="text-danger"><?php echo form_error('name');?></span>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label for="details" class="control-label"><span class="text-danger">*</span> Description</label>
                        <div class="form-group">
                            <textarea rows="4" name="details" class="form-control" id="details" ><?php echo $tag->details; ?></textarea>
                            <span class="text-danger"><?php echo form_error('details');?></span>
                        </div>
                    </div>

                  


                    

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="checkbox" name="status" <?php echo $tag->status?'checked':'';?> value="1"  id="status" />
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

 