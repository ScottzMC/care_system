<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Risk Assessments || PDF</title>

<?php $this->load->view('menu/admin/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <div class="page">
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <?php 

                     //Use this code to convert your image to base64
                     // Apply this in a view 
                      
                    $path = base_url('uploads/logo-dark.png');// Modify this part (your_img.png
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    ?>
                    
                    <div class="tab-pane active" id="Risk">
                        <div class="row">
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <div class="msg">
                                                <p><img src="<?=$base64?>" height="70" width="150" /></p>
                                            </div> 
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h1 class="card-title">Risk Assessment</h1>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Summary</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right">Date - <?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h3 class="font600">Title - <?php echo $det->title; ?></h3>
                                            <h4 class="font600">Young Person - <?php echo $det->child_name; ?></h4>
                                            <h4 class="font600">Social worker - <?php echo $det->social_worker; ?></h4>
                                            <h4 class="font600">Staff - <?php echo $det->staff; ?></h4>
                                            <div class="msg">
                                                <p><?php echo $det->additional_info; ?></p>
                                            </div> 
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Criminal/Offending Behaviour</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <?php if($det->criminal_level == "Low"){ ?>
                                            <h4 class="font600 text-success">Risk Level - <?php echo $det->criminal_level; ?></h4>
                                            <?php }else if($det->criminal_level == "Medium"){ ?>
                                            <h4 class="font600 text-warning">Risk Level - <?php echo $det->criminal_level; ?></h4>
                                            <?php }else if($det->criminal_level == "High"){ ?>
                                            <h4 class="font600 text-danger">Risk Level - <?php echo $det->criminal_level; ?></h4>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->criminal_risk_level; ?></p>
                                            </div>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Violent toward others</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <?php if($det->violent_level == "Low"){ ?>
                                            <h4 class="font600 text-success">Risk Level - <?php echo $det->violent_level; ?></h4>
                                            <?php }else if($det->violent_level == "Medium"){ ?>
                                            <h4 class="font600 text-warning">Risk Level - <?php echo $det->violent_level; ?></h4>
                                            <?php }else if($det->violent_level == "High"){ ?>
                                            <h4 class="font600 text-danger">Risk Level - <?php echo $det->violent_level; ?></h4>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->violent_risk_level; ?></p>
                                            </div>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Use of weapons</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <div class="msg">
                                                <?php if($det->weapon_level == "Low"){ ?>
                                            <h4 class="font600 text-success">Risk Level - <?php echo $det->weapon_level; ?></h4>
                                            <?php }else if($det->weapon_level == "Medium"){ ?>
                                            <h4 class="font600 text-warning">Risk Level - <?php echo $det->weapon_level; ?></h4>
                                            <?php }else if($det->weapon_level == "High"){ ?>
                                            <h4 class="font600 text-danger">Risk Level - <?php echo $det->weapon_level; ?></h4>
                                            <?php } ?>
                                            </div> 
                                            <div class="msg">
                                                <p><?php echo $det->weapon_risk_level; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Behaviour in the community</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <?php if($det->criminal_level == "Low"){ ?>
                                            <h4 class="font600 text-success">Risk Level - <?php echo $det->behaviour_community_level; ?></h4>
                                            <?php }else if($det->behaviour_community_level == "Medium"){ ?>
                                            <h4 class="font600 text-warning">Risk Level - <?php echo $det->behaviour_community_level; ?></h4>
                                            <?php }else if($det->behaviour_community_level == "High"){ ?>
                                            <h4 class="font600 text-danger">Risk Level - <?php echo $det->behaviour_community_level; ?></h4>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->behaviour_community_risk_level; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Bully</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <?php if($det->bully_level == "Low"){ ?>
                                            <h4 class="font600 text-success">Risk Level - <?php echo $det->bully_level; ?></h4>
                                            <?php }else if($det->bully_level == "Medium"){ ?>
                                            <h4 class="font600 text-warning">Risk Level - <?php echo $det->bully_level; ?></h4>
                                            <?php }else if($det->bully_level == "High"){ ?>
                                            <h4 class="font600 text-danger">Risk Level - <?php echo $det->bully_level; ?></h4>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->bully_risk_level; ?></p>
                                            </div>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Discrimination</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <?php if($det->discrimination_level == "Low"){ ?>
                                            <h4 class="font600 text-success">Risk Level - <?php echo $det->discrimination_level; ?></h4>
                                            <?php }else if($det->discrimination_level == "Medium"){ ?>
                                            <h4 class="font600 text-warning">Risk Level - <?php echo $det->discrimination_level; ?></h4>
                                            <?php }else if($det->discrimination_level == "High"){ ?>
                                            <h4 class="font600 text-danger">Risk Level - <?php echo $det->discrimination_level; ?></h4>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->discrimination_risk_level; ?></p>
                                            </div>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Damage to property</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <?php if($det->damage_property_level == "Low"){ ?>
                                            <h4 class="font600 text-success">Risk Level - <?php echo $det->damage_property_level; ?></h4>
                                            <?php }else if($det->damage_property_level == "Medium"){ ?>
                                            <h4 class="font600 text-warning">Risk Level - <?php echo $det->damage_property_level; ?></h4>
                                            <?php }else if($det->damage_property_level == "High"){ ?>
                                            <h4 class="font600 text-danger">Risk Level - <?php echo $det->damage_property_level; ?></h4>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->damage_property_risk_level; ?></p>
                                            </div>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Arson</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <?php if($det->arson_level == "Low"){ ?>
                                            <h4 class="font600 text-success">Risk Level - <?php echo $det->arson_level; ?></h4>
                                            <?php }else if($det->arson_level == "Medium"){ ?>
                                            <h4 class="font600 text-warning">Risk Level - <?php echo $det->arson_level; ?></h4>
                                            <?php }else if($det->arson_level == "High"){ ?>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->arson_risk_level; ?></p>
                                            </div>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Going missing</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <?php if($det->missing_level == "Low"){ ?>
                                            <h4 class="font600 text-success">Risk Level - <?php echo $det->missing_level; ?></h4>
                                            <?php }else if($det->missing_level == "Medium"){ ?>
                                            <h4 class="font600 text-warning">Risk Level - <?php echo $det->missing_level; ?></h4>
                                            <?php }else if($det->missing_level == "High"){ ?>
                                            <h4 class="font600 text-danger">Risk Level - <?php echo $det->missing_level; ?></h4>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->missing_risk_level; ?></p>
                                            </div>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Misuse of illegal substances/alcohol/smoking</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <?php if($det->missue_illegal_level == "Low"){ ?>
                                            <h4 class="font600 text-success">Risk Level - <?php echo $det->missue_illegal_level; ?></h4>
                                            <?php }else if($det->missue_illegal_level == "Medium"){ ?>
                                            <h4 class="font600 text-warning">Risk Level - <?php echo $det->missue_illegal_level; ?></h4>
                                            <?php }else if($det->missue_illegal_level == "High"){ ?>
                                            <h4 class="font600 text-danger">Risk Level - <?php echo $det->missue_illegal_level; ?></h4>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->missue_illegal_risk_level; ?></p>
                                            </div>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Emotional wellbeing & self-harm</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <?php if($det->self_harm_level == "Low"){ ?>
                                            <h4 class="font600 text-success">Risk Level - <?php echo $det->self_harm_level; ?></h4>
                                            <?php }else if($det->self_harm_level == "Medium"){ ?>
                                            <h4 class="font600 text-warning">Risk Level - <?php echo $det->self_harm_level; ?></h4>
                                            <?php }else if($det->self_harm_level == "High"){ ?>
                                            <h4 class="font600 text-danger">Risk Level - <?php echo $det->self_harm_level; ?></h4>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->self_harm_risk_level; ?></p>
                                            </div>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Sexual health</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <?php if($det->sexual_level == "Low"){ ?>
                                            <h4 class="font600 text-success">Risk Level - <?php echo $det->sexual_level; ?></h4>
                                            <?php }else if($det->sexual_level == "Medium"){ ?>
                                            <h4 class="font600 text-warning">Risk Level - <?php echo $det->sexual_level; ?></h4>
                                            <?php }else if($det->sexual_level == "High"){ ?>
                                            <h4 class="font600 text-danger">Risk Level - <?php echo $det->sexual_level; ?></h4>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->sexual_risk_level; ?></p>
                                            </div>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Health & Medication </h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <?php if($det->medication_level == "Low"){ ?>
                                            <h4 class="font600 text-success">Risk Level - <?php echo $det->medication_level; ?></h4>
                                            <?php }else if($det->medication_level == "Medium"){ ?>
                                            <h4 class="font600 text-warning">Risk Level - <?php echo $det->medication_level; ?></h4>
                                            <?php }else if($det->medication_level == "High"){ ?>
                                            <h4 class="font600 text-danger">Risk Level - <?php echo $det->medication_level; ?></h4>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->medication_risk_level; ?></p>
                                            </div>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Family & Friend Contacts </h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <?php if($det->family_level == "Low"){ ?>
                                            <h4 class="font600 text-success">Risk Level - <?php echo $det->family_level; ?></h4>
                                            <?php }else if($det->family_level == "Medium"){ ?>
                                            <h4 class="font600 text-warning">Risk Level - <?php echo $det->family_level; ?></h4>
                                            <?php }else if($det->family_level == "High"){ ?>
                                            <h4 class="font600 text-danger">Risk Level - <?php echo $det->family_level; ?></h4>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->family_risk_level; ?></p>
                                            </div>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Allegations</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <?php if($det->allegation_level == "Low"){ ?>
                                            <h4 class="font600 text-success">Risk Level - <?php echo $det->allegation_level; ?></h4>
                                            <?php }else if($det->allegation_level == "Medium"){ ?>
                                            <h4 class="font600 text-warning">Risk Level - <?php echo $det->allegation_level; ?></h4>
                                            <?php }else if($det->allegation_level == "High"){ ?>
                                            <h4 class="font600 text-danger">Risk Level - <?php echo $det->allegation_level; ?></h4>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->allegation_risk_level; ?></p>
                                            </div>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Travel in vehicle</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <?php if($det->travel_level == "Low"){ ?>
                                            <h4 class="font600 text-success">Risk Level - <?php echo $det->travel_level; ?></h4>
                                            <?php }else if($det->travel_level == "Medium"){ ?>
                                            <h4 class="font600 text-warning">Risk Level - <?php echo $det->travel_level; ?></h4>
                                            <?php }else if($det->travel_level == "High"){ ?>
                                            <?php } ?>
                                            <div class="msg">
                                                <p><?php echo $det->travel_risk_level; ?></p>
                                            </div>  
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

</body>
</html>
