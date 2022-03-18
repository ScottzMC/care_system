<!-- Start Main top header -->
<div id="header_top" class="header_top">
    <div class="container">
        <div class="hright">
            <a href="javascript:void(0)" class="nav-link icon right_tab"><i class="fe fe-align-right"></i></a>
            <a href="<?php echo site_url('hr/account/logout'); ?>" class="nav-link icon settingbar"><i class="fe fe-power"></i></a>
        </div>
    </div>
</div>
<!-- Start Rightbar setting panel -->

<?php
//foreach($user_details as $usrd){}

?>

<!-- Start Main leftbar navigation -->
<div id="left-sidebar" class="sidebar">
    <h5 class="brand-name">HR
      <a href="javascript:void(0)" class="menu_option float-right">
        <i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i>
      </a>
    </h5>
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu-admin">HR</a></li>
    </ul>
    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="menu-admin" role="tabpanel">
            <nav class="sidebar-nav">
                <ul class="metismenu">
                    <!--<li><a href="<?php echo site_url('home'); ?>"><i class="fa fa-dashboard"></i><span>Back to Site</span></a></li>-->
                    <li><a href="<?php echo site_url('hr/dashboard'); ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                    <li><a href="<?php echo site_url('hr/user'); ?>"><i class="fa fa-users"></i><span>Users</span></a></li>
                    <li><a href="<?php echo site_url('hr/daily_log'); ?>"><i class="fa fa-book"></i><span>Daily Log</span></a></li>
                    <li><a href="<?php echo site_url('hr/staff_communication'); ?>"><i class="fa fa-book"></i><span>Staff Communication</span></a></li>
                    <li><a href="<?php echo site_url('hr/staff_shift'); ?>"><i class="fa fa-book"></i><span>Staff Shift</span></a></li>
                    <li><a href="<?php echo site_url('hr/training'); ?>"><i class="fa fa-book"></i><span>Training Calendar</span></a></li>
                    <?php if(!empty($this->session->userdata('login'))){ ?>
                    <li><a href="<?php echo site_url('hr/account/logout'); ?>"><i class="fe fe-power"></i><span>Logout</span></a></li>
                  <?php } ?>
                </ul>
            </nav>
        </div>
        
    </div>
</div>
