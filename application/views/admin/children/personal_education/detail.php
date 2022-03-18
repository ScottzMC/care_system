<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($education as $edu){} ?>
<?php foreach($children as $child){} ?>
<title><?php echo $edu->title; ?> Personal Education || Admin || Harold</title>

<?php $this->load->view('menu/admin/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/admin/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        <?php foreach($education as $edu){} ?>
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Young People</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/children/all'); ?>">Young People </a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/children/profile/detail/'.$child->code); ?>"><?php echo $child->fullname; ?> Profile </a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/children/personal_education/view/'.$edu->code); ?>">Personal Education </a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $edu->title; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Children-profile"><?php echo $edu->title; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        
        <script>
            $(function(){
              $('#downloadable').click(function(){
                 
                 window.location.href = "<?php echo site_url('admin/children/personal_education/download') ?>?file_name="+ $(this).attr('href');
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
                                        <h3 class="card-title">Personal Education</h3>
                                    </div>
                                    <?php if(!empty($education)){ foreach($education as $edu){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($edu->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $edu->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $edu->body; ?></p>
                                            </div>  
                                            <br><br>
                                            <div class="pull-right"><a href="<?php echo base_url('admin/children/personal_education/download/'.$edu->id); ?>" target="_blank">Download</a></div>
                                            <br><br>
                                            <div class="pull-right"><a href="<?php echo site_url("admin/children/personal_education/edit/$edu->id/$edu->code"); ?>">Edit</a></div>
                                            <br><br>
                                            <form action="<?php echo base_url('admin/children/personal_education/send_mail'); ?>" method="POST">
                                                <input class="form-control" type="email" name="email" placeholder="Email Address">
                                                <input type="hidden" name="title" value="<?php echo $edu->title; ?>">
                                                <input type="hidden" name="body" value="<?php echo $edu->body; ?>">
                                                <input type="hidden" name="created_date" value="<?php echo date('l, dS M Y',strtotime($edu->created_date)); ?>">
                                                <br>
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

<?php $this->load->view('menu/admin/script'); ?>

</body>
</html>
