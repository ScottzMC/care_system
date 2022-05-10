<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Sanction or Reward || Pdf</title>

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
                    
                    <div class="tab-pane active" id="Children-profile">
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
                                        <h1 class="card-title">Sanction or Rewards</h1>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Young Person</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <h4 class="font600"><?php echo $det->child_name; ?></h4>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                
                                <div class="card">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right">Date - <?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h4 class="font600">Title - <?php echo $det->title; ?></h4>
                                            <div class="msg">
                                                <p><?php echo $det->body; ?></p>
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
