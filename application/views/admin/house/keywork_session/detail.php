<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($detail as $det){} ?>
<title><?php echo $det->title; ?> || Keywork Session || Admin || Harold</title>

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
                        <h1 class="page-title">Keywork Session</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('admin/house/all/unit/'.strtolower($code)); ?>"><?php echo $prop->housename; ?></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('admin/house/keywork_session/view/'.strtolower($code)); ?>">Keywork Session</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $det->title; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Keywork"><?php echo $det->title; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        
        <script>
        $(function(){
          $('#downloadable').click(function(){
             
             window.location.href = "<?php echo site_url('admin/house/keywork_session/download') ?>?file_name="+ $(this).attr('href');
          });
        });
        </script>
        
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Keywork">
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
                                            <h5 class="font600"><?php echo $det->date_title; ?></h5>
                                            <h6 class="font600"><?php echo $det->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $det->summary; ?></p>
                                            </div>  
                                            <br>
                                            <h6 class="font600">Staff Initial</h6>
                                            <div class="msg">
                                                <p><?php echo $det->staff_initial; ?></p>
                                            </div>  
                                            <br>
                                            <h6 class="font600">Hours to be spent weekly</h6>
                                            <div class="msg">
                                                <p><?php echo $det->hours_spent; ?></p>
                                            </div>  
                                            <br>
                                            <h6 class="font600">Length of time spent</h6>
                                            <div class="msg">
                                                <p><?php echo $det->length_time; ?></p>
                                            </div>  
                                            <br>
                                            <h6 class="font600">Independent Living Skills</h6>
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
                                            <br><br>
                                            
                                            <div class="pull-right"><a href="<?php echo site_url("admin/house/keywork_session/edit/$det->id/$code"); ?>">Edit</a></div>
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
                                            <form action="<?php echo base_url('admin/house/keywork_session/send_mail/'.$det->id.'/'.$code); ?>" method="POST">
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
                                            <form action="<?php echo base_url('admin/generate_pdf/keywork_session/'.$det->id); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
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
                                            <form action="<?php echo base_url('admin/house/keywork_session/edit_document/'.$det->id.'/'.$code); ?>" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
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
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Photo 1</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h6 class="font600">Photo 1</h6>
                                            <div class="msg">
                                                <p><img src="https://scottnnaghor.com/care_system/uploads/keywork_session/<?php echo $det->image1; ?>"></p>
                                            </div> 
                                            <div class="pull-right"><a href="<?php echo site_url("admin/house/keywork_session/edit_image1/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Photo 2</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h6 class="font600">Photo 2</h6>
                                            <div class="msg">
                                                <p><img src="https://scottnnaghor.com/care_system/uploads/keywork_session/<?php echo $det->image2; ?>"></p>
                                            </div> 
                                            <div class="pull-right"><a href="<?php echo site_url("admin/house/keywork_session/edit_image2/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Photo 3</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h6 class="font600">Photo 3</h6>
                                            <div class="msg">
                                                <p><img src="https://scottnnaghor.com/care_system/uploads/keywork_session/<?php echo $det->image3; ?>"></p>
                                            </div> 
                                            <div class="pull-right"><a href="<?php echo site_url("admin/house/keywork_session/edit_image3/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Photo 4</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h6 class="font600">Photo 4</h6>
                                            <div class="msg">
                                                <p><img src="https://scottnnaghor.com/care_system/uploads/keywork_session/<?php echo $det->image4; ?>"></p>
                                            </div> 
                                            <div class="pull-right"><a href="<?php echo site_url("admin/house/keywork_session/edit_image4/$det->id/$code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Photo 5</h3>
                                    </div>
                                    <?php if(!empty($detail)){ foreach($detail as $det){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($det->created_date)); ?></small></span>
                                            <h6 class="font600">Photo 5</h6>
                                            <div class="msg">
                                                <p><img src="https://scottnnaghor.com/care_system/uploads/keywork_session/<?php echo $det->image5; ?>"></p>
                                            </div> 
                                            <div class="pull-right"><a href="<?php echo site_url("admin/house/keywork_session/edit_image5/$det->id/$code"); ?>">Edit</a></div>
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
