<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($incident as $inc){} ?>
<?php foreach($children as $child){} ?>
<title><?php echo $inc->title; ?> Incident || Staff || Harold</title>

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
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/incident/view/'.$inc->code); ?>">Incident </a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $inc->title; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Children-profile"><?php echo $inc->title; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        
        <script>
        $(function(){
          $('#downloadable').click(function(){
             
             window.location.href = "<?php echo site_url('staff/children/incident/download') ?>?file_name="+ $(this).attr('href');
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
                                        <h3 class="card-title">Incident</h3>
                                    </div>
                                    <?php if(!empty($incident)){ foreach($incident as $inc){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($inc->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $inc->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $inc->body; ?></p>
                                            </div>  
                                            <br><br>
                                            <div class="pull-right"><a href="<?php echo base_url('staff/children/incident/download/'.$inc->id); ?>" target="_blank">Download</a></div>
                                            <br><br>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/children/incident/edit/$inc->id/$inc->code"); ?>">Edit</a></div>
                                            <br><br>
                                            <form action="<?php echo base_url('staff/children/incident/send_mail'); ?>" method="POST">
                                                <input class="form-control" type="email" name="email" placeholder="Email Address">
                                                <input type="hidden" name="title" value="<?php echo $inc->title; ?>">
                                                <input type="hidden" name="body" value="<?php echo $inc->body; ?>">
                                                <input type="hidden" name="created_date" value="<?php echo date('l, dS M Y',strtotime($inc->created_date)); ?>">
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

<?php $this->load->view('menu/staff/script'); ?>

</body>
</html>