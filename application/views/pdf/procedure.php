<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Policy & Procedure</title>

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
                                        <h1 class="card-title">Policy & Procedure</h1>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Info</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){ ?>
                                    <div class="card-body">
										<ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Title </b>
                                                <div class="pull-right"><?php echo $det->title; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Body </b>
                                                <div class="pull-right"><?php echo $det->body; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Date</b>
                                                <div class="pull-right"><?php echo date('j M Y', strtotime($det->created_date)); ?></div>
                                            </li>
                                        </ul>
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

</body>
</html>
