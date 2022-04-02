<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>Support Work || PDF</title>
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
                                        <h3 class="card-title">Unit details</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <h5 class="font600"><?php echo $det->title; ?></h5>
                                            <div class="msg">
                                                <p><?php echo $det->plan_of_action; ?></p>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Who will support me?</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->support_me; ?></p>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">How often will I need support?</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->often_will_support; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Hours per week spent on task </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->hours_spent_task; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Additional Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo $det->additional_info; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Date</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo date('j M Y', strtotime($det->created_date)); ?></p>
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