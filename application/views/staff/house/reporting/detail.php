<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($detail as $det){} ?>
<title><?php echo $det->title; ?> || Reporting || staff || Harold</title>

<?php $this->load->view('menu/staff/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">
        <?php 
        $property = $this->db->query("SELECT housename FROM properties WHERE code = '$code' ")->result();
        foreach($property as $prop){} ?>

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/staff/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Reporting</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item">House</li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('staff/house/all/unit/'.strtolower($code)); ?>"><?php echo $prop->housename; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $det->title; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Bi"><?php echo $det->title; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Bi">
                        <div class="row">
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Send Mail</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        
                                        <div class="timeline_item ">
                                            <form action="<?php echo base_url('staff/house/reporting/send_mail/'.$code); ?>" method="POST">
                                                <input class="form-control" type="email" name="email" placeholder="Recipent email">
                                                <input type="hidden" name="title" value="<?php echo $det->title; ?>">
                                                <input type="hidden" name="summary" value="<?php echo $det->summary; ?>">
                                                <input type="hidden" name="area_of_risk" value="<?php echo $det->area_of_risk; ?>">
                                                <input type="hidden" name="keywork_session" value="<?php echo $det->keywork_session; ?>">
                                                <input type="hidden" name="self_care" value="<?php echo $det->self_care; ?>">
                                                <input type="hidden" name="education" value="<?php echo $det->education; ?>">
                                                <input type="hidden" name="independent_skills" value="<?php echo $det->independent_skills; ?>">
                                                <input type="hidden" name="family" value="<?php echo $det->family; ?>">
                                                <input type="hidden" name="missing" value="<?php echo $det->missing; ?>">
                                                <input type="hidden" name="area_of_progress" value="<?php echo $det->area_of_progress; ?>">
                                                <input type="hidden" name="staff" value="<?php echo $det->staff; ?>">
                                                <input type="hidden" name="duration" value="<?php echo $det->duration; ?>">
                                                <input type="hidden" name="created_date" value="<?php echo date('j M Y', strtotime($det->created_date)); ?>">
                                                <br>
                                                <div class="pull-right"><button type="submit" name="send">Send to Mail</button></div>
                                            </form>   
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Info</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $det->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $det->summary; ?></p>
                                            </div>  
                                            <br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/reporting/summary/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Areas of Risk/Concern</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->area_of_risk; ?></p>
                                            </div> 
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/reporting/area_of_risk/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Key Work Sessions</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->keywork_session; ?></p>
                                            </div>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/reporting/keywork_session/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Health/Self-Care </h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->self_care; ?></p>
                                            </div>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/reporting/self_care/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Education/Employment/Training</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->education; ?></p>
                                            </div>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/reporting/education/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Independent Living Skills</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->independent_skills; ?></p>
                                            </div>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/reporting/independent_skill/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Family/Friends Contact</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->family; ?></p>
                                            </div>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/reporting/family/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Unauthorised Absences/Missing/Legal</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->missing; ?></p>
                                            </div>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/reporting/missing/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Areas of Progress </h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->area_of_progress; ?></p>
                                            </div>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/reporting/area_of_progress/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Staff</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->staff; ?></p>
                                            </div>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/reporting/staff/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Social worker</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->social_worker; ?></p>
                                            </div>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/reporting/social_worker/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Date range</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->duration; ?></p>
                                            </div>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/reporting/duration/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
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

<?php $this->load->view('menu/staff/script'); ?>

</body>
</html>
