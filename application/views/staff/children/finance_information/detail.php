<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($finance as $fin){} ?>
<?php foreach($children as $child){} ?>
<title><?php echo $fin->title; ?> Finance Information || staff || Harold</title>

<?php $this->load->view('menu/staff/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/staff/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        <?php foreach($finance as $fin){} ?>
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Young People</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/all'); ?>">Young People </a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/profile/detail/'.$fin->code); ?>"><?php echo $fin->child_name; ?> Profile </a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/finance_information/view/'.$fin->code); ?>">Finance Information </a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $fin->title; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Children-profile"><?php echo $fin->title; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        
        <script>
            $(function(){
              $('#downloadable').click(function(){
                 
                 window.location.href = "<?php echo site_url('staff/children/finance_information/download') ?>?file_name="+ $(this).attr('href');
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
                                        <h3 class="card-title">Finance Information</h3>
                                    </div>
                                    <?php if(!empty($finance)){ foreach($finance as $fin){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($fin->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $fin->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $fin->body; ?></p>
                                            </div>  
                                            <br><br>
                                            <!--<div class="pull-right"><a href="< ?php echo base_url('staff/children/finance_information/download/'.$fin->id); ?>" target="_blank">Download</a></div>
                                            <br><br>-->
                                            <div class="pull-right"><a href="<?php echo site_url("staff/children/finance_information/edit/$fin->id/$fin->code"); ?>">Edit</a></div>
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
                                                <form action="<?php echo base_url('staff/children/finance_information/send_mail/'.$fin->id.'/'.$fin->code); ?>" method="POST">
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
                                                <form action="<?php echo base_url('staff/generate_pdf/finance_information/'.$fin->code); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
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
                                                <form action="<?php echo base_url('staff/children/finance_information/edit_document/'.$fin->id.'/'.$fin->code); ?>" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
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
