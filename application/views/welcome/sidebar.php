<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/themes/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview ">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              
            </span>
          </a>
         
        </li>
        
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-product-hunt"></i> <span>Products</span>
            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

            <ul class="treeview-menu">
            
            <li><a href="<?php echo base_url();?>products/index"><i class="fa fa-circle-o"></i> All Products</a></li>
            <li><a href="<?php echo base_url();?>products/add"><i class="fa fa-circle-o"></i> Add New</a></li>
           </ul>

          </a>

          
          
        </li>
      
        
        
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-tags"></i> <span>Tags</span>
            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

            <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>products/tags/index"><i class="fa fa-circle-o"></i> All Tags</a></li>
            <li><a href="<?php echo base_url();?>products/tags/add"><i class="fa fa-circle-o"></i> Add New</a></li>
           </ul>

          </a>

          
          
        </li>

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Categories</span>
            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

            <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>products/categories/index"><i class="fa fa-circle-o"></i> All Categories</a></li>
            <li><a href="<?php echo base_url();?>products/categories/add"><i class="fa fa-circle-o"></i> Add New</a></li>
           </ul>

          </a>

          
          
        </li>



        <li class="treeview active">
          <a href="#">
            <i class="fa fa-industry"></i> <span>Stocks</span>
            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

            <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>products/stocks/index"><i class="fa fa-circle-o"></i> All Stocks</a></li>
            <li><a href="<?php echo base_url();?>products/stocks/add"><i class="fa fa-circle-o"></i> Add New</a></li>
           </ul>

          </a>  
          
        </li>


        <li class="treeview active">
          <a href="#">
            <i class="fa fa-bandcamp"></i> <span>Brands</span>
            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

            <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>products/brands/index"><i class="fa fa-circle-o"></i> All Brands</a></li>
            <li><a href="<?php echo base_url();?>products/brands/add"><i class="fa fa-circle-o"></i> Add New</a></li>
           </ul>

          </a>
 
        </li>

        <li class="treeview active">
          <a href="#">
            <i class="glyphicon glyphicon-scissors"></i> <span>Coupons</span>
            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

            <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>products/coupons/index"><i class="fa fa-circle-o"></i> All Coupons</a></li>
            <li><a href="<?php echo base_url();?>products/coupons/add"><i class="fa fa-circle-o"></i> Add New</a></li>
           </ul>

          </a>
 
        </li>



        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <script>
   var url = window.location;
        // for sidebar menu entirely but not cover treeview
        $('ul.sidebar-menu a').filter(function() {
            return this.href != url;
        }).parent().removeClass('active');

        // for sidebar menu entirely but not cover treeview
        $('ul.sidebar-menu a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');

        // for treeview
        $('ul.treeview-menu a').filter(function() {
            return this.href == url;
        }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
        </script>