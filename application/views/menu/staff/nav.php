<!-- Start Main top header -->
<div id="header_top" class="header_top">
    <div class="container">
        <div class="hright">
            <a href="javascript:void(0)" class="nav-link icon right_tab"><i class="fe fe-align-right"></i></a>
            <a href="<?php echo site_url('staff/account/logout'); ?>" class="nav-link icon settingbar"><i class="fe fe-power"></i></a>
        </div>
    </div>
</div>
<!-- Start Rightbar setting panel -->

<?php
//foreach($user_details as $usrd){}

?>

<!-- Start Main leftbar navigation -->
<div id="left-sidebar" class="sidebar">
    <h5 class="brand-name">Staff
      <a href="javascript:void(0)" class="menu_option float-right">
        <i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i>
      </a>
    </h5>
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu-admin">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu-property">Properties</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu-report">Staff</a></li>
    </ul>
    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="menu-admin" role="tabpanel">
            <nav class="sidebar-nav">
                <ul class="metismenu">
                    <li><a href="<?php echo site_url('staff/dashboard'); ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                    <li><a href="<?php echo site_url('staff/user'); ?>"><i class="fa fa-users"></i><span>Users</span></a></li>
                    <li><a href="<?php echo site_url('staff/children/all'); ?>"><i class="fa fa-users"></i><span>Young People</span></a></li>
                    <li><a href="<?php echo site_url('staff/health_safety'); ?>"><i class="fa fa-book"></i><span>Health & Safety</span></a></li>
                    <li><a href="<?php echo site_url('staff/support_work'); ?>"><i class="fa fa-book"></i><span>Support Work</span></a></li>
                    <?php if(!empty($this->session->userdata('uemail'))){ ?>
                    <li><a href="<?php echo site_url('staff/account/logout'); ?>"><i class="fe fe-power"></i><span>Logout</span></a></li>
                  <?php } ?>
                </ul>
            </nav>
        </div>
        
        <div class="tab-pane fade show" id="menu-property" role="tabpanel">
            <nav class="sidebar-nav">
                <ul class="metismenu">
                    <?php 
                    $house = $this->db->get('properties')->result();
                    
                    if(!empty($house)){ foreach($house as $hse){
                    ?>
                    <li><a href="<?php echo site_url('staff/house/all/unit/'.strtolower($hse->code)); ?>"><i class="fa fa-home"></i><span><?php echo $hse->housename; ?></span></a></li>
                    <?php } } ?>
                </ul>
            </nav>
        </div>
        
        <div class="tab-pane fade show" id="menu-report" role="tabpanel">
            <nav class="sidebar-nav">
                <ul class="metismenu">
                    <li><a href="<?php echo site_url('staff/staff_shift'); ?>"><i class="fa fa-book"></i><span>Staff Shift</span></a></li>
                    <li><a href="<?php echo site_url('staff/training'); ?>"><i class="fa fa-book"></i><span>Training Calendar</span></a></li>
                </ul>
            </nav>
        </div>
        
    </div>
</div>
