<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Handover || PDF</title>

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
                    
                    <div class="tab-pane active" id="Daily">
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
                                            <h1 class="card-title">Handover</h1>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Summary</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <small class="float-right text-right"><?php echo $det->time; ?></small></span>
                                            <br>
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->date)); ?></small></span>
                                            <h3 class="font600"><?php echo $det->title; ?></h3>
                                            <div class="msg">
                                                <?php 
                                                $query = $this->db->query("SELECT firstname, lastname FROM users WHERE email = '$det->ingoing_staff' ")->result();
                                            foreach($query as $qry){
                                                $ingoing_firstname = $qry->firstname;
                                                $ingoing_lastname = $qry->lastname;
                                            }
                                            
                                            $sequel = $this->db->query("SELECT firstname, lastname FROM users WHERE email = '$det->outgoing_staff' ")->result();
                                            foreach($sequel as $sql){
                                                $outgoing_firstname = $sql->firstname;
                                                $outgoing_lastname = $sql->lastname;
                                            }
                                                ?>
                                                <?php if(!empty($query)){ ?>
                                                <p><b>Incoming Staff</b> - <?php echo $ingoing_firstname; ?> <?php echo $ingoing_lastname; ?></p>
                                                <?php }else{ ?>
                                                <p><b>Incoming Staff</b></p>
                                                <?php } ?>
                                                <br>
                                                <?php if(!empty($sequel)){ ?>
                                                <p><b>Outgoing Staff</b> - <?php echo $outgoing_firstname; ?> <?php echo $outgoing_lastname; ?></p>
                                                <?php }else{ ?>
                                                <p><b>Outgoing Staff</b></p>
                                                <?php } ?>
                                            </div>  
                                        </div>
                                        
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Have you read the staff communication, logged KWS & required data</h3>
                                    </div>
                                    <?php foreach($ingoing as $in){}?>
                                    <?php foreach($outgoing as $out){}?>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Incoming - </b><?php echo $in->actions; ?></h3>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Outgoing - </b><?php echo $out->actions; ?></h3>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Is the Playstation/Xbox present at placement?</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Incoming - </b><?php echo $in->gaming; ?></h3>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Outgoing - </b><?php echo $out->gaming; ?></h3>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Do you have the House Keys, Mobile and Petty cash?</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Incoming - </b><?php echo $in->keys_pettycash; ?></h3>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Outgoing - </b><?php echo $out->keys_pettycash; ?></h3>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Does the Petty Cash amount correlate with the Petty Cash Record?</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Incoming - </b> £<?php echo $in->keys_pettycash_comment; ?></h3>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Outgoing - </b> £<?php echo $out->keys_pettycash_comment; ?></h3>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Are there any concerns or medication that needs to be held for YPs!</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Incoming - </b><?php echo $in->health_wellbeing; ?></h3>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Outgoing - </b><?php echo $out->health_wellbeing; ?></h3>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms?</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Incoming - </b><?php echo $in->cleanliness; ?></h3>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Outgoing - </b><?php echo $out->cleanliness; ?></h3>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Are there any Service Users who are near their missing people’s time, or are away from the unit?</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Incoming - </b><?php echo $in->occupancy; ?></h3>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Outgoing - </b><?php echo $out->occupancy; ?></h3>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Does Edt or the Police  need to be updated?</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Incoming - </b><?php echo $in->edt_police_comment; ?></h3>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Outgoing - </b><?php echo $out->edt_police_comment; ?></h3>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Any <b>Safeguarding Concerns?</b> If yes, has this been logged and reported to the safeguarding officer.</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Incoming - </b><?php echo $in->safeguarding; ?></h3>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Outgoing - </b><?php echo $out->safeguarding; ?></h3>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Have all appointments been added to the diary?</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Incoming - </b><?php echo $in->appointments_diary; ?></h3>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Outgoing - </b><?php echo $out->appointments_diary; ?></h3>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Has an allocated worker been assigned to support that YP?</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Incoming - </b><?php echo $in->appointments_diary_support; ?></h3>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Outgoing - </b><?php echo $out->appointments_diary_support; ?></h3>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Has the YP been reminded/offered support for the appointment?</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Incoming - </b><?php echo $in->appointments_diary_remind; ?></h3>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Outgoing - </b><?php echo $out->appointments_diary_remind; ?></h3>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Handover of each Service User:</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Incoming - </b><?php echo $in->service_user; ?></h3>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Outgoing - </b><?php echo $out->service_user; ?></h3>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Are there any maintenance issues you need to deal with during your shift? If so, do you know who to contact?</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Incoming - </b><?php echo $in->maintenance; ?></h3>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Outgoing - </b><?php echo $out->maintenance; ?></h3>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Outstanding task to complete</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Incoming - </b><?php echo $in->outstanding_task; ?></h3>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h3 class="font600"><b>Outgoing - </b><?php echo $out->outstanding_task; ?></h3>  
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
