<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>Reporting || PDF</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <?php $this->load->view('menu/admin/style'); ?>
</head>
<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <div class="page">
        <!-- Start Page header -->
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
                    <?php foreach($detail as $det){} ?>
                    <div class="tab-pane active">
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
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Young Person</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->child_name; ?></p>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Info</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h3 class="font600"><?php echo $det->title; ?></h3>
                                            <div class="msg">
                                                <p><?php echo $det->summary; ?></p>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Areas of Risk/Concern</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->area_of_risk; ?></p>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Key Work Sessions</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->keywork_session; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Health/Self-Care </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->self_care; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Education/Employment/Training</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->education; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Independent Living Skills</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->independent_skills; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Family/Friends Contact</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->family; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Unauthorised Absences/Missing/Legal</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->missing; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Areas of Progress </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->area_of_progress; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Staff</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->staff; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Social worker</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->social_worker; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Date range</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->duration; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    
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