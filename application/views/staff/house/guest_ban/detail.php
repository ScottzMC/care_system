<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($detail as $det){} ?>
<title><?php echo $det->room_number; ?> || Guest ban || staff || Harold</title>

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
                        <h1 class="page-title">Guest ban</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item">House</li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/house/all/unit/'.$code); ?>"><?php echo $prop->housename; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $det->room_number; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Guest"><?php echo $det->child_name; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="Guest">
                        <div class="row">
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Info</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <h6 class="font600">Room number - <?php echo $det->room_number; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $det->reason_for_ban; ?></p>
                                            </div>  
                                            <br>
                                            <h6 class="font600">Young person - <?php echo $det->child_name; ?></h6>
                                            <br>
                                            <h6 class="font600">Guest - <?php echo $det->guest_name; ?></h6>
                                            <br>
                                            <div class="msg">
                                                <h6 class="font600">Additional info</h6>
                                                <p><?php echo $det->additional_info; ?></p>
                                            </div>
                                            <br>
                                            <div class="msg">
                                                <h6 class="font600">Start date</h6>
                                                <p><?php echo date('l, dS M Y',strtotime($det->start_date)); ?></p>
                                            </div> 
                                            <br>
                                            <div class="msg">
                                                <h6 class="font600">End date</h6>
                                                <p><?php echo date('l, dS M Y',strtotime($det->end_date)); ?></p>
                                            </div> 
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/guest_ban/edit/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                        
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Send Mail</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <form action="<?php echo base_url('staff/house/guest_ban/send_mail/'.$code); ?>" method="POST">
                                                <div class="msg">
                                                <input type="email" class="form-control" name="email" placeholder="Recipient email address">
                                            </div>  
                                                <input type="hidden" name="house" value="<?php echo $det->house; ?>">
                                                <input type="hidden" name="guest_name" value="<?php echo $det->guest_name; ?>">
                                                <input type="hidden" name="child_name" value="<?php echo $det->child_name; ?>">
                                                <input type="hidden" name="reason_for_ban" value="<?php echo $det->reason_for_ban; ?>">
                                                <input type="hidden" name="additional_info" value="<?php echo $det->additional_info; ?>">
                                                <input type="hidden" name="start_date" value="<?php echo date('j M Y', strtotime($det->start_date)); ?>">
                                                <input type="hidden" name="end_date" value="<?php echo date('j M Y', strtotime($det->end_date)); ?>">
                                                <div class="pull-right"><button type="submit" name="send">Send to Mail</button></div>
                                            </form>   
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
