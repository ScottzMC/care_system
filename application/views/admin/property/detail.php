<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($detail as $det){} ?>
<title><?php echo $det->housename; ?> || Properties || Admin || Harold</title>

<?php $this->load->view('menu/admin/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/admin/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Properties</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/property'); ?>">Properties </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit <?php echo $det->housename; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Property">Edit <?php echo $det->housename; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Property">
                        <div class="row">
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Info</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){ ?>
                                    <div class="card-body">
										<ul class="list-group">
                                            <li class="list-group-item">
                                                <b>House Name </b>
                                                <div class="pull-right"><?php echo $det->housename; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Body </b>
                                                <div class="pull-right"><?php echo $det->body; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Telephone Number</b>
                                                <div class="pull-right"><?php echo $det->telephone; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Mobile Number</b>
                                                <div class="pull-right"><?php echo $det->mobile; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Address</b>
                                                <div class="pull-right"><?php echo $det->address; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Postcode</b>
                                                <div class="pull-right"><?php echo $det->postcode; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>City</b>
                                                <div class="pull-right"><?php echo $det->city; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>State</b>
                                                <div class="pull-right"><?php echo $det->state; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Date</b>
                                                <div class="pull-right"><?php echo date('j M Y', strtotime($det->created_date)); ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Action</b>
                                                <div class="pull-right"><a href="<?php echo site_url("admin/property/edit/$det->id"); ?>">Edit</a></div>
                                            </li>
                                        
                                        </ul>
                                    </div>
                                    <?php } } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Documents</h3>
                                    </div>
                                    <?php if(!empty($file)){ foreach($file as $fil){} ?>
                                    <div class="card-body">
										<ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Insurance </b>
                                            <?php if(!empty($fil->insurance)){ ?>
                                                <div class="pull-right"><a href="<?php echo base_url('admin/property/form_download_insurance/'.$fil->code); ?>" target="_blank">Download</a></div>
                                            <?php }else{ echo ''; } ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Electrical Certificate </b>
                                                <?php if(!empty($fil->electrical)){ ?>
                                                <div class="pull-right"><a href="<?php echo base_url('admin/property/form_download_electrical/'.$fil->code); ?>" target="_blank">Download</a></div>
                                                <?php }else{ echo ''; } ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Gas Safety </b>
                                                <?php if(!empty($fil->gas_safety)){ ?>
                                                <div class="pull-right"><a href="<?php echo base_url('admin/property/form_download_gas_safety/'.$fil->code); ?>" target="_blank">Download</a></div>
                                                <?php }else{ echo ''; } ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Fire Alarm </b>
                                                <?php if(!empty($fil->fire_alarm)){ ?>
                                                <div class="pull-right"><a href="<?php echo base_url('admin/property/form_download_fire_alarm/'.$fil->code); ?>" target="_blank">Download</a></div>
                                                <?php }else{ echo ''; } ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Emergency Light</b>
                                                <?php if(!empty($fil->emergency_light)){ ?>
                                                <div class="pull-right"><a href="<?php echo base_url('admin/property/form_download_emergency_light/'.$fil->code); ?>" target="_blank">Download</a></div>
                                                <?php }else{ echo ''; } ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>PAT Testing</b>
                                                <?php if(!empty($fil->pat_testing)){ ?>
                                                <div class="pull-right"><a href="<?php echo base_url('admin/property/form_download_pat_testing/'.$fil->code); ?>" target="_blank">Download</a></div>
                                                <?php }else{ echo ''; } ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Area of Risk Assessment</b>
                                                <?php if(!empty($fil->area_risk_assessment)){ ?>
                                                <div class="pull-right"><a href="<?php echo base_url('admin/property/form_download_area_risk/'.$fil->code); ?>" target="_blank">Download</a></div>
                                                <?php }else{ echo ''; } ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Health Safety</b>
                                                <?php if(!empty($fil->health_safety)){ ?>
                                                <div class="pull-right"><a href="<?php echo base_url('admin/property/form_download_health_safety/'.$fil->code); ?>" target="_blank">Download</a></div>
                                                <?php }else{ echo ''; } ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Action</b>
                                                <div class="pull-right"><a href="<?php echo site_url("admin/property/edit/$det->id/$det->code"); ?>">Edit</a></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<?php $this->load->view('menu/admin/script'); ?>

</body>
</html>
