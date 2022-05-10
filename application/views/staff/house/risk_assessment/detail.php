<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($detail as $det){} ?>
<title><?php echo $det->title; ?> || Risk Assessments || staff || Harold</title>

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
                        <h1 class="page-title">Risk Assessments</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('staff/house/all/unit/'.strtolower($code)); ?>"><?php echo $prop->housename; ?></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('staff/house/risk_assessment/view/'.strtolower($code)); ?>">Risk Assessment</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $det->title; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Risk">Edit <?php echo $det->title; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        
        <script>
            $(function(){
          $('#downloadable').click(function(){
             
             window.location.href = "<?php echo site_url('staff/house/risk_assessment/download') ?>?file_name="+ $(this).attr('href');
          });
        });
        </script>
        
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Risk">
                        <div class="row">
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Info</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $det->title; ?></h6>
                                            <h6 class="font600">Young Person - <?php echo $det->child_name; ?></h6>
                                            <h6 class="font600">Social worker - <?php echo $det->social_worker; ?></h6>
                                            <h6 class="font600">Staff - <?php echo $det->staff; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $det->additional_info; ?></p>
                                            </div> 
                                            <br><br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/risk_assessment/edit_additional_info/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Send Mail</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        
                                        <div class="timeline_item ">
                                            <form action="<?php echo base_url('staff/house/risk_assessment/send_mail/'.$det->id.'/'.$code); ?>" method="POST">
                                                <input class="form-control" type="email" name="email" placeholder="Recipent email">
                                                <br>
                                                <div class="pull-right"><button type="submit" name="send">Send to Mail</button></div>
                                            </form>   
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                            </div>
                        
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Generate PDF</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <form action="<?php echo base_url('staff/generate_pdf/risk_assessment/'.$det->id); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                            <div class="pull-right"><button type="submit">Generate PDF</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Upload PDF</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        
                                        <div class="timeline_item ">
                                            <form action="<?php echo base_url('staff/house/risk_assessment/edit_document/'.$det->id.'/'.$code); ?>" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Document<span class="text-danger">*</span></label>
                                                        <input type="file" name="userFiles1[]" class="form-control">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="pull-right"><button type="submit" name="send">Upload</button></div>
                                            </form>   
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                            
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Criminal/Offending Behaviour</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <?php if($det->criminal_level == "Low"){ ?>
                                            <h6 class="font600 text-success">Risk Level - <?php echo $det->criminal_level; ?></h6>
                                            <?php }else if($det->criminal_level == "Medium"){ ?>
                                            <h6 class="font600 text-warning">Risk Level - <?php echo $det->criminal_level; ?></h6>
                                            <?php }else if($det->criminal_level == "High"){ ?>
                                            <h6 class="font600 text-danger">Risk Level - <?php echo $det->criminal_level; ?></h6>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->criminal_risk_level; ?></p>
                                            </div>  
                                            <br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/risk_assessment/criminal_behaviour/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Violent toward others</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <?php if($det->violent_level == "Low"){ ?>
                                            <h6 class="font600 text-success">Risk Level - <?php echo $det->violent_level; ?></h6>
                                            <?php }else if($det->violent_level == "Medium"){ ?>
                                            <h6 class="font600 text-warning">Risk Level - <?php echo $det->violent_level; ?></h6>
                                            <?php }else if($det->violent_level == "High"){ ?>
                                            <h6 class="font600 text-danger">Risk Level - <?php echo $det->violent_level; ?></h6>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->violent_risk_level; ?></p>
                                            </div>  
                                            <br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/risk_assessment/violent_other/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Use of weapons</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <div class="msg">
                                                <?php if($det->weapon_level == "Low"){ ?>
                                            <h6 class="font600 text-success">Risk Level - <?php echo $det->weapon_level; ?></h6>
                                            <?php }else if($det->weapon_level == "Medium"){ ?>
                                            <h6 class="font600 text-warning">Risk Level - <?php echo $det->weapon_level; ?></h6>
                                            <?php }else if($det->weapon_level == "High"){ ?>
                                            <h6 class="font600 text-danger">Risk Level - <?php echo $det->weapon_level; ?></h6>
                                            <?php } ?>
                                            </div> 
                                            <div class="msg">
                                                <p><?php echo $det->weapon_risk_level; ?></p>
                                            </div>
                                            <br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/risk_assessment/weapon/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Behaviour in the community</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <?php if($det->criminal_level == "Low"){ ?>
                                            <h6 class="font600 text-success">Risk Level - <?php echo $det->behaviour_community_level; ?></h6>
                                            <?php }else if($det->behaviour_community_level == "Medium"){ ?>
                                            <h6 class="font600 text-warning">Risk Level - <?php echo $det->behaviour_community_level; ?></h6>
                                            <?php }else if($det->behaviour_community_level == "High"){ ?>
                                            <h6 class="font600 text-danger">Risk Level - <?php echo $det->behaviour_community_level; ?></h6>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->behaviour_community_risk_level; ?></p>
                                            </div>  
                                            <br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/risk_assessment/behaviour_community/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Bully</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <?php if($det->bully_level == "Low"){ ?>
                                            <h6 class="font600 text-success">Risk Level - <?php echo $det->bully_level; ?></h6>
                                            <?php }else if($det->bully_level == "Medium"){ ?>
                                            <h6 class="font600 text-warning">Risk Level - <?php echo $det->bully_level; ?></h6>
                                            <?php }else if($det->bully_level == "High"){ ?>
                                            <h6 class="font600 text-danger">Risk Level - <?php echo $det->bully_level; ?></h6>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->bully_risk_level; ?></p>
                                            </div>  
                                            <br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/risk_assessment/bully/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Discrimination</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <?php if($det->discrimination_level == "Low"){ ?>
                                            <h6 class="font600 text-success">Risk Level - <?php echo $det->discrimination_level; ?></h6>
                                            <?php }else if($det->discrimination_level == "Medium"){ ?>
                                            <h6 class="font600 text-warning">Risk Level - <?php echo $det->discrimination_level; ?></h6>
                                            <?php }else if($det->discrimination_level == "High"){ ?>
                                            <h6 class="font600 text-danger">Risk Level - <?php echo $det->discrimination_level; ?></h6>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->discrimination_risk_level; ?></p>
                                            </div>  
                                            <br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/risk_assessment/discrimination/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Damage to property</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <?php if($det->damage_property_level == "Low"){ ?>
                                            <h6 class="font600 text-success">Risk Level - <?php echo $det->damage_property_level; ?></h6>
                                            <?php }else if($det->damage_property_level == "Medium"){ ?>
                                            <h6 class="font600 text-warning">Risk Level - <?php echo $det->damage_property_level; ?></h6>
                                            <?php }else if($det->damage_property_level == "High"){ ?>
                                            <h6 class="font600 text-danger">Risk Level - <?php echo $det->damage_property_level; ?></h6>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->damage_property_risk_level; ?></p>
                                            </div>  
                                            <br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/risk_assessment/damage_property/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Arson</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <?php if($det->arson_level == "Low"){ ?>
                                            <h6 class="font600 text-success">Risk Level - <?php echo $det->arson_level; ?></h6>
                                            <?php }else if($det->arson_level == "Medium"){ ?>
                                            <h6 class="font600 text-warning">Risk Level - <?php echo $det->arson_level; ?></h6>
                                            <?php }else if($det->arson_level == "High"){ ?>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->arson_risk_level; ?></p>
                                            </div>  
                                            <br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/risk_assessment/arson/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Going missing</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <?php if($det->missing_level == "Low"){ ?>
                                            <h6 class="font600 text-success">Risk Level - <?php echo $det->missing_level; ?></h6>
                                            <?php }else if($det->missing_level == "Medium"){ ?>
                                            <h6 class="font600 text-warning">Risk Level - <?php echo $det->missing_level; ?></h6>
                                            <?php }else if($det->missing_level == "High"){ ?>
                                            <h6 class="font600 text-danger">Risk Level - <?php echo $det->missing_level; ?></h6>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->missing_risk_level; ?></p>
                                            </div>  
                                            <br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/risk_assessment/missing/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Misuse of illegal substances/alcohol/smoking</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <?php if($det->missue_illegal_level == "Low"){ ?>
                                            <h6 class="font600 text-success">Risk Level - <?php echo $det->missue_illegal_level; ?></h6>
                                            <?php }else if($det->missue_illegal_level == "Medium"){ ?>
                                            <h6 class="font600 text-warning">Risk Level - <?php echo $det->missue_illegal_level; ?></h6>
                                            <?php }else if($det->missue_illegal_level == "High"){ ?>
                                            <h6 class="font600 text-danger">Risk Level - <?php echo $det->missue_illegal_level; ?></h6>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->missue_illegal_risk_level; ?></p>
                                            </div>  
                                            <br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/risk_assessment/missue_illegal/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Emotional wellbeing & self-harm</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <?php if($det->self_harm_level == "Low"){ ?>
                                            <h6 class="font600 text-success">Risk Level - <?php echo $det->self_harm_level; ?></h6>
                                            <?php }else if($det->self_harm_level == "Medium"){ ?>
                                            <h6 class="font600 text-warning">Risk Level - <?php echo $det->self_harm_level; ?></h6>
                                            <?php }else if($det->self_harm_level == "High"){ ?>
                                            <h6 class="font600 text-danger">Risk Level - <?php echo $det->self_harm_level; ?></h6>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->self_harm_risk_level; ?></p>
                                            </div>  
                                            <br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/risk_assessment/self_harm/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Sexual health</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <?php if($det->sexual_level == "Low"){ ?>
                                            <h6 class="font600 text-success">Risk Level - <?php echo $det->sexual_level; ?></h6>
                                            <?php }else if($det->sexual_level == "Medium"){ ?>
                                            <h6 class="font600 text-warning">Risk Level - <?php echo $det->sexual_level; ?></h6>
                                            <?php }else if($det->sexual_level == "High"){ ?>
                                            <h6 class="font600 text-danger">Risk Level - <?php echo $det->sexual_level; ?></h6>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->sexual_risk_level; ?></p>
                                            </div>  
                                            <br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/risk_assessment/sexual/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Health & Medication </h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <?php if($det->medication_level == "Low"){ ?>
                                            <h6 class="font600 text-success">Risk Level - <?php echo $det->medication_level; ?></h6>
                                            <?php }else if($det->medication_level == "Medium"){ ?>
                                            <h6 class="font600 text-warning">Risk Level - <?php echo $det->medication_level; ?></h6>
                                            <?php }else if($det->medication_level == "High"){ ?>
                                            <h6 class="font600 text-danger">Risk Level - <?php echo $det->medication_level; ?></h6>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->medication_risk_level; ?></p>
                                            </div>  
                                            <br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/risk_assessment/medication/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Family & Friend Contacts </h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <?php if($det->family_level == "Low"){ ?>
                                            <h6 class="font600 text-success">Risk Level - <?php echo $det->family_level; ?></h6>
                                            <?php }else if($det->family_level == "Medium"){ ?>
                                            <h6 class="font600 text-warning">Risk Level - <?php echo $det->family_level; ?></h6>
                                            <?php }else if($det->family_level == "High"){ ?>
                                            <h6 class="font600 text-danger">Risk Level - <?php echo $det->family_level; ?></h6>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->family_risk_level; ?></p>
                                            </div>  
                                            <br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/risk_assessment/family/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Allegations</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <?php if($det->allegation_level == "Low"){ ?>
                                            <h6 class="font600 text-success">Risk Level - <?php echo $det->allegation_level; ?></h6>
                                            <?php }else if($det->allegation_level == "Medium"){ ?>
                                            <h6 class="font600 text-warning">Risk Level - <?php echo $det->allegation_level; ?></h6>
                                            <?php }else if($det->allegation_level == "High"){ ?>
                                            <h6 class="font600 text-danger">Risk Level - <?php echo $det->allegation_level; ?></h6>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->allegation_risk_level; ?></p>
                                            </div>  
                                            <br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/risk_assessment/allegation/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Travel in vehicle</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <?php if($det->travel_level == "Low"){ ?>
                                            <h6 class="font600 text-success">Risk Level - <?php echo $det->travel_level; ?></h6>
                                            <?php }else if($det->travel_level == "Medium"){ ?>
                                            <h6 class="font600 text-warning">Risk Level - <?php echo $det->travel_level; ?></h6>
                                            <?php }else if($det->travel_level == "High"){ ?>
                                            <h6 class="font600 text-danger">Risk Level - <?php echo $det->travel_level; ?></h6>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->travel_risk_level; ?></p>
                                            </div>  
                                            <br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/risk_assessment/travel/$det->id/$code"); ?>">Edit</a></div>
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
