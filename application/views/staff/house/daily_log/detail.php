<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($detail as $det){} ?>
<title><?php echo $det->title; ?> || Daily Log || staff || Harold</title>

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
                        <h1 class="page-title">Daily Log</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item">House</li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/house/all/unit/'.$code); ?>"><?php echo $prop->housename; ?></a></li>
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
                                            <small class="float-right text-right"><?php echo $det->staff_initial; ?></small></span>
                                            <br>
                                            <small class="float-right text-right"><?php echo $det->time; ?></small></span>
                                            <br>
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $det->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $det->summary; ?></p>
                                            </div>  
                                            <div class="pull-right"><a href="<?php echo site_url("staff/house/daily_log/edit/$det->id/$code"); ?>">Edit</a></div>
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
                                            <form action="<?php echo base_url('staff/house/daily_log/send_mail/'.$code); ?>" method="POST">
                                                <div class="msg">
                                                <input type="email" class="form-control" name="email" placeholder="Recipient email address">
                                            </div>  
                                                <input type="hidden" name="title" value="<?php echo $det->title; ?>">
                                                <input type="hidden" name="staff_initial" value="<?php echo $det->staff_initial; ?>">
                                                <input type="hidden" name="summary" value="<?php echo $det->summary; ?>">
                                                <input type="hidden" name="created_date" value="<?php echo date('j M Y', strtotime($det->created_date)); ?>">
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
