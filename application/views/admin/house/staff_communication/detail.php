<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($detail as $det){} ?>
<title><?php echo $det->title; ?> || Staff communication || Admin || Harold</title>

<?php $this->load->view('menu/admin/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/admin/nav'); ?>
    <div class="page">
        <?php 
        $property = $this->db->query("SELECT housename FROM properties WHERE code = '$code' ")->result();
        foreach($property as $prop){} ?>
        
        <!-- Start Page header -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Staff communication</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('admin/house/all/unit/'.strtolower($code)); ?>"><?php echo $prop->housename; ?></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('admin/house/staff_communication/view/'.strtolower($code)); ?>">Staff Communication</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $det->title; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Staff"><?php echo $det->title; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Bi">
                        <div class="row">
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Info</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $det->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $det->request; ?></p>
                                            </div>
                                            <br>
                                            <h6 class="font600">Time</h6>
                                            <div class="msg">
                                                <p><?php echo $det->time; ?></p>
                                            </div>  
                                            <br>
                                            <h6 class="font600">Date</h6>
                                            <div class="msg">
                                                <p><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></p>
                                            </div>  
                                            <br>
                                            
                                            <div class="pull-right"><a href="<?php echo site_url("admin/house/staff_communication/edit/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                        
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Send Mail</h3>
                                        </div>
                                        <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                        <div class="card-body">
                                            
                                            <div class="timeline_item ">
                                                <form action="<?php echo base_url('admin/house/staff_communication/send_mail/'.$det->id.'/'.$code); ?>" method="POST">
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
                                                <form action="<?php echo base_url('admin/generate_pdf/staff_communication/'.$det->id); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
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
                                                <form action="<?php echo base_url('admin/house/staff_communication/edit_document/'.$det->id.'/'.$code); ?>" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
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

<?php $this->load->view('menu/admin/script'); ?>
</body>
</html>
