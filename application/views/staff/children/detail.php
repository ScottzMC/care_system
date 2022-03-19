<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($children as $child){} ?>
<title><?php echo $child->fullname; ?> Young People || Admin || Harold</title>

<?php $this->load->view('menu/staff/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/staff/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Young People</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/all'); ?>">Young People </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> <?php echo $child->fullname; ?> Children</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Children-profile"> <?php echo $child->fullname; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Children-profile">
                        <div class="row">
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Info</h3>
                                    </div>
                                    <?php if(!empty($children)){ ?>
                                    <div class="card-body">
                                        <div class="user_avtar">
                                            <img class="rounded-circle" height="200" width="200" src="<?php echo base_url('uploads/children/'.$child->image); ?>" 
                                            alt="<?php echo $child->fullname; ?>">
                                        </div>
                                        <br><br>
										<ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Full Name </b>
                                                <div class="pull-right"><?php echo $child->fullname; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Description of Young Person </b>
                                                <div class="pull-right"><?php echo $child->description; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Age </b>
                                                <div class="pull-right"><?php echo $child->age; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>DOB </b>
                                                <div class="pull-right"><?php echo date('l, dS M Y',strtotime($child->dob)); ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Gender </b>
                                                <div class="pull-right"><?php echo $child->gender; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Child Status </b>
                                                <div class="pull-right"><?php echo $child->child_status; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Support Hours </b>
                                                <div class="pull-right"><?php echo $child->support_hours; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Ethnic Background </b>
                                                <div class="pull-right"><?php echo $child->ethnic; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Guardian </b>
                                                <div class="pull-right"><?php echo $child->guardian; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Email Address </b>
                                                <div class="pull-right"><?php echo $child->email; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Telephone Number </b>
                                                <div class="pull-right"><?php echo $child->telephone; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>House Name </b>
                                                <div class="pull-right"><?php echo $child->house_name; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>National Insurance Number </b>
                                                <div class="pull-right"><?php echo $child->nin; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Guardian Full Name </b>
                                                <div class="pull-right"><?php echo $child->guardian_fullname; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Guardian Email </b>
                                                <div class="pull-right"><?php echo $child->guardian_email; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Guardian Telephone </b>
                                                <div class="pull-right"><?php echo $child->guardian_telephone; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Guardian Address</b>
                                                <div class="pull-right"><?php echo $child->guardian_address; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Action</b>
                                                <div class="pull-right"><a href="<?php echo site_url("staff/children/profile/edit/$child->code"); ?>">Edit</a></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Medical History</h3>
                                    </div>
                                    <div class="card-header">
                                       <div class="pull-right"><a href="<?php echo site_url("staff/children/medical_history/view/".$child->code); ?>">View All</a></div>
                                    </div>
                                    <?php if(!empty($medical)){ foreach($medical as $med){ ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($med->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $med->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo character_limiter($med->body, 100); ?></p>
                                            </div>  
                                            <div class="pull-right"><a href="<?php echo site_url("staff/children/medical_history/edit/$med->id/$med->code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Personal Education</h3>
                                    </div>
                                    <div class="card-header">
                                       <div class="pull-right"><a href="<?php echo site_url("staff/children/personal_education/view/".$child->code); ?>">View All</a></div>
                                    </div>
                                    <?php if(!empty($education)){ foreach($education as $edu){ ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($edu->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $edu->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo character_limiter($edu->body, 100); ?></p>
                                            </div>                      
                                            <div class="pull-right"><a href="<?php echo site_url("staff/children/personal_education/edit/$edu->id/$edu->code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Finance Information </h3>
                                    </div>
                                    <div class="card-header">
                                       <div class="pull-right"><a href="<?php echo site_url("staff/children/finance_information/view/".$child->code); ?>">View All</a></div>
                                    </div>
                                    <?php if(!empty($finance)){ foreach($finance as $fin){ ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($fin->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $fin->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo character_limiter($fin->body, 100); ?></p>
                                            </div>     
                                            <div class="pull-right"><a href="<?php echo site_url("staff/children/finance_information/edit/$fin->id/$fin->code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Health & Safety Check</h3>
                                    </div>
                                    <div class="card-header">
                                       <div class="pull-right"><a href="<?php echo site_url("staff/health_safety"); ?>">View All</a></div>
                                    </div>
                                    <?php if(!empty($health_safety)){ foreach($health_safety as $health){ ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($health->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $health->title; ?></h6>
                                            <!--<div class="msg">
                                                <p><?php echo character_limiter($health->additional_info, 100); ?></p>
                                            </div>-->   
                                            <div class="pull-right"><a href="<?php echo site_url("staff/health_safety/edit/$health->id/$health->code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                </div> 
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Foster Carer</h3>
                                    </div>
                                    <div class="card-header">
                                       <div class="pull-right"><a href="<?php echo site_url("staff/children/foster_care/view/".$child->code); ?>">View All</a></div>
                                    </div>
                                    <?php if(!empty($foster_care)){ foreach($foster_care as $foster){ ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($foster->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $foster->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo character_limiter($foster->body, 100); ?></p>
                                            </div>   
                                            <div class="pull-right"><a href="<?php echo site_url("staff/children/foster_care/edit/$foster->id/$foster->code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                </div> 
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Incidents</h3>
                                    </div>
                                    <div class="card-header">
                                       <div class="pull-right"><a href="<?php echo site_url("staff/children/incident/view/".$child->code); ?>">View All</a></div>
                                    </div>
                                    <?php if(!empty($incidents)){ foreach($incidents as $inc){ ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <input type="hidden" name="created_date" value="<?php echo $inc->created_date; ?>">
                                            <span><small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($inc->created_date)); ?></small></span>
                                            <input type="hidden" name="title" value="<?php echo $inc->title; ?>">
                                            <h6 class="font600"><?php echo $inc->title; ?></h6>
                                            <div class="msg">
                                                <input type="hidden" name="body" value="<?php echo $inc->body; ?>">
                                                <p><?php echo $inc->body; ?></p>
                                            </div>       
                                            <small class="float-right text-right"><a href="<?php echo site_url('staff/children/incident/edit/'.$inc->id.'/'.strtolower($inc->code)); ?>"> Edit</a></small>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">EDT</h3>
                                    </div>
                                    <div class="card-header">
                                       <div class="pull-right"><a href="<?php echo site_url("staff/children/edt/view/".$child->code); ?>">View All</a></div>
                                    </div>
                                    <?php if(!empty($absences)){ foreach($absences as $abs){ ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <span><small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($abs->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $abs->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $abs->body; ?></p>
                                            </div>       
                                            <small class="float-right text-right"><a href="<?php echo site_url('staff/children/edt/edit/'.$abs->id.'/'.strtolower($abs->code)); ?>"> Edit</a></small>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Abilities Evaluation</h3>
                                    </div>
                                    <div class="card-header">
                                       <div class="pull-right"><a href="<?php echo site_url("staff/children/abilities_evaluation/view/".$child->code); ?>">View All</a></div>
                                    </div>
                                    <?php if(!empty($abilities)){ foreach($abilities as $abil){ ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($abil->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $abil->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $abil->body; ?></p>
                                            </div> 
                                            <div class="pull-right"><a href="<?php echo site_url("staff/children/abilities_evaluation/edit/$abil->id/$abil->code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Case Recording</h3>
                                    </div>
                                    <div class="card-header">
                                       <div class="pull-right"><a href="<?php echo site_url("staff/children/case_recording/view/".$child->code); ?>">View All</a></div>
                                    </div>
                                    <?php if(!empty($case_recording)){ foreach($case_recording as $case){ ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($case->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $case->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $case->body; ?></p>
                                            </div>      
                                            <div class="pull-right"><a href="<?php echo site_url("staff/children/case_recording/edit/$case->id/$case->code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Sanctions or Rewards</h3>
                                    </div>
                                    <div class="card-header">
                                       <div class="pull-right"><a href="<?php echo site_url("staff/children/sanction_reward/view/".$child->code); ?>">View All</a></div>
                                    </div>
                                    <?php if(!empty($sanction)){ foreach($sanction as $sanc){ ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <span><small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($sanc->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $sanc->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $sanc->body; ?></p>
                                            </div>       
                                            <small class="float-right text-right"><a href="<?php echo site_url('staff/children/sanction_reward/edit/'.$sanc->id.'/'.strtolower($sanc->code)); ?>"> Edit</a></small>
                                        </div>
                                    </div>
                                    <?php } } ?>
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
