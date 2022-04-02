<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($medical as $med){} ?>
<?php foreach($children as $child){} ?>
<title><?php echo $med->title; ?> Medical History || staff || Harold</title>

<?php $this->load->view('menu/staff/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/staff/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Young People</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/all'); ?>">Young People </a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/profile/detail/'.$child->code); ?>"><?php echo $child->fullname; ?> Profile </a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/medical_history/view/'.$med->code); ?>">Medical History </a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $med->title; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Children-profile"><?php echo $med->title; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        
        <script>
        $(function(){
          $('#downloadable').click(function(){
             
             window.location.href = "<?php echo site_url('staff/children/medical_history/download') ?>?file_name="+ $(this).attr('href');
          });
        });
        </script>

        <p id='cti'></p>
        
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Children-profile">
                        <div class="row">
                            
                            <div class="col-xl-8 col-xl-12">
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Medical History</h3>
                                    </div>
                                    <?php if(!empty($medical)){ foreach($medical as $med){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($med->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $med->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $med->body; ?></p>
                                            </div>  
                                            <br><br>
                                            <div class="pull-right"><a href="<?php echo base_url('staff/children/medical_history/download/'.$med->id); ?>" target="_blank">Download</a></div>
                                            <br><br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/children/medical_history/edit/$med->id/$med->code"); ?>">Edit</a></div>
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
                                        <div class="card-body">
                                            
                                            <div class="timeline_item ">
                                                <form action="<?php echo base_url('staff/children/medical_history/send_mail/'.$med->id.'/'.$med->code); ?>" method="POST">
                                                    <input class="form-control" type="email" name="email" placeholder="Recipent email">
                                                    <br>
                                                    <div class="pull-right"><button type="submit" name="send">Send to Mail</button></div>
                                                </form>   
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            
                                <div class="col-xl-8 col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Generate PDF</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="timeline_item">
                                                <form action="<?php echo base_url('staff/generate_pdf/medical_history/'.$med->code); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
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
                                        <div class="card-body">
                                            
                                            <div class="timeline_item ">
                                                <form action="<?php echo base_url('staff/children/medical_history/edit_document/'.$med->id.'/'.$med->code); ?>" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
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
