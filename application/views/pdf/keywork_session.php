<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Keywork Session || PDF</title>

<?php $this->load->view('menu/admin/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">
<div id="main_content">
    <!-- Start project content area -->
    <div class="page">
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Keywork">
                        <div class="row">
                            <?php 
                             //Use this code to convert your image to base64
                             // Apply this in a view 
                              
                            $path = base_url('uploads/logo-dark.png');// Modify this part (your_img.png
                            $type = pathinfo($path, PATHINFO_EXTENSION);
                            $data = file_get_contents($path);
                            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                            ?>
                            
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
                                        <h3 class="card-title">Info</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h4 class="font600"><?php echo $det->date_title; ?></h4>
                                            <h4 class="font600"><?php echo $det->title; ?></h4>
                                            <div class="msg">
                                                <p><?php echo $det->summary; ?></p>
                                            </div>  
                                            <br>
                                            <h4 class="font600">Staff Initial</h4>
                                            <div class="msg">
                                                <p><?php echo $det->staff_initial; ?></p>
                                            </div>  
                                            <br>
                                            <h4 class="font600">Hours to be spent weekly</h4>
                                            <div class="msg">
                                                <p><?php echo $det->hours_spent; ?></p>
                                            </div>  
                                            <br>
                                            <h4 class="font600">Length of time spent</h4>
                                            <div class="msg">
                                                <p><?php echo $det->length_time; ?></p>
                                            </div>  
                                            <br>
                                            <h4 class="font600">Independent Living Skills</h4>
                                            <div class="msg">
                                                <?php 
                                                  $check = explode(',', $det->independent_living);
                                            
                                                  foreach($check as $indep) {
                                                
                                                ?>
                                                <p><?php echo $indep; ?></p>
                                                <?php } ?>
                                            </div> 
                                            <br>
                                            <h6 class="font600">Date</h6>
                                            <div class="msg">
                                                <p><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></p>
                                            </div>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <?php 
                             //Use this code to convert your image to base64
                             // Apply this in a view 
                              
                            $path = base_url('uploads/keywork_session/'.$det->image1);// Modify this part (your_img.png
                            $type = pathinfo($path, PATHINFO_EXTENSION);
                            $data = file_get_contents($path);
                            $photo1 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                            ?>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Photo 1</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h4 class="font600">Photo 1</h4>
                                            <div class="msg">
                                                <p><img src="<?=$photo1?>" height="200" width="250" /></p>
                                            </div> 
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <?php 
                             //Use this code to convert your image to base64
                             // Apply this in a view 
                              
                            $path = base_url('uploads/keywork_session/'.$det->image2);// Modify this part (your_img.png
                            $type = pathinfo($path, PATHINFO_EXTENSION);
                            $data = file_get_contents($path);
                            $photo2 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                            ?>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Photo 2</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h4 class="font600">Photo 2</h4>
                                            <div class="msg">
                                                <p><img src="<?=$photo2?>" height="200" width="250" /></p>
                                            </div> 
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <?php 
                             //Use this code to convert your image to base64
                             // Apply this in a view 
                              
                            $path = base_url('uploads/keywork_session/'.$det->image3);// Modify this part (your_img.png
                            $type = pathinfo($path, PATHINFO_EXTENSION);
                            $data = file_get_contents($path);
                            $photo3 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                            ?>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Photo 3</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h4 class="font600">Photo 3</h4>
                                            <div class="msg">
                                                <p><img src="<?=$photo3?>" height="200" width="250" /></p>
                                            </div> 
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <?php 
                             //Use this code to convert your image to base64
                             // Apply this in a view 
                              
                            $path = base_url('uploads/keywork_session/'.$det->image4);// Modify this part (your_img.png
                            $type = pathinfo($path, PATHINFO_EXTENSION);
                            $data = file_get_contents($path);
                            $photo4 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                            ?>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Photo 4</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h4 class="font600">Photo 4</h4>
                                            <div class="msg">
                                                <p><img src="<?=$photo4?>" height="200" width="250" /></p>
                                            </div> 
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <?php 
                             //Use this code to convert your image to base64
                             // Apply this in a view 
                              
                            $path = base_url('uploads/keywork_session/'.$det->image5);// Modify this part (your_img.png
                            $type = pathinfo($path, PATHINFO_EXTENSION);
                            $data = file_get_contents($path);
                            $photo5 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                            ?>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Photo 5</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h4 class="font600">Photo 5</h4>
                                            <div class="msg">
                                                <p><img src="<?=$photo5?>" height="200" width="250" /></p>
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
