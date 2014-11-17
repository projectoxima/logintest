<body>
  <!-- HEADER -->
  <header class="navbar clearfix navbar-fixed-top" id="header">
    <div class="container">
        <div class="navbar-brand">
          <!-- COMPANY LOGO -->
          Oxima Project
          <!-- /COMPANY LOGO -->
          <!-- TEAM STATUS FOR MOBILE -->
          <div class="visible-xs">
            <a href="#" class="team-status-toggle switcher btn dropdown-toggle">
              <i class="fa fa-users"></i>
            </a>
          </div>
          <!-- /TEAM STATUS FOR MOBILE -->
        </div>
        <!-- BEGIN TOP NAVIGATION MENU -->          
        <ul class="nav navbar-nav pull-right">
          <!-- BEGIN USER LOGIN DROPDOWN -->
          <li class="dropdown user pull-right" id="header-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <table>
                <tr>
                  <td rowspan="2">
                    <img alt="" src="img/avatars/avatar3.jpg" /></td>
                  <td>
                    <span class="username"><?php echo $this->session->userdata('name') ;?></span>
                    <i class="fa fa-angle-down"></i>
                  </td>
                </tr>
              </table>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#"><i class="fa fa-user"></i> My Profile</a></li>
              <li><a href="<?php echo base_url(); ?>#/user_management" class="parent-menu"><i class="fa fa-cog"></i> Account Settings</a></li>
              <li><a href="<?php echo base_url();?>auth/logout"><i class="fa fa-power-off"></i> Log Out</a></li>
            </ul>
          </li>
          <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
    </div>
  </header>
  <!--/HEADER -->
  
  <!-- PAGE -->
  <section id="page">
    <!-- SIDEBAR -->
      <?php $this->load->view('partial/sidebar'); ?>
    <!-- /SIDEBAR -->
    
    <div id="main-content">
      <div class="container">
        <div class="row">
          <div id="content" class="col-lg-12">
            <!-- PAGE HEADER-->
            <!-- /PAGE HEADER -->
            <!-- DASHBOARD CONTENT -->
            <br>
						
						<div class="page-content" id="main-dashboard"></div>

            <!-- /DASHBOARD CONTENT -->
          </div><!-- /CONTENT-->
        </div>
      </div>
    </div>
  </section>
  <!--/PAGE -->