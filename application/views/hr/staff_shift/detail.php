<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($detail as $det){} ?>
<title><?php echo $det->title; ?> || Staff Shift || HR || Harold</title>

<?php $this->load->view('menu/hr/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/hr/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Staff Shift</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('hr/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('hr/staff_shift'); ?>"> Staff Shift </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit <?php echo $det->title; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Staff">Edit <?php echo $det->title; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Staff">
                        <div class="row">
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Info</h3>
                                    </div>
                                    <?php if(!empty($detail)){ ?>
                                    <div class="card-body">
										<ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Staff Name </b>
                                                <div class="pull-right"><?php echo $det->title; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Email Address </b>
                                                <div class="pull-right"><?php echo $det->email; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>House Name </b>
                                                <div class="pull-right"><?php echo $det->house_name; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Shift Start Time </b>
                                                <div class="pull-right"><?php echo $det->start_time; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Shift End Time </b>
                                                <div class="pull-right"><?php echo $det->end_time; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Shift Date</b>
                                                <div class="pull-right"><?php echo date('j M Y', strtotime($det->start_date)); ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Action</b>
                                                <div class="pull-right"><a href="<?php echo site_url("hr/staff_shift/edit/$det->id"); ?>">Edit</a></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Send Mail</b>
                                                <form action="<?php echo base_url('hr/staff_shift/send_mail'); ?>" method="POST">
                                                <input class="form-control" type="email" name="rep_email" placeholder="Email Address">
                                                <input type="hidden" name="fullname" value="<?php echo $det->title; ?>">
                                                <input type="hidden" name="email" value="<?php echo $det->email; ?>">
                                                <input type="hidden" name="house_name" value="<?php echo $det->house_name; ?>">
                                                <input type="hidden" name="start_time" value="<?php echo $det->start_time; ?>">
                                                <input type="hidden" name="end_time" value="<?php echo $det->end_time; ?>">
                                                <input type="hidden" name="date" value="<?php echo date('l, dS M Y',strtotime($det->start_date)); ?>">
                                                <br>
                                                <div class="pull-right"><button type="submit" name="send">Send to Mail</button></div>
                                            </form>
                                            </li>
                                        </ul>
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

<?php $this->load->view('menu/hr/script'); ?>

</body>
</html>
