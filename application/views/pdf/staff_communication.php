<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>Staff Communication || PDF</title>
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
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h1 class="card-title">Staff Communication</h1>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Title</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <h3 class="font600"><?php echo $det->title; ?></h3>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Summary</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo $det->time; ?></small></span>
                                            <div class="msg">
                                                <p><?php echo $det->request; ?></p>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Staff Initial</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <h3 class="font600"><?php echo $det->staff_initial; ?></h3>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Created At</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <div class="msg">
                                                <p><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></p>
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