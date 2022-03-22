<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($detail as $det){} ?>
<title><?php echo $det->title; ?> || Handover || admin || Harold</title>

<?php $this->load->view('menu/admin/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">
    
    <?php 
        $property = $this->db->query("SELECT housename FROM properties WHERE code = '$code' ")->result();
        foreach($property as $prop){} ?>

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/admin/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Handover</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item">House</li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/house/all/unit/'.$code); ?>"><?php echo $prop->housename; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $det->title; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Daily"><?php echo $det->title; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Daily">
                        <div class="row">
                            
                            <div class="col-xl-8 col-xl-12">
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Info</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <small class="float-right text-right"><?php echo $det->time; ?></small></span>
                                            <br>
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->date)); ?></small></span>
                                            <h6 class="font600"><?php echo $det->title; ?></h6>
                                            <div class="msg">
                                                <?php 
                                                $query = $this->db->query("SELECT firstname, lastname FROM users WHERE email = '$det->ingoing_staff' AND role = 'Staff' ")->result();
                                            foreach($query as $qry){
                                                $ingoing_firstname = $qry->firstname;
                                                $ingoing_lastname = $qry->lastname;
                                            }
                                            
                                            $sequel = $this->db->query("SELECT firstname, lastname FROM users WHERE email = '$det->outgoing_staff' AND role = 'Staff' ")->result();
                                            foreach($sequel as $sql){
                                                $outgoing_firstname = $sql->firstname;
                                                $outgoing_lastname = $sql->lastname;
                                            }
                                                ?>
                                                <?php if(!empty($query)){ ?>
                                                <p><b>Ingoing Staff</b> - <?php echo $ingoing_firstname; ?> <?php echo $ingoing_lastname; ?></p>
                                                <?php }else{ ?>
                                                <p><b>Ingoing Staff</b></p>
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
                                            <h6 class="font600"><b>Ingoing - </b><?php echo $in->actions; ?></h6>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h6 class="font600"><b>Outgoing - </b><?php echo $out->actions; ?></h6>  
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
                                            <h6 class="font600"><b>Ingoing - </b><?php echo $in->gaming; ?></h6>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h6 class="font600"><b>Outgoing - </b><?php echo $out->gaming; ?></h6>  
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
                                            <h6 class="font600"><b>Ingoing - </b><?php echo $in->keys_pettycash; ?></h6>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h6 class="font600"><b>Outgoing - </b><?php echo $out->keys_pettycash; ?></h6>  
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
                                            <h6 class="font600"><b>Ingoing - </b> £<?php echo $in->keys_pettycash_comment; ?></h6>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h6 class="font600"><b>Outgoing - </b> £<?php echo $out->keys_pettycash_comment; ?></h6>  
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
                                            <h6 class="font600"><b>Ingoing - </b><?php echo $in->health_wellbeing; ?></h6>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h6 class="font600"><b>Outgoing - </b><?php echo $out->health_wellbeing; ?></h6>  
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
                                            <h6 class="font600"><b>Ingoing - </b><?php echo $in->cleanliness; ?></h6>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h6 class="font600"><b>Outgoing - </b><?php echo $out->cleanliness; ?></h6>  
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
                                            <h6 class="font600"><b>Ingoing - </b><?php echo $in->occupancy; ?></h6>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h6 class="font600"><b>Outgoing - </b><?php echo $out->occupancy; ?></h6>  
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
                                            <h6 class="font600"><b>Ingoing - </b><?php echo $in->edt_police_comment; ?></h6>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h6 class="font600"><b>Outgoing - </b><?php echo $out->edt_police_comment; ?></h6>  
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
                                            <h6 class="font600"><b>Ingoing - </b><?php echo $in->safeguarding; ?></h6>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h6 class="font600"><b>Outgoing - </b><?php echo $out->safeguarding; ?></h6>  
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
                                            <h6 class="font600"><b>Ingoing - </b><?php echo $in->appointments_diary; ?></h6>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h6 class="font600"><b>Outgoing - </b><?php echo $out->appointments_diary; ?></h6>  
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
                                            <h6 class="font600"><b>Ingoing - </b><?php echo $in->appointments_diary_support; ?></h6>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h6 class="font600"><b>Outgoing - </b><?php echo $out->appointments_diary_support; ?></h6>  
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
                                            <h6 class="font600"><b>Ingoing - </b><?php echo $in->appointments_diary_remind; ?></h6>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h6 class="font600"><b>Outgoing - </b><?php echo $out->appointments_diary_remind; ?></h6>  
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
                                            <h6 class="font600"><b>Ingoing - </b><?php echo $in->service_user; ?></h6>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h6 class="font600"><b>Outgoing - </b><?php echo $out->service_user; ?></h6>  
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
                                            <h6 class="font600"><b>Ingoing - </b><?php echo $in->maintenance; ?></h6>  
                                        </div>
                                        <br>
                                        <div class="timeline_item">
                                            <h6 class="font600"><b>Outgoing - </b><?php echo $out->maintenance; ?></h6>  
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <!--<div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Send Mail</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <form action="<?php echo base_url('admin/house/handover/send_mail/'.$code); ?>" method="POST">
                                                <div class="msg">
                                                <input type="email" class="form-control" name="email" placeholder="Recipient email address">
                                            </div>  
                                                <input type="hidden" name="title" value="<?php echo $det->title; ?>">
                                                <input type="hidden" name="actions" value="<?php echo $det->actions; ?>">
                                                <input type="hidden" name="gaming" value="<?php echo $det->gaming; ?>">
                                                <input type="hidden" name="keys_pettycash" value="<?php echo $det->keys_pettycash; ?>">
                                                <input type="hidden" name="keys_pettycash_comment" value="<?php echo $det->keys_pettycash_comment; ?>">
                                                <input type="hidden" name="health_wellbeing" value="<?php echo $det->health_wellbeing; ?>">
                                                <input type="hidden" name="cleanliness" value="<?php echo $det->cleanliness; ?>">
                                                <input type="hidden" name="occupancy" value="<?php echo $det->occupancy; ?>">
                                                <input type="hidden" name="edt_police_comment" value="<?php echo $det->edt_police_comment; ?>">
                                                <input type="hidden" name="safeguarding" value="<?php echo $det->safeguarding; ?>">
                                                <input type="hidden" name="appointments_diary" value="<?php echo $det->appointments_diary; ?>">
                                                <input type="hidden" name="appointments_diary_support" value="<?php echo $det->appointments_diary_support; ?>">
                                                <input type="hidden" name="appointments_diary_remind" value="<?php echo $det->appointments_diary_remind; ?>">
                                                <input type="hidden" name="service_user" value="<?php echo $det->service_user; ?>">
                                                <input type="hidden" name="maintenance" value="<?php echo $det->maintenance; ?>">
                                                <input type="hidden" name="ingoing_staff" value="<?php echo $det->ingoing_staff; ?>">
                                                <input type="hidden" name="outgoing_staff" value="<?php echo $det->outgoing_staff; ?>">
                                                <input type="hidden" name="time" value="<?php echo $det->time; ?>">
                                                <input type="hidden" name="date" value="<?php echo date('j M Y', strtotime($det->date)); ?>">
                                                <div class="pull-right"><button type="submit" name="send">Send to Mail</button></div>
                                            </form>   
                                        </div>
                                        
                                    </div>
                                    
                                    <?php } ?>
                                </div>-->
                                
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<?php $this->load->view('menu/admin/script'); ?>

</body>
</html>
