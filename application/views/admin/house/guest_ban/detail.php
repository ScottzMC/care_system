<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($detail as $det){} ?>
<title><?php echo $det->room_number; ?> || Guest ban || Admin || Harold</title>

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
                        <h1 class="page-title">Guest ban</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/house/all/unit/'.$code); ?>"><?php echo $prop->housename; ?></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('admin/house/guest_ban/view/'.strtolower($code)); ?>">Guest Ban</a></li>
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
                                            <div class="pull-right"><a href="<?php echo site_url("admin/house/guest_ban/edit/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                        
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                                <div class="col-xl-8 col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Send Mail</h3>
                                        </div>
                                        <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                        <div class="card-body">
                                            
                                            <div class="timeline_item ">
                                                <form action="<?php echo base_url('admin/house/guest_ban/send_mail/'.$det->id.'/'.$code); ?>" method="POST">
                                                    <input class="form-control" type="email" name="email" placeholder="Recipent email">
                                                    <br>
                                                    <div class="pull-right"><button type="submit" name="send">Send to Mail</button></div>
                                                </form>   
                                            </div>
                                        </div>
                                        
                                        <?php } ?>
                                    </div>
                                </div>
                            
                                <div class="col-xl-8 col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Generate PDF</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="timeline_item">
                                                <form action="<?php echo base_url('admin/generate_pdf/guest_ban/'.$det->id); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                                <div class="pull-right"><button type="submit">Generate PDF</button></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-xl-8 col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Upload PDF</h3>
                                        </div>
                                        <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                        <div class="card-body">
                                            
                                            <div class="timeline_item ">
                                                <form action="<?php echo base_url('admin/house/guest_ban/edit_document/'.$det->id.'/'.$code); ?>" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                                                    <div class="col-md-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Document<span class="text-danger">*</span></label>
                                                            <input type="file" name="userFiles1[]" class="form-control">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="pull-right"><button type="submit" name="send">Upload</button></div>
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
</div>

<?php $this->load->view('menu/admin/script'); ?>

</body>
</html>
