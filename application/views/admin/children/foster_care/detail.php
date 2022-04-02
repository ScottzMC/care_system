<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($foster as $fost){} ?>
<?php foreach($children as $child){} ?>
<title><?php echo $fost->title; ?> Foster Care || Admin || Harold</title>

<?php $this->load->view('menu/admin/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/admin/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        <?php foreach($foster as $fost){} ?>
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Young People</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/children/all'); ?>">Young People </a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/children/profile/detail/'.$child->code); ?>"><?php echo $child->fullname; ?> Profile </a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/children/foster_care/view/'.$fost->code); ?>">Foster Care </a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $fost->title; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Children-profile"><?php echo $fost->title; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        
        <script>
        $(function(){
          $('#downloadable').click(function(){
             
             window.location.href = "<?php echo site_url('admin/children/foster_care/download') ?>?file_name="+ $(this).attr('href');
          });
        });
        </script>
        
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Children-profile">
                        <div class="row">
                            
                            <div class="col-xl-8 col-xl-12">
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Foster Care</h3>
                                    </div>
                                    <?php if(!empty($foster)){ foreach($foster as $fost){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($fost->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $fost->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $fost->body; ?></p>
                                            </div> 
                                            <br><br>
                                            <div class="pull-right"><a href="<?php echo base_url('admin/children/foster_care/download/'.$fost->id); ?>" target="_blank">Download</a></div>
                                            <br><br>
                                            <div class="pull-right"><a href="<?php echo site_url("admin/children/foster_care/edit/$fost->id/$fost->code"); ?>">Edit</a></div>
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
                                            <form action="<?php echo base_url('admin/children/foster_care/send_mail/'.$fost->id.'/'.$fost->code); ?>" method="POST">
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
                                            <form action="<?php echo base_url('admin/generate_pdf/foster_care/'.$fost->code); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
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
                                            <form action="<?php echo base_url('admin/children/foster_care/edit_document/'.$fost->id.'/'.$fost->code); ?>" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
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

<?php $this->load->view('menu/admin/script'); ?>

</body>
</html>
